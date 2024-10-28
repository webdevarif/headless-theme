/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/blocks/header/index.js":
/*!************************************!*\
  !*** ./src/blocks/header/index.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _icons__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../icons */ "./src/icons.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__);
// Import necessary components and functions using ES6 import syntax


 // Ensure compatibility with recent updates




// Register a new block type

(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)('headless-theme/header', {
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Header'),
  // Set the title of the block
  icon: {
    src: _icons__WEBPACK_IMPORTED_MODULE_5__.blockIcon
  },
  category: 'headless-theme',
  // Assign a category to the block

  attributes: {
    title: {
      type: 'string',
      default: 'Valuable insights to change your startup idea'
    },
    subtitle: {
      // Define the subtitle attribute
      type: 'string',
      default: ''
    }
  },
  edit({
    attributes,
    setAttributes
  }) {
    const {
      title,
      subtitle
    } = attributes; // Destructure title and subtitle from attributes
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, {
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
          title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Heading'),
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
            label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Title'),
            value: title,
            onChange: value => setAttributes({
              title: value
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
            label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Subtitle'),
            value: subtitle,
            onChange: value => setAttributes({
              subtitle: value
            })
          })]
        })
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
        className: "block-editor-content",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("h2", {
          children: title
        }), "  ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("h4", {
          children: subtitle
        }), "  "]
      })]
    });
  },
  save({
    attributes
  }) {
    const {
      title,
      subtitle
    } = attributes; // Destructure title and subtitle from attributes
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
      className: "block-frontend-content",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("h2", {
        children: title
      }), "  ", /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("h4", {
        children: subtitle
      }), "  "]
    });
  }
});

/***/ }),

/***/ "./src/icons.js":
/*!**********************!*\
  !*** ./src/icons.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   blockIcon: () => (/* binding */ blockIcon)
/* harmony export */ });
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__);

