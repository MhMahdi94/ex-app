@extends('layout.company')
@section('title')
Leave Managment
@endsection
@section('page_name')
Leave Managment
@endsection
@section('active_link')
<a href="#">Leave Managment</a>
@endsection
@section('active_content')
Leave Settings
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
   <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Leave Settings</h3>
              
              
              <div class="card-tools row">
                <a class="mr-2 btn btn-info" href="{{ route('company.leave-settings.leave_settings_create') }}">Add Slot</a>
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
            </div>
        </div>
            <!-- /.card-header -->
            {{-- <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th >{{__('routes.Name')}}</th>
                    <th>Email</th>
                    <th>{{__('routes.Mobile No')}}</th>
                    <th>{{__('routes.Status')}}</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->mobile_no }}</td>
                            <td>
                              <span class="badge {{ $item->status?'bg-teal':'bg-red' }} ">{{ $item->status?'Active':'Not Active' }}</span>
                            </td>
                            <td class="row">
                                <a class="mr-2 btn btn-info" href="{{ route('company.employees.employees_edit',$item->id ) }}">Edit</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <form method="post" class="delete-form" data-route="{{route('company.employees.employees_destroy', $item->id) }}">
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger  ">Delete</button>
                                </form>
                              
                                <a class="ml-2 btn btn-warning " href="{{ route('company.employees.employees_details',$item->id ) }}">Details</a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>
            </div> --}}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

  $(document).ready(function() {

$('.delete-form').on('submit', function(e) {
  e.preventDefault();
console.log($(this).data('route'));
Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
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
          text: "Your file has been deleted.",
          icon: "success"
        });
        setTimeout(function() {
          //your code to be executed after 1 second
          windows.location.reload;
        }, 3000);
        
      }
  });
   
  }
});
  
 })
});
    $('#delete_admin').click(function(){
        console.log('click')
        var userURL = $(this).data('route');
        console.log(userURL)
         var token = $("meta[name='csrf-token']").attr("content");
         console.log(token)
   

    // $.ajax(

    // {

    //     url: "users/"+id,

    //     type: 'DELETE',

    //     data: {

    //         "id": id,

    //         "_token": token,

    //     },

    //     success: function (){

    //         console.log("it Works");

    //     }

    // });
    })
</script>
 @endsection