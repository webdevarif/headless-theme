//templates.js
import Select from 'react-select';

import { registerPlugin } from "@wordpress/plugins";
import { PluginDocumentSettingPanel } from '@wordpress/editor';
import { __ } from "@wordpress/i18n";
import { useState, useEffect } from "@wordpress/element";
import { select, useSelect, useDispatch } from '@wordpress/data';

const TemplateSidebarPanel = () => {
    const [popoverAnchor, setPopoverAnchor] = useState();
    const [isVisible, setIsVisible] = useState(false);

    const meta = useSelect((select) => select('core/editor').getEditedPostAttribute('meta'), []);
    const { editPost } = useDispatch('core/editor');

    // Ensure 'meta' is defined and prevent accessing properties of undefined
    const includeOption = (meta && meta.template_display_option) || {};
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

    // Use object properties directly for condition checks
    const displayText = includeOption.value === 'entire_site' ? __('Entire Site') : includeOption.value === 'specific_pages' && selectedPages.length > 0 ? __('Specific Pages') : __('Not Selected');

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
            <div className='ht-form'>
                <label className="ht-form__label">{__("Template Type")}</label>
                <Select 
                    value={{ value: templateType, label: templateType ? templateType.charAt(0).toUpperCase() + templateType.slice(1) : __('Select One') }}
                    onChange={(selectedOption) => editPost({ meta: { ...meta, template_type: selectedOption.value } })}
                    options={[
                        { value: '', label: __('Select One') },
                        { value: 'header', label: __('Header') },
                        { value: 'footer', label: __('Footer') }
                    ]}
                />
            </div>
                                
            <div className="ht-form">
                <label className="ht-form__label">{__("DISPLAY ON")}</label>
                <Select id="form-label-include" 
                    value={includeOption}
                    onChange={(value) => editPost({ meta: { ...meta, template_display_option: value } })}
                    options={[
                        { value: '', label: __('Select One') },
                        { value: 'entire_site', label: __('Entire Site') },
                        { value: 'specific_pages', label: __('Specific Pages') }
                    ]}/>
            </div>

            {includeOption.value === 'specific_pages' && (
                <div className="ht-form">
                    <label className="ht-form__label">{__("Select Pages")}</label>
                    <Select
                        isMulti
                        value={selectedPages}
                        onChange={(value) => {
                            editPost({ meta: { ...meta, template_selected_pages: value } })
                        }}
                        options={pages.map(page => ({
                            value: page.id,
                            label: page.title.rendered
                        }))}
                    />
                </div>
            )}
            
            {includeOption.value === 'entire_site' && (
                <div className='ht-form'>
                    <label class="ht-form__label">{__("Exclude Pages")}</label>
                    <Select
                        isMulti
                        value={excludePages}
                        onChange={(value) => {
                            editPost({ meta: { ...meta, template_exclude_pages: value } });
                        }}
                        options={pages.map(page => ({
                            value: page.id,
                            label: page.title.rendered
                        }))}
                    />
                </div>
            )}
        </PluginDocumentSettingPanel>

        </>
    );
};

registerPlugin("headless-templates-sidepanel", { render: TemplateSidebarPanel });
