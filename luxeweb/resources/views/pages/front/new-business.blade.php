{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<!--begin::Page Custom Styles(used by this page)-->
<link href="{{ asset('assets/css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles-->
<style>
.table td, .table th {
    vertical-align: middle;
}
</style>
@endsection

{{-- Content --}}
@section('content')
@php
$colors=$home['colors']['meta_value'];
@endphp
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">New Business</h1>
</div>
<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
    <div class="col-xl-12 col-xxl-9">   
        <!--begin::Card-->
        <div class="card card-custom gutter-b custom-background">
            <!--begin::Body-->
            <div class="card-body p-0">
                <!--begin::Wizard-->
                <div class="wizard wizard-1" id="kt_business_add" data-wizard-state="step-first" data-wizard-clickable="true">
                    <!--begin::Wizard Nav-->
                    <div class="wizard-nav border-bottom">
                        <div class="wizard-steps p-8 p-lg-10">
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <span class="svg-icon svg-icon-4x wizard-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <h3 class="wizard-title">1. Business Information</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <span class="svg-icon svg-icon-4x wizard-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <h3 class="wizard-title">2. Contact Information</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <span class="svg-icon svg-icon-4x wizard-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
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
                                    <h3 class="wizard-title">3. Business Images</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <span class="svg-icon svg-icon-4x wizard-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <h3 class="wizard-title">4. Review and Submit</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow last">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--end::Wizard Nav-->
                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-9">
                            <!--begin::Form Wizard Form-->
                            <form class="form" id="kt_business_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <input type="hidden" name="dealer_id" value="{{ Auth::check() ? Auth::user()->id : 0 }}">
                                <!--begin::Form Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h3 class="mb-10 font-weight-bold text-dark">Business Details:</h3>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-vcard"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="name" value="" placeholder="Business Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">State <span class="text-danger">*</span></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <select class="form-control state" name="state">
                                                        <option label="Label"></option>
                                                        <option value="Alabama">Alabama</option>
                                                        <option value="Alaska">Alaska</option>            
                                                        <option value="Arizona">Arizona</option>
                                                        <option value="Arkansas">Arkansas</option>
                                                        <option value="California">California</option>
                                                        <option value="Colorado">Colorado</option>            
                                                        <option value="Connecticut">Connecticut</option>
                                                        <option value="Delaware">Delaware</option>
                                                        <option value="Florida">Florida</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Hawaii">Hawaii</option>
                                                        <option value="Idaho">Idaho</option>
                                                        <option value="Illinois">Illinois</option>
                                                        <option value="Indiana">Indiana</option>
                                                        <option value="Iowa">Iowa</option>            
                                                        <option value="Kansas">Kansas</option>
                                                        <option value="Kentucky">Kentucky</option>
                                                        <option value="Louisiana">Louisiana</option>
                                                        <option value="Maine">Maine</option>
                                                        <option value="Maryland">Maryland</option>
                                                        <option value="Massachusetts">Massachusetts</option>
                                                        <option value="Michigan">Michigan</option>
                                                        <option value="Minnesota">Minnesota</option>
                                                        <option value="Mississippi">Mississippi</option>
                                                        <option value="Missouri">Missouri</option>
                                                        <option value="Montana">Oklahoma</option>
                                                        <option value="Nebraska">South Dakota</option>
                                                        <option value="Nevada">Texas</option>
                                                        <option value="New Hampshire">Tennessee</option>
                                                        <option value="New Jersey">Wisconsin</option>            
                                                        <option value="New Mexico">New Mexico</option>
                                                        <option value="New York">New York</option>
                                                        <option value="North Carolina">North Carolina</option>
                                                        <option value="North Dakota">North Dakota</option>
                                                        <option value="Ohio">Ohio</option>
                                                        <option value="Oklahoma">Oklahoma</option>
                                                        <option value="Oregon">Oregon</option>
                                                        <option value="Pennsylvania">Pennsylvania</option>
                                                        <option value="Rhode Island">Rhode Island</option>
                                                        <option value="South Carolina">South Carolina</option>
                                                        <option value="South Dakota">South Dakota</option>
                                                        <option value="Tennessee">Tennessee</option>
                                                        <option value="Texas">Texas</option>
                                                        <option value="Utah">Utah</option>
                                                        <option value="Vermont">Vermont</option>
                                                        <option value="Virginia">Virginia</option>
                                                        <option value="Washington">Washington</option>
                                                        <option value="West Virginia">West Virginia</option>
                                                        <option value="Wisconsin">Wisconsin</option>
                                                        <option value="Wyoming">Wyoming</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Business Card</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="image-input image-input-outline image-input-empty" id="kt_card" style="background-image: url({{ asset('assets/media/no_image.jpg') }})">
                                                        <div class="image-input-wrapper" id="card_img" style="background-image: none;"></div>
                                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="card" accept=".png, .jpg, .jpeg">
                                                            <input type="hidden" name="card_remove" value="1">
                                                        </label>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Business Hours</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-clock"></i>
                                                            </span>
                                                        </div>
                                                        <input type="number" class="form-control form-control-lg form-control-solid" name="hours" value="" placeholder="Business Hours">
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                    <textarea class="form-control form-control-solid" name="description" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Keywords</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input id="tagify_keywords" class="form-control form-control-lg form-control-solid tagify" placeholder="Keywords" value='' autofocus="" data-blacklist='' />
                                                    <input type="hidden" name='keywords' id="keywords">
                                                    <div class="mt-3 text-muted">Input any keyword and click enter key.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form Wizard Step 1-->
                                <!--begin::Form Wizard Step 2-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h3 class="mb-10 font-weight-bold text-dark">Contact Details:</h3>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Brick and Mortar Address <span class="text-danger">*</span></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-address-book"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="address" value="" placeholder="Brick and Mortar Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Website Address</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-link"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="web_address" value="" placeholder="Website Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Phone Number <span class="text-danger">*</span></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="phone_number" value="" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Facebook</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-facebook"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="facebook" value="" placeholder="Facebook Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Twitter</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-twitter"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="twitter" value="" placeholder="Twitter Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Instagram</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-instagram"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="instagram" value="" placeholder="Instagram Link">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form Wizard Step 2-->
                                <!--begin::Form Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <input type="hidden" name="images" id="images">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="d-flex justify-content-end">
                                                <a href="#" class="btn btn-pill font-weight-bolder custom-button" id="btn_new_image">
                                                <span class="svg-icon svg-icon-md">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"></rect>
                                                            <polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"></polygon>
                                                            <polygon fill="#000000" points="11 20 15.5 14 20 20"></polygon>
                                                            <circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"></circle>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>New Image</a>
                                            </div>
                                            <table class="table" id="table_images">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                            <div style="text-align: center;" id="no_images">No images</div>                                            
                                        </div>
                                    </div>
                                </div>
                                <!--end::Form Wizard Step 3-->
                                <!--begin::Form Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold">Review Business Details and Submit</h4>
                                    <h6 class="font-weight-bold mb-3">Business Details:</h6>
                                    <table class="w-100">
                                        <tr>
                                            <td class="font-weight-bold text-muted">Name:</td>
                                            <td class="font-weight-bold text-right" id="name"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">State:</td>
                                            <td class="font-weight-bold text-right" id="state"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Business Card:</td>
                                            <td class="font-weight-bold text-right" id="card">
                                                <div class="image-input image-input-outline image-input-empty" style="background-image: url({{ asset('assets/media/no_image.jpg') }})">
                                                    <div class="image-input-wrapper" id="summary_card" style="background-image: none;"></div>                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Business Hours:</td>
                                            <td class="font-weight-bold text-right" id="hours"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Description:</td>
                                            <td class="font-weight-bold text-right" id="description"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Keywords:</td>
                                            <td class="font-weight-bold text-right" id="summary_keywords"></td>
                                        </tr>
                                    </table>
                                    <div class="separator separator-dashed my-5"></div>
                                    <h6 class="font-weight-bold mb-3">Contact Details:</h6>
                                    <table class="w-100">
                                        <tr>
                                            <td class="font-weight-bold text-muted">Brick and Mortar Address:</td>
                                            <td class="font-weight-bold text-right" id="address"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Website Address:</td>
                                            <td class="font-weight-bold text-right" id="web_address"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Phone Number:</td>
                                            <td class="font-weight-bold text-right" id="phone"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Facebook:</td>
                                            <td class="font-weight-bold text-right" id="facebook"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Twitter:</td>
                                            <td class="font-weight-bold text-right" id="twitter"></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-muted">Instagram:</td>
                                            <td class="font-weight-bold text-right" id="instagram"></td>
                                        </tr>
                                    </table>
                                    <div class="separator separator-dashed my-5"></div>
                                    <h6 class="font-weight-bold mb-3">Business Images:</h6>
                                    <div class="row" id="block_images">

                                    </div>                                   
                                </div>
                                <!--end::Form Wizard Step 4-->
                                <!--begin::Wizard Actions-->
                                <div class="d-flex justify-content-between border-top pt-10">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-pill font-weight-bolder px-9 py-4 custom-button" data-wizard-type="action-prev">Previous</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-pill font-weight-bolder px-9 py-4 custom-button" data-wizard-type="action-submit" id="btn_submit">Submit</button>
                                        <button type="button" class="btn btn-pill font-weight-bolder px-9 py-4 custom-button" data-wizard-type="action-next">Next Step</button>
                                    </div>
                                </div>
                                <!--end::Wizard Actions-->
                            </form>
                            <!--end::Form Wizard Form-->
                        </div>
                    </div>
                    <!--end::Wizard Body-->
                </div>
                <!--end::Wizard-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
</div>

<div class="modal fade" id="modal_new_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" id="form_image">
                    {{ csrf_field() }}
                    <div class="form-group row d-dlex justify-content-center">
                        <div class="image-input image-input-outline image-input-empty" id="kt_image" style="background-image: url({{ asset('assets/media/no_image.jpg') }})">
                            <div class="image-input-wrapper" style="background-image: none;"></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" id="file_image" name="image" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="image_remove" value="1">
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel Image">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove Image">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                    </div>
                    <div class="alert-message" id="imageError" style="text-align: center;"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn font-weight-bold custom-button" data-dismiss="modal">Close</button>
                <button type="button" class="btn font-weight-bold custom-button" id="btn_save_image">Upload</button>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
var tagify;
var KTTagify = function() {
    // Private functions
    var main = function() {
		var input = document.getElementById('tagify_keywords');
		var tags=new Array();	
		
        // init Tagify script on the above inputs
        tagify = new Tagify(input, {
            whitelist: tags,
            blacklist: [], // <-- passed as an attribute in this demo
        })

        // "remove all tags" button event listener
        //document.getElementById('btn_add').addEventListener('click', tagify.removeAllTags.bind(tagify));

        // Chainable event listeners
        tagify.on('add', onAddTag)
            .on('remove', onRemoveTag)
            .on('input', onInput)
            .on('edit', onTagEdit)
            .on('invalid', onInvalidTag)
            .on('click', onTagClick)
            .on('dropdown:show', onDropdownShow)
            .on('dropdown:hide', onDropdownHide)

        // tag added callback
        function onAddTag(e) {

            console.log("onAddTag: ", e.detail);
            console.log("original input value: ", input.value)
            tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
        }

        // tag remvoed callback
        function onRemoveTag(e) {
            console.log(e.detail);
            console.log("tagify instance value:", tagify.value)
        }

        // on character(s) added/removed (user is typing/deleting)
        function onInput(e) {
            console.log(e.detail);
            console.log("onInput: ", e.detail);
        }

        function onTagEdit(e) {
            console.log("onTagEdit: ", e.detail);
        }

        // invalid tag added callback
        function onInvalidTag(e) {
            console.log("onInvalidTag: ", e.detail);
        }

        // invalid tag added callback
        function onTagClick(e) {
            console.log(e.detail);
            console.log("onTagClick: ", e.detail);
        }

        function onDropdownShow(e) {
            console.log("onDropdownShow: ", e.detail)
        }

        function onDropdownHide(e) {
            console.log("onDropdownHide: ", e.detail)
        }
    }
         
    return {
        // public functions
        init: function() {
            main();
        }
    };
}();

// Class definition
var KTContactsAdd = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _avatar;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());
                        procReview(wizard.getStep());
						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});
		
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/

		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Name is required'
							}
						}
					},
                    category: {
						validators: {
							notEmpty: {
								message: 'Please select a category'
							}
						}
					},
                    state: {
						validators: {
							notEmpty: {
								message: 'Please select a state'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// Step 2
                    address: {
						validators: {
							notEmpty: {
								message: 'Brick and Mortar Address is required'
							}
						}
					},
					phone_number: {
						validators: {
							notEmpty: {
								message: 'Phone number is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
        
        // Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// Step 3
                    /*address: {
						validators: {
							notEmpty: {
								message: 'Brick and Mortar Address is required'
							}
						}
					},
					phone_number: {
						validators: {
							notEmpty: {
								message: 'Phone number is required'
							}
						}
					}*/
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));		
	}

	var _initAvatar = function () {
		_avatar = new KTImageInput('kt_image');
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_business_add');
			_formEl = KTUtil.getById('kt_business_form');

			_initWizard();
			_initValidation();
			_initAvatar();
		}
	};
}();

var avatar;
var images=[];
jQuery(document).ready(function() {
    KTContactsAdd.init();
    KTTagify.init();

    avatar = new KTImageInput('kt_card');

    $('.state').select2({
        placeholder: 'Select a state'
    });

    $('#btn_new_image').on('click', function(e){
        e.preventDefault();
        $('#file_image').val('');
		$('#kt_image .image-input-wrapper').css('background-image', 'none');
		var url="{{ asset('assets/media/no_image.jpg') }}";
		$('#kt_image').css('background-image', "url(" + url + ")");
        $('#modal_new_image').modal('show');
    });

    $('#btn_save_image').on('click', function(e) {
		e.preventDefault();
		var btn = KTUtil.getById("btn_save_image");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_image');
		var form_data = new FormData(form);
		
        $.ajax({
            url:"{{ route('upload-business-image') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btn);
                $('#form_image').trigger("reset");
				$('#modal_new_image').modal('hide');
                
                images.push(result.image);
                console.log(images);
                var html='';
                for(var i=0; i<images.length; i++){
                    html+='<tr id="row'+(i+1)+'">\
                                <th scope="row">'+(i+1)+'</th>\
                                <td>\
                                    <img src="'+HOST_URL+'/uploads/businesses/'+images[i]+'" class="w-100px h-100px">\
                                </td>\
                                <td>\
                                    <a href="#" class="btn btn-sm btn-clean btn-icon delete-image" value="'+(i+1)+'" title="Delete">\
                                        <span class="svg-icon svg-icon-md">\
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                    <rect x="0" y="0" width="24" height="24"></rect>\
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>\
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>\
                                                </g>\
                                            </svg>\
                                        </span>\
                                    </a>\
                                </td>\
                            </tr>';                    
                }

                $('#table_images tbody').html(html);
                if(images.length==0){
                    $('#no_images').show();
                }else{
                    $('#no_images').hide();
                }
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                $('#imageError').text(response.responseJSON.errors.image);
				
			}
			
        });
	});

    $(document).on('click', '.delete-image', function(e){
        e.preventDefault();
        var idx=$(this).attr('value');
        $('#row'+idx).remove();
        images.splice(idx-1, 1);
        if(images.length==0){
            $('#no_images').show();
        }else{
            $('#no_images').hide();
        }      
    });

    $('#btn_submit').on('click', function(e) {
		e.preventDefault();
		var btn = KTUtil.getById("btn_submit");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

        $('#images').val(JSON.stringify(images));

        var form = document.getElementById('kt_business_form');
		var form_data = new FormData(form);
		
        $.ajax({
            url:"{{ route('add-business') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btn);
                console.log(result.state);
                swal.fire({
                    text: "Congratulations! Your ad will reviewed and approved with 24 hours.",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function() {
                   location.href="{{ route('dealer-directory') }}";
                });
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);			
			}
			
        });      
	});
    
});

