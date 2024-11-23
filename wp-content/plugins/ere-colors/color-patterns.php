<?php
/**
 * @return string
 */
function ere_colors_accent_generate_css()
{
	$accent_color = ere_colors_get_option('accent_color','');
    if($accent_color=='') return '';
	return <<<accent_color
	      .paging-navigation .page-numbers.current, .paging-navigation .page-numbers:hover, .paging-navigation .page-numbers:focus,
          .ere-search-properties .ui-autocomplete li.ui-state-focus,
          .ere-search-properties .ui-autocomplete li:hover,
          .ere-search-properties .sidebar-filter .ui-slider-range.ui-widget-header.ui-corner-all,
          .ere-search-properties .other-featured .enable-featured a,
          .ere-search-properties.style-default .ere-search-content .search-title i,
          .ere-search-properties.style-absolute .form-search-wrap .search-title,
          .ere-search-properties.style-vertical .search-title i,
          .ere-search-properties.style-absolute .form-search-wrap button:hover,
          .ere-property-wrap .archive-property-action .property-status ul li.active a,
          .ere-property-wrap .archive-property-action .property-status ul li a:hover,
          .ere-property-wrap .archive-property-action .property-status ul li a:focus,
          .ere-property-wrap .single-property-area .agent-content .view-my-properties,
          .ere-property-wrap .archive-property-action .view-as span.active,
          .ere-property-wrap .archive-property-action .view-as span:hover,
          .ere-property-wrap .single-property-area .single-property-image-main .owl-next,
          .ere-property-wrap .single-property-area .agent-content .agent-social a:hover,
          .ere-property-wrap .single-property-area .property-tab .nav-tabs li.active a,
          .ere-property-wrap .single-property-area .property-tab .nav-tabs li:hover a,
          .ere-property-wrap .ere-property-wrap .ere-property .property-price .price-per-unit,
          .ere-property-wrap .ere-property-wrap .ere-property .social-share,
          .ere-property-wrap .ere-property-wrap .ere-property .block-center-inner > a,.ere-property .property-view-gallery-wrap,
          .ere-property-wrap .ere-property-wrap .ere-property.property-grid .property-info,
          .ere-property-wrap .ere-property-wrap .ere-property.property-list .property-info,
          .ere-property-wrap .ere-property-wrap .ere-property.property-carousel .owl-item:nth-child(2n-1) .property-info,
          .ere-property-wrap .ere-property-wrap .ere-property .property-labels p .property-label-bg,
          .ere-property-wrap .ere-property-gallery .filter-wrap .property-filter-content .active-filter,
          .ere-property-wrap .ere-property-gallery .filter-wrap .property-filter-content a:hover,
          div.ere-property-featured.property-cities-filter .filter-wrap a:hover,
          div.ere-property-featured.property-cities-filter .filter-wrap a.active-filter,
          div.ere-property-featured.property-single-carousel .property-status span,
          div.ere-property-featured.property-sync-carousel .property-status span,
          div.ere-property-featured.property-single-carousel .owl-dots .owl-dot:hover span,
          div.ere-property-featured.property-single-carousel .owl-dots .owl-dot.active span,
          div.ere-property-featured.property-sync-carousel .property-image-carousel .owl-next,
          div.property-info-action .property-main-info .property-status span,
          div.property-info-action .property-action .social-share:hover,
          div.property-info-action .property-action .property-action-inner > a:hover ,
          div.property-info-action .property-action .social-share-hover .social-share-list,
          .ere-heading span:before,
          .ere-heading span:after,
          .ere-heading:after,
          .ere-heading-style2 h2:after,
          div.ere-property-carousel.color-light .navigation-wrap .owl-nav div:hover,
          #wp-property_des-wrap .insert-media:hover,
          .single-invoice-action a:hover,
          div.ere-property-slider .property-inner .property-main-info .property-status span,
          div.ere-property-slider .owl-nav .owl-prev,
          .ere-agent.agent-grid .agent-social,
          .ere-agent.agent-slider .agent-social,
          div.agency-details-tab .nav-tabs li.active a,
          div.agency-details-tab .nav-tabs li:hover a,
          .btn-action:hover,
          .ere-package-item.active > .panel-heading,
          .ere-property .property-labels p .property-label-bg,
          .ere-property .property-price .price-per-unit,
          .ere-property .block-center-inner > a,
          .ere-property .social-share,
          .ere-property.property-carousel .owl-item:nth-child(2n-1) .property-info,
          .ere-property.property-grid .property-info,
          .ere-property.property-list .property-info,
          .ere-widget-search-form .sidebar-filter .ui-slider-range.ui-widget-header.ui-corner-all,
          .ere-search-properties option:not(first-child):hover,
          div.ere-agent-wrap .ere-agent.agent-grid .agent-social,
          div.ere-agent-wrap .ere-agent.agent-slider .agent-social,
          div.ere-agent-wrap .ere-agent.owl-nav-top-right .owl-nav div:hover,
          div.ere-agent-single-wrap .agent-single .agent-single-inner .agent-social a:hover,
          div.agency-single-info .agency-social a:hover,
          .ere-widget-search-form .sidebar-filter .ui-slider-handle.ui-state-default.ui-corner-all,
          .ere-search-properties .sidebar-filter .ui-slider-handle.ui-state-default.ui-corner-all,
          .ere-property-featured.property-single-carousel .owl-dots .owl-dot.active span,
          .ere-property-featured.property-single-carousel .owl-dots .owl-dot:hover span,
          .ere-search-properties .ere-search-status-tab button.active,
          div.ere-archive-agent-wrap .archive-agent-action .view-as span.active,
          .archive-agent-action .view-as span:hover,
          .ere-property .owl-nav-bottom-center .owl-next, .ere-property .owl-nav-top-right .owl-next,
          .owl-nav-bottom-center.owl-carousel .owl-next, .owl-nav-top-right.owl-carousel .owl-next,
          .owl-nav .owl-prev:hover, .owl-nav .owl-next:hover,
          .ere-widget-search-form .sidebar-filter .ui-slider-handle.ui-state-default.ui-corner-all,
          .ere-widget-search-form .sidebar-filter .ui-slider-range.ui-widget-header.ui-corner-all,
          .ere-property-advanced-search .ere-search-status-tab button.active,
          .ere-search-properties .ere-search-status-tab button.active,
          .ere-property-advanced-search option:not(first-child):hover,
          .ere-search-properties option:not(first-child):hover,
          .ere-property-advanced-search .sidebar-filter .ui-slider-handle.ui-state-default.ui-corner-all,
          .ere-search-properties .sidebar-filter .ui-slider-handle.ui-state-default.ui-corner-all,
          .ere-property-advanced-search .sidebar-filter .ui-slider-range.ui-widget-header.ui-corner-all,
          .ere-search-properties .sidebar-filter .ui-slider-range.ui-widget-header.ui-corner-all,
          .ere-property-advanced-search .ui-autocomplete li.ui-state-focus,
          .ere-search-properties .ui-autocomplete li.ui-state-focus,
          .ere-property-advanced-search .ui-autocomplete li:hover,
          .ere-search-properties .ui-autocomplete li:hover,
          .ere-property-advanced-search .btn-other-features i,
          .ere-search-properties .btn-other-features i,
          .single-property-area .single-property-image-main .owl-next,
          .single-property-area .property-tab .nav-tabs li.active a, .single-property-area .property-tab .nav-tabs li:hover a,
          .single-property-area .agent-content .agent-social a:hover,
          .owl-dots .owl-dot.active span,
          .ere-property .property-label p .property-label-bg,
          .compare-thumb-main .compare-property-remove,button.ere-btn-arrow.active,button.ere-btn-arrow:hover,
          .ere-my-properties span.ere-property-featured,
          .overall-rating .reviews-box li .item-list span
          {
            background-color: $accent_color !important;
          }
          #ere-map-loading i,
          div.ere-property-slider .owl-nav .owl-next i,
          div.ere-property-type .property-type-info .property-title a:hover,
          ul.walkscore-list li span.walkscore-score,
          div.ere-property-slider .property-inner .property-main-info .property-heading a:hover,
          .user-dropdown:hover .user-display-name,
          #map-property-single .item-body a:hover,
          #ere_additional_details tr td:first-of-type span:hover,
          #ere_additional_details tr td:last-of-type span:hover,
          #ere_floors tr td:first-of-type span:hover,
          #ere_floors tr td:last-of-type span:hover,
          .ere-property-wrap .single-property-area .agent-content .agent-heading a:hover,
          .ere-property-wrap .single-property-area .contact-agent .form-error,
          .ere-property-wrap .single-property-area .contact-agent .form-messages,
          .ere-property-wrap .single-property-area .ere-view-video:hover,
          .ere-property-wrap .ere-property-wrap .ere-property .social-share:hover,
          .ere-property-wrap .ere-property-wrap .ere-property .block-center-inner > a:hover,
          .ere-property-wrap .ere-property-wrap .ere-property .social-share-hover .social-share-list a,
          .ere-property-wrap .ere-property-wrap .ere-property .property-item-content .property-title a:hover,
          .ere-property-wrap .ere-property-wrap .ere-property.property-list.property-list-two-columns .property-link-detail i,
          .ere-property-wrap .ere-property-wrap .ere-property.property-list.property-list-two-columns .property-link-detail a:hover,
          .ere-property-wrap .ere-property-wrap .ere-property.property-zigzac .property-item-content .property-info-inner span:not(.property-info-value),
          div.ere-property-featured.property-cities-filter .property-heading a:hover,
          div.ere-property-featured.property-single-carousel .property-heading a:hover,
          div.ere-property-featured.property-sync-carousel .property-heading a:hover,
          div.property-info-action .property-main-info .property-heading a:hover,
          div.ere-agent-wrap .ere-agent h4 a:hover,
          div.ere-agent-wrap .ere-agent.agent-list .agent-social a:hover i ,
          .ere-agent h4 a:hover,
          div.ere-agent-single .contact-agent .form-error,
          div.ere-agency .agency-title a:hover,
          div.ere-agency .agency-social a:hover,
          .ere-login-wrap .checkbox:hover,
          .ere-login-wrap .ere-reset-password:hover,
          .ere-register-wrap .ere-reset-password:hover,
          .ere-reset-password-wrap .ere-reset-password:hover,
          .ere-property.property-list.property-list-two-columns .property-link-detail a:hover,
          .ere-property.property-zigzac .property-item-content .property-info-inner span:not(.property-info-value) ,
          .ere-property .property-item-content .property-title a:hover,
          .ere-property.property-list.property-list-two-columns .property-link-detail i,
          .ere-property .social-share:hover,
          .ere-property .block-center-inner > a:hover,
          .ere-property .social-share-hover .social-share-list a,
          .ere-property .property-view-gallery-wrap:hover a,
          .ere-search-properties #ere-map-loading i,
          .ere-search-properties .other-featured .enable-featured a:hover ,
          .ere-search-properties .item-body .address-marker i,
          .ere-search-properties .item-body a:hover,
          .hd-title-spec span:first-letter,
          .ere-property-wrap .ere-property-gallery .property-title a:hover,
          .ere_widget_listing_property_taxonomy .ere-widget-listing-property-taxonomy ul li a:hover,
          .ere-widget-listing-property-taxonomy ul li a:hover,
          .ere-google-map-directions #get-direction:hover,
          .compare-tables.table-striped .property-location i,
          .rating-container .empty-stars,.review-date:before,.login-for-review,.waiting-for-approval,
          .accent-color
          {
            color: $accent_color !important;
          }
          .ere-search-properties .other-featured .enable-featured a {
            border: 2px solid $accent_color !important;
          }
          div.ere-archive-agent-wrap .archive-agent-action .view-as span.active:before,
          .archive-agent-action .view-as span:hover:before,
          .ere-property-wrap .archive-property-action .view-as span.active:before,
          .ere-property-wrap .archive-property-action .view-as span:hover:before {
            border-top-color: $accent_color !important;
            border-bottom-color: $accent_color !important;
          }
          .ere-property-wrap .ere-property-wrap .ere-property .property-labels p .property-label-bg span,
          div.ere-property-slider .property-inner .property-main-info .property-status span:before,
          .ere-property .property-labels p .property-label-bg .property-arrow,
          div.ere-property-featured.property-single-carousel .property-status span:before,
          div.ere-property-featured.property-sync-carousel .property-status span:before ,
          div.property-info-action .property-main-info .property-status span:before,
          .ere-property .property-label p .property-label-bg .property-arrow
          {
            border-right-color: $accent_color !important;
            border-left-color: $accent_color !important;
          }
          div.ere-property-carousel.color-light .navigation-wrap .owl-nav div:hover.owl-prev:after,
          .owl-nav .owl-prev:hover:after,
          div.ere-property-slider .owl-nav .owl-prev:after {
            border-top-color: $accent_color !important;
          }
          .ere-package-item.active {
            border-color: $accent_color !important;
          }
          ul.walkscore-list li span.walkscore-score {
            border: 1px solid $accent_color !important;
          }
          ul.walkscore-list li span.walkscore-score:before {
            border-bottom: 1px solid $accent_color !important;
            border-left: 1px solid $accent_color !important;
          }
          .ere-property-multi-step .ere-step-nav,
          div.ere-agent-wrap .ere-agent.owl-nav-top-right .owl-nav .owl-prev:hover:after,.advanced-saved-searches {
            border-top-color: $accent_color !important;
          }
          .btn-action:hover,
          .ere-search-properties.style-absolute .form-search-wrap button:hover,
          div.agency-single-info .agent-contact-btn:hover,
          .form-control:focus,
          .ere-property-wrap .single-property-area .agent-content .view-my-properties,
          .login-transparent .ere-login-wrap button:hover,
          .login-transparent .ere-register-wrap button:hover,
          .login-transparent .ere-reset-password-wrap button:hover,
          .login-transparent .ere-login-wrap button:focus,
          .login-transparent .ere-register-wrap button:focus,
          .login-transparent .ere-reset-password-wrap button:focus,
          .login-transparent .ere-login-wrap button:active,
          .login-transparent .ere-register-wrap button:active,
          .login-transparent .ere-reset-password-wrap button:active,
          .login-transparent .ere-login-wrap button:active:focus,
          .login-transparent .ere-register-wrap button:active:focus,
          .login-transparent .ere-reset-password-wrap button:active:focus {
            border-color: $accent_color !important;
          }
          .login-transparent .ere-login-wrap button:hover.btn-primary,
          .login-transparent .ere-register-wrap button:hover.btn-primary,
          .login-transparent .ere-reset-password-wrap button:hover.btn-primary,
          .login-transparent .ere-login-wrap button:focus.btn-primary,
          .login-transparent .ere-register-wrap button:focus.btn-primary,
          .login-transparent .ere-reset-password-wrap button:focus.btn-primary,
          .login-transparent .ere-login-wrap button:active.btn-primary,
          .login-transparent .ere-register-wrap button:active.btn-primary,
          .login-transparent .ere-reset-password-wrap button:active.btn-primary,
          .login-transparent .ere-login-wrap button:active:focus.btn-primary,
          .login-transparent .ere-register-wrap button:active:focus.btn-primary,
          .login-transparent .ere-reset-password-wrap button:active:focus.btn-primary ,
          .ere-login-wrap .btn-primary,
          .ere-register-wrap .btn-primary,
          .ere-reset-password-wrap .btn-primary
          {
            border-color: $accent_color !important;
            color: #fff !important;
            background: $accent_color !important;
          }
          .ere-login-wrap .btn-primary:hover,
          .ere-register-wrap .btn-primary:hover,
          .ere-reset-password-wrap .btn-primary:hover,
          .ere-login-wrap .btn-primary:focus,
          .ere-register-wrap .btn-primary:focus,
          .ere-reset-password-wrap .btn-primary:focus,
          .ere-login-wrap .btn-primary:active,
          .ere-register-wrap .btn-primary:active,
          .ere-reset-password-wrap .btn-primary:active,
          .ere-login-wrap .btn-primary:active:focus,
          .ere-register-wrap .btn-primary:active:focus,
          .ere-reset-password-wrap .btn-primary:active:focus {
            color: $accent_color !important;
            border-color: $accent_color !important;
            background-color: #ffffff;
          }
          .ere-heading .owl-nav-bottom-center .owl-next:after, .ere-heading .owl-nav-top-right .owl-next:after,
          .owl-carousel .owl-nav .owl-next:hover:after,
          div.ere-property-featured.property-sync-carousel .property-image-carousel .owl-next:after,
          div.ere-property-carousel.color-light .navigation-wrap .owl-nav div:hover.owl-next:after,
          .owl-nav-bottom-center.owl-carousel .owl-next:after, .owl-nav-top-right.owl-carousel .owl-next:after,
          div.ere-agent-wrap .ere-agent.owl-carousel.owl-nav-top-right .owl-nav .owl-next:hover:after,
          div.ere-agent-wrap .ere-agent.owl-carousel.owl-nav-top-right .owl-nav .owl-next:hover:after,
          .ere-property-wrap .single-property-area .single-property-image-main .owl-next:after,
          .ere-login-wrap .form-group input:not([type="checkbox"]):hover,
          .ere-register-wrap .form-group input:not([type="checkbox"]):hover,
          .ere-reset-password-wrap .form-group input:not([type="checkbox"]):hover,
          .ere-login-wrap .form-group select.form-control:hover,
          .ere-register-wrap .form-group select.form-control:hover,
          .ere-reset-password-wrap .form-group select.form-control:hover,
          .ere-login-wrap .form-group input:not([type="checkbox"]):focus,
          .ere-register-wrap .form-group input:not([type="checkbox"]):focus,
          .ere-reset-password-wrap .form-group input:not([type="checkbox"]):focus,
          .ere-login-wrap .form-group select.form-control:focus,
          .ere-register-wrap .form-group select.form-control:focus,
          .ere-reset-password-wrap .form-group select.form-control:focus,
          .ere-login-wrap .form-group input:not([type="checkbox"]):active,
          .ere-register-wrap .form-group input:not([type="checkbox"]):active,
          .ere-reset-password-wrap .form-group input:not([type="checkbox"]):active,
          .ere-login-wrap .form-group select.form-control:active,
          .ere-register-wrap .form-group select.form-control:active,
          .ere-reset-password-wrap .form-group select.form-control:active,
          .single-property-area .single-property-image-main .owl-next:after
          {
            border-bottom-color: $accent_color !important;
          }
          .ere-property .social-share:hover,.ere-property .property-view-gallery-wrap:hover,
          .ere-property .block-center-inner > a:hover {
            background-color: #fff !important;
            color: $accent_color !important;
          }
          .ere-property-wrap .single-property-area .agent-content .view-my-properties:hover {
            background-color: transparent;
          }
          .login-transparent .ere-login-wrap button,
          .login-transparent .ere-register-wrap button,
          .login-transparent .ere-reset-password-wrap button,
          .ere-property-wrap .single-property-area .agent-content .view-single-agent:hover {
            background-color: transparent;
            color: #FFF !important;
          }
          .single-property-area .agent-content .view-my-properties:hover,
          .ere-search-status-tab button.active,
          div.ere-property-featured.property-cities-filter .filter-wrap a:hover,
          div.ere-property-featured.property-cities-filter .filter-wrap a.active-filter {
            color: #FFF !important;
          }
          button.ere-btn-arrow.active:after,button.ere-btn-arrow:hover:after,
          .ere-dashboard-nav li.active a
          {
            border-left-color: $accent_color !important;
          }
          .rating-container .filled-stars {
            color: $accent_color !important;
            -webkit-text-stroke: 1px $accent_color !important;
            text-shadow: 1px 1px $accent_color !important;
          }
accent_color;
}

