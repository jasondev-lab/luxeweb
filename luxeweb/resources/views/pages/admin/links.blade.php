{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
.alert-message {
    color: red;
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
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">Links</span>
                </h3>
                <div class="card-toolbar">
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
                    </span>New Link</a>
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
                            <th>Title</th>
                            <th>Link</th>
                            <th>Description</th>
                            <th>eBay Link</th>
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
<!-- Add/Edit Link Modal -->
<div class="modal fade" id="modal_link" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content bg-radial-gradient-primary">
			<div class="modal-header">
				<h5 class="modal-title">
					<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M7,11 L15,11 C16.1045695,11 17,10.1045695 17,9 L17,8 L19,8 L19,9 C19,11.209139 17.209139,13 15,13 L7,13 L7,15 C7,15.5522847 6.55228475,16 6,16 C5.44771525,16 5,15.5522847 5,15 L5,9 C5,8.44771525 5.44771525,8 6,8 C6.55228475,8 7,8.44771525 7,9 L7,11 Z" fill="#000000" opacity="0.3"></path>
                                <path d="M6,21 C7.1045695,21 8,20.1045695 8,19 C8,17.8954305 7.1045695,17 6,17 C4.8954305,17 4,17.8954305 4,19 C4,20.1045695 4.8954305,21 6,21 Z M6,23 C3.790861,23 2,21.209139 2,19 C2,16.790861 3.790861,15 6,15 C8.209139,15 10,16.790861 10,19 C10,21.209139 8.209139,23 6,23 Z" fill="#000000" fill-rule="nonzero"></path>
                                <path d="M18,7 C19.1045695,7 20,6.1045695 20,5 C20,3.8954305 19.1045695,3 18,3 C16.8954305,3 16,3.8954305 16,5 C16,6.1045695 16.8954305,7 18,7 Z M18,9 C15.790861,9 14,7.209139 14,5 C14,2.790861 15.790861,1 18,1 C20.209139,1 22,2.790861 22,5 C22,7.209139 20.209139,9 18,9 Z" fill="#000000" fill-rule="nonzero"></path>
                                <path d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z" fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
						<!--end::Svg Icon-->
					</span>
					<span id="modal_link_title" class="text-white">New Link</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close text-white"></i>
				</button>
			</div>
			<div class="modal-body bg-white">
				<form method="post" class="form pt-9" id="form_link">
					{{ csrf_field() }}
					<input type="hidden" name="method" id="link_method" value="add">
					<input type="hidden" name="link_id" id="link_id">
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
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">eBay Link</label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control-lg form-control-solid" name="ebay_link" id="ebay_link" type="text" value="" />
                                    <div class="alert-message" id="ebay_linkError"></div>
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
<!-- Delete Link Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_delete">
		{{ csrf_field() }}
		<input type="hidden" name="link_id" id="deleted_link_id" value="">    
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-radial-gradient-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
							<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M7,11 L15,11 C16.1045695,11 17,10.1045695 17,9 L17,8 L19,8 L19,9 C19,11.209139 17.209139,13 15,13 L7,13 L7,15 C7,15.5522847 6.55228475,16 6,16 C5.44771525,16 5,15.5522847 5,15 L5,9 C5,8.44771525 5.44771525,8 6,8 C6.55228475,8 7,8.44771525 7,9 L7,11 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M6,21 C7.1045695,21 8,20.1045695 8,19 C8,17.8954305 7.1045695,17 6,17 C4.8954305,17 4,17.8954305 4,19 C4,20.1045695 4.8954305,21 6,21 Z M6,23 C3.790861,23 2,21.209139 2,19 C2,16.790861 3.790861,15 6,15 C8.209139,15 10,16.790861 10,19 C10,21.209139 8.209139,23 6,23 Z" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M18,7 C19.1045695,7 20,6.1045695 20,5 C20,3.8954305 19.1045695,3 18,3 C16.8954305,3 16,3.8954305 16,5 C16,6.1045695 16.8954305,7 18,7 Z M18,9 C15.790861,9 14,7.209139 14,5 C14,2.790861 15.790861,1 18,1 C20.209139,1 22,2.790861 22,5 C22,7.209139 20.209139,9 18,9 Z" fill="#000000" fill-rule="nonzero"></path>
                                    <path d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
							<!--end::Svg Icon-->
						</span><span class="text-white">Delete Link</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
                    Do you really want to delete this link?
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
            url: HOST_URL+'/admin/get-links',
            type: 'GET',
            data: {
					// parameters for custom backend script demo
					columnsDef: [
						'title',
                        'link',
						'description',
                        'ebay_link',
 						'id'
                    ],
				}
        },
        columns: [
            {data: 'title'},
            {data: 'link'},
            {data: 'description'},
            {data: 'ebay_link'},
            {data: 'id', responsivePriority: -1},
        ],
        order: [[4, "desc" ]],
        columnDefs: [
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
                render: function(data, type, full, meta) {
                    return '\
                        <a href="#" class="btn btn-sm btn-clean btn-icon edit-link" title="Edit details" id="'+data+'">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-link" title="Delete" data-toggle="modal" data-target="modal_delete" id="'+data+'">\
                            <i class="la la-trash"></i>\
                        </a>\
                    ';
                },
            }
        ],
    });

    $('#btn_new').on('click', function(e){
        e.preventDefault();
        $('#form_link').trigger("reset");
        $('#modal_link_title').text('New Link');
        $('.alert-message').text('');
        $('#modal_link').modal();
    });

    $('#btn_save').on('click', function(e) {
		e.preventDefault();

		var btnSave = KTUtil.getById("btn_save");
		KTUtil.btnWait(btnSave, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_link');
		var form_data = new FormData(form);
		
        $.ajax({
            url:"{{ route('save-link') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btnSave);
				$('#modal_link').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btnSave);
				$('#titleError').text(response.responseJSON.errors.title);
				$('#linkError').text(response.responseJSON.errors.link);
				$('#descriptionError').text(response.responseJSON.errors.description);				
			}
			
        });
	});

    $(document).on("click", ".edit-link", function(e) {
        e.preventDefault();
		$.ajax({
            url: "{{ route('get-link') }}",
            type: "GET",
            data: {
                link_id: $(this).attr("id")
             },
            dataType: 'json',
            success: function(result){
				$('#modal_link').modal();
				$('#link_method').val('edit');
				$('#link_id').val(result.id);
				$('#modal_link_title').text('Edit Link');
				$('#title').val(result.title);
				$('#link').val(result.link);
				$('#description').val(result.description);
				$('#ebay_link').val(result.ebay_link);							
            }
        });
	});

    $(document).on("click", ".delete-link", function() {
		$("#modal_delete").modal();
		$("#deleted_link_id").val($(this).attr("id"));
	});

    $("#btn_delete").on("click", function(e) {
		e.preventDefault();

		var btnDelete = KTUtil.getById("btn_delete");
		KTUtil.btnWait(btnDelete, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_delete');
		var form_data = new FormData(form);
		$.ajax({
            url:"{{ route('delete-link') }}",
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
});
</script>
@endsection