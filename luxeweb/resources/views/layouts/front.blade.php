
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Facets - Antiques & Collectibles</title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

		{{-- Includable CSS --}}
        	@yield('styles')
		@php
			$colors=isset($home['colors']) ? $home['colors']['meta_value'] : [];
			$text=isset($home['text']) ? $home['text']['meta_value'] : [];
			$mobile=isset($home['mobile']) ? $home['mobile']['meta_value'] : [];
			$logos=isset($home['logos']) ? $home['logos']['meta_value'] : [];
			$social=isset($home['social']) ? $home['social']['meta_value'] : [];
			$background_image=isset($home['background_image']) ? $home['background_image']['meta_value'] : [];
			$website=isset($home['website']) ? $home['website']['meta_value'] : [];
			$copyright=isset($home['copyright']) ? $home['copyright']['meta_value'] : [];
			$bottom_navigation=isset($home['bottom_navigation']) ? $home['bottom_navigation']['meta_value'] : [];
			$background_image_comingsoon=isset($home['background_image_comingsoon']) ? $home['background_image_comingsoon']['meta_value'] : [];
			$comingsoon_font_color=isset($home['comingsoon_font_color']) ? $home['comingsoon_font_color']['meta_value'] : [];
			$comingsoon_background=isset($home['comingsoon_background']) ? $home['comingsoon_background']['meta_value'] : [];
			$menu_styles=isset($home['menu']) ? $home['menu']['meta_value'] : [];
			$home=isset($home['home']) ? $home['home'] : 1;
		@endphp
        <style>
			@font-face
			{
				font-family: 'Peignot';
				src: url("{{ asset('assets/css/fonts').'/'.'Peignot.ttf' }}") format('truetype');
			}
            .aside-fixed .wrapper {
                padding-left: 0px;
            }
            .header-fixed.subheader-fixed.subheader-enabled .wrapper {
                padding-top: 0px;
            }
            .aside-enabled .header.header-fixed {
                left: 0px;
            }
            body {
                background: {{ isset($colors['background']) ? 'white' : 'white' }};
				font-family: Verdana, Peignot, Poppins, Helvetica, "sans-serif";
            }
            #kt_header {
                border: 2px solid {{ isset($colors['topbar_border']) ? $colors['topbar_border'] : '#969494' }};
                border-radius: 50px;
                background: {{ isset($colors['topbar']) ? $colors['topbar'] : '#aaaaaa' }};
            }
            #kt_subheader {
                border: 2px solid {{ isset($colors['navigationbar_border']) ? $colors['navigationbar_border'] : '#2f88e4' }};
                border-radius: 0px 0px 50px 50px;
                background: {{ isset($colors['navigationbar']) ? $colors['navigationbar'] : '#3699FF' }};
            }
            #kt_left {
				padding-top: 190px !important;
                background: {{ isset($colors['sidebar']) ? $colors['sidebar'] : '#cccccc' }};
                margin-top: -173px;
                z-index: 100;
                border: 2px solid {{ isset($colors['sidebar_border']) ? $colors['sidebar_border'] : '#b5b3b3' }};
                border-radius: 100px;
				/*max-height: 1340px;*/
            }
			#kt_quick_cart {
				background: {{ isset($colors['sidebar']) ? $colors['sidebar'] : '#cccccc' }};
			}
            #main_content {
                /*background: green;*/
                width: 100%;
            }
            #kt_footer {
                /* background: #676464; */
				font-family: {{ isset($copyright['font']) ? $copyright['font'] : 'Verdana' }};
				color: {{ isset($copyright['font_color']) ? $copyright['font_color'] : '#ffffff' }};
				background: {{ isset($copyright['background']) ? $copyright['background'] : '#232F3E' }};
            }
			.social-section {
                background: #676464;
            }
			.nav {
				display: flex;
				-ms-flex-wrap: wrap;
				flex-wrap: wrap;
				padding-left: 0;
				margin-bottom: 0;
				list-style: none;
				width: 100%;
				justify-content: space-evenly;
			}
            .nav-link, .nav .nav-link {
                padding: 0;
				text-align: center;
				color: {{ isset($colors['navigationlink']) ? $colors['navigationlink'] : '#181C32' }};
				text-transform: uppercase;
				font-family: {{ isset($text['navigation_font_family']) ? $text['navigation_font_family'] : 'Peignot' }}, Helvetica, "sans-serif";
			}
			#nav_mobile_menu.nav.nav-item.nav-link {
				color: gray;
			}
			::-webkit-scrollbar {
				width: 5px;
			}
			::-webkit-scrollbar-track {
				box-shadow: inset 0 0 5px grey;
				border-radius: 10px;
			}
			::-webkit-scrollbar-thumb {
				background: #E4E6EF;
				border-radius: 10px;
			}
			::-webkit-scrollbar-thumb:hover {
				background: #b30000;
			}
			.custom-title {
				font-family: {{ isset($text['title_font_family']) ? $text['title_font_family'] : 'Peignot' }}, Helvetica, "sans-serif";
				font-size: {{ isset($text['title_font_size']) ? $text['title_font_size'] : '28' }}px;
				color: {{ isset($text['title_text_color']) ? $text['title_text_color'] : '#181C32' }};
				text-transform: uppercase;
			}
			.custom-description {
				font-family: {{ isset($text['description_font_family']) ? $text['description_font_family'] : 'Peignot' }}, Helvetica, "sans-serif";
				font-size: {{ isset($text['description_font_size']) ? $text['description_font_size'] : '16' }}px;
				color: {{ isset($text['description_color']) ? $text['description_color'] : '#7E8299' }};
			}
			.side-link {
				color: {{ isset($colors['sidelink']) ? $colors['sidelink'] : '#181C32' }};
			}
			.side-link:hover {
				color: {{ isset($colors['sidelink_hover']) ? $colors['sidelink_hover'] : '#181C32' }};
			}
			.sidebar-description {
				font-family: {{ isset($text['sidebar_description_font_family']) ? $text['sidebar_description_font_family'] : 'Peignot' }}, Helvetica, "sans-serif";
				color: {{ isset($text['sidebar_description_color']) ? $text['sidebar_description_color'] : '#7E8299' }};
			}
			.sidebar-link {
				font-family: {{ isset($text['sidebar_link_font_family']) ? $text['sidebar_link_font_family'] : 'Peignot' }}, Helvetica, "sans-serif";
				color: {{ isset($text['sidebar_link_color']) ? $text['sidebar_link_color'] : '#7E8299' }};
			}
			.custom-text {
				font-family: {{ isset($text['main_text_font_family']) ? $text['main_text_font_family'] : 'Peignot' }}, Helvetica, "sans-serif";
				color: {{ isset($text['main_text_color']) ? $text['main_text_color'] : '#7E8299' }};
			}
			.verdana-text {
				font-family: Verdana;
			}
			.custom-button {
				background: {{ isset($colors['buttons']) ? $colors['buttons'] : '#3699FF' }};
				border-color: {{ isset($colors['buttons_border']) ? $colors['buttons_border'] : '#3699FF' }};
				font-family: Verdana;
				text-transform: uppercase;
				color: {{ isset($colors['button_text']) ? $colors['button_text'] : '#3699FF' }};
			}
			.custom-button:hover {
				color: {{ isset($colors['button_text_hover']) ? $colors['button_text_hover'] : '#181C32' }};
			}
			.custom-background {
				background: {{ isset($colors['background']) ? $colors['background'] : 'white' }};
			}
			.bottom-navigation {
				background: {{ isset($bottom_navigation['bottom_nav_background']) ? $bottom_navigation['bottom_nav_background'] : '#232F3E' }};
				border-bottom: 1px solid gray;
			}
			.bottom-navigation ul li {
				list-style-type: none;
				margin-bottom: 10px;
				font-size: {{ isset($bottom_navigation['bottom_nav_font_size']) ? (empty($bottom_navigation['bottom_nav_font_size']) ? '16' : $bottom_navigation['bottom_nav_font_size']) : '16' }}px;
				font-family: {{ isset($bottom_navigation['bottom_nav_font_family']) ? (empty($bottom_navigation['bottom_nav_font_family']) ? 'Peignot' : $bottom_navigation['bottom_nav_font_family']) : 'Peignot' }}, Helvetica, "sans-serif";
			}
			.bottom-navigation ul li a {
				color: {{ isset($bottom_navigation['bottom_nav_font_color']) ? $bottom_navigation['bottom_nav_font_color'] : 'white' }};
			}
			.bottom-navigation ul li a:hover {
				text-decoration: underline !important;
			}
			.bottom-navigation ul li:last-child {
				/* margin-bottom: 0; */
			}
			.back-to-top {
				background: {{ isset($bottom_navigation['back_to_top_background']) ? $bottom_navigation['back_to_top_background'] : '#37475A' }};
			}
			.back-to-top a {
				color: {{ isset($bottom_navigation['back_to_top_font_color']) ? $bottom_navigation['back_to_top_font_color'] : 'white' }};
				font-family: {{ isset($bottom_navigation['back_to_top_font_family']) ? (empty($bottom_navigation['back_to_top_font_family']) ? 'Peignot' : $bottom_navigation['back_to_top_font_family']) : 'Peignot' }}, Helvetica, "sans-serif";
				font-size: {{ isset($bottom_navigation['back_to_top_font_size']) ? (empty($bottom_navigation['back_to_top_font_size']) ? '14' : $bottom_navigation['back_to_top_font_size']) : '14' }}px;
			}
			.back-to-top a:hover {
				text-decoration: underline !important;
			}
			.updates-box {
				width: 80%;
				color: {{ isset($bottom_navigation['updates_box_font_color']) ? $bottom_navigation['updates_box_font_color'] : 'white' }};
				font-size: {{ isset($bottom_navigation['updates_box_font_size']) ? (empty($bottom_navigation['updates_box_font_size']) ? '16' : $bottom_navigation['updates_box_font_size']) : '16' }}px;
				font-family: {{ isset($bottom_navigation['updates_box_font_family']) ? (empty($bottom_navigation['updates_box_font_family']) ? 'Peignot' : $bottom_navigation['updates_box_font_family']) : 'Peignot' }}, Helvetica, "sans-serif";
			}
			.updates-box input{
				font-size: {{ isset($bottom_navigation['updates_box_font_size']) ? (empty($bottom_navigation['updates_box_font_size']) ? '16' : $bottom_navigation['updates_box_font_size']) : '16' }}px;
			}
			.bottom-nav-ul {
				width: 100%;
				display: flex;
				justify-content: space-evenly;
				-ms-flex-wrap: wrap;
				flex-wrap: wrap;
				padding-left: 0;
				margin-bottom: 0;
				list-style: none;
			}
			.bottom-nav-ul-li {
				list-style-type: none;
				font-size: 12px;
				font-family: verdana, Helvetica, "sans-serif";
				display: flex;
				align-items: center;
			}
			.nav .show > .nav-link, .nav .nav-link:hover:not(.disabled), .nav .nav-link.active {
				color: {{ isset($colors['navigationlink_hover']) ? $colors['navigationlink_hover'] : 'white' }};
			}
			.nav .show > .nav-link:after, .nav .nav-link:hover:not(.disabled):after, .nav .nav-link.active:after {
				color: {{ isset($colors['navigationlink_hover']) ? $colors['navigationlink_hover'] : 'white' }};
			}
			.dropdown-item.active, .dropdown-item:active {
				background-color: #b1a6a4;
			}
			.dropdown:hover .dropdown-menu {
				display: block;
			}
			#collapseShop ul {
				list-style-type: none;
				margin-bottom: 0;
			}
			.scroll-pull {
				overflow-x: hidden !important;
				overflow-y: auto;
			}
			#kt_quick_cart_close {
				position: absolute;
				left: 10px;
				top: 10px;
			}
			#kt_quick_cart_toggle i, #kt_quick_cart_close i {
				color: {{ isset($mobile['hamburger_color']) ? $mobile['hamburger_color'] : '#3F4254' }};
			}
			.dropdown-menu {
				margin-top: -1px;
				background-color: {{ isset($menu_styles['bg_color']) ? $menu_styles['bg_color'] : '#ffffff' }};
			}
			.shop-menu-item {
				font-family: {{ isset($menu_styles['font_family']) ? $menu_styles['font_family'] : 'Verdana' }};
				font-size: {{ isset($menu_styles['font_size']) ? $menu_styles['font_size'] : '12' }}px;
				color: {{ isset($menu_styles['font_color']) ? $menu_styles['font_color'] : '#181c32' }};
				background-color: {{ isset($menu_styles['bg_color']) ? $menu_styles['bg_color'] : '#ffffff' }};
			}
			.shop-menu-item.active {
				color: {{ isset($menu_styles['open_color']) ? $menu_styles['open_color'] : '#3f4254' }};
				background-color: {{ isset($menu_styles['open_bg_color']) ? $menu_styles['open_bg_color'] : '#ffffff' }};
			}
			.shop-menu-item:hover {
				color: {{ isset($menu_styles['hover_color']) ? $menu_styles['hover_color'] : '#3f4254' }};
				background-color: {{ isset($menu_styles['hover_bg_color']) ? $menu_styles['hover_bg_color'] : '#ffffff' }};
			}
			.shop-menu-item:active {
				color: {{ isset($menu_styles['click_color']) ? $menu_styles['click_color'] : '#3f4254' }};
				background-color: {{ isset($menu_styles['click_bg_color']) ? $menu_styles['click_bg_color'] : '#ffffff' }};
			}
			#kt_quick_cart_toggle {
				display: none;
			}
			#kt_quick_menu_toggle {
				display: none;
			}
			.form-header {
				/* margin: 1.5rem 2.5rem 0; */
				padding: 39px 79px;
				box-sizing: border-box;
				/* height: 88px !important; */
				/* border: 0; */
				/* border-radius: 0; */
				/* background: #ffffff !important; */
				/* background-image: none !important; */
				/* box-shadow: none; */
			}
			.form-header-inner {
				display: grid;
				grid-template-columns: 1fr auto 1fr;
				align-items: center;
				gap: 1.5rem;
				width: 100%;
			}
			.form-header-social {
				display: flex;
				align-items: center;
				justify-content: flex-start;
				gap: 1.125rem;
			}
			.form-header-social a {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				color: #111111;
				line-height: 0;
				text-decoration: none;
			}
			.form-header-social a:hover {
				color: #111111;
				text-decoration: none;
				opacity: 0.75;
			}
			.form-header-social .fab {
				font-size: 1.85rem;
				color: #111111 !important;
			}
			.form-header-social-x {
				display: block;
				width: 1.625rem;
				height: 1.625rem;
			}
			.form-header-center {
				justify-self: center;
			}
			.form-brand {
				display: flex;
				align-items: center;
				line-height: 0;
				text-decoration: none;
			}
			.form-brand img {
				display: block;
				max-height: 64px;
				width: auto;
				height: auto;
			}
			.form-header-nav {
				display: flex;
				align-items: center;
				justify-content: flex-end;
				justify-self: end;
				gap: 2rem;
				flex-wrap: wrap;
			}
			.form-nav-link {
				font-family: Verdana, Peignot, Poppins, Helvetica, "sans-serif";
				font-size: 12px;
				font-weight: 500;
				letter-spacing: 0.2em;
				text-transform: uppercase;
				color: #111111;
				white-space: nowrap;
			}
			.form-nav-link:hover {
				color: #111111;
				text-decoration: none;
				opacity: 0.75;
			}
			.mobile-nav-menu {
				display: none;
			}
			.mobile-nav-menu-panel {
				display: none;
				background-color: #d8e5f7;
				border-top: 1px solid rgba(17, 17, 17, 0.1);
				padding: 0.75rem 1rem 1rem;
			}
			.mobile-nav-link {
				display: block;
				padding: 0.55rem 0;
				font-family: Verdana, Peignot, Poppins, Helvetica, "sans-serif";
				font-size: 12px;
				letter-spacing: 0.16em;
				text-transform: uppercase;
				color: #111111;
				text-decoration: none;
			}
			.mobile-nav-group {
				border-bottom: 1px solid rgba(17, 17, 17, 0.08);
			}
			.mobile-nav-link-toggle {
				display: flex;
				align-items: center;
				justify-content: space-between;
				width: 100%;
				padding: 0.55rem 0;
				border: 0;
				background: transparent;
				font-family: Verdana, Peignot, Poppins, Helvetica, "sans-serif";
				font-size: 12px;
				letter-spacing: 0.16em;
				text-transform: uppercase;
				color: #111111;
				text-align: left;
			}
			.mobile-nav-link-toggle:focus {
				outline: none;
			}
			.mobile-nav-link-toggle-icon {
				font-size: 10px;
				transition: transform 0.2s ease;
			}
			.mobile-nav-link-toggle[aria-expanded="true"] .mobile-nav-link-toggle-icon {
				transform: rotate(180deg);
			}
			.mobile-shop-submenu {
				display: none;
				padding: 0 0 0.4rem 0.9rem;
			}
			.mobile-shop-submenu a {
				display: block;
				padding: 0.38rem 0;
				font-size: 11px;
				letter-spacing: 0.12em;
				text-transform: uppercase;
				color: #111111;
				text-decoration: none;
			}
			.mobile-shop-submenu a:hover {
				color: #111111;
				opacity: 0.75;
				text-decoration: none;
			}
			.mobile-nav-link:hover {
				color: #111111;
				opacity: 0.75;
				text-decoration: none;
			}
			.mobile-instagram-link {
				display: inline-flex;
				align-items: center;
				gap: 0.5rem;
				margin-top: 0.65rem;
				font-family: Verdana, Peignot, Poppins, Helvetica, "sans-serif";
				font-size: 12px;
				letter-spacing: 0.12em;
				text-transform: uppercase;
				color: #111111;
				text-decoration: none;
			}
			.mobile-instagram-link:hover {
				color: #111111;
				opacity: 0.75;
				text-decoration: none;
			}
			.mobile-social-links {
				display: flex;
				align-items: center;
				gap: 1.125rem;
				margin-top: 0.65rem;
			}
			.mobile-social-btn {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				color: #111111;
				text-decoration: none;
				line-height: 1;
			}
			.mobile-social-btn:hover {
				color: #111111;
				opacity: 0.75;
				text-decoration: none;
			}
			.mobile-social-btn .fab {
				font-size: 1.85rem;
				color: #111111 !important;
			}
			.mobile-social-btn .mobile-social-x {
				display: block;
				width: 1.625rem;
				height: 1.625rem;
			}
			.form-nav-icon {
				font-size: 11px;
				color: #111111;
			}
			.form-shop {
				position: relative;
				display: inline-flex;
				align-items: center;
				padding-bottom: 12px;
				margin-bottom: -12px;
			}
			.form-shop-menu {
				position: absolute;
				top: 100%;
				left: -12px;
				display: none;
				min-width: 200px;
				padding: 10px 12px;
				background: #f3f3f2;
				box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
				z-index: 1200;
			}
			.form-header-nav .form-shop-menu {
				left: auto;
				right: -12px;
			}
			.form-shop:hover .form-shop-menu,
			.form-shop:focus-within .form-shop-menu {
				display: block;
			}
			.form-shop-menu a {
				display: block;
				font-family: Verdana, Peignot, Poppins, Helvetica, "sans-serif";
				font-size: 12px;
				/* font-weight: 600; */
				letter-spacing: 0.18em;
				line-height: 1.55;
				text-transform: uppercase;
				color: #111111;
				white-space: nowrap;
			}
			.form-shop-menu a:hover {
				text-decoration: none;
				opacity: 0.75;
			}
			#img_logo {
				margin-left: -15%;
				height: 90%;
			}
			#kt_header {
				margin-left: 6.25rem;
				margin-top: 2.5rem;
				display: flex;
			}
			#kt_subheader {
				display: block;
			}
			#store_closed {
				margin-left: -8%;
			}
			#text_logo {
				display: none;
			}
			#kt_logo #img_logo {
				display: none;
			}
			.social-link {
				width: 39px;
				height: 39px;
			}
			
			@media (max-width: 1200px) {
				.form-header {
					padding: 14px 16px;
				}
				.form-header-inner {
					grid-template-columns: 1fr;
					gap: 0;
					position: relative;
				}
				.form-header-center {
					justify-self: center;
				}
				.form-brand img {
					max-height: 54px;
				}
				.form-header-social,
				.form-header-nav {
					display: none;
				}
				.mobile-nav-menu {
					display: block;
					position: absolute;
					left: 0;
					top: 50%;
					transform: translateY(-50%);
				}
				#kt_quick_menu_toggle {
					display: inline-flex;
					align-items: center;
					justify-content: center;
					padding: 0;
					border: 0;
					background: transparent;
					color: #111111;
				}
				#kt_header_left {
					display: none;
				}
				#kt_subheader_left {
					display: none;
				}
				#kt_left {
					display: none;
				}
				#kt_quick_cart_toggle {
					display: block;
				}
				#img_logo {
					height: 100%;
					margin-left: 5%;
					display: none;
				}
				#kt_header {
					margin-left: 2.5rem;
					display: none;
				}
				#kt_subheader {
					display: none;
				}
				#nav_menu {
					display: none;
				}
				#main_content {
					padding: 2.5rem 5rem;
				}
				#main_content > .row,
				#main_content .shop-gallery,
				#main_content .home-main-content {
					width: 100% !important;
					max-width: 100% !important;
					margin-left: 0 !important;
					margin-right: 0 !important;
				}
				#main_content img {
					max-width: 100%;
					height: auto;
				}
				#store_closed {
					margin-left: 0;
				}
				#text_logo {
					display: block;
					max-width: 100%;
					font-family: {{ isset($mobile['toptext_font_family']) ? $mobile['toptext_font_family'] : 'Verdana' }};
					font-size: {{ isset($mobile['toptext_font_size']) ? $mobile['toptext_font_size'] : '28' }}px;
					color: {{ isset($mobile['toptext_color']) ? $mobile['toptext_color'] : '#181C32' }};
					line-height: 1.4em !important;
					letter-spacing: 0.015em;
					text-transform: uppercase;
					margin: auto;
					vertical-align: top !important;
					text-align: center;
				}
				#kt_logo {
					width: 100%;
					margin-top: 0.5rem;
				}
				#kt_logo #img_logo {
					display: block;
					width: 360px;
					height: auto;
					margin: auto;
				}
				#sidebar_content {
					display: none;
				}
				#kt_quick_cart {
					background-color: {{ isset($mobile['nav_background_color']) ? $mobile['nav_background_color'] : '#B1A6A4' }} !important;
				}
				.mobile-nav-button {
					background-color: {{ isset($mobile['navbutton_color']) ? $mobile['navbutton_color'] : '#B1A6A4' }};
					border-color: {{ isset($mobile['navbutton_border_color']) ? $mobile['navbutton_border_color'] : '#B1A6A4' }};
					color: {{ isset($mobile['navbutton_font_color']) ? $mobile['navbutton_font_color'] : '#ffffff' }};
					font-family: {{ isset($mobile['navbutton_font_family']) ? $mobile['navbutton_font_family'] : 'Verdana' }};
					font-size: {{ isset($mobile['navbutton_font_size']) ? $mobile['navbutton_font_size'] : '14' }}px;
				}
			}
			@media (max-width: 992px) {
				#img_logo {
				    height: 90%;
					top: 58px;
					left: 0;
					right: 0;
					margin-left: 5%;
					width: 90%;
				}
				#main_content {
					padding: 8px;
				}
				.form-brand img {
					max-height: 48px;
				}
				.mobile-nav-menu-panel {
					padding: 0.7rem 0.9rem 0.85rem;
				}
				.product-image,
				.shop-gallery-item img {
					width: 100%;
					height: auto;
				}
				.product-image {
					max-height: 420px;
					object-fit: contain;
				}
				.product-image-thumbs {
					flex-wrap: wrap;
					gap: 0.5rem;
				}
				#store_closed {
					margin-left: 0;
				}
			}
			@media (max-width: 768px) {
				.subheader.subheader-solid {
					margin-bottom: 5px;
				}				
			}
			@media (max-width: 576px) {
				#img_logo {
                    height: 75%;
                    top: 58px;
                    left: 0;
                    right: 0;
                    margin-left: 5%;
                    width: 80%;
                }
				.bottom-nav-links li {
					text-align: center !important;
				}

				.bottom-nav-logo {
					margin-bottom: 1rem !important;
				}
				.bottom-nav-ul {
					display: block;
				}
				.form-brand img {
					max-height: 42px;
				}
				.mobile-nav-link {
					padding: 0.45rem 0;
					font-size: 11px;
				}
				.mobile-social-links {
					gap: 0.95rem;
				}
			}
        </style>
	</head>
	<!--end::Head-->
	@php
		if(empty($logos)) $img=asset('assets/media/logos/facets_vintage/logo-all-white.png');
		else{
			if($logos['active']==1) $img=asset('assets/media/logos/facets_vintage/logo-all-white.png');
			else if($logos['active']==2) $img=asset('assets/media/logos/facets_vintage/logo-all-blue.png');
			else if($logos['active']==3) $img=asset('assets/media/logos/facets_vintage/logo-all-burgundy.png');
			else if($logos['active']==4) $img=asset('assets/media/logos/facets_vintage/logo-all-darkblue.png');
			else if($logos['active']==5) $img=asset('assets/media/logos/facets_vintage/logo-all-red.png');
			else if($logos['active']==6) $img=asset('assets/media/logos/facets_vintage/logo-blue.png');
			else if($logos['active']==7) $img=asset('assets/media/logos/facets_vintage/logo-red.png');
			else if($logos['active']==8) $img=asset('assets/media/logos/facets_vintage/logo-blue_white.png');
			else if($logos['active']==9) $img=asset('assets/media/logos/facets_vintage/logo-red_white.png');
			else if($logos['active']==10) $img=asset('assets/media/logos/facets/logo-all-white.png');
			else if($logos['active']==11) $img=asset('assets/media/logos/facets/logo-all-blue.png');
			else if($logos['active']==12) $img=asset('assets/media/logos/facets/logo-all-burgundy.png');
			else if($logos['active']==13) $img=asset('assets/media/logos/facets/logo-all-darkblue.png');
			else if($logos['active']==14) $img=asset('assets/media/logos/facets/logo-all-red.png');
			else if($logos['active']==15) $img=asset('assets/media/logos/facets/logo-blue.png');
			else if($logos['active']==16) $img=asset('assets/media/logos/facets/logo-red.png');
			else if($logos['active']==17) $img=asset('assets/media/logos/facets/logo-blue_white.png');
			else if($logos['active']==18) $img=asset('assets/media/logos/facets/logo-red_white.png');
			else if($logos['active']==19) $img=asset('assets/media/logos/facets_vintage_larger/logo-all-white.png');
			else if($logos['active']==20) $img=asset('assets/media/logos/facets_vintage_larger/logo-all-blue.png');
			else if($logos['active']==21) $img=asset('assets/media/logos/facets_vintage_larger/logo-all-burgundy.png');
			else if($logos['active']==22) $img=asset('assets/media/logos/facets_vintage_larger/logo-all-darkblue.png');
			else if($logos['active']==23) $img=asset('assets/media/logos/facets_vintage_larger/logo-all-red.png');
			else if($logos['active']==24) $img=asset('assets/media/logos/facets_vintage_larger/logo-blue.png');
			else if($logos['active']==25) $img=asset('assets/media/logos/facets_vintage_larger/logo-red.png');
			else if($logos['active']==26) $img=asset('assets/media/logos/facets_vintage_larger/logo-blue_white.png');
			else if($logos['active']==27) $img=asset('assets/media/logos/facets_vintage_larger/logo-red_white.png');
			else if($logos['active']==28) $img=asset('assets/media/logos/facets_larger/logo-all-white.png');
			else if($logos['active']==29) $img=asset('assets/media/logos/facets_larger/logo-all-blue.png');
			else if($logos['active']==30) $img=asset('assets/media/logos/facets_larger/logo-all-burgundy.png');
			else if($logos['active']==31) $img=asset('assets/media/logos/facets_larger/logo-all-darkblue.png');
			else if($logos['active']==32) $img=asset('assets/media/logos/facets_larger/logo-all-red.png');
			else if($logos['active']==33) $img=asset('assets/media/logos/facets_larger/logo-blue.png');
			else if($logos['active']==34) $img=asset('assets/media/logos/facets_larger/logo-red.png');
			else if($logos['active']==35) $img=asset('assets/media/logos/facets_larger/logo-blue_white.png');
			else if($logos['active']==36) $img=asset('assets/media/logos/facets_larger/logo-red_white.png');
		}
	@endphp
	<!--begin::Body-->
	<body id="kt_body" class="subheader-enabled page-loading">
		<!--begin::Header-->
		<div style="width: 100%; background-color: #d8e5f7;">
			<div class="d-flex form-header align-items-center" style="width: 1430px; margin: 0 auto; max-width: 100%;">
				<div class="form-header-inner">
					<div class="mobile-nav-menu">
						<button class="btn" id="kt_quick_menu_toggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="nav_mobile_menu">
							<i class="icon-xl fas fa-bars"></i>
						</button>
					</div>
					<div class="form-header-social" aria-label="Social links">
						<a href="{{ isset($social['instagram']) && $social['instagram'] !== '' ? $social['instagram'] : 'https://www.instagram.com' }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
							<i class="fab fa-instagram" aria-hidden="true"></i>
						</a>
						<a href="{{ isset($social['twitter']) && $social['twitter'] !== '' ? $social['twitter'] : 'https://x.com' }}" target="_blank" rel="noopener noreferrer" aria-label="X">
							<svg class="form-header-social-x" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
						</a>
					</div>
					<div class="form-header-center">
						<a href="{{ route('home') }}" class="form-brand">
							<img src="{{ $img }}" alt="{{ $website['title'] ?? 'Home' }}">
						</a>
					</div>
					<nav class="form-header-nav" aria-label="Primary">
						<a class="form-nav-link" href="{{ route('home') }}">HOME</a>	
						<div class="form-shop">
							<a class="form-nav-link" href="#">SHOP</a>
							<div class="form-shop-menu">
								<a href="{{ url('shop-our-store/category/1') }}">Pottery</a>
								<a href="{{ url('shop-our-store/category/2') }}">Glass</a>
								<a href="{{ url('shop-our-store/category/3') }}">Lighting</a>
								<a href="{{ url('shop-our-store/category/4') }}">Metals</a>
							</div>
						</div>
						<a class="form-nav-link" href="#">ABOUT</a>
						<a class="form-nav-link" href="{{ route('contact') }}">CONTACT</a>
						<a class="form-nav-link form-nav-icon" href="{{ route('search') }}" aria-label="Search">
							<i class="fas fa-search"></i>
						</a>
					</nav>
				</div>
			</div>
			<div id="nav_mobile_menu" class="mobile-nav-menu-panel" aria-label="Mobile navigation">
				<a class="mobile-nav-link" href="{{ route('home') }}">Home</a>
				<div class="mobile-nav-group">
					<button class="mobile-nav-link-toggle" id="mobile_shop_toggle" aria-expanded="false" aria-controls="mobile_shop_submenu" type="button">
						<span>Shop</span>
						<i class="fas fa-chevron-down mobile-nav-link-toggle-icon" aria-hidden="true"></i>
					</button>
					<div class="mobile-shop-submenu" id="mobile_shop_submenu">
						<a href="{{ url('shop-our-store/category/1') }}">Pottery</a>
						<a href="{{ url('shop-our-store/category/2') }}">Glass</a>
						<a href="{{ url('shop-our-store/category/3') }}">Lighting</a>
						<a href="{{ url('shop-our-store/category/4') }}">Metals</a>
					</div>
				</div>
				<a class="mobile-nav-link" href="#">About</a>
				<a class="mobile-nav-link" href="{{ route('contact') }}">Contact</a>
				<a class="mobile-nav-link" href="{{ route('search') }}">Search</a>
				<div class="mobile-social-links" aria-label="Social links">
					<a class="mobile-social-btn" href="{{ isset($social['instagram']) && $social['instagram'] !== '' ? $social['instagram'] : 'https://www.instagram.com' }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</a>
					<a class="mobile-social-btn" href="{{ isset($social['twitter']) && $social['twitter'] !== '' ? $social['twitter'] : 'https://x.com' }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
						<svg class="mobile-social-x" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
					</a>
				</div>
			</div>
		</div>
		<!--end::Header-->
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			@if($home==1)
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div id="main_content">@yield('content')</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					
					<div class="footer py-8 d-flex flex-column">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center">
							<!--begin::Copyright-->
							<a href="{{ isset($social['instagram']) ? $social['instagram'] : 'https://www.instagram.com' }}" target="_blank" class="nav-link social-link d-flex justify-content-center align-items-center">
								<span class="label-xl p-6">
									<i class="icon-xl fab fa-instagram" style="color:black"></i>
								</span>
							</a>
							<!--end::Copyright-->
						</div>
						<div class="order-2 order-md-1 text-center mt-3">
							<span class="font-weight-bold text-uppercase">{{ isset($copyright['text']) ? $copyright['text'] : '© Copyright Facets 2026' }}</span>
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
			@else
			<!--begin::Error-->
			<div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" style="background-image: url({{ asset('assets/media/error/bg1.jpg') }});">
				<!--begin::Content-->
				<div class="d-flex align-items-center mb-10">
					<a href="{{ route('/') }}" class="brand-logo">
						<img alt="Logo" src="{{ $img }}" style="height: 72px;">
					</a>
				</div>
				<p class="font-size-h3 text-muted font-weight-normal font">{{ $website['message'] }}</p>
				<!--end::Content-->
			</div>
			<!--end::Error-->
			@endif
		</div>
		<!--end::Main-->
		
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop1" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		<script>var HOST_URL = "{{ route('/') }}";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Peignot" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.6/dist/perfect-scrollbar.min.js"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
		<!--end::Global Theme Bundle-->
		{{-- Includable JS --}}
        @yield('scripts')
