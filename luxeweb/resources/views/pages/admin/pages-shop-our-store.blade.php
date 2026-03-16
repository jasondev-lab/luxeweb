{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<link href="{{ asset('assets/plugins/custom/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet" type="text/css" />
<style>
    .table td,
    .table th {
        vertical-align: middle;
    }
</style>
@endsection

{{-- Content --}}
@section('content')
@php
$buttons=$result['buttons'];
if(empty($buttons)){
$img=asset('assets/media/no_image.jpg');
}else{
$img=isset($buttons['image']) ? asset('uploads/home').'/'.$buttons['image'] : asset('assets/media/no_image.jpg');
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
                            <a class="nav-link active" data-toggle="tab" href="#kt_button">
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
                                <span class="nav-text font-size-lg">Button Style</span>
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
                <form class="form" id="kt_form" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show px-7 active" id="kt_button" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-9 my-2">
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Color</label>
                                        <div class="col-xl-2 col-lg-2">
                                            <input type="text" id="color">
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <input type="text" class="form-control" id="color_hex" value="{{ isset($result['buttons']['color']) ? $result['buttons']['color'] : '#424d55' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Font Family</label>
                                        <div class="col-xl-6 col-lg-6">
                                            <input type="text" class="form-control" id="font" name="font" value="{{ isset($result['buttons']['font']) ? $result['buttons']['font'] : '' }}">
                                            <div class="alert-message" id="error_font"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Font Color</label>
                                        <div class="col-xl-2 col-lg-2">
                                            <input type="text" id="font_color">
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <input type="text" class="form-control" id="font_color_hex" value="{{ isset($result['buttons']['font_color']) ? $result['buttons']['font_color'] : '#424d55' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Font Size</label>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="" id="font_size" name="font_size" value="{{ isset($result['buttons']['font_size']) ? $result['buttons']['font_size'] : 14 }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">px</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                                        <div class="col-9">
                                            <div class="image-input image-input-outline image-input-empty" id="kt_image" style="background-image: url({{ $img }})">
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
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Image/Color</label>
                                        <div class="col-9">
                                            <div class="radio-list">
                                                <label class="radio">
                                                    <input type="radio" name="image_color" value="1" {{ isset($result['buttons']['image_color']) && $result['buttons']['image_color']==1 ? 'checked' : '' }}>
                                                    <span></span>Image</label>
                                                <label class="radio">
                                                    <input type="radio" name="image_color" value="0" {{ isset($result['buttons']['image_color']) && $result['buttons']['image_color']==0 ? 'checked' : '' }}>
                                                    <span></span>Color</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                                </div>
                            </div>
                            <!--end::Row-->
                            <div class="separator separator-solid"></div>
                            <div class="row d-flex justify-content-center py-5">
                                <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save">Save</a>
                            </div>
                        </div>
                        <!--end::Tab-->
                    </div>
                </form>
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
    var buttons = @json($result['buttons']);
    jQuery(document).ready(function() {
        $('#color').spectrum({
            color: buttons.color == null ? '#424d55' : buttons.color,
            change: function(color) { $('#color_hex').val(color.toHexString()); }
        });

        $('#color_hex').on('input', function() {
            $('#color').spectrum({
                color: $(this).val()
            });
        });

        $('#font_color').spectrum({
            color: buttons.font_color == null ? '#ffffff' : buttons.font_color,
            change: function(color) { $('#font_color_hex').val(color.toHexString()); }
        });

        $('#font_color_hex').on('input', function() {
            $('#font_color').spectrum({
                color: $(this).val()
            });
        });

        var img = new KTImageInput('kt_image');

        $('#btn_save').on('click', function(e) {
            e.preventDefault();
            var btn = KTUtil.getById("btn_save");
            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

            var form = document.getElementById('kt_form');
            var form_data = new FormData(form);
            form_data.set('meta_key', 'shop-buttons');
            form_data.set('color', $('#color').spectrum('get').toHexString());
            form_data.set('image_color', $("input[name='image_color']:checked").val());
            form_data.set('font_color', $('#font_color').spectrum('get').toHexString());

            $.ajax({
                url: "{{ route('save-shop-buttons') }}",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(result) {
                    KTUtil.btnRelease(btn);
                    content.message = 'Your action is success!';
                    showMessage('success', content);
                },
                error: function(response) {
                    KTUtil.btnRelease(btn);
                    content.message = 'Your action is failed!';
                    showMessage('danger', content);
                }
            });
        });

    });
</script>
@endsection