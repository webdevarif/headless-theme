<?php
// Assuming autoload or correct path inclusion for the TemplateTags class
use Inc\Base\TemplateTags;

// Instantiate the TemplateTags class
$template_tags = new TemplateTags();
// Assuming you're calling this in a WordPress context, such as within The Loop or during a normal page request
$current_page_id = get_the_ID();

// Call the headless_template method, providing the necessary parameters
$template_tags->headless_template('header', 'template-parts/default-header', $current_page_id);
