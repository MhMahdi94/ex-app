@extends('layout.admin')
{{-- @section('title')
Admins
@endsection
@section('page_name')
Admins Page
@endsection
@section('active_link')
<a href="#">Admins</a>
@endsection
@section('active_content')
Admins Page
@endsection --}}
@section('content')
 <!-- /.row -->
<div class="page-content">
  <!-- search modal -->
  <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
    <!-- end search modal -->
  			<hr/>
				<div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
           
              <h6 class="mb-0 text-uppercase ">Admins List</h6>
              <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                <input class="form-control px-5" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
                </div>
            
           
    
    
            
              <div class="d-flex ustify-content-between align-items-center" width='200'>
                
                <a class=" btn btn-primary float-right" href="{{ route('admin.admins.admins_create') }}">Add Admin</a>
              </div>
          </div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
								</thead>
                <tbody>
                  @foreach ($data as $item)
                      <tr>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->mobile_no }}</td>
                          <td><span class="badge {{ $item->status?'bg-success':'bg-danger' }} ">{{ $item->status?'Active':'Not Active' }}</span></td>
                          <td class="row row-cols-auto ">
                            <div class="col-3 ">
                              <a class="btn btn-primary px-4" href="{{ route('admin.admins.admins_edit',$item->id ) }}">Edit</a>
                            </div>
                              <div class="col-3">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <form method="post" class="delete-form" data-route="{{route('admin.admins.admins_destroy', $item->id) }}">
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger px-4 ">Delete</button>
                                </form>
                              </div>
                              
                          </td>
                      </tr> 
                  @endforeach
              </tbody>
								
							</table>
						</div>
					</div>
				</div> 
  {{-- <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admins List</h3>
              
              
              <div class="card-tools row">
                <a class="mr-2 btn btn-info" href="{{ route('admin.admins.admins_create') }}">Add Admin</a>
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
            </div>
        </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->mobile_no }}</td>
                            <td><span class="badge {{ $item->status?'bg-teal':'bg-red' }} ">{{ $item->status?'Active':'Not Active' }}</span></td>
                            <td class="row">
                                <a class="mr-2 btn btn-info" href="{{ route('admin.admins.admins_edit',$item->id ) }}">Edit</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <form method="post" class="delete-form" data-route="{{route('admin.admins.admins_destroy', $item->id) }}">
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger  ">Delete</button>
                                </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    --}}
    </div>

<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous">
</script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>

    $(document).ready(function() {
  
  $('.delete-form').on('submit', function(e) {
    e.preventDefault();
    console.log($(this).data('route'));
    Swal.fire({
      title: "Are you sure?",
    // text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
    
      if (result.isConfirmed) {
        $.ajax({
          type: 'delete',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: $(this).data('route'),
          data: {
            '_method': 'delete'
          },
          success: function (response, textStatus, xhr) {
            Swal.fire({
              title: "Deleted!",
              text: "Your admin has been deleted.",
              icon: "success"
            });
            setTimeout(function() {
              //your code to be executed after 1 second
             location.reload();
            }, 3000);
            
          }
      });
      
      }
  });
    
   })
  });
      
  </script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
    } );
</script>
<script>
  $(document).ready(function() {
    var table = $('#example2').DataTable( {
      lengthChange: false,
      buttons: [ 'copy', 'excel', 'pdf', 'print']
    } );
   
    table.buttons().container()
      .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
  } );
</script>

 @endsection