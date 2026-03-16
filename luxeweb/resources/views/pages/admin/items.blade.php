{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">Left Items</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a class="btn btn-primary font-weight-bolder" id="btn_new_item">
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
                    </span>New Item</a>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-head-custom nowrap" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<!-- Add Item Modal -->
<div class="modal fade" id="modal_add_item" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content bg-radial-gradient-primary">
			<div class="modal-header">
				<h5 class="modal-title">
					<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" x="9" y="5" width="13" height="14" rx="1.5"></rect>
                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="5" height="14" rx="1"></rect>
                            </g>
                        </svg>
						<!--end::Svg Icon-->
					</span>
					<span id="modal_title" class="text-white">New Item</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close text-white"></i>
				</button>
			</div>
			<div class="modal-body bg-white">
				<form method="post" class="form pt-9" id="form_add_item" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
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
                                    <div class="alert-message" id="imageError"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control-lg form-control-solid" name="name" id="name" type="text" value="" />
                                    <div class="alert-message" id="nameError"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Link <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control-lg form-control-solid" name="link" id="link" type="text" value="" />
                                    <div class="alert-message" id="linkError"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Description <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <textarea class="form-control form-control-solid" name="description" id="description" rows="5"></textarea>                                        
                                    </div>
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

<!-- Edit Item Modal -->
<div class="modal fade" id="modal_edit_item" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content bg-radial-gradient-primary">
			<div class="modal-header">
				<h5 class="modal-title">
					<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <rect fill="#000000" x="9" y="5" width="13" height="14" rx="1.5"></rect>
                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="5" height="14" rx="1"></rect>
                            </g>
                        </svg>
						<!--end::Svg Icon-->
					</span>
					<span id="modal_title" class="text-white">Edit Item</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close text-white"></i>
				</button>
			</div>
			<div class="modal-body bg-white">
				<form method="post" class="form pt-9" id="form_edit_item" enctype="multipart/form-data">
					{{ csrf_field() }}
                    <input type="hidden" id="item_id" name="item_id">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="image-input image-input-outline image-input-empty" id="kt_image1" style="background-image: url({{ asset('assets/media/no_image.jpg') }})">
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
                                <label class="col-xl-3 col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control-lg form-control-solid" name="name" id="name1" type="text" value="" />
                                    <div class="alert-message" id="nameError1"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Link <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control-lg form-control-solid" name="link" id="link1" type="text" value="" />
                                    <div class="alert-message" id="linkError1"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Description <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <textarea class="form-control form-control-solid" name="description" id="description1" rows="5"></textarea>                                        
                                    </div>
                                    <div class="alert-message" id="descriptionError1"></div>
                                </div>
                            </div>
                        </div>						
					</div>
				</form>
			</div>
			<div class="modal-footer bg-white">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
				<button type="button" id="btn_update" class="btn btn-primary font-weight-bold">Submit</button>
			</div>
		</div>
	</div>
</div>

<!-- Delete Item Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_delete">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" id="product_id" value="">    
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-radial-gradient-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
							<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <rect fill="#000000" x="9" y="5" width="13" height="14" rx="1.5"></rect>
                                    <rect fill="#000000" opacity="0.3" x="2" y="5" width="5" height="14" rx="1"></rect>
                                </g>
                            </svg>
							<!--end::Svg Icon-->
						</span><span class="text-white">Delete Item</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
                    Do you really want to delete this item?
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
<script>
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
            url: HOST_URL+'/admin/get-items',
            type: 'GET',
            data: {
					// parameters for custom backend script demo
					columnsDef: [
						'image',
                        'name',
                        'link',
                        'short_description',
						'id'
                    ],
				}
        },
        columns: [
            {data: 'image'},
            {data: 'name'},
            {data: 'link'},
            {data: 'short_description'},
            {data: 'id', responsivePriority: -1},
        ],
        order: [[4, "desc" ]],
        columnDefs: [
            {
                targets: 0,
                orderable: false,
                render: function(data, type, full, meta) {
                    var url='';
                    if(data=='') url="{{ asset('assets/media/no_image.jpg') }}";
                    else url= "{{ asset('uploads/products') }}" + '/' + data;
                    return '<div class="d-flex align-items-center">\
                                <div class="symbol symbol-40 symbol-sm flex-shrink-0">\
                                    <img class="img-item" src="'+ url +'" alt="photo">\
                                </div>\
                            </div>';
                },
            },
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
                render: function(data, type, full, meta) {
                    return '\
                        <a href="#" class="btn btn-sm btn-clean btn-icon edit-item" title="Edit details" id="'+data+'">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-item" title="Delete" data-toggle="modal" data-target="modal_delete" id="'+data+'">\
                            <i class="la la-trash"></i>\
                        </a>\
                    ';
                },
            }
        ],
    });

    var avatar = new KTImageInput('kt_image');
    var avatar1 = new KTImageInput('kt_image1');

    $('#btn_new_item').on('click', function(e){
        e.preventDefault();
        $('#form_add_item').trigger("reset");
        $('.alert-message').text('');
        $('#modal_add_item').modal();
    });

    $('#btn_save').on('click', function(e) {
		e.preventDefault();

		var btnSave = KTUtil.getById("btn_save");
		KTUtil.btnWait(btnSave, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_add_item');
		var form_data = new FormData(form);
		
        $.ajax({
            url:"{{ route('add-item') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btnSave);
				$('#modal_add_item').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btnSave);
                $('#imageError').text(response.responseJSON.errors.image);
				$('#nameError').text(response.responseJSON.errors.name);
				$('#linkError').text(response.responseJSON.errors.link);
				$('#descriptionError').text(response.responseJSON.errors.description);				
			}
			
        });
	});

    $(document).on("click", ".edit-item", function(e) {
		e.preventDefault();
		$.ajax({
            url: "{{ route('get-item') }}",
            type: "GET",
            data: {
                item_id: $(this).attr("id")
             },
            dataType: 'json',
            success: function(result){
				$('#modal_edit_item').modal();
                var url='';
                if(result.image=='') url="{{ asset('assets/media/no_image.jpg') }}";
                else url= "{{ asset('uploads/products') }}" + '/' + result.image;
                $('#kt_image1').css('background-image', "url(" + url + ")");
				$('#item_id').val(result.id);
				$('#name1').val(result.name);
				$('#link1').val(result.link);
				$('#description1').val(result.short_description);						
            }
        });
	});

    $('#btn_update').on('click', function(e) {
		e.preventDefault();

		var btnSave = KTUtil.getById("btn_update");
		KTUtil.btnWait(btnSave, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_edit_item');
		var form_data = new FormData(form);
		
        $.ajax({
            url:"{{ route('save-item') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btnSave);
				$('#modal_edit_item').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btnSave);
				$('#nameError1').text(response.responseJSON.errors.name);
				$('#linkError1').text(response.responseJSON.errors.link);
				$('#descriptionError1').text(response.responseJSON.errors.description);				
			}
			
        });
	});

    $(document).on("click", ".delete-item", function() {
		$("#modal_delete").modal();
		var product_id=$(this).attr("id");
		$("#product_id").val(product_id);
	});

    $("#btn_delete").on("click", function(e) {
		e.preventDefault();

		var btnDelete = KTUtil.getById("btn_delete");
		KTUtil.btnWait(btnDelete, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_delete');
		var form_data = new FormData(form);
		$.ajax({
            url:"{{ route('delete-product') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btnDelete);
				$('#modal_delete').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btnDelete);
                content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
			
        });
	});
});
</script>
@endsection