const blockIcon = () => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("svg", {
  width: "33",
  height: "34",
  viewBox: "0 0 33 34",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg",
  xmlnsXlink: "http://www.w3.org/1999/xlink",
  children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("path", {
    d: "M23.5833 1.19908C22.5602 1.07645 21.55 0.894385 20.5411 0.780474C19.5336 0.668121 18.5198 0.618324 17.547 0.73628C16.5784 0.854547 15.6502 1.14057 14.9347 1.68491C14.215 2.22147 13.7211 2.98523 13.4095 3.83022C13.0983 4.67894 12.9599 5.60298 12.9088 6.53574C12.8539 7.47005 12.8929 8.41992 12.9813 9.36886C13.0713 10.3144 13.2169 11.2767 13.3878 12.2057C13.5684 13.1288 13.8147 14.0734 14.0594 15.0245C14.5578 16.9274 15.0426 18.8807 15.2947 20.9152C15.4224 21.9323 15.4757 22.9718 15.4224 24.0259C15.3659 25.0785 15.2044 26.151 14.8577 27.1945C14.5136 28.235 13.9876 29.2484 13.2971 30.1322C12.9124 30.6187 12.5027 31.009 12.0423 31.3784C11.5835 31.7413 11.0864 32.0612 10.5344 32.3233C9.98391 32.585 9.37209 32.7852 8.67872 32.8508C7.9964 32.9184 7.17598 32.8082 6.49723 32.3852C5.81394 31.9694 5.3883 31.3398 5.14331 30.7597C4.8993 30.169 4.79955 29.5938 4.74659 29.0401C4.69427 28.4942 5.11407 28.0109 5.68364 27.9611C6.2386 27.9126 6.73117 28.2923 6.80493 28.8164L6.80558 28.8213C6.92288 29.6638 7.26891 30.4068 7.66661 30.5926C7.85961 30.7002 8.11077 30.7416 8.44218 30.7015C8.7697 30.662 9.1414 30.5319 9.50563 30.3554C10.2332 30.0025 10.9392 29.4152 11.4263 28.8033C11.9663 28.1152 12.3682 27.347 12.6466 26.5176C13.2178 24.8591 13.2676 22.9964 13.1022 21.1293C12.9378 19.2532 12.5267 17.3637 12.1316 15.4363C11.9328 14.4702 11.7268 13.4983 11.5783 12.483C11.436 11.4715 11.3583 10.48 11.32 9.46565C11.2872 8.45478 11.306 7.43581 11.4282 6.4128C11.5578 5.3929 11.7863 4.36304 12.2285 3.38173C12.6639 2.40665 13.366 1.47296 14.3349 0.876022C15.296 0.271614 16.4222 0.0226297 17.4895 0.00177732C19.6473 -0.0377489 21.6322 0.590002 23.6044 1.08641C23.6366 1.09388 23.6564 1.12501 23.6486 1.15582C23.6415 1.18383 23.6126 1.20219 23.5833 1.19908Z",
    fill: "#79A134"
  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("path", {
    d: "M23.554 8.56641C20.9163 14.9261 14.3202 11.0024 14.3202 16.2342C14.1113 15.3095 13.6508 13.8632 13.7373 13.0323C14.3315 7.2801 21.7945 9.46898 23.554 8.56641Z",
    fill: "url(#paint0_linear_1328_110)"
  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("path", {
    d: "M26.464 5.89651C19.6271 6.32788 14.4937 0.378101 12.8825 7.2541C12.6921 -1.53876 20.2269 0.219063 21.8115 0.579155C25.7267 1.46803 28.8771 3.38085 32.2198 1.89566C30.8578 4.27781 29.5474 5.70262 26.464 5.89651Z",
    fill: "url(#paint1_linear_1328_110)"
  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("path", {
    d: "M13.7183 25.5767C14.7829 21.3126 13.0061 17.2512 9.74978 16.5053C6.49341 15.7593 2.99057 18.6112 1.92597 22.8753C0.861365 27.1393 2.63815 31.2007 5.89452 31.9467C9.15089 32.6927 12.6537 29.8407 13.7183 25.5767Z",
    fill: "#E68404"
  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("path", {
    d: "M13.3408 16.1016H3.59375V27.6173H13.3408V16.1016Z",
    fill: "url(#pattern0_1328_110)"
  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("path", {
    d: "M12.2537 22.6621C11.5727 25.3906 9.33211 27.2154 7.24907 26.7376C5.16571 26.2611 4.02883 23.6624 4.7105 20.9347C5.39152 18.2068 7.63215 16.3827 9.71486 16.8601C11.7979 17.3366 12.9344 19.9354 12.2537 22.6621Z",
    fill: "#FBB03B"
  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("path", {
    d: "M5.93459 31.9597C5.93459 31.9597 4.50755 30.7639 5.65061 28.125C5.35883 30.913 7.25862 32.2361 9.23574 31.5258C9.18602 31.9301 8.35196 32.7082 7.4175 32.7026C6.81706 32.6982 5.93459 31.9597 5.93459 31.9597Z",
    fill: "url(#paint2_linear_1328_110)"
  }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("defs", {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("pattern", {
      id: "pattern0_1328_110",
      patternContentUnits: "objectBoundingBox",
      width: "1",
      height: "1",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("use", {
        xlinkHref: "#image0_1328_110"
      })
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("linearGradient", {
      id: "paint0_linear_1328_110",
      x1: "6.4009",
      y1: "16.4547",
      x2: "27.0829",
      y2: "16.4332",
      gradientUnits: "userSpaceOnUse",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.0073",
        "stop-color": "#006837"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.0082",
        "stop-color": "#006837"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.0796",
        "stop-color": "#1B7635"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.1604",
        "stop-color": "#318234"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.2559",
        "stop-color": "#428B33"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.3741",
        "stop-color": "#4D9133"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.5398",
        "stop-color": "#549532"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "1",
        "stop-color": "#569632"
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("linearGradient", {
      id: "paint1_linear_1328_110",
      x1: "7.3364",
      y1: "11.074",
      x2: "26.896",
      y2: "12.7455",
      gradientUnits: "userSpaceOnUse",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.0073",
        "stop-color": "#006837"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.0082",
        "stop-color": "#006837"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.0796",
        "stop-color": "#1B7635"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.1604",
        "stop-color": "#318234"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.2559",
        "stop-color": "#428B33"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.3741",
        "stop-color": "#4D9133"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.5398",
        "stop-color": "#549532"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "1",
        "stop-color": "#569632"
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsxs)("linearGradient", {
      id: "paint2_linear_1328_110",
      x1: "5.77041",
      y1: "28.3059",
      x2: "7.63238",
      y2: "32.2908",
      gradientUnits: "userSpaceOnUse",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.0073",
        "stop-color": "#006837"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.2193",
        "stop-color": "#157236"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "0.6541",
        "stop-color": "#4A8B35"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("stop", {
        offset: "1",
        "stop-color": "#79A134"
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_0__.jsx)("image", {
      id: "image0_1328_110",
      xlinkHref: "data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEASABIAAD/7AARRHVja3kAAQAEAAAAHgAA/+4AIUFkb2JlAGTAAAAAAQMA"
    })]
  })]
});

/***/ }),

/***/ "./src/templates/index.js":
/*!********************************!*\
  !*** ./src/templates/index.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__);
//templates.js








const TemplateSidebarPanel = () => {
  const [popoverAnchor, setPopoverAnchor] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)();
  const [isVisible, setIsVisible] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)(false);
  const meta = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useSelect)(select => select('core/editor').getEditedPostAttribute('meta'), []);
  const {
    editPost
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useDispatch)('core/editor');

  // Ensure 'meta' is defined and prevent accessing properties of undefined
  const includeOption = meta && meta.template_display_option || 'none';
  const selectedPages = meta && meta.template_selected_pages || [];
  const excludePages = meta && meta.template_exclude_pages || []; // New field for excluded pages
  const templateType = meta && meta.template_type || ''; // Fetching template type

  const toggleVisible = () => {
    setIsVisible(state => !state);
  };
  const pages = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.useSelect)(select => {
    return select('core').getEntityRecords('postType', 'page') || [];
  }, []);
  const postType = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_5__.select)('core/editor').getCurrentPostType();
  const displayText = includeOption === 'entire_site' ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Entire Site') : includeOption === 'specific_pages' && selectedPages.length > 0 ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Specific Pages') : (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Not Selected');
  if (postType !== 'headless_templates') {
    return null;
  }
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.Fragment, {
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__.PluginDocumentSettingPanel, {
      name: "headless-templates-sidepanel",
      title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Template Settings"),
      className: "headless-templates-sidepanel",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalVStack, {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalHStack, {
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalText, {
            style: {
              width: '30%',
              fontSize: '10px',
              fontWeight: 500
            },
            children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("DISPLAY ON")
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalText, {
            style: {
              width: '70%',
              padding: '6px 0'
            },
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
              variant: "tertiary",
              onClick: toggleVisible,
              children: displayText
            })
          })]
        }), isVisible && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Popover, {
          anchor: popoverAnchor,
          onFocusOutside: () => setIsVisible(false),
          placement: "right-start",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Card, {
            style: {
              width: '16rem'
            },
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.CardBody, {
              style: {
                padding: '1rem'
              },
              children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalHStack, {
                style: {
                  marginBottom: '1rem'
                },
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.__experimentalHeading, {
                  size: "12",
                  children: "Display On"
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
                  icon: "no-alt",
                  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Close'),
                  onClick: () => setIsVisible(false),
                  className: "block-editor-inspector-popover-header__action",
                  style: {
                    boxShadow: 'none'
                  }
                })]
              }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
                label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Include"),
                value: includeOption,
                options: [{
                  value: '',
                  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Select One')
                }, {
                  value: 'entire_site',
                  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Entire Site')
                }, {
                  value: 'specific_pages',
                  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Specific Pages')
                }],
                onChange: value => editPost({
                  meta: {
                    ...meta,
                    template_display_option: value
                  }
                })
              }), includeOption === 'specific_pages' && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("label", {
                  children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Select Pages")
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("select", {
                  multiple: true,
                  value: selectedPages,
                  onChange: e => {
                    const selectedOptions = Array.from(e.target.selectedOptions).map(option => option.value);
                    editPost({
                      meta: {
                        ...meta,
                        template_selected_pages: selectedOptions
                      }
                    });
                  },
                  style: {
                    width: '100%',
                    height: '5em',
                    fontSize: '13px',
                    padding: '5px'
                  },
                  children: pages.map(page => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("option", {
                    value: page.id,
                    children: page.title.rendered
                  }, page.id))
                })]
              }), includeOption === 'entire_site' && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsxs)("div", {
                children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("label", {
                  children: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Exclude Pages")
                }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("select", {
                  multiple: true,
                  value: excludePages,
                  onChange: e => {
                    const selectedOptions = Array.from(e.target.selectedOptions).map(option => option.value);
                    editPost({
                      meta: {
                        ...meta,
                        template_exclude_pages: selectedOptions
                      }
                    });
                  },
                  style: {
                    width: '100%',
                    height: '5em',
                    fontSize: '13px',
                    padding: '5px'
                  },
                  children: pages.map(page => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)("option", {
                    value: page.id,
                    children: page.title.rendered
                  }, page.id))
                })]
              })]
            })
          })
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_6__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
        label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Type"),
        value: templateType,
        options: [{
          value: '',
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Select One')
        }, {
          value: 'header',
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Header')
        }, {
          value: 'footer',
          label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Footer')
        }],
        onChange: value => editPost({
          meta: {
            ...meta,
            template_type: value
          }
        }) // Save the type in post meta
      })]
    })
  });
};
(0,_wordpress_plugins__WEBPACK_IMPORTED_MODULE_0__.registerPlugin)("headless-templates-sidepanel", {
  render: TemplateSidebarPanel
});

/***/ }),

/***/ "react/jsx-runtime":
/*!**********************************!*\
  !*** external "ReactJSXRuntime" ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["ReactJSXRuntime"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/editor":
/*!********************************!*\
  !*** external ["wp","editor"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["editor"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/plugins":
/*!*********************************!*\
  !*** external ["wp","plugins"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["plugins"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _templates__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./templates */ "./src/templates/index.js");
/* harmony import */ var _blocks_header__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/header */ "./src/blocks/header/index.js");


// Blocks

})();

/******/ })()
;
//# sourceMappingURL=index.js.map