function procReview(step){
    if(step==2){
        $('#name').text($("input[name=name]").val());
        $('#state').text($("select[name=state]").val());
        if($("input[name=card]").val()!=''){
            $('#summary_card').css('background-image', $('#card_img').css('background-image'));
        }
        $('#hours').text($("input[name=hours]").val());
        $('#description').text($("textarea[name=description]").val());
        var keywords=[];
        var text='';
        for(var keyword of tagify.value){
            keywords.push(keyword.value);
            text+=keyword.value+', ';
        }
        $('#keywords').val(JSON.stringify(keywords));
        $('#summary_keywords').text(text);            
    }else if(step==3){
        $('#address').text($("input[name=address]").val());
        $('#web_address').text($("input[name=web_address]").val());
        $('#phone').text($("input[name=phone_number]").val());
        $('#facebook').text($("input[name=facebook]").val());
        $('#twitter').text($("input[name=twitter]").val());
        $('#instagram').text($("input[name=instagram]").val());
    }else if(step==4){
        var html='';
        for(var img of images){
            var url="{{ asset('uploads/businesses') }}" + '/' + img;
            html+='<div class="col-sm-6 col-md-3 mb-3"><img src="'+url+'" alt="" class="fluid img-thumbnail"></div>';
        }
        $('#block_images').html(html);
    }
}

</script>
@endsection