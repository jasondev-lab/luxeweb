{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<style>
.table td, .table th {
    vertical-align: middle;
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
                                        <label class="col-xl-3 col-lg-3 col-form-label">Title</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Description 1</label>
                                        <div class="col-9">
                                            <div class="summernote" id="kt_summernote1"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Description 2</label>
                                        <div class="col-9">
                                            <div class="summernote" id="kt_summernote2"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Description 3</label>
                                        <div class="col-9">
                                            <div class="summernote" id="kt_summernote3"></div>
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
<script>
var result=@json($result);
jQuery(document).ready(function() {
    $('.summernote').summernote({
        height: 300,
        tabsize: 2
    });

    $('#title').val(result.description.title);
    $('#kt_summernote1').summernote('code', result.description.block1);
    $('#kt_summernote2').summernote('code', result.description.block2);
    $('#kt_summernote3').summernote('code', result.description.block3);

    $('#btn_save_description').on('click', function(e){
        e.preventDefault();
        var btn = KTUtil.getById("btn_save_description");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-description') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'policies-description',
                meta_value: JSON.stringify({ 
                    title:$('#title').val(),
                    block1:$('#kt_summernote1').summernote('code'),
                    block2:$('#kt_summernote2').summernote('code'),
                    block3:$('#kt_summernote3').summernote('code')
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