/**
 * @return string
 */
function ere_colors_contrast_generate_css()
{
	$contrast_color = ere_colors_get_option('contrast_color','');
    if($contrast_color=='') return '';
	return <<<contrast_color
			.ere-property-wrap .archive-property-action .sort-property ul li.active a,
            .ere-property-wrap .archive-property-action .sort-property ul li:hover a,
            .ere-property-wrap .single-property-area .property-tab .tab-content table th,
            .ere-property-wrap .single-property-area .agent-content .agent-heading h4,
            .ere-property-wrap .single-property-area .agent-content .agent-heading a,
            .ere-property-wrap .single-property-area .agent-content .view-single-agent:hover,
            .ere-property-wrap .ere-property-wrap .ere-property .social-share-hover .social-share-list a:hover,
            .ere-property-wrap .ere-property-wrap .ere-property .property-item-content .property-title a,
            .ere-property-wrap .ere-property-wrap .ere-property .property-item-content .property-price,
            .ere-property-wrap .ere-property-wrap .ere-property.property-list.property-list-two-columns .property-link-detail a,
            .ere-property-wrap .ere-property-wrap .ere-property.property-zigzac .property-item-content .property-info-inner .property-info-value,
            .ere-property-wrap .ere-property-gallery.color-dark .property-title a,
            div.ere-property-featured.property-cities-filter .filter-wrap a,
            div.ere-property-featured.property-cities-filter .property-heading,
            div.ere-property-featured.property-cities-filter .property-heading a
            div.ere-property-featured.property-single-carousel .property-heading a,
            div.ere-property-featured.property-sync-carousel .property-heading a ,
            div.ere-property-featured.property-single-carousel .property-price,
            div.ere-property-featured.property-sync-carousel .property-price,
            div.property-info-action .property-action .social-share-hover .social-share-list a:hover,
            #map-property-single .item-body .title-marker,
            #map-property-single .item-body .price-marker,
            .ere_widget_listing_property_taxonomy .ere-widget-listing-property-taxonomy.scheme-light ul li a,
            .ere-widget-listing-property-taxonomy.scheme-light ul li a,
            div.ere-agent-wrap .ere-agent.agent-grid .agent-social a:hover i,
            div.ere-agent-wrap .ere-agent.agent-slider .agent-social a:hover i,
            div.ere-agent-wrap .ere-agent.agent-list .agent-social a i,
            div.ere-agent-wrap .ere-agent.agent-list h4 a,
            div.ere-agency .agency-title a,
            div.ere-agency .agency-social a,
            {
              color: $contrast_color !important;
            }
            .ere-agent.agent-grid .agent-info, .ere-agent.agent-slider .agent-info,
            .paging-navigation .page-numbers,
            .ere-property-wrap .archive-property-action .property-status ul li a ,
            .ere-property-wrap .archive-property-action .view-as span,
            .ere-property-wrap .single-property-area .property-tab .nav-tabs,
            .ere-property-wrap .single-property-area .agent-content .agent-social a,
            .ere-property-wrap .single-property-area .agent-content .view-single-agent,
            .ere-property-wrap .ere-property-wrap .ere-property.property-grid .property-inner:hover .property-info,
            .ere-property-wrap .ere-property-wrap .ere-property.property-list .property-inner:hover .property-info,
            .ere-property-wrap .ere-property-wrap .ere-property.property-carousel .owl-item:nth-child(2n) .property-inner .property-info,
            div.property-info-action .property-action .social-share,
            div.property-info-action .property-action .property-action-inner > a,
            #wp-property_des-wrap .insert-media,
            .single-invoice-action a,
            div.agency-single-info .agent-contact-btn,
            div.ere-archive-agent-wrap .archive-agent-action .view-as span.active .above-archive-agent .archive-agent-action .search-box button:hover,
            .archive-agent-action .view-as span:hover .above-archive-agent .archive-agent-action .search-box button:hover,
            div.agency-details-tab .nav-tabs,
            div.ere-agent-single-wrap .agent-single .agent-single-inner .agent-social a,
            div.agency-single-info .agency-social a
            {
              background-color: $contrast_color !important;
            }
            .ere-property-wrap .archive-property-action .view-as .view-as-grid:before {
              border-bottom-color: $contrast_color !important;
              border-top-color: $contrast_color !important;
            }
            div.agency-single-info .agent-contact-btn,
            .ere-property-wrap .single-property-area .agent-content .view-single-agent {
              border-color: $contrast_color !important;
            }
            div.ere-archive-agent-wrap .archive-agent-action .view-as span.active .above-archive-agent .archive-agent-action .search-box button:hover,
            .archive-agent-action .view-as span:hover .above-archive-agent .archive-agent-action .search-box button:hover {
              border-color: $contrast_color !important;
            }
            div.ere-agent-wrap .ere-agent.agent-list .agent-item {
              border-bottom-color: $contrast_color !important;
            }
contrast_color;
}