<script>
jQuery(document).ready(function() {
	if(window.screen.width<1300){
		$('#kt_left').remove();
		$('#main_content').removeClass('col-10');
		$('#main_content').addClass('col-12');
	}

	$('.dropdown').hover(function(){
		$(this).find('.dropdown-menu')
		.stop(true, true).delay(100).fadeIn(200);
	}, function(){
		$(this).find('.dropdown-menu')
		.stop(true, true).delay(100).fadeOut(200);
	});

	$('#btn_login').on('click', function(){
		$('#form_login').submit();
	});

	$(".custom-description").find("span, p").css({"font-family": "{{ isset($text['description_font_family']) ? $text['description_font_family'] : 'Peignot' }}", "font-size": "{{ isset($text['description_font_size']) ? $text['description_font_size'] : '16' }}px"});

	$('#reset').hide();
	$('#kt_login_forgot').on('click', function(){
		$('#reset').show();
		$('#login').hide();
	});

	$('#btn_reset').on('click', function(e){
        e.preventDefault();
        var btn = KTUtil.getById("btn_reset");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
		$('.alert-message').text('');
        $.ajax({
            url:"{{ route('forget.password.post') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                email: $('#email').val()
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                $('.alert-text').text(result.message);
				$('.alert-custom').show();
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                $('#emailError').text(response.responseJSON.errors.email);
			}
        });
    });

	$('#kt_quick_menu_toggle').on('click', function(){
		if($('#nav_mobile_menu').is(":hidden")){
			$('#nav_mobile_menu').show();
			$(this).attr('aria-expanded', 'true');
		}else{
			$('#nav_mobile_menu').hide();
			$('#mobile_shop_submenu').hide();
			$('#mobile_shop_toggle').attr('aria-expanded', 'false');
			$(this).attr('aria-expanded', 'false');
		}
	});

	$('#mobile_shop_toggle').on('click', function() {
		const isOpen = $(this).attr('aria-expanded') === 'true';
		$(this).attr('aria-expanded', isOpen ? 'false' : 'true');
		$('#mobile_shop_submenu').stop(true, true).slideToggle(150);
	});

	$('#btn_email_send').on('click', function(e){
        e.preventDefault();

		var btn = KTUtil.getById("btn_email_send");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

		var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
		if (!$('#customer_email').val().match(validRegex)) {
			content.message = 'Invalid email address!';
			showMessage('danger', content);
			KTUtil.btnRelease(btn);
			return;
		}

        $.ajax({
            url:"{{ route('save-email') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                customer_email: $('#customer_email').val()
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
				if(result.state == 1) {
					content.message = 'Your email have been sent successfully.';
					showMessage('success', content);
					$('#customer_email').val('');
				}
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
				content.message = response.responseJSON.errors.customer_email;
				showMessage('danger', content);
			}
        });
    });
});

</script>
<script>
	var content = {};
	function showMessage(type, content){
		var notify = $.notify(content, {
			type: type,
			allow_dismiss: true,
			newest_on_top: false,
			mouse_over:  false,
			showProgressbar:  false,
			spacing: 10,
			timer: 2000,
			placement: {
				from: 'top',
				align: 'right'
			},
			offset: {
				x: 0,
				y: 60
			},
			delay: 2000,
			z_index: 10000,
			animate: {
				enter: 'animate__animated animate__' + 'slideInRight',
				exit: 'animate__animated animate__' + 'slideOutRight'
			}
		});
	}
</script>
	</body>
	<!--end::Body-->
</html>
