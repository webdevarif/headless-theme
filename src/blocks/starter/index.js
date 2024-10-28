// Import necessary components and functions using ES6 import syntax
import { registerBlockType } from '@wordpress/blocks';
import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor'; // Ensure compatibility with recent updates
import { PanelBody, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { blockIcon } from '../../icons';

// Register a new block type
registerBlockType('headless-theme/header', {
    title: __('Header'), // Set the title of the block
    icon: {
        src: blockIcon
    },
    category: 'headless-theme', // Assign a category to the block

    attributes: {
        title: {
            type: 'string',
            default: 'Valuable insights to change your startup idea',
        },
        subtitle: { // Define the subtitle attribute
            type: 'string',
            default: '',
        },
    },

    edit({ attributes, setAttributes }) {
        const { title, subtitle } = attributes; // Destructure title and subtitle from attributes
        return (
            <Fragment>
                <InspectorControls>
                    <PanelBody title={__('Heading')}>
                        <TextControl
                            label={__('Title')}
                            value={title}
                            onChange={(value) => setAttributes({ title: value })}
                        />
                        <TextControl
                            label={__('Subtitle')}
                            value={subtitle}
                            onChange={(value) => setAttributes({ subtitle: value })}
                        />
                    </PanelBody>
                </InspectorControls>

                <div className="block-editor-content">
                    <h2>{title}</h2>  {/* Displaying title */}
                    <h4>{subtitle}</h4>  {/* Displaying subtitle */}
                </div>
            </Fragment>
        );
    },

    save({ attributes }) {
        const { title, subtitle } = attributes; // Destructure title and subtitle from attributes
        return (
            <div className="block-frontend-content">
                <h2>{title}</h2>  {/* Saving title */}
                <h4>{subtitle}</h4>  {/* Saving subtitle */}
            </div>
        );
    },
});