/**
 * @return string
 */
function ere_colors_text_generate_css()
{
	$text_color =ere_colors_get_option('text_color','');
    if($text_color=='') return '';
	return <<<text_color
			.ere-search-properties .ere-search-status-tab button,
            .ere-mini-search-properties input::-webkit-input-placeholder ,
            .ere-mini-search-properties input:-moz-placeholder,
            .ere-mini-search-properties input::-moz-placeholder,
            .ere-mini-search-properties input:-ms-input-placeholder,
            .ere-mini-search-properties select,
            .ere-mini-search-properties input {
              color: $text_color !important;
            }
text_color;
}

function ere_colors_rtl_generate_css()
{
    $accent_color = ere_colors_get_option('accent_color','');
    if($accent_color=='') return '';
    if(!is_rtl() && !isset($_GET['RTL'])) return '';
    return <<<rtl_color
            .g5plus-property-info .property-info-after-price .property-arrow {
              border-left-color: $accent_color !important;
            }
            .autocompleteMouseOver {
              background-color: $accent_color !important;
            }
            .ere-dashboard-nav li.active a,
            button.ere-btn-arrow.active:after,
            button.ere-btn-arrow:hover:after {
              border-right-color: $accent_color !important;
            }
rtl_color;
}
/**
 * @param $key
 * @param string $default
 * @return string
 */
function ere_colors_get_option($key, $default = '')
{
	if (!function_exists('ere_get_option')) {
		return $default;
	}
	else
	{
		return ere_get_option($key, $default);
	}
}