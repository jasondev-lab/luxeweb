{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<link href="{{ asset('assets/plugins/custom/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet" type="text/css" />
<style>
.table td, .table th {
    vertical-align: middle;
}
.divider-simple {
    border: 0;
    height: 1px;
    background-color: #EBEDF3;
    margin: 1rem 0;
}
</style>
@endsection

{{-- Content --}}
@section('content')
@php
$background_image=$result['background_image'];
$no_image = asset('assets/media/no_image.jpg');
if(empty($background_image)){
    $img_sidebar=asset('assets/media/no_image.jpg');
    $img_topbar=asset('assets/media/no_image.jpg');
    $img_navigationbar=asset('assets/media/no_image.jpg');
}else{
    $img_sidebar=isset($background_image['sidebar']) ? asset('uploads/home').'/'.$background_image['sidebar'] : asset('assets/media/no_image.jpg');
    $img_topbar=isset($background_image['topbar']) ? asset('uploads/home').'/'.$background_image['topbar'] : asset('assets/media/no_image.jpg');
    $img_navigationbar=isset($background_image['navigationbar']) ? asset('uploads/home').'/'.$background_image['navigationbar'] : asset('assets/media/no_image.jpg');
}

$background_image_comingsoon=$result['background_image_comingsoon'];
;if(empty($background_image_comingsoon)){
    $img_comingsoon=asset('assets/media/no_image.jpg');
}else{
    $img_comingsoon=isset($background_image_comingsoon['url']) ? asset('assets/media/comingsoon').'/'.$background_image_comingsoon['url'] : asset('assets/media/no_image.jpg');
}


@endphp
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $menu }}</h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">{{ $submenu }}</span>
            <!--<a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>-->
            <!--end::Actions-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="card card-custom">
            <!--begin::Card header-->
            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_colors">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <circle fill="#000000" cx="12" cy="9" r="5"></circle>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Colors</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_text">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3,19 L5,19 L5,21 L3,21 L3,19 Z M8,19 L10,19 L10,21 L8,21 L8,19 Z M13,19 L15,19 L15,21 L13,21 L13,19 Z M18,19 L20,19 L20,21 L18,21 L18,19 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M10.504,3.256 L12.466,3.256 L17.956,16 L15.364,16 L14.176,13.084 L8.65000004,13.084 L7.49800004,16 L4.96000004,16 L10.504,3.256 Z M13.384,11.14 L11.422,5.956 L9.42400004,11.14 L13.384,11.14 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Text</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_mobile">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path d="M16 64C16 28.7 44.7 0 80 0L304 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L80 512c-35.3 0-64-28.7-64-64L16 64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64L80 64l0 320 224 0 0-320z" style="fill: #7E8299;"/>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Mobile</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_admin">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Admin</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_dev">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Dev</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_contact">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Contact Info</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_2fa">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <polygon fill="#000000" opacity="0.3" transform="translate(8.885842, 16.114158) rotate(-315.000000) translate(-8.885842, -16.114158)" points="6.89784488 10.6187476 6.76452164 19.4882481 8.88584198 21.6095684 11.0071623 19.4882481 9.59294876 18.0740345 10.9659914 16.7009919 9.55177787 15.2867783 11.0071623 13.8313939 10.8837471 10.6187476"></polygon>
                                                <path d="M15.9852814,14.9852814 C12.6715729,14.9852814 9.98528137,12.2989899 9.98528137,8.98528137 C9.98528137,5.67157288 12.6715729,2.98528137 15.9852814,2.98528137 C19.2989899,2.98528137 21.9852814,5.67157288 21.9852814,8.98528137 C21.9852814,12.2989899 19.2989899,14.9852814 15.9852814,14.9852814 Z M16.1776695,9.07106781 C17.0060967,9.07106781 17.6776695,8.39949494 17.6776695,7.57106781 C17.6776695,6.74264069 17.0060967,6.07106781 16.1776695,6.07106781 C15.3492424,6.07106781 14.6776695,6.74264069 14.6776695,7.57106781 C14.6776695,8.39949494 15.3492424,9.07106781 16.1776695,9.07106781 Z" fill="#000000" transform="translate(15.985281, 8.985281) rotate(-315.000000) translate(-15.985281, -8.985281)"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">2FA</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_image_size">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"></path>
                                                <polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon>
                                                <polygon fill="#000000" points="11 19 15 14 19 19"></polygon>
                                                <path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Image Size</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_logos">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Logos</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_social">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M12.4644661,14.5355339 L9.46446609,14.5355339 C8.91218134,14.5355339 8.46446609,14.9832492 8.46446609,15.5355339 C8.46446609,16.0878187 8.91218134,16.5355339 9.46446609,16.5355339 L12.4644661,16.5355339 L12.4644661,17.5355339 C12.4644661,18.6401034 11.5690356,19.5355339 10.4644661,19.5355339 L6.46446609,19.5355339 C5.35989659,19.5355339 4.46446609,18.6401034 4.46446609,17.5355339 L4.46446609,13.5355339 C4.46446609,12.4309644 5.35989659,11.5355339 6.46446609,11.5355339 L10.4644661,11.5355339 C11.5690356,11.5355339 12.4644661,12.4309644 12.4644661,13.5355339 L12.4644661,14.5355339 Z" fill="#000000" opacity="0.3" transform="translate(8.464466, 15.535534) rotate(-45.000000) translate(-8.464466, -15.535534)"></path>
                                                <path d="M11.5355339,9.46446609 L14.5355339,9.46446609 C15.0878187,9.46446609 15.5355339,9.01675084 15.5355339,8.46446609 C15.5355339,7.91218134 15.0878187,7.46446609 14.5355339,7.46446609 L11.5355339,7.46446609 L11.5355339,6.46446609 C11.5355339,5.35989659 12.4309644,4.46446609 13.5355339,4.46446609 L17.5355339,4.46446609 C18.6401034,4.46446609 19.5355339,5.35989659 19.5355339,6.46446609 L19.5355339,10.4644661 C19.5355339,11.5690356 18.6401034,12.4644661 17.5355339,12.4644661 L13.5355339,12.4644661 C12.4309644,12.4644661 11.5355339,11.5690356 11.5355339,10.4644661 L11.5355339,9.46446609 Z" fill="#000000" transform="translate(15.535534, 8.464466) rotate(-45.000000) translate(-15.535534, -8.464466)"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Social Links</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_signup">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">SignUp</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_background">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"></path>
                                                <polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon>
                                                <polygon fill="#000000" points="11 19 15 14 19 19"></polygon>
                                                <path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Background Image</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_shop_toggle">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Shop Toggle</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_website_message">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="9"/>
                                                <path d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Website</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_bottom_navigation">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="6" rx="1.5"/>
                                                <rect fill="#000000" x="4" y="13" width="16" height="6" rx="1.5"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Bottom Section</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_copyright">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Copyright</span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show px-7 active" id="kt_colors" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-12 my-2">
                                <!--begin::Group-->
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Background</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_background">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_background_hex" value="{{ isset($result['colors']['background'])?$result['colors']['background']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Footer</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_footer">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_footer_hex" value="{{ isset($result['colors']['footer'])?$result['colors']['footer']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-simple"></div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Top Bar</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_topbar">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_topbar_hex" value="{{ isset($result['colors']['topbar'])?$result['colors']['topbar']:'#aaaaaa' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Top Bar Border</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_topbar_border">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_topbar_border_hex" value="{{ isset($result['colors']['topbar_border'])?$result['colors']['topbar_border']:'#969494' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-simple"></div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Side Bar</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_sidebar">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_sidebar_hex" value="{{ isset($result['colors']['sidebar'])?$result['colors']['sidebar']:'#cccccc' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Side Bar Border</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_sidebar_border">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_sidebar_border_hex" value="{{ isset($result['colors']['sidebar_border'])?$result['colors']['sidebar_border']:'#b5b3b3' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-simple"></div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Navigation Bar</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_navigationbar">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_navigationbar_hex" value="{{ isset($result['colors']['navigationbar'])?$result['colors']['navigationbar']:'#3699FF' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Navigation Bar Border</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_navigationbar_border">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_navigationbar_border_hex" value="{{ isset($result['colors']['navigationbar_border'])?$result['colors']['navigationbar_border']:'#2f88e4' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Navigation Link</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_navigationlink">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_navigationlink_hex" value="{{ isset($result['colors']['navigationlink'])?$result['colors']['navigationlink']:'#181C32' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Navigation Link Hover</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_navigationlink_hover">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_navigationlink_hover_hex" value="{{ isset($result['colors']['navigationlink_hover'])?$result['colors']['navigationlink_hover']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-simple"></div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Buttons</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_buttons">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_buttons_hex" value="{{ isset($result['colors']['buttons'])?$result['colors']['buttons']:'#3699FF' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Buttons Border</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_buttons_border">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_buttons_border_hex" value="{{ isset($result['colors']['buttons_border'])?$result['colors']['buttons_border']:'#3699FF' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Button Text</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_button_text">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_button_text_hex" value="{{ isset($result['colors']['button_text'])?$result['colors']['button_text']:'#3699FF' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Button Text Hover</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_button_text_hover">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_button_text_hover_hex" value="{{ isset($result['colors']['button_text_hover'])?$result['colors']['button_text_hover']:'#3699FF' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-simple"></div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Side Link</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_sidelink">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_sidelink_hex" value="{{ isset($result['colors']['sidelink'])?$result['colors']['sidelink']:'#181C32' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Side Link Hover</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_sidelink_hover">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_sidelink_hover_hex" value="{{ isset($result['colors']['sidelink_hover'])?$result['colors']['sidelink_hover']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <!--end::Group-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_colors">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_text" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <h4>Main:</h4>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="main_text_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_main_text">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_main_text_hex" value="{{ isset($result['text']['sidebar_text_color'])?$result['text']['sidebar_text_color']:'#3F4254' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Title:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="title_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="title_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <!-- <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Text</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="title_text" value="">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_title_text">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_title_text_hex" value="{{ isset($result['colors']['background'])?$result['colors']['background']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Description:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="description_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="description_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_description">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_description_hex" value="{{ isset($result['colors']['background'])?$result['colors']['background']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Feature Selection (in sidebar):</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Text</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="sidebar_text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_sidebar_text">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_sidebar_text_hex" value="{{ isset($result['text']['sidebar_text_color'])?$result['text']['sidebar_text_color']:'#3F4254' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="sidebar_text_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="sidebar_text_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Link (in sidebar):</h4>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="sidebar_link_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_sidebar_link">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_sidebar_link_hex" value="{{ isset($result['text']['sidebar_text_color'])?$result['text']['sidebar_text_color']:'#3F4254' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Description (in sidebar):</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="sidebar_description_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_sidebar_description">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_sidebar_description_hex" value="{{ isset($result['text']['sidebar_text_color'])?$result['text']['sidebar_text_color']:'#3F4254' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Navigation Link:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="navigation_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_text">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_mobile" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <h4 class="mb-4">Top Text:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="toptext_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="toptext_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Text</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="top_text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_toptext">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_toptext_hex" value="{{ isset($result['mobile']['toptext_color'])?$result['mobile']['toptext_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-simple"></div>
                                <h4 class="mb-4">Hamburger Button:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_hamburger">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_hamburger_hex" value="{{ isset($result['mobile']['hamburger_color'])?$result['mobile']['hamburger_color']:'#B1A6A4' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider-simple"></div>
                                <h4 class="mb-4">Navigation:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Background Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_nav_background">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_nav_background_hex" value="{{ isset($result['mobile']['nav_background_color'])?$result['mobile']['nav_background_color']:'#B1A6A4' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Button Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_navbutton">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_navbutton_hex" value="{{ isset($result['mobile']['navbutton_color'])?$result['mobile']['navbutton_color']:'#B1A6A4' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Button Border Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_navbutton_border">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_navbutton_border_hex" value="{{ isset($result['mobile']['navbutton_border_color'])?$result['mobile']['navbutton_border_color']:'#B1A6A4' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Button Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="navbutton_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Button Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="navbutton_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Button Font Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_navbutton_font">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_navbutton_font_hex" value="{{ isset($result['mobile']['navbutton_font_color'])?$result['mobile']['navbutton_font_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_mobile">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_admin" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Email</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="email" class="form-control" id="email" name="email" value="">
                                        <div class="alert-message" id="error_email"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">New Password</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="password" class="form-control" id="new_pass" name="new_pass" value="">
                                        <div class="alert-message" id="error_new"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Confirm Password</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" value="">
                                        <div class="alert-message" id="error_confirm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_admin">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_dev" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Email</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="email" class="form-control" id="email_dev" name="email" value="">
                                        <div class="alert-message" id="error_email_dev"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">New Password</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="password" class="form-control" id="new_pass_dev" name="new_pass" value="">
                                        <div class="alert-message" id="error_new_dev"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Confirm Password</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="password" class="form-control" id="confirm_pass_dev" name="confirm_pass" value="">
                                        <div class="alert-message" id="error_confirm_dev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_dev">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_contact" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Email</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="email" class="form-control" id="email_contact" name="email" value="">
                                        <div class="alert-message" id="error_email_contact"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_contact">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_2fa" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Secret Code</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control" id="secret_code" name="secret_code" value="{{ $user->google2fa_secret }}" disabled>                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Verification Code</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control" id="verification_code" name="verification_code" value="">
                                        <div class="alert-message" id="error_code"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label"></label>
                                    <div class="col-xl-6 col-lg-6">
                                        <label class="checkbox">
                                            <input type="checkbox" name="google2fa_enabled" {{$user->google2fa_enabled ? "checked" : ""}} disabled>
                                            <span></span>&nbsp;Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <button class="btn btn-secondary font-weight-bold px-10 mr-5" id="btn_disable_2fa" {{$user->google2fa_enabled ? "" : "disabled"}}>Disable</button>
                            <button class="btn btn-primary font-weight-bold px-10 ml-5" id="btn_enable_2fa" {{$user->google2fa_enabled ? "disabled" : ""}}>Enable</button>                            
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_image_size" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <h4>Left Side Image:</h4>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Width</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="left_side_image_width">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Height</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="left_side_image_height">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Home Bottom Image:</h4>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Width</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="home_bottom_image_width">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Height</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="home_bottom_image_height">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Home Slide Image:</h4>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Width</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="home_slide_image_width">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Height</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="home_slide_image_height">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Web Design Image:</h4>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Width</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="web_image_width">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Height</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="web_image_height">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_image">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_logos" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Logos</label>
                                    <div class="col-4 col-form-label">
                                        <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="logo" value="1" {{ isset($result['logos']) && $result['logos']['active']==1 ? 'checked' : '' }}>
                                            <span></span>All White Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="2" {{ isset($result['logos']) && $result['logos']['active']==2 ? 'checked' : '' }}>
                                            <span></span>All Blue Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="3" {{ isset($result['logos']) && $result['logos']['active']==3 ? 'checked' : '' }}>
                                            <span></span>All Burgundy Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="4" {{ isset($result['logos']) && $result['logos']['active']==4 ? 'checked' : '' }}>
                                            <span></span>All DarkBlue Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="5" {{ isset($result['logos']) && $result['logos']['active']==5 ? 'checked' : '' }}>
                                            <span></span>All Red Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="6" {{ isset($result['logos']) && $result['logos']['active']==6 ? 'checked' : '' }}>
                                            <span></span>All Blue Lines Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="7" {{ isset($result['logos']) && $result['logos']['active']==7 ? 'checked' : '' }}>
                                            <span></span>All Red Lines Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="8" {{ isset($result['logos']) && $result['logos']['active']==8 ? 'checked' : '' }}>
                                            <span></span>Blue White Lines Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="9" {{ isset($result['logos']) && $result['logos']['active']==9 ? 'checked' : '' }}>
                                            <span></span>Red White Lines Logo (vintage)</label>
                                        </div>
                                    </div>
                                    <div class="col-4 col-form-label">
                                        <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="logo" value="10" {{ isset($result['logos']) && $result['logos']['active']==10 ? 'checked' : '' }}>
                                            <span></span>All White Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="11" {{ isset($result['logos']) && $result['logos']['active']==11 ? 'checked' : '' }}>
                                            <span></span>All Blue Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="12" {{ isset($result['logos']) && $result['logos']['active']==12 ? 'checked' : '' }}>
                                            <span></span>All Burgundy Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="13" {{ isset($result['logos']) && $result['logos']['active']==13 ? 'checked' : '' }}>
                                            <span></span>All DarkBlue Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="14" {{ isset($result['logos']) && $result['logos']['active']==14 ? 'checked' : '' }}>
                                            <span></span>All Red Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="15" {{ isset($result['logos']) && $result['logos']['active']==15 ? 'checked' : '' }}>
                                            <span></span>All Blue Lines Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="16" {{ isset($result['logos']) && $result['logos']['active']==16 ? 'checked' : '' }}>
                                            <span></span>All Red Lines Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="17" {{ isset($result['logos']) && $result['logos']['active']==17 ? 'checked' : '' }}>
                                            <span></span>Blue White Lines Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="18" {{ isset($result['logos']) && $result['logos']['active']==18 ? 'checked' : '' }}>
                                            <span></span>Red White Lines Logo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">Logos(larger)</label>
                                    <div class="col-4 col-form-label">
                                        <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="logo" value="19" {{ isset($result['logos']) && $result['logos']['active']==19 ? 'checked' : '' }}>
                                            <span></span>All White Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="20" {{ isset($result['logos']) && $result['logos']['active']==20 ? 'checked' : '' }}>
                                            <span></span>All Blue Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="21" {{ isset($result['logos']) && $result['logos']['active']==21 ? 'checked' : '' }}>
                                            <span></span>All Burgundy Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="22" {{ isset($result['logos']) && $result['logos']['active']==22 ? 'checked' : '' }}>
                                            <span></span>All DarkBlue Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="23" {{ isset($result['logos']) && $result['logos']['active']==23 ? 'checked' : '' }}>
                                            <span></span>All Red Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="24" {{ isset($result['logos']) && $result['logos']['active']==24 ? 'checked' : '' }}>
                                            <span></span>All Blue Lines Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="25" {{ isset($result['logos']) && $result['logos']['active']==25 ? 'checked' : '' }}>
                                            <span></span>All Red Lines Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="26" {{ isset($result['logos']) && $result['logos']['active']==26 ? 'checked' : '' }}>
                                            <span></span>Blue White Lines Logo (vintage)</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="27" {{ isset($result['logos']) && $result['logos']['active']==27 ? 'checked' : '' }}>
                                            <span></span>Red White Lines Logo (vintage)</label>
                                        </div>
                                    </div>
                                    <div class="col-4 col-form-label">
                                        <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="logo" value="28" {{ isset($result['logos']) && $result['logos']['active']==28 ? 'checked' : '' }}>
                                            <span></span>All White Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="29" {{ isset($result['logos']) && $result['logos']['active']==29 ? 'checked' : '' }}>
                                            <span></span>All Blue Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="30" {{ isset($result['logos']) && $result['logos']['active']==30 ? 'checked' : '' }}>
                                            <span></span>All Burgundy Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="31" {{ isset($result['logos']) && $result['logos']['active']==31 ? 'checked' : '' }}>
                                            <span></span>All DarkBlue Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="32" {{ isset($result['logos']) && $result['logos']['active']==32 ? 'checked' : '' }}>
                                            <span></span>All Red Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="33" {{ isset($result['logos']) && $result['logos']['active']==33 ? 'checked' : '' }}>
                                            <span></span>All Blue Lines Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="34" {{ isset($result['logos']) && $result['logos']['active']==34 ? 'checked' : '' }}>
                                            <span></span>All Red Lines Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="35" {{ isset($result['logos']) && $result['logos']['active']==35 ? 'checked' : '' }}>
                                            <span></span>Blue White Lines Logo</label>
                                            <label class="radio">
                                            <input type="radio" name="logo" value="36" {{ isset($result['logos']) && $result['logos']['active']==36 ? 'checked' : '' }}>
                                            <span></span>Red White Lines Logo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_logos">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_social" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Facebook link</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="">
                                        <div class="alert-message" id="error_faccebook"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Twitter link</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control" id="twitter" name="twitter" value="">
                                        <div class="alert-message" id="error_twitter"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-4 col-form-label">Instagram link</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control" id="instagram" name="instagram" value="">
                                        <div class="alert-message" id="error_instagram"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_social">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_signup" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">SignUp Page</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="signup_state" value="1" {{ isset($result['signup']['state']) && $result['signup']['state']==1 ? 'checked' : '' }}>
                                            <span></span>On</label>
                                            <label class="radio">
                                            <input type="radio" name="signup_state" value="0" {{ isset($result['signup']['state']) && $result['signup']['state']==0 ? 'checked' : '' }}>
                                            <span></span>Off</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Message</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <textarea class="form-control" id="signup_message" name="signup_message" rows="3"></textarea>
                                        <div class="alert-message" id="error_signup_message"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Terms of service</label>
                                    <div class="col-9">
                                        <div class="summernote" id="kt_summernote"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_signup">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_background" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <form enctype="multipart/form-data" method="post" id="form_image">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="meta_key" value="background-image">
                                    <div class="form-group row d-dlex justify-content-center align-items-center">
                                        <div class="p-10">SideBar</div>
                                        <div class="image-input image-input-outline" id="kt_image_sidebar" style="background-image: url({{ $no_image }})">
                                            <div class="image-input-wrapper" style="background-image: url({{ $img_sidebar }});"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" id="file_image_sidebar" name="image_sidebar" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="image_sidebar_remove">
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel Image">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove Image">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row d-dlex justify-content-center align-items-center">
                                        <div class="p-10">TopBar</div>
                                        <div class="image-input image-input-outline" id="kt_image_topbar" style="background-image: url({{ $no_image }})">
                                            <div class="image-input-wrapper" style="background-image: url({{ $img_topbar }});"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" id="file_image_topbar" name="image_topbar" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="image_topbar_remove">
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel Image">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove Image">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row d-dlex justify-content-center align-items-center">
                                        <div class="p-10">NavigationBar</div>
                                        <div class="image-input image-input-outline" id="kt_image_navigationbar" style="background-image: url({{ $no_image }})">
                                            <div class="image-input-wrapper" style="background-image: url({{ $img_navigationbar }});"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" id="file_image_navigationbar" name="image_navigationbar" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="image_navigationbar_remove">
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel Image">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove Image">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_background">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_shop_toggle" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Shop On/Off</label>
                                    <div class="col-9 col-form-label">
                                        <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="shop_state" value="1" {{ isset($result['shop']['state']) && $result['shop']['state']==1 ? 'checked' : '' }}>
                                            <span></span>On</label>
                                            <label class="radio">
                                            <input type="radio" name="shop_state" value="0" {{ isset($result['shop']['state']) && $result['shop']['state']==0 ? 'checked' : '' }}>
                                            <span></span>Off</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Message</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <textarea class="form-control" id="shop_message" name="shop_message" rows="3"></textarea>
                                        <div class="alert-message" id="error_shop_message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_shop_toggle">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_website_message" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">Web Site On/Off</label>
                                    <div class="col-9 col-form-label">
                                        <!-- <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="webdesign_state" value="1" {{ isset($result['website']['webdesign_state']) && $result['website']['webdesign_state']==1 ? 'checked' : '' }}>
                                            <span></span>On</label>
                                            <label class="radio">
                                            <input type="radio" name="webdesign_state" value="0" {{ isset($result['website']['webdesign_state']) && $result['website']['webdesign_state']==0 ? 'checked' : '' }}>
                                            <span></span>Off</label>
                                        </div> -->
                                        <div class="radio-list">
                                            <label class="radio">
                                            <input type="radio" name="web_state" value="1" {{ isset($result['web_state']) && $result['web_state']==1 ? 'checked' : '' }}>
                                            <span></span>On</label>
                                            <label class="radio">
                                            <input type="radio" name="web_state" value="0" {{ isset($result['web_state']) && $result['web_state']==0 ? 'checked' : '' }}>
                                            <span></span>Off</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Message on Coming Soon Page</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <textarea class="form-control" id="website_message" name="website_message" rows="3"></textarea>
                                        <div class="alert-message" id="error_website_message"></div>
                                        <div class="row d-flex justify-content-left py-5 pl-5">
                                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_website_message">Save</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Font Color</label>
                                    <div class="col-xl-2 col-lg-2">
                                        <input type="text" id="colorpicker_comingsoon_font">
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <input type="text" class="form-control" id="colorpicker_comingsoon_font_hex" value="{{ isset($result['comingsoon_font_color']['value'])?$result['comingsoon_font_color']['value']:'#ffffff' }}">
                                    </div>
                                    <div class="row d-flex justify-content-left pt-0 pl-5">
                                        <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_comingsoon_font_color">Save</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Background Color</label>
                                    <div class="col-xl-2 col-lg-2">
                                        <input type="text" id="colorpicker_comingsoon_background">
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <input type="text" class="form-control" id="colorpicker_comingsoon_background_hex" value="{{ isset($result['comingsoon_background']['value'])?$result['comingsoon_background']['value']:'#232F3E' }}">
                                    </div>
                                    <div class="row d-flex justify-content-left pt-0 pl-5">
                                        <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_comingsoon_background">Save</a>
                                    </div>
                                </div>
                                <div class="col-xl-9 my-2">
                                    <form enctype="multipart/form-data" method="post" id="form_image_comingsoon">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="meta_key" value="background-image-comingsoon">
                                        <div class="form-group row d-dlex justify-content-left align-items-center">
                                            <div class="pr-10">Background Image on Coming Soon Page</div>
                                            <div class="image-input image-input-outline" id="kt_image_comingsoon" style="background-image: url({{ $no_image }})">
                                                <div class="image-input-wrapper" style="background-image: url({{ $img_comingsoon }});"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" id="file_image_comingsoon" name="image_comingsoon" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="image_comingsoon_remove">
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel Image">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove Image">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <div class="row d-flex justify-content-left py-5 pl-10">
                                                <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_background_comingsoon">Save</a>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_website_message">Save</a>
                        </div> -->
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_bottom_navigation" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <h4>Back to top:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="back_to_top_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="back_to_top_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_back_to_top_font">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_back_to_top_font_hex" value="{{ isset($result['bottom_navigation']['back_to_top_font_color'])?$result['bottom_navigation']['back_to_top_font_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Background Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_back_to_top_background">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_back_to_top_background_hex" value="{{ isset($result['bottom_navigation']['back_to_top_background'])?$result['bottom_navigation']['back_to_top_background']:'#37475A' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Bottom Navigation:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="bottom_nav_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="bottom_nav_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_bottom_nav_font">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_bottom_nav_font_hex" value="{{ isset($result['bottom_navigation']['bottom_nav_font_color'])?$result['bottom_navigation']['bottom_nav_font_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Background Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_bottom_nav_background">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_bottom_nav_background_hex" value="{{ isset($result['bottom_navigation']['bottom_nav_background'])?$result['bottom_navigation']['bottom_nav_background']:'#232F3E' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4>Updates Box:</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="updates_box_font_family" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="updates_box_font_size">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">px</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_updates_box_font">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_updates_box_font_hex" value="{{ isset($result['bottom_navigation']['updates_box_font_color'])?$result['bottom_navigation']['updates_box_font_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_bottom_nav">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_copyright" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Text</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <textarea class="form-control" id="copyright_text" name="copyright_text" rows="3"></textarea>
                                        <div class="alert-message" id="error_copyright_text"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Font Family</label>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" class="form-control" id="copyright_font" name="copyright_font" value="{{ isset($result['copyright']['font']) ? $result['copyright']['font'] : '' }}">
                                        <div class="alert-message" id="error_copyright_font"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Font Color</label>
                                    <div class="col-xl-2 col-lg-2">
                                        <input type="text" id="colorpicker_copyright_font">
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <input type="text" class="form-control" id="colorpicker_copyright_font_hex" value="{{ isset($result['copyright']['font_color'])?$result['copyright']['font_color']:'#ffffff' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Background Color</label>
                                    <div class="col-xl-2 col-lg-2">
                                        <input type="text" id="colorpicker_copyright_background">
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <input type="text" class="form-control" id="colorpicker_copyright_background_hex" value="{{ isset($result['copyright']['background'])?$result['copyright']['background']:'#232F3E' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_copyright">Save</a>
                        </div>
                    </div>
                    <!--end::Tab-->
                </div>
            </div>
            <!--begin::Card body-->
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('assets/plugins/custom/spectrum-colorpicker/spectrum.js') }}"></script>
<script>
var colors=@json($result['colors']);
var text=@json($result['text']);
var image_sizes=@json($result['image_sizes']);
var email=@json($result['email']);
var social=@json($result['social']);
var signup=@json($result['signup']);
var shop=@json($result['shop']);
var website=@json($result['website']);
var copyright=@json($result['copyright']);
var comingsoon_font_color=@json($result['comingsoon_font_color']);
var comingsoon_background=@json($result['comingsoon_background']);
var bottom_navigation=@json($result['bottom_navigation']);
var mobile=@json($result['mobile']);
var contact=@json($result['contact']);
jQuery(document).ready(function() {
    $('#colorpicker_background').spectrum({
        color: colors.background==null ? '#ffffff' : colors.background,
        change: function(color) { $('#colorpicker_background_hex').val(color.toHexString()); }
    });

    $('#colorpicker_footer').spectrum({
        color: colors.footer==null ? '#ffffff' : colors.footer,
        change: function(color) { $('#colorpicker_footer_hex').val(color.toHexString()); }
    });

    $('#colorpicker_topbar').spectrum({
        color: colors.topbar==null ? '#aaaaaa' : colors.topbar,
        change: function(color) { $('#colorpicker_topbar_hex').val(color.toHexString()); }
    });

    $('#colorpicker_topbar_border').spectrum({
        color: colors.topbar_border==null ? '#969494' : colors.topbar_border,
        change: function(color) { $('#colorpicker_topbar_border_hex').val(color.toHexString()); }
    });

    $('#colorpicker_sidebar').spectrum({
        color: colors.sidebar==null ? '#cccccc' : colors.sidebar,
        change: function(color) { $('#colorpicker_sidebar_hex').val(color.toHexString()); }
    });

    $('#colorpicker_sidebar_border').spectrum({
        color: colors.sidebar_border==null ? '#b5b3b3' : colors.sidebar_border,
        change: function(color) { $('#colorpicker_sidebar_border_hex').val(color.toHexString()); }
    });

    $('#colorpicker_navigationbar').spectrum({
        color: colors.navigationbar==null ? '#3699FF' : colors.navigationbar,
        change: function(color) { $('#colorpicker_navigationbar_hex').val(color.toHexString()); }
    });

    $('#colorpicker_navigationbar_border').spectrum({
        color: colors.navigationbar_border==null ? '#2f88e4' : colors.navigationbar_border,
        change: function(color) { $('#colorpicker_navigationbar_border_hex').val(color.toHexString()); }
    });

    $('#colorpicker_navigationlink').spectrum({
        color: colors.navigationlink==null ? '#181C32' : colors.navigationlink,
        change: function(color) { $('#colorpicker_navigationlink_hex').val(color.toHexString()); }
    });

    $('#colorpicker_navigationlink_hover').spectrum({
        color: colors.navigationlink_hover==null ? '#ffffff' : colors.navigationlink_hover,
        change: function(color) { $('#colorpicker_navigationlink_hover_hex').val(color.toHexString()); }
    });

    $('#colorpicker_buttons').spectrum({
        color: colors.buttons==null ? '#3699FF' : colors.buttons,
        change: function(color) { $('#colorpicker_buttons_hex').val(color.toHexString()); }
    });

    $('#colorpicker_buttons_border').spectrum({
        color: colors.buttons_border==null ? '#3699FF' : colors.buttons_border,
        change: function(color) { $('#colorpicker_buttons_border_hex').val(color.toHexString()); }
    });

    $('#colorpicker_button_text').spectrum({
        color: colors.button_text==null ? '#3699FF' : colors.button_text,
        change: function(color) { $('#colorpicker_button_text_hex').val(color.toHexString()); }
    });

    $('#colorpicker_button_text_hover').spectrum({
        color: colors.button_text_hover==null ? '#3699FF' : colors.button_text_hover,
        change: function(color) { $('#colorpicker_button_text_hover_hex').val(color.toHexString()); }
    });

    $('#colorpicker_sidelink').spectrum({
        color: colors.sidelink==null ? '#181C32' : colors.sidelink,
        change: function(color) { $('#colorpicker_sidelink_hex').val(color.toHexString()); }
    });

    $('#colorpicker_sidelink_hover').spectrum({
        color: colors.sidelink_hover==null ? '#ffffff' : colors.sidelink_hover,
        change: function(color) { $('#colorpicker_sidelink_hover_hex').val(color.toHexString()); }
    });    

    $('#colorpicker_background_hex').on('input', function(){
        $('#colorpicker_background').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_footer_hex').on('input', function(){
        $('#colorpicker_footer').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_topbar_hex').on('input', function(){
        $('#colorpicker_topbar').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_topbar_border_hex').on('input', function(){
        $('#colorpicker_topbar_border').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_sidebar_hex').on('input', function(){
        $('#colorpicker_sidebar').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_sidebar_border_hex').on('input', function(){
        $('#colorpicker_sidebar_border').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_navigationbar_hex').on('input', function(){
        $('#colorpicker_navigationbar').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_navigationbar_border_hex').on('input', function(){
        $('#colorpicker_navigationbar_border').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_navigationlink_hex').on('input', function(){
        $('#colorpicker_navigationlink').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_navigationlink_hover_hex').on('input', function(){
        $('#colorpicker_navigationlink_hover').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_buttons_hex').on('input', function(){
        $('#colorpicker_buttons').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_buttons_border_hex').on('input', function(){
        $('#colorpicker_buttons_border').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_button_text_hex').on('input', function(){
        $('#colorpicker_button_text').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_button_text_hover_hex').on('input', function(){
        $('#colorpicker_button_text_hover').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_sidebar_text').spectrum({
        color: text.sidebar_text_color==null ? '#3F4254' : text.sidebar_text_color,
        change: function(color) { $('#colorpicker_sidebar_text_hex').val(color.toHexString()); }
    });

    $('#colorpicker_sidebar_text_hex').on('input', function(){
        $('#colorpicker_sidebar_text').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_sidelink_hex').on('input', function(){
        $('#colorpicker_sidelink').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_sidelink_hover_hex').on('input', function(){
        $('#colorpicker_sidelink_hover').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_title_text').spectrum({
        color: text.title_text_color==null ? '#3F4254' : text.title_text_color,
        change: function(color) { $('#colorpicker_title_text_hex').val(color.toHexString()); }
    });

    $('#colorpicker_title_text_hex').on('input', function(){
        $('#colorpicker_title_text').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_description').spectrum({
        color: text.description_color==null ? '#3F4254' : text.description_color,
        change: function(color) { $('#colorpicker_description_hex').val(color.toHexString()); }
    });

    $('#colorpicker_description_hex').on('input', function(){
        $('#colorpicker_description').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_sidebar_link').spectrum({
        color: text.sidebar_link_color==null ? '#3F4254' : text.sidebar_link_color,
        change: function(color) { $('#colorpicker_sidebar_link_hex').val(color.toHexString()); }
    });

    $('#colorpicker_sidebar_link_hex').on('input', function(){
        $('#colorpicker_sidebar_link').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_sidebar_description').spectrum({
        color: text.sidebar_description_color==null ? '#3F4254' : text.sidebar_description_color,
        change: function(color) { $('#colorpicker_sidebar_description_hex').val(color.toHexString()); }
    });

    $('#colorpicker_sidebar_description_hex').on('input', function(){
        $('#colorpicker_sidebar_description').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_main_text').spectrum({
        color: text.main_text_color==null ? '#3F4254' : text.main_text_color,
        change: function(color) { $('#colorpicker_main_text_hex').val(color.toHexString()); }
    });

    $('#colorpicker_main_text_hex').on('input', function(){
        $('#colorpicker_main_text').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_back_to_top_font').spectrum({
        color: bottom_navigation.back_to_top_font_color==null ? '#ffffff' : bottom_navigation.back_to_top_font_color,
        change: function(color) { $('#colorpicker_back_to_top_font_hex').val(color.toHexString()); }
    });
    $('#colorpicker_back_to_top_font_hex').on('input', function(){
        $('#colorpicker_back_to_top_font').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_back_to_top_background').spectrum({
        color: bottom_navigation.back_to_top_background==null ? '#37475A' : bottom_navigation.back_to_top_background,
        change: function(color) { $('#colorpicker_back_to_top_background_hex').val(color.toHexString()); }
    });
    $('#colorpicker_back_to_top_background_hex').on('input', function(){
        $('#colorpicker_back_to_top_background').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_bottom_nav_font').spectrum({
        color: bottom_navigation.bottom_nav_font_color==null ? '#ffffff' : bottom_navigation.bottom_nav_font_color,
        change: function(color) { $('#colorpicker_bottom_nav_font_hex').val(color.toHexString()); }
    });
    $('#colorpicker_bottom_nav_font_hex').on('input', function(){
        $('#colorpicker_bottom_nav_font').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_bottom_nav_background').spectrum({
        color: bottom_navigation.bottom_nav_background==null ? '#232F3E' : bottom_navigation.bottom_nav_background,
        change: function(color) { $('#colorpicker_bottom_nav_background_hex').val(color.toHexString()); }
    });
    $('#colorpicker_bottom_nav_background_hex').on('input', function(){
        $('#colorpicker_bottom_nav_background').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_updates_box_font').spectrum({
        color: bottom_navigation.updates_box_font_color==null ? '#ffffff' : bottom_navigation.updates_box_font_color,
        change: function(color) { $('#colorpicker_updates_box_font_hex').val(color.toHexString()); }
    });
    $('#colorpicker_updates_box_font_hex').on('input', function(){
        $('#colorpicker_updates_box_font').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_copyright_font').spectrum({
        color: copyright.font_color==null ? '#ffffff' : copyright.font_color,
        change: function(color) { $('#colorpicker_copyright_font_hex').val(color.toHexString()); }
    });
    $('#colorpicker_copyright_font_hex').on('input', function(){
        $('#colorpicker_copyright_font').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_copyright_background').spectrum({
        color: copyright.background==null ? '#232F3E' : copyright.background,
        change: function(color) { $('#colorpicker_copyright_background_hex').val(color.toHexString()); }
    });
    $('#colorpicker_copyright_background_hex').on('input', function(){
        $('#colorpicker_copyright_background').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_comingsoon_font').spectrum({
        color: comingsoon_font_color.value==null ? '#ffffff' : comingsoon_font_color.value,
        change: function(color) { $('#colorpicker_comingsoon_font_hex').val(color.toHexString()); }
    });
    $('#colorpicker_comingsoon_font_hex').on('input', function(){
         $('#colorpicker_comingsoon_font').spectrum({
             color: $(this).val()
         });
    });

    $('#colorpicker_comingsoon_background').spectrum({
        color: comingsoon_background.value==null ? '#232F3E' : comingsoon_background.value,
        change: function(color) { $('#colorpicker_comingsoon_background_hex').val(color.toHexString()); }
    });
    $('#colorpicker_comingsoon_background_hex').on('input', function(){
         $('#colorpicker_comingsoon_background').spectrum({
             color: $(this).val()
         });
    });

    $('#colorpicker_toptext').spectrum({
        color: mobile.toptext_color==null ? '#3F4254' : mobile.toptext_color,
        change: function(color) { $('#colorpicker_toptext_hex').val(color.toHexString()); }
    });

    $('#colorpicker_toptext_hex').on('input', function(){
        $('#colorpicker_toptext').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_hamburger').spectrum({
        color: mobile.hamburger_color==null ? '#B1A6A4' : mobile.hamburger_color,
        change: function(color) { $('#colorpicker_hamburger_hex').val(color.toHexString()); }
    });
    $('#colorpicker_hamburger_hex').on('input', function(){
        $('#colorpicker_hamburger').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_nav_background').spectrum({
        color: mobile.nav_background_color==null ? '#B1A6A4' : mobile.nav_background_color,
        change: function(color) { $('#colorpicker_nav_background_hex').val(color.toHexString()); }
    });
    $('#colorpicker_nav_background_hex').on('input', function(){
        $('#colorpicker_nav_background').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_navbutton').spectrum({
        color: mobile.navbutton_color==null ? '#B1A6A4' : mobile.navbutton_color,
        change: function(color) { $('#colorpicker_navbutton_hex').val(color.toHexString()); }
    });
    $('#colorpicker_navbutton_hex').on('input', function(){
        $('#colorpicker_navbutton').spectrum({
            color: $(this).val()
        }); 
    });

    $('#colorpicker_navbutton_border').spectrum({
        color: mobile.navbutton_border_color==null ? '#B1A6A4' : mobile.navbutton_border_color,
        change: function(color) { $('#colorpicker_navbutton_border_hex').val(color.toHexString()); }
    }); 
    $('#colorpicker_navbutton_border_hex').on('input', function(){
        $('#colorpicker_navbutton_border').spectrum({
            color: $(this).val()
        }); 
    });

    $('#colorpicker_navbutton_font').spectrum({
        color: mobile.navbutton_font_color==null ? '#ffffff' : mobile.navbutton_font_color,
        change: function(color) { $('#colorpicker_navbutton_font_hex').val(color.toHexString()); }
    });
    $('#colorpicker_navbutton_font_hex').on('input', function(){
        $('#colorpicker_navbutton_font').spectrum({
            color: $(this).val()
        }); 
    });

    var img_sidebar = new KTImageInput('kt_image_sidebar');
    var img_topbar = new KTImageInput('kt_image_topbar');
    var img_navigationbar = new KTImageInput('kt_image_navigationbar');
    var img_comingsoon = new KTImageInput('kt_image_comingsoon');

    $('#btn_save_colors').on('click', function(e){
        e.preventDefault();

        var btn = KTUtil.getById("btn_save_colors");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'colors',
                meta_value: JSON.stringify({
                    background: $('#colorpicker_background').spectrum('get').toHexString(),
                    footer: $('#colorpicker_footer').spectrum('get').toHexString(),
                    topbar: $('#colorpicker_topbar').spectrum('get').toHexString(),
                    topbar_border: $('#colorpicker_topbar_border').spectrum('get').toHexString(),
                    sidebar: $('#colorpicker_sidebar').spectrum('get').toHexString(),
                    sidebar_border: $('#colorpicker_sidebar_border').spectrum('get').toHexString(),
                    navigationbar: $('#colorpicker_navigationbar').spectrum('get').toHexString(),
                    navigationbar_border: $('#colorpicker_navigationbar_border').spectrum('get').toHexString(),
                    navigationlink: $('#colorpicker_navigationlink').spectrum('get').toHexString(),
                    navigationlink_hover: $('#colorpicker_navigationlink_hover').spectrum('get').toHexString(),
                    buttons: $('#colorpicker_buttons').spectrum('get').toHexString(),
                    buttons_border: $('#colorpicker_buttons_border').spectrum('get').toHexString(),
                    button_text: $('#colorpicker_button_text').spectrum('get').toHexString(),
                    button_text_hover: $('#colorpicker_button_text_hover').spectrum('get').toHexString(),
                    sidelink: $('#colorpicker_sidelink').spectrum('get').toHexString(),
                    sidelink_hover: $('#colorpicker_sidelink_hover').spectrum('get').toHexString(),
                })
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#main_text_font_family').val(text.main_text_font_family);
    $('#title_font_family').val(text.title_font_family);
    $('#title_font_size').val(text.title_font_size);
    $('#title_text').val(text.title_text);
    $('#description_font_family').val(text.description_font_family);
    $('#description_font_size').val(text.description_font_size);

    $('#sidebar_text').val(text.sidebar_text);
    $('#sidebar_text_font_family').val(text.sidebar_text_font_family);
    $('#sidebar_text_font_size').val(text.sidebar_text_font_size);
    $('#sidebar_link_font_family').val(text.sidebar_link_font_family);
    $('#sidebar_description_font_family').val(text.sidebar_description_font_family);
    $('#navigation_font_family').val(text.navigation_font_family);

    $('#left_side_image_width').val(image_sizes.left_side_image_width);
    $('#left_side_image_height').val(image_sizes.left_side_image_height);
    $('#home_bottom_image_width').val(image_sizes.home_bottom_image_width);
    $('#home_bottom_image_height').val(image_sizes.home_bottom_image_height);
    $('#home_slide_image_width').val(image_sizes.home_slide_image_width);
    $('#home_slide_image_height').val(image_sizes.home_slide_image_height);
    $('#web_image_width').val(image_sizes.web_image_width);
    $('#web_image_height').val(image_sizes.web_image_height);

    $('#back_to_top_font_family').val(bottom_navigation.back_to_top_font_family);
    $('#back_to_top_font_size').val(bottom_navigation.back_to_top_font_size);
    $('#bottom_nav_font_family').val(bottom_navigation.bottom_nav_font_family);
    $('#bottom_nav_font_size').val(bottom_navigation.bottom_nav_font_size);
    $('#updates_box_font_family').val(bottom_navigation.updates_box_font_family);
    $('#updates_box_font_size').val(bottom_navigation.updates_box_font_size);

    $('#facebook').val(social.facebook);
    $('#twitter').val(social.twitter);
    $('#instagram').val(social.instagram);

    $('#toptext_font_family').val(mobile.toptext_font_family);
    $('#toptext_font_size').val(mobile.toptext_font_size);
    $('#top_text').val(mobile.top_text);
    $('#navbutton_font_family').val(mobile.navbutton_font_family);
    $('#navbutton_font_size').val(mobile.navbutton_font_size);

    $('#btn_save_text').on('click', function(e){
        e.preventDefault();

        var btn = KTUtil.getById("btn_save_text");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'text',
                meta_value: JSON.stringify({
                    main_text_font_family: $('#main_text_font_family').val(),
                    main_text_color: $('#colorpicker_main_text').spectrum('get').toHexString(),
                    title_font_family: $('#title_font_family').val(),
                    title_font_size: $('#title_font_size').val(),
                    title_text: $('#title_text').val(),
                    title_text_color: $('#colorpicker_title_text').spectrum('get').toHexString(),
                    description_font_family: $('#description_font_family').val(),
                    description_font_size: $('#description_font_size').val(),
                    description_color: $('#colorpicker_description').spectrum('get').toHexString(),
                    sidebar_text: $('#sidebar_text').val(),
                    sidebar_text_color: $('#colorpicker_sidebar_text').spectrum('get').toHexString(),
                    sidebar_text_font_family: $('#sidebar_text_font_family').val(),
                    sidebar_text_font_size: $('#sidebar_text_font_size').val(),
                    sidebar_link_font_family: $('#sidebar_link_font_family').val(),
                    sidebar_link_color: $('#colorpicker_sidebar_link').spectrum('get').toHexString(),
                    sidebar_description_font_family: $('#sidebar_description_font_family').val(),
                    sidebar_description_color: $('#colorpicker_sidebar_description').spectrum('get').toHexString(),
                    navigation_font_family: $('#navigation_font_family').val(),
                })
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_mobile').on('click', function(e){
        e.preventDefault();

        var btn = KTUtil.getById("btn_save_mobile");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'mobile',
                meta_value: JSON.stringify({
                    toptext_font_family: $('#toptext_font_family').val(),
                    toptext_font_size: $('#toptext_font_size').val(),
                    navbutton_font_family: $('#navbutton_font_family').val(),
                    navbutton_font_size: $('#navbutton_font_size').val(),
                    top_text: $('#top_text').val(),
                    toptext_color: $('#colorpicker_toptext').spectrum('get').toHexString(),
                    hamburger_color: $('#colorpicker_hamburger').spectrum('get').toHexString(),
                    nav_background_color: $('#colorpicker_nav_background').spectrum('get').toHexString(),
                    navbutton_color: $('#colorpicker_navbutton').spectrum('get').toHexString(),
                    navbutton_border_color: $('#colorpicker_navbutton_border').spectrum('get').toHexString(),
                    navbutton_font_color: $('#colorpicker_navbutton_font').spectrum('get').toHexString(),
                })
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_admin').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var email=$('#email').val();
        var new_pass=$('#new_pass').val();
        var confirm_pass=$('#confirm_pass').val();
        if(email==''){
            $('#error_email').text('Please input an email.');
            return;
        }
        if(new_pass!='' && new_pass!=confirm_pass){
            $('#error_confirm').text('The confirm password is incorrect.');
            return;
        }

        var data = null;
        if(new_pass == '') {
            data = { email: email };
        } else {
            data = {
                email: email,
                password: new_pass
            };
        }

        var btn = KTUtil.getById("btn_save_admin");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('update-admin') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                data: JSON.stringify(data)
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);

                $('#error_new').text(response.responseJSON.errors.new_pass);
			}
        });
    });

    $('#btn_save_image').on('click', function(e){
        e.preventDefault();

        var btn = KTUtil.getById("btn_save_image");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'image-sizes',
                meta_value: JSON.stringify({
                    left_side_image_width: $('#left_side_image_width').val(),
                    left_side_image_height: $('#left_side_image_height').val(),
                    home_bottom_image_width: $('#home_bottom_image_width').val(),
                    home_bottom_image_height: $('#home_bottom_image_height').val(),
                    home_slide_image_width: $('#home_slide_image_width').val(),
                    home_slide_image_height: $('#home_slide_image_height').val(),
                    web_image_width: $('#web_image_width').val(),
                    web_image_height: $('#web_image_height').val()
                })
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#email').val(email.admin);
    $('#email_dev').val(email.dev);
    $('#email_contact').val(contact.email);

    $('#btn_save_dev').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var email=$('#email_dev').val();
        var new_pass=$('#new_pass_dev').val();
        var confirm_pass=$('#confirm_pass_dev').val();
        if(email==''){
            $('#error_email_dev').text('Please input an email.');
            return;
        }
        if(new_pass!='' && new_pass!=confirm_pass){
            $('#error_confirm_dev').text('The confirm password is incorrect.');
            return;
        }

        var data = null;
        if(new_pass == '') {
            data = { email: email };
        } else {
            data = {
                email: email,
                password: new_pass
            };
        }

        var btn = KTUtil.getById("btn_save_dev");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('update-dev') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                data: JSON.stringify(data)
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_contact').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var email=$('#email_contact').val();
        if(email==''){
            $('#error_email_contact').text('Please input an email.');
            return;
        }

        var data = { email: email };

        var btn = KTUtil.getById("btn_save_contact");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('update-contact') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                data: JSON.stringify(data)
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_enable_2fa').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');
        
        var btn = KTUtil.getById("btn_enable_2fa");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('2fa.confirm') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                code: $('#verification_code').val()
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = result.message;
				showMessage(result.state=='1' ? 'success' : 'danger', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);

                $('#error_code').text(response.responseJSON.errors.code);
			}			
        });
    });

    $('#btn_disable_2fa').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');
        
        var btn = KTUtil.getById("btn_disable_2fa");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('2fa.disable') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = result.message;
				showMessage(result.state=='1' ? 'success' : 'danger', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}			
        });
    });

    $('#btn_save_logos').on('click', function(e){
        e.preventDefault();
        var btn = KTUtil.getById("btn_save_logos");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'logos',
                meta_value: JSON.stringify({
                    active: $("input[name='logo']:checked").val()
                })
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_social').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var facebook=$('#facebook').val();
        if(facebook==''){
            $('#error_facebook').text('Please input an facebook link.');
            return;
        }

        var instagram=$('#instagram').val();
        if(instagram==''){
            $('#error_instagram').text('Please input an instagram link.');
            return;
        }

        var btn = KTUtil.getById("btn_save_social");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'social',
                meta_value: JSON.stringify({
                    facebook: $('#facebook').val(),
                    twitter: $('#twitter').val(),
                    instagram: $('#instagram').val()
                }),
                email: $('#email').val()
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('.summernote').summernote({
        height: 400,
        tabsize: 2
    });

    $('#signup_message').val(signup.message);
    $('#kt_summernote').summernote('code', signup.terms_of_service);

    $('#btn_save_signup').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_signup");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'signup',
                meta_value: JSON.stringify({
                    state: $("input[name='signup_state']:checked").val(),
                    message: $('#signup_message').val(),
                    terms_of_service: $('#kt_summernote').summernote('code')
                }),
                email: $('#email').val()
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_background').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_background");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_image');
        var form_data = new FormData(form);

        $.ajax({
            url:"{{ route('save-background-image') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_background_comingsoon').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_background_comingsoon");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_image_comingsoon');
        var form_data = new FormData(form);

        $.ajax({
            url:"{{ route('save-background-image-comingsoon') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#shop_message').val(shop.message);

    $('#btn_save_shop_toggle').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_shop_toggle");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'shop',
                meta_value: JSON.stringify({
                    state: $("input[name='shop_state']:checked").val(),
                    message: $('#shop_message').val()
                }),
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#website_message').val(website.message);

    $("input[name='web_state']").on('change', function(e) {
        e.preventDefault();
        $('.alert-message').text('');


        $.ajax({
            url: "{{ route('save-second-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_value: JSON.stringify({
                    web_state: $("input[name='web_state']:checked").val()
                }),
            },
            dataType: 'json',
            success: function(result) {
                var content = { message: 'Your action is successful!' };
                showMessage('success', content);
            },
            error: function(response) {
                var content = { message: 'Your action failed!' };
                showMessage('danger', content);
            }
        });
    });

    $('#btn_save_website_message').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_website_message");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'website',
                meta_value: JSON.stringify({
                    message: $('#website_message').val(),
                    webdesign_state: "0"
                }),
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#copyright_text').val(copyright.text);

    $('#btn_save_copyright').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_copyright");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'copyright',
                meta_value: JSON.stringify({
                    text: $('#copyright_text').val(),
                    font: $('#copyright_font').val(),
                    font_color: $('#colorpicker_copyright_font').spectrum('get').toHexString(),
                    background: $('#colorpicker_copyright_background').spectrum('get').toHexString(),
                }),
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_comingsoon_background').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_comingsoon_background");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'comingsoon_background',
                meta_value: JSON.stringify({
                    value: $('#colorpicker_comingsoon_background').spectrum('get').toHexString(),
                }),
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_comingsoon_font_color').on('click', function(e){
        e.preventDefault();
        $('.alert-message').text('');

        var btn = KTUtil.getById("btn_save_comingsoon_font_color");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'comingsoon_font_color',
                meta_value: JSON.stringify({
                    value: $('#colorpicker_comingsoon_font').spectrum('get').toHexString(),
                }),
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

    $('#btn_save_bottom_nav').on('click', function(e){
        e.preventDefault();

        var btn = KTUtil.getById("btn_save_bottom_nav");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'bottom-navigation',
                meta_value: JSON.stringify({
                    back_to_top_font_family: $('#back_to_top_font_family').val(),
                    back_to_top_font_size: $('#back_to_top_font_size').val(),
                    back_to_top_font_color: $('#colorpicker_back_to_top_font').spectrum('get').toHexString(),
                    back_to_top_background: $('#colorpicker_back_to_top_background').spectrum('get').toHexString(),

                    bottom_nav_font_family: $('#bottom_nav_font_family').val(),
                    bottom_nav_font_size: $('#bottom_nav_font_size').val(),
                    bottom_nav_font_color: $('#colorpicker_bottom_nav_font').spectrum('get').toHexString(),
                    bottom_nav_background: $('#colorpicker_bottom_nav_background').spectrum('get').toHexString(),

                    updates_box_font_family: $('#updates_box_font_family').val(),
                    updates_box_font_size: $('#updates_box_font_size').val(),
                    updates_box_font_color: $('#colorpicker_updates_box_font').spectrum('get').toHexString(),
                })
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
        });
    });

});
</script>
@endsection
