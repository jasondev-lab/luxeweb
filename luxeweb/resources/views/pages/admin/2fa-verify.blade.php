
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Facets</title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->

		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('assets/css/pages/login/classic/login-5.css') }}" rel="stylesheet" type="text/css" />
		
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
		<style>
			.alert-message {
				color: red;
				font-size: 0.85em;
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('assets/media/bg/bg-2.jpg') }});">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ asset('assets/media/logos/facets/logo-all-red.png') }}" class="max-w-400px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-10">
								<h3 class="opacity-40 font-weight-normal">2FA Verification</h3>
								<p class="opacity-40">Enter your verification code to continue:</p>
							</div>
							<form class="form" action="{{ route('2fa.verify.post') }}" method="post" id="kt_2fa_form">
							<!-- <form class="form" action="{{ route('logout') }}" method="post" id="kt_2fa_form"> -->
                                {{ csrf_field() }}
                                <div class="form-group">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8 @error('code') is-invalid @enderror" type="text" placeholder="Verification code" name="code" autocomplete="off" />
                                    @error('code')
                                        <span class="invalid-feedback text-uppercase verdana-text" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
								<div class="form-group text-center mt-10">
									<button id="btn_verify" class="btn btn-pill btn-primary opacity-90 px-15 py-3">Verify</button>
								</div>
							</form>							
						</div>
						<!--end::Login Sign in form-->						
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "{{ route('/') }}";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
		<!--end::Page Scripts-->
        <script>
        jQuery(document).ready(function() {
            $('#btn_verify').on('click', function(){
                $('#kt_2fa_form').submit();
            });
        });
        </script>
	</body>
	<!--end::Body-->
</html>