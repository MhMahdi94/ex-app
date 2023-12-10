@extends('layout.company')
@section('title')
Financial Year
@endsection
@section('page_name')
Financial Year Page
@endsection
@section('active_link')
<a href="#">Financial Year</a>
@endsection
@section('active_content')
Financial Year Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Financial Year List</h3>
              
              
              <div class="card-tools row">
                <a class="mr-2 btn btn-info" href="{{ route('company.financial_calendar.financial_year_create') }}">Add New</a>
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
              @if (isset($data) and !empty($data))
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Financial Year</th>
                      <th>Description</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Added By</th>
                      <th>Updated By</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                          <tr>
                              <td>{{ $item->financial_year }}</td>
                              <td>{{ $item->financial_desc }}</td>
                              <td>{{ $item->start_date }}</td>
                              <td>{{ $item->end_date }}</td>
                              <td>{{ $item->addedBy->name }}</td>
                              <td>{{ $item->updatedBy->name }}</td>
                            
                              <td class="row">
                                  <a class="mr-2 btn btn-success" href="{{ route('company.department.department_edit',$item->id ) }}">Edit</a>
                                  <meta name="csrf-token" content="{{ csrf_token() }}">
                                  <form method="post" class="delete-form" data-route="{{route('company.department.department_destroy', $item->id) }}">
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger  ">Delete</button>
                                  </form>
                              </td>
                          </tr> 
                      @endforeach
                  </tbody>
                </table>
              @else
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
                  entire
                  soul, like these sweet mornings of spring which I enjoy with my whole heart.
                </div>
              @endif
             
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