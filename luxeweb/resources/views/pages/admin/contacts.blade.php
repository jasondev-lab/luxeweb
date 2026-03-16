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
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">Contacts</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-head-custom nowrap" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
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

<!-- Delete Link Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_delete">
		{{ csrf_field() }}
		<input type="hidden" name="contact_id" id="deleted_contact_id" value="">    
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-radial-gradient-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
							<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
							<!--end::Svg Icon-->
						</span><span class="text-white">Delete Contact</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
                    Do you really want to delete this contact?
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
            url: HOST_URL+'/admin/get-contacts',
            type: 'GET',
            data: {
					// parameters for custom backend script demo
					columnsDef: [
						'name',
                        'email',
                        'message',
 						'id'
                    ],
				}
        },
        columns: [
            {data: 'name'},
            {data: 'email'},
            {data: 'message'},
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
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-contact" title="Delete" data-toggle="modal" data-target="modal_delete" id="'+data+'">\
                            <i class="la la-trash"></i>\
                        </a>\
                    ';
                },
            }
        ],
    });

    $(document).on("click", ".delete-contact", function() {
		$("#modal_delete").modal();
		$("#deleted_contact_id").val($(this).attr("id"));
	});

    $("#btn_delete").on("click", function(e) {
		e.preventDefault();

		var btnDelete = KTUtil.getById("btn_delete");
		KTUtil.btnWait(btnDelete, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_delete');
		var form_data = new FormData(form);
		$.ajax({
            url:"{{ route('delete-contact') }}",
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