// Import necessary components and functions using ES6 import syntax
import { registerBlockType } from '@wordpress/blocks';
import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/block-editor'; // Ensure compatibility with recent updates
import { PanelBody, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { BsEnvelope } from "react-icons/bs";
import { BsArrowUp } from "react-icons/bs";
import { FaWhatsapp } from "react-icons/fa";
import { blockIcon } from '../../icons';

// Register a new block type
registerBlockType('headless-theme/footer', {
    title: __('Footer'), // Set the title of the block
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
            <footer className="footer">
                <div className="footer__container">
                    <div className="footer__about">
                        <h3>Let’s work together</h3>
                        <ul className="footer__short-link">
                            <li>
                                <a href="#">
                                    <BsEnvelope />
                                    <span>Email Me</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <FaWhatsapp />
                                    <span>Email Me</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div className="footer__menu">
                        <h4 className="footer__heading">What I Do?</h4>
                        <ul className="footer__list">
                            <li>
                                <a href="#">Web Developement</a>
                            </li>
                            <li>
                                <a href="#">Mobile App Design</a>
                            </li>
                            <li>
                                <a href="#">Brand Identity</a>
                            </li>
                            <li>
                                <a href="#">Graphics Design</a>
                            </li>
                            <li>
                                <a href="#">Software Migration</a>
                            </li>
                        </ul>
                    </div>
                    <div className="footer__contact">
                        <h5>2 Shelley Street, Sydney, NSW 2000, Australia</h5>

                        <div className="footer__social">
                            <h4 className="footer__heading">Connect with me</h4>
                            <ul className="social__list">
                                <li>
                                    <a href="#">FB.</a>
                                </li>
                                <li>
                                    <a href="#">IN.</a>
                                </li>
                                <li>
                                    <a href="#">Tw.</a>
                                </li>
                                <li>
                                    <a href="#">Be.</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div className="footer__container">
                    <hr className='footer__line'/>
                    <div className="footer__copyright">
                        <p className="footer__copyright-text">Copyright © 2024 Xorim. All Rights Reserved</p>
                        <a href="#" className="footer__scroll-top">
                            <span>Back to Top</span>
                            <BsArrowUp />
                        </a>
                    </div>
                </div>
            </footer>
        );
    },
});
