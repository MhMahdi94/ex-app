@extends('layout.company')
@section('title')
Documents
@endsection
@section('page_name')
Documents Page
@endsection
@section('active_link')
<a href="#">Documents</a>
@endsection
@section('active_content')
Documents Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    
    <div class="row">
        <div class="col-12">
          <div class="card">
           
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="mb-0 text-uppercase ">Documents List</h6>
          <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
              data-bs-target="#SearchModal">
              <input class="form-control px-5" disabled type="search" placeholder="Search">
              <span
                  class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                      class='bx bx-search'></i></span>
          </div>





          <div class="d-flex justify-content-between align-items-center" width='200'>
              <a class=" btn btn-primary float-right"
                  href="{{ route('company.documents.document_create') }}">Add
                  Document</a>
          </div>
      </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->document_date }}</td>
                            <td>{{ $item->document_description  }}</td>
                            <td>{{ $item->documentType->name  }}</td>
                           
                            {{-- <td>{{ $item->employee->name }}</td> --}}
                            <td class="row">
                                <a class="mr-2 btn btn-info" href="{{ route('company.documents.document_show',$item->id ) }}">show</a>
                                {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
                                 <form method="post" class="delete-form" data-route="{{route('company.department.department_destroy', $item->id) }}">
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger  ">Delete</button>
                                </form> --}}
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
          text: "Your department has been deleted.",
          icon: "success"
        });
        setTimeout(function() {
          //your code to be executed after 1 second
          location.reload;
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