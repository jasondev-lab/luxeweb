{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet" type="text/css" />
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
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Card header-->
            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_categories">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,13 C21,13.5522847 20.5522847,14 20,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L20,16 C20.5522847,16 21,16.4477153 21,17 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"></path>
                                            <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"></rect>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="nav-text font-size-lg">Categories</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_menu">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"></rect>
                                                <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Menu</span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="tab-content">
                    <!--begin::Tab-->
                    <div class="tab-pane show px-7 active" id="kt_categories" role="tabpanel">
                        <!--begin::Header-->
                        <div class="d-flex border-0 justify-content-between">
                            <h3>
                                <span class="card-label font-weight-bolder font-size-h3 text-dark">Shop Categories</span>
                            </h3>
                            <div>
                                <!--begin::Button-->
                                <a href="#" class="btn btn-primary font-weight-bolder" id="btn_new">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" cx="9" cy="15" r="6" />
                                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>New Category</a>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin: Datatable-->
                        <table class="table table-head-custom nowrap" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                        <!--end: Datatable-->
                    </div>
                    <!--end::Tab-->
                    <!--begin::Tab-->
                    <div class="tab-pane px-7" id="kt_menu" role="tabpanel">
                        <!--begin::Row-->
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-9 my-2">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Family</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <input type="text" class="form-control" id="menu_font_family" value="{{ isset($result['menu']['font_family']) ? $result['menu']['font_family'] : 'Verdana' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Font Size</label>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="" id="menu_font_size" value="{{ isset($result['menu']['font_size']) ? $result['menu']['font_size'] : '16' }}">
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
                                                <input type="text" id="colorpicker_menu_font">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_font_hex" value="{{ isset($result['menu']['font_color'])?$result['menu']['font_color']:'#f1f2ef' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Background Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_menu_bg">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_bg_hex" value="{{ isset($result['menu']['bg_color'])?$result['menu']['bg_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Open Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_menu_open">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_open_hex" value="{{ isset($result['menu']['open_color'])?$result['menu']['open_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Open BG Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_menu_open_bg">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_open_bg_hex" value="{{ isset($result['menu']['open_bg_color'])?$result['menu']['open_bg_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Hover Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_menu_hover">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_hover_hex" value="{{ isset($result['menu']['hover_color'])?$result['menu']['hover_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Hover BG Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_menu_hover_bg">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_hover_bg_hex" value="{{ isset($result['menu']['hover_bg_color'])?$result['menu']['hover_bg_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Click Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_menu_click">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_click_hex" value="{{ isset($result['menu']['click_color'])?$result['menu']['click_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-xl-4 col-lg-4 col-form-label">Click BG Color</label>
                                            <div class="col-xl-2 col-lg-2">
                                                <input type="text" id="colorpicker_menu_click_bg">
                                            </div>
                                            <div class="col-xl-4 col-lg-4">
                                                <input type="text" class="form-control" id="colorpicker_menu_click_bg_hex" value="{{ isset($result['menu']['click_bg_color'])?$result['menu']['click_bg_color']:'#ffffff' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <div class="separator separator-solid"></div>
                        <div class="row d-flex justify-content-center py-5">
                            <button type="button" class="btn btn-primary font-weight-bold px-10" id="btn_save_menu">Save</button>
                        </div>
                    </div>
                    <!--end::Tab-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<!-- Add/Edit Link Modal -->
<div class="modal fade" id="modal_category" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content bg-radial-gradient-primary">
			<div class="modal-header">
				<h5 class="modal-title">
					<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,13 C21,13.5522847 20.5522847,14 20,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L20,16 C20.5522847,16 21,16.4477153 21,17 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"></path>
                                <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"></rect>
                            </g>
                        </svg>
						<!--end::Svg Icon-->
					</span>
					<span id="modal_category_title" class="text-white">New Category</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close text-white"></i>
				</button>
			</div>
			<div class="modal-body bg-white">
				<form method="post" class="form pt-9" id="form_category">
					{{ csrf_field() }}
					<input type="hidden" name="method" id="category_method" value="add">
					<input type="hidden" name="category_id" id="category_id">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control-lg form-control-solid" name="title" id="title" type="text" value="" />
                                    <div class="alert-message" id="titleError"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Description <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="summernote" id="kt_summernote"></div>
                                    <div class="alert-message" id="descriptionError"></div>
                                </div>
                            </div>
                        </div>						
					</div>
				</form>
			</div>
			<div class="modal-footer bg-white">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
				<button type="button" id="btn_save" class="btn btn-primary font-weight-bold">Submit</button>
			</div>
		</div>
	</div>
</div>
<!-- Delete Item Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_delete">
		{{ csrf_field() }}
		<input type="hidden" name="delete_category_id" id="delete_category_id" value="">    
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-radial-gradient-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
							<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,13 C21,13.5522847 20.5522847,14 20,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L20,16 C20.5522847,16 21,16.4477153 21,17 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"></path>
                                    <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"></rect>
                                </g>
                            </svg>
							<!--end::Svg Icon-->
						</span><span class="text-white">Delete Category</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
                    Do you really want to delete this category?
				</div>
				<div class="modal-footer bg-white">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary font-weight-bold" id="btn_delete">Delete</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Mdal-->
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/spectrum-colorpicker/spectrum.js') }}"></script>
<script>
var menu=@json($result['menu']);
jQuery(document).ready(function() {
    var datatable = $('#kt_datatable');
    datatable.DataTable({
        responsive: true,
        language: {
            paginate: {
                next: '<i class="ki ki-arrow-next"></i>', // or '>'
                previous: '<i class="ki ki-arrow-back"></i>' // or '<' 
                }
        },
        "dom": 'rt<"d-flex justify-content-between"lpi>',			
        ajax: {
            url: HOST_URL+'/admin/get-categories',
            type: 'GET',
            data: {
					// parameters for custom backend script demo
					columnsDef: [
						'title',
                        'description',
						'id'
                    ],
				}
        },
        columns: [
            {data: 'title'},
            {data: 'description'},
            {data: 'id', responsivePriority: -1},
        ],
        order: [[2, "desc" ]],
        columnDefs: [
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
                render: function(data, type, full, meta) {
                    return '\
                        <a href="#" class="btn btn-sm btn-clean btn-icon edit-category" title="Edit details" id="'+data+'">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-category" title="Delete" data-toggle="modal" data-target="modal_delete" id="'+data+'">\
                            <i class="la la-trash"></i>\
                        </a>\
                    ';
                },
            }
        ],
    });

    $('#colorpicker_menu_font').spectrum({
        color: menu.font_color == null ? '#f1f2ef' : menu.font_color,
        change: function(color) { $('#colorpicker_menu_font_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_font_hex').on('input', function(){
        $('#colorpicker_menu_font').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_menu_open').spectrum({
        color: menu.open_color == null ? '#ffffff' : menu.open_color,
        change: function(color) { $('#colorpicker_menu_open_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_open_hex').on('input', function(){
        $('#colorpicker_menu_open').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_menu_hover').spectrum({
        color: menu.hover_color == null ? '#ffffff' : menu.hover_color,
        change: function(color) { $('#colorpicker_menu_hover_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_hover_hex').on('input', function(){
        $('#colorpicker_menu_hover').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_menu_click').spectrum({
        color: menu.click_color == null ? '#ffffff' : menu.click_color,
        change: function(color) { $('#colorpicker_menu_click_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_click_hex').on('input', function(){
        $('#colorpicker_menu_click').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_menu_bg').spectrum({
        color: menu.bg_color == null ? '#ffffff' : menu.bg_color,
        change: function(color) { $('#colorpicker_menu_bg_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_bg_hex').on('input', function(){
        $('#colorpicker_menu_bg').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_menu_open_bg').spectrum({
        color: menu.open_bg_color == null ? '#ffffff' : menu.open_bg_color,
        change: function(color) { $('#colorpicker_menu_open_bg_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_open_bg_hex').on('input', function(){
        $('#colorpicker_menu_open_bg').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_menu_hover_bg').spectrum({
        color: menu.hover_bg_color == null ? '#ffffff' : menu.hover_bg_color,
        change: function(color) { $('#colorpicker_menu_hover_bg_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_hover_bg_hex').on('input', function(){
        $('#colorpicker_menu_hover_bg').spectrum({
            color: $(this).val()
        });
    });

    $('#colorpicker_menu_click_bg').spectrum({
        color: menu.click_bg_color == null ? '#ffffff' : menu.click_bg_color,
        change: function(color) { $('#colorpicker_menu_click_bg_hex').val(color.toHexString()); }
    });
    $('#colorpicker_menu_click_bg_hex').on('input', function(){
        $('#colorpicker_menu_click_bg').spectrum({
            color: $(this).val()
        });
    });

    $('.summernote').summernote({
        height: 200,
        tabsize: 2
    });

    $('#btn_new').on('click', function(e){
        e.preventDefault();
        $('#form_category').trigger("reset");
        $('#modal_category_title').text('New Category');
        $('#kt_summernote').summernote('code', '');
        $('.alert-message').text('');
        $('#modal_category').modal();
    });

    $('#btn_save').on('click', function(e) {
		e.preventDefault();

		var btnSave = KTUtil.getById("btn_save");
		KTUtil.btnWait(btnSave, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_category');
		var form_data = new FormData(form);

        form_data.set('description', $('#kt_summernote').summernote('code'));
		
        $.ajax({
            url:"{{ route('save-category') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btnSave);
				$('#modal_category').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btnSave);
				$('#titleError').text(response.responseJSON.errors.title);
				$('#descriptionError').text(response.responseJSON.errors.description);				
			}
			
        });
	});

    $(document).on("click", ".edit-category", function(e) {
        e.preventDefault();
		$.ajax({
            url: "{{ route('get-category') }}",
            type: "GET",
            data: {
                category_id: $(this).attr("id")
             },
            dataType: 'json',
            success: function(result){
				$('#modal_category').modal();
				$('#category_method').val('edit');
				$('#category_id').val(result.id);
				$('#modal_category_title').text('Edit category');
				$('#title').val(result.title);
				$('#kt_summernote').summernote('code', result.description);										
            }
        });
	});


    $(document).on("click", ".delete-category", function() {
		$("#modal_delete").modal();
		var category_id=$(this).attr("id");
		$("#delete_category_id").val(category_id);
	});

    $("#btn_delete").on("click", function(e) {
		e.preventDefault();

		var btnDelete = KTUtil.getById("btn_delete");
		KTUtil.btnWait(btnDelete, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_delete');
		var form_data = new FormData(form);
		$.ajax({
            url:"{{ route('delete-category') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btnDelete);
				$('#modal_delete').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your acrion is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btnDelete);
                content.message = 'Your acrion is failed!';
				showMessage('danger', content);
			}
			
        });
	});

    $('#btn_save_menu').on('click', function(e){
        e.preventDefault();

        var btn = KTUtil.getById("btn_save_menu");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-setting') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'menu',
                meta_value: JSON.stringify({
                    font_family: $('#menu_font_family').val(),
                    font_size: $('#menu_font_size').val(),
                    font_color: $('#colorpicker_menu_font').spectrum('get').toHexString(),
                    open_color: $('#colorpicker_menu_open').spectrum('get').toHexString(),
                    hover_color: $('#colorpicker_menu_hover').spectrum('get').toHexString(),
                    click_color: $('#colorpicker_menu_click').spectrum('get').toHexString(),
                    bg_color: $('#colorpicker_menu_bg').spectrum('get').toHexString(),
                    open_bg_color: $('#colorpicker_menu_open_bg').spectrum('get').toHexString(),
                    hover_bg_color: $('#colorpicker_menu_hover_bg').spectrum('get').toHexString(),
                    click_bg_color: $('#colorpicker_menu_click_bg').spectrum('get').toHexString(),
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