<?php
namespace Inc\RestAPI;

use \Inc\Base\BaseController;
use \WP_REST_Request; // Ensure this line is present

class FluentForm extends BaseController {
    
    // Register hooks
    public function register() {
        add_action('rest_api_init', [$this, 'registerRoutes']);
    }
    
    // Register the custom REST route
    public function registerRoutes() {
        register_rest_route('wgp/v1', '/fluent-form', [
            'methods' => 'POST',
            'callback' => [$this, 'fluentFormCallback'],
            'permission_callback' => '__return_true',
        ]);
    }

    // Callback for the REST route
    public function fluentFormCallback(WP_REST_Request $request) {

        // Retrieve form ID and submitted data from the request
        $formData = $request->get_body_params();

        // Check if form_id exists in $formData before using it
        if (!isset($formData['form_id'])) {
            return new \WP_REST_Response([
                'status' => 400,
                'error' => 'Form ID is required.'
            ], 400);
        }

        $form = wpFluent()->table('fluentform_forms')->find($formData['form_id']);

        if (!$form) {
            return new \WP_REST_Response([
                'status' => 423,
                'error' => 'No Form Found'
            ], 423);
        }

        $formData = wp_unslash($formData);
        
        // Here 'user_session_id' is the unique key that we want to match same user and same form
        $prevSubmission = $this->maybeSameSubmission($formData, $form, 'user_session_id');

        if ($prevSubmission) {
            $submissionId = $this->recordPrevSubmission($prevSubmission, $formData, $form);
        } else {
            $submissionId = $this->recordNewEntry($formData, $form);
        }

        return new \WP_REST_Response([
            'status' => 200,
            'data' => $formData,
            'insert_id' => $submissionId,
            'form' => $form,
        ], 200);
    }
    
    private function recordNewEntry($formData, $form)
    {
        $formHandler = new \FluentForm\App\Modules\Form\FormHandler(wpFluentForm());
        $previousItem = wpFluent()->table('fluentform_submissions')
            ->where('form_id', $form->id)
            ->orderBy('id', 'DESC')
            ->first();

        $serialNumber = 1;

        if ($previousItem) {
            $serialNumber = $previousItem->serial_number + 1;
        }

        $insertId = wpFluent()
            ->table('fluentform_submissions')
            ->insert([
                'form_id'       => $form->id,
                'response'      => json_encode($formData),
                'source_url'    => isset($_REQUEST['src']) ? $_REQUEST['src'] : '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
                'serial_number' => $serialNumber
            ]);

        // This is required to fire the form events.
        $formHandler->processFormSubmissionData($insertId, $formData, $form);

        return $insertId;
    }

    private function recordPrevSubmission($prevSubmission, $formData, $form)
    {
        $prevData = json_decode($prevSubmission->response, true);
        $data = array_merge($prevData, $formData);
        wpFluent()
            ->table('fluentform_submissions')
            ->where('id', $prevSubmission->id)
            ->update([
                'response'   => json_encode($data),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        wpFluent()->table('fluentform_entry_details')
            ->where('submission_id', $prevSubmission->id)
            ->delete();

        $entries = new \FluentForm\App\Modules\Entries\Entries();
        $entries->recordEntryDetails($prevSubmission->id, $form->id, $data);
        return $prevSubmission->id;
    }

    /**
     * @param $data
     * @param $form
     * @param string $sessionKey
     * @return false|\stdClass|null
     */
    private function maybeSameSubmission($data, $form, $sessionKey = 'user_session_id')
    {
         /*
         * To check your unique session ID here
         * Say your session id value key in the form_body is: user_session_id
         */
         // let's find the previous session id

        if (isset($formData[$sessionKey]) && $userSessionId = $formData[$sessionKey]) {
            $prevSession = wpFluent()->table('fluentform_entry_details')
                ->where('form_id', $form->id)
                ->where('field_name', 'user_session_id')
                ->where('field_value', $userSessionId)
                ->first();

            if ($prevSession) {
                return wpFluent()->table('fluentform_submissions')
                    ->where('form_id', $form->id)
                    ->where('id', $prevSession->submission_id)
                    ->first();
            }
        }

        return false;
    }
}
