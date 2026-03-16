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
                                                <path d="M3,19 L5,19 L5,21 L3,21 L3,19 Z M8,19 L10,19 L10,21 L8,21 L8,19 Z M13,19 L15,19 L15,21 L13,21 L13,19 Z M18,19 L20,19 L20,21 L18,21 L18,19 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M10.504,3.256 L12.466,3.256 L17.956,16 L15.364,16 L14.176,13.084 L8.65000004,13.084 L7.49800004,16 L4.96000004,16 L10.504,3.256 Z M13.384,11.14 L11.422,5.956 L9.42400004,11.14 L13.384,11.14 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Description</span>
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
                <form class="form" id="kt_form">
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show px-7 active" id="kt_description" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-9 my-2">
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <h4 class="col-xl-3 col-lg-3 d-flex align-items-center">Title:</h4>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="title" value="">
                                        </div>
                                    </div>
                                    <div class="divider-simple"></div>
                                    <h4 class="mb-4">Title Font:</h4>
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
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Color</label>
                                                <div class="col-xl-2 col-lg-2">
                                                    <input type="text" id="colorpicker_title">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="form-control" id="colorpicker_title_hex" value="{{ isset($result['title_color'])?$result['title_color']:'#000000' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider-simple"></div>
                                    <h4 class="mb-4">Title Font(Mobile):</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control" id="title_font_family_mobile" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="" id="title_font_size_mobile">
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
                                                    <input type="text" id="colorpicker_title_mobile">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="form-control" id="colorpicker_title_mobile_hex" value="{{ isset($result['title_color_mobile'])?$result['title_color_mobile']:'#000000' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider-simple"></div>
                                    <h4 class="mb-4">Form Text Font:</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control" id="formtext_font_family" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="" id="formtext_font_size">
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
                                                    <input type="text" id="colorpicker_formtext">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="form-control" id="colorpicker_formtext_hex" value="{{ isset($result['formtext_color'])?$result['formtext_color']:'#000000' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider-simple"></div>
                                    <h4 class="mb-4">Form Text Font(Mobile):</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <input type="text" class="form-control" id="formtext_font_family_mobile" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="" id="formtext_font_size_mobile">
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
                                                    <input type="text" id="colorpicker_formtext_mobile">
                                                </div>
                                                <div class="col-xl-4 col-lg-4">
                                                    <input type="text" class="form-control" id="colorpicker_formtext_mobile_hex" value="{{ isset($result['formtext_color_mobile'])?$result['formtext_color_mobile']:'#000000' }}">
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
                                <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_description">Save</a>
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
var result=@json($result);
jQuery(document).ready(function() {
    $('.summernote').summernote({
        height: 300,
        tabsize: 2
    });

    $('#title').val(result.title);
    $('#title_font_family').val(result.title_font_family);
    $('#title_font_size').val(result.title_font_size);
    $('#title_font_family_mobile').val(result.title_font_family_mobile);
    $('#title_font_size_mobile').val(result.title_font_size_mobile);
    $('#formtext_font_family').val(result.formtext_font_family);
    $('#formtext_font_size').val(result.formtext_font_size);
    $('#formtext_font_family_mobile').val(result.formtext_font_family_mobile);
    $('#formtext_font_size_mobile').val(result.formtext_font_size_mobile);

    $('#colorpicker_title').spectrum({
        color: result.title_color==null ? '#000000' : result.title_color,
        change: function(color) { $('#colorpicker_title_hex').val(color.toHexString()); }
    });

    $('#colorpicker_title_hex').on('input', function(){
        $('#colorpicker_title').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_title_mobile').spectrum({
        color: result.title_color_mobile==null ? '#000000' : result.title_color_mobile,
        change: function(color) { $('#colorpicker_title_mobile_hex').val(color.toHexString()); }
    });

    $('#colorpicker_title_mobile_hex').on('input', function(){
        $('#colorpicker_title_mobile').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_formtext').spectrum({
        color: result.formtext_color==null ? '#000000' : result.formtext_color,
        change: function(color) { $('#colorpicker_formtext_hex').val(color.toHexString()); }
    });

    $('#colorpicker_formtext_hex').on('input', function(){
        $('#colorpicker_formtext').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_formtext_mobile').spectrum({
        color: result.formtext_color_mobile==null ? '#000000' : result.formtext_color_mobile,
        change: function(color) { $('#colorpicker_formtext_mobile_hex').val(color.toHexString()); }
    });
    
    $('#colorpicker_formtext_mobile_hex').on('input', function(){
        $('#colorpicker_formtext_mobile').spectrum({
            color: $(this).val()
        });
    });

    $('#btn_save_description').on('click', function(e){
        e.preventDefault();
        var btn = KTUtil.getById("btn_save_description");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-description') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'contact-description',
                meta_value: JSON.stringify({ 
                    title: $('#title').val(),
                    title_font_family: $('#title_font_family').val(),
                    title_font_size: $('#title_font_size').val(),
                    title_color: $('#colorpicker_title').spectrum('get').toHexString(), 
                    title_font_family_mobile: $('#title_font_family_mobile').val(),
                    title_font_size_mobile: $('#title_font_size_mobile').val(),
                    title_color_mobile: $('#colorpicker_title_mobile').spectrum('get').toHexString(),
                    formtext_font_family: $('#formtext_font_family').val(),
                    formtext_font_size: $('#formtext_font_size').val(),
                    formtext_color: $('#colorpicker_formtext').spectrum('get').toHexString(),
                    formtext_font_family_mobile: $('#formtext_font_family_mobile').val(),
                    formtext_font_size_mobile: $('#formtext_font_size_mobile').val(),
                    formtext_color_mobile: $('#colorpicker_formtext_mobile').spectrum('get').toHexString(),
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