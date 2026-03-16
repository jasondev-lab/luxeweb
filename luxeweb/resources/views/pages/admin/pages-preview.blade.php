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
@php
$preview=empty($result['meta_value']) ? [] : $result['meta_value'];
$img=isset($preview['logo']) ? asset('uploads/home').'/'.$preview['logo'] : asset('assets/media/no_image.jpg');
@endphp
{{-- Content --}}
@section('content')
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
                            <a class="nav-link active" data-toggle="tab" href="#kt_description">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Settings</span>
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
                        <div class="tab-pane show px-7 active" id="kt_description" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-9 my-2">
                                    <!--begin::Group-->
                                    <h4 class="mb-4">Logo:</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Width</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="" id="logo_width" value="{{ isset($preview['logo_width']) ? $preview['logo_width'] : 800 }}">
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
                                                        <input type="number" class="form-control" placeholder="" id="logo_height" value="{{ isset($preview['logo_height']) ? $preview['logo_height'] : 300 }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Background Color</label>
                                                <div class="col-xl-2 col-lg-2">
                                                    <input type="text" id="colorpicker_background">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="form-control" id="colorpicker_background_hex" value="{{ isset($preview['background_color']) ? $preview['background_color']:'#ffffff' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Logo Style</label>
                                                <div class="col-xl-8 col-lg-8">
                                                    <div class="radio-list">
                                                        <label class="radio">
                                                        <input type="radio" name="logo" value="1" {{ isset($preview['logo']) && $preview['logo']==1 ? 'checked' : '' }}>
                                                        <span></span>Facets Logo</label>
                                                        <label class="radio">
                                                        <input type="radio" name="logo" value="2" {{ isset($preview['logo']) && $preview['logo']==2 ? 'checked' : '' }}>
                                                        <span></span>Facets Vintage Logo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider-simple"></div>
                                    <h4 class="mb-4">Text:</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control" id="text_font" value="{{ isset($preview['text_font']) ? $preview['text_font'] : 'Peignot' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="" id="text_size" value="{{ isset($preview['text_size']) ? $preview['text_size'] : 100 }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Color</label>
                                                <div class="col-xl-2 col-lg-2">
                                                    <input type="text" id="colorpicker_text">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="form-control" id="colorpicker_text_hex" value="{{ isset($preview['text_color']) ? $preview['text_color'] : '#000000' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider-simple"></div>
                                    <h4 class="mb-4">Line:</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                                <div class="col-xl-2 col-lg-2">
                                                    <input type="text" id="colorpicker_line">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="form-control" id="colorpicker_line_hex" value="{{ isset($preview['line_color']) ? $preview['line_color'] : '#000000' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Width</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="" id="line_width" value="{{ isset($preview['line_width']) ? $preview['line_width'] : 2 }}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider-simple"></div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Speed</label>
                                        <div class="col-9">
                                            <div class="ion-range-slider">
                                                <input type="hidden" id="kt_slider" value="{{ isset($preview['speed']) ? $preview['speed'] : 50 }}" />
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

jQuery(document).ready(function() {
    var preview=@json($preview);

    $('#colorpicker_background').spectrum({
        color: preview.background_color==null ? '#ffffff' : preview.background_color
    });

    $('#colorpicker_background_hex').on('input', function(){
        $('#colorpicker_background').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_text').spectrum({
        color: preview.text_color==null ? '#000000' : preview.text_color
    });

    $('#colorpicker_text_hex').on('input', function(){
        $('#colorpicker_text').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_line').spectrum({
        color: preview.line_color==null ? '#000000' : preview.line_color
    });

    $('#colorpicker_line_hex').on('input', function(){
        $('#colorpicker_line').spectrum({
            color: $(this).val()
        });
    });

    $('#kt_slider').ionRangeSlider({
        min: 10,
        max: 2000,
        from: preview.speed==null ? 50 : preview.speed
    });

    $('#btn_save').on('click', function(e){
        e.preventDefault();
        var btn = KTUtil.getById("btn_save");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('kt_form');
        var form_data = new FormData(form);
        form_data.set('logo_width', $('#logo_width').val());
        form_data.set('logo_height', $('#logo_height').val());
        form_data.set('background_color', $('#colorpicker_background').spectrum('get').toHexString());
        form_data.set('text_color', $('#colorpicker_text').spectrum('get').toHexString());
        form_data.set('text_font', $('#text_font').val());
        form_data.set('text_size', $('#text_size').val());
        form_data.set('line_color', $('#colorpicker_line').spectrum('get').toHexString());
        form_data.set('line_width', $('#line_width').val());
        form_data.set('speed', $('#kt_slider').val());
        form_data.set('logo', $("input[name='logo']:checked").val());
        
        $.ajax({
            url:"{{ route('save-preview') }}",
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
    
});
</script>
@endsection