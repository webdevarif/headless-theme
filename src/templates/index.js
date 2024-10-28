//templates.js

import { registerPlugin } from "@wordpress/plugins";
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import { TextControl, __experimentalHStack as HStack, __experimentalSpacer as Spacer, __experimentalText as Text, Button, Popover, __experimentalHeading as Heading,
    SelectControl, Card, CardBody,
    __experimentalVStack as VStack,
} from "@wordpress/components";
import { __ } from "@wordpress/i18n";
import { useState, useEffect } from "@wordpress/element";
import { select, useSelect, useDispatch } from '@wordpress/data';

const TemplateSidebarPanel = () => {
    const [popoverAnchor, setPopoverAnchor] = useState();
    const [isVisible, setIsVisible] = useState(false);

    const meta = useSelect((select) => select('core/editor').getEditedPostAttribute('meta'), []);
    const { editPost } = useDispatch('core/editor');

    // Ensure 'meta' is defined and prevent accessing properties of undefined
    const includeOption = (meta && meta.template_display_option) || 'none';
    const selectedPages = (meta && meta.template_selected_pages) || [];
    const excludePages = (meta && meta.template_exclude_pages) || []; // New field for excluded pages
    const templateType = (meta && meta.template_type) || '';  // Fetching template type

    const toggleVisible = () => {
        setIsVisible((state) => !state);
    };

    const pages = useSelect((select) => {
        return select('core').getEntityRecords('postType', 'page') || [];
    }, []);

    const postType = select('core/editor').getCurrentPostType();

    const displayText = includeOption === 'entire_site'
        ? __('Entire Site')
        : includeOption === 'specific_pages' && selectedPages.length > 0
        ? __('Specific Pages')
        : __('Not Selected');

    if (postType !== 'headless_templates') {
        return null;
    }

    return (
        <>
        <PluginDocumentSettingPanel
            name="headless-templates-sidepanel"
            title={__("Template Settings")}
            className="headless-templates-sidepanel"
        >
            <VStack>
                <HStack>
                    <Text style={{ width: '30%', fontSize: '10px', fontWeight: 500 }}>{__("DISPLAY ON")}</Text>
                    <Text style={{ width: '70%', padding: '6px 0' }}>
                        <Button variant="tertiary" onClick={toggleVisible}>
                            {displayText}
                        </Button>
                    </Text>
                </HStack>
                
                {isVisible && (
                    <Popover
                        anchor={popoverAnchor}
                        onFocusOutside={() => setIsVisible(false)}
                        placement='right-start'
                    >
                        <Card style={{ width: '16rem' }}>
                            <CardBody style={{ padding: '1rem' }}>
                                <HStack style={{ marginBottom: '1rem' }}>
                                    <Heading size="12">Display On</Heading>
                                    <Button
                                        icon="no-alt"
                                        label={__('Close')}
                                        onClick={() => setIsVisible(false)}
                                        className="block-editor-inspector-popover-header__action"
                                        style={{
                                            boxShadow: 'none'
                                        }}
                                    />
                                </HStack>

                                <SelectControl
                                    label={__("Include")}
                                    value={includeOption}
                                    options={[
                                        { value: '', label: __('Select One') },
                                        { value: 'entire_site', label: __('Entire Site') },
                                        { value: 'specific_pages', label: __('Specific Pages') }
                                    ]}
                                    onChange={(value) => editPost({ meta: { ...meta, template_display_option: value } })}
                                />

                                {includeOption === 'specific_pages' && (
                                    <div>
                                        <label>{__("Select Pages")}</label>
                                        <select
                                            multiple
                                            value={selectedPages}
                                            onChange={(e) => {
                                                const selectedOptions = Array.from(e.target.selectedOptions).map(option => option.value);
                                                editPost({ meta: { ...meta, template_selected_pages: selectedOptions } });
                                            }}
                                            style={{
                                                width: '100%',
                                                height: '5em',
                                                fontSize: '13px',
                                                padding: '5px'
                                            }}
                                        >
                                            {pages.map(page => (
                                                <option key={page.id} value={page.id}>{page.title.rendered}</option>
                                            ))}
                                        </select>
                                    </div>
                                )}
                                
                                {includeOption === 'entire_site' && (
                                    <div>
                                        <label>{__("Exclude Pages")}</label>
                                        <select
                                            multiple
                                            value={excludePages}
                                            onChange={(e) => {
                                                const selectedOptions = Array.from(e.target.selectedOptions).map(option => option.value);
                                                editPost({ meta: { ...meta, template_exclude_pages: selectedOptions } });
                                            }}
                                            style={{
                                                width: '100%',
                                                height: '5em',
                                                fontSize: '13px',
                                                padding: '5px'
                                            }}
                                        >
                                            {pages.map(page => (
                                                <option key={page.id} value={page.id}>{page.title.rendered}</option>
                                            ))}
                                        </select>
                                    </div>
                                )}
                            </CardBody>
                        </Card>
                    </Popover>
                )}
            </VStack>
            <SelectControl
                label={__("Type")}
                value={templateType}
                options={[
                    { value: '', label: __('Select One') },
                    { value: 'header', label: __('Header') },
                    { value: 'footer', label: __('Footer') }
                ]}
                onChange={(value) => editPost({ meta: { ...meta, template_type: value } })} // Save the type in post meta
            />
        </PluginDocumentSettingPanel>

        </>
    );
};

registerPlugin("headless-templates-sidepanel", { render: TemplateSidebarPanel });
