@extends('layout.admin')
@section('title')
Services
@endsection
@section('page_name')
Services Page
@endsection
@section('active_link')
<a href="#">Services</a>
@endsection
@section('active_content')
Services Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Delete service</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are You Sure to Delete this service?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No, Cancel please</button>
              <button type="button" class="btn btn-outline-light delete" id="delete_package">Yes, Delete service</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Services List</h3>
              
              
              <div class="card-tools row">
                <a class="mr-2 btn btn-info" href="{{ route('admin.packages.packages_create') }}">Add Service</a>
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
                    <th>Desc</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->desc }}</td>
                            <td class="row">
                                <a class="mr-2 btn btn-info" href="{{ route('admin.packages.packages_edit',$item->id ) }}">Edit</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <form method="post" class="delete-form" data-route="{{route('admin.packages.packages_destroy', $item->id) }}">
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
            text: "Your service has been deleted.",
            icon: "success"
          }).then((res)=>{
            // setTimeout(function() {
            //your code to be executed after 1 second
            window.location.reload;
          // }, 3000);
          })
          ;
         
          
        }
    });
    
    }
});
  
 })
});
    
</script>
 @endsection