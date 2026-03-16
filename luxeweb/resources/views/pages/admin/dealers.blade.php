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
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">Dealers</span>
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
                            <th>Business</th>
                            <th>Approved</th>
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

<!-- Delete Modal-->
<div class="modal fade" id="modal_approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_approve">
		{{ csrf_field() }}
		<input type="hidden" name="dealer_id" id="dealer_id" value="">
        <input type="hidden" name="business_id" id="business_id" value="">
        <input type="hidden" name="is_approved" id="is_approved" value="">
		<div class="modal-dialog modal-lg" role="document">
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
						</span><span class="text-white">Approve/Deny</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
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
                    <div class="row" id="block_images"></div>
				</div>
				<div class="modal-footer bg-white">
                    <button type="button" class="btn btn-primary font-weight-bold approve-deny" value="1" id="btn_approve">Approve</button>
                    <button type="button" class="btn btn-danger font-weight-bold approve-deny" value="0" id="btn_deny">Deny</button>
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>					
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Mdal-->

<!-- Delete Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_delete">
		{{ csrf_field() }}
		<input type="hidden" name="dealer_id" id="deleted_dealer_id" value="">    
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
						</span><span class="text-white">Delete Dealer</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
                    Do you really want to delete this dealer?
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
            url: HOST_URL+'/admin/get-dealers',
            type: 'GET',
            data: {
					// parameters for custom backend script demo
					columnsDef: [
						'name',
                        'email',
                        'business_id',
                        'is_approved',
 						'id'
                    ],
				}
        },
        columns: [
            {data: 'name'},
            {data: 'email'},
            {data: 'business_id'},
            {data: 'is_approved'},
            {data: 'id', responsivePriority: -1},
        ],
        order: [[4, "desc" ]],
        columnDefs: [
            {
                targets: 3,
                orderable: false,
                render: function(data, type, full, meta) {
                    var html='';
                    if(full.business_id){
                        if(data==1) html='<span class="label label-lg font-weight-bold  label-light-primary label-inline">Approved</span>';
                        else if(data==2) html='<span class="label label-lg font-weight-bold  label-light-danger label-inline">Denied</span>';
                    }
                    return html;
                },
            },
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
                render: function(data, type, full, meta) {
                    return '\
                        <a href="#" class="btn btn-sm btn-clean btn-icon approve" title="Approve/Deny" data-toggle="modal" data-target="modal_approve" id="'+full.business_id+'">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-dealer" title="Delete" data-toggle="modal" data-target="modal_delete" id="'+data+'">\
                            <i class="la la-trash"></i>\
                        </a>\
                    ';
                },
            }
        ],
    });

    $(document).on("click", ".delete-dealer", function() {
		$("#modal_delete").modal();
		$("#deleted_dealer_id").val($(this).attr("id"));
	});

    $(document).on("click", ".approve", function(e) {
        e.preventDefault();
        var business_id=$(this).attr('id');
        if(business_id==0){
            content.message = 'This dealer haven\'t created any business yet.';
			showMessage('danger', content);
            return;
        }

        $.ajax({
            url:"{{ route('get-business') }}",
            type: "GET",
            data: {
                id: business_id
            },
            dataType: 'json',
            success: function(result){
                console.log(result);
                $('#business_id').val(result.id);
                $('#dealer_id').val(result.dealer_id);
                $('#name').text(result.name);
                $('#state').text(result.state);
                if(result.card!=null){
                    var url="{{ asset('uploads/businesses') }}"+'/'+result.card;
                    $('#summary_card').css('background-image', "url(" + url + ")");
                }
                $('#hours').text(result.hours);
                $('#description').text(result.description);
                $('#summary_keywords').text(result.keywords.join(', '));
                $('#address').text(result.address);
                $('#web_address').text(result.web_address);
                $('#phone').text(result.phone_number);
                $('#facebook').text(result.facebook);
                $('#twitter').text(result.twitter);
                $('#instagram').text(result.instagram);
                var html='';
                for(var img of result.images){
                    var url="{{ asset('uploads/businesses') }}" + '/' + img;
                    html+='<div class="col-sm-6 col-md-3 mb-3"><img src="'+url+'" alt="" class="fluid img-thumbnail"></div>';
                }
                $('#block_images').html(html);
				$("#modal_approve").modal();
 			},
			error: function (response) {
				content.message = 'Your action is failed!';
				showMessage('danger', content);		
			}			
        });		
	});

    $('.approve-deny').on('click', function(){
        var isApproved=$(this).attr('value');
        $('#is_approved').val(isApproved);
        var btn;
        if(isApproved==1){
            btn = KTUtil.getById("btn_approve");
        }else{
            btn = KTUtil.getById("btn_deny");
        }
        KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_approve');
		var form_data = new FormData(form);

        $.ajax({
            url:"{{ route('approve-deny') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btn);
				$('#modal_approve').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your acrion is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                content.message = 'Your acrion is failed!';
				showMessage('danger', content);
			}
			
        });
    })

    $("#btn_delete").on("click", function(e) {
		e.preventDefault();

		var btnDelete = KTUtil.getById("btn_delete");
		KTUtil.btnWait(btnDelete, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_delete');
		var form_data = new FormData(form);
		$.ajax({
            url:"{{ route('delete-dealer') }}",
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