@extends('layout.company')
@section('title')
Departments
@endsection
@section('page_name')
Departments Page
@endsection
@section('active_link')
<a href="#">Departments</a>
@endsection
@section('active_content')
Departments Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="mb-0 text-uppercase ">{{ __('routes.Departments List') }}</h6>
              <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                  data-bs-target="#SearchModal">
                  <input class="form-control px-5" disabled type="search" placeholder="Search">
                  <span
                      class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                          class='bx bx-search'></i></span>
              </div>

              <div class="d-flex ustify-content-between align-items-center" width='200'>
                @if (Auth::guard('employee')->user()->can('create-department'))
                                        
                <a class=" btn btn-success float-right"
                    href="{{ route('company.department.department_create') }}">{{ __('routes.Add Department') }}</a>
                @endif
              </div>
            </div>
           
       
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
              <table id="example2" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>{{ __('routes.Name') }}</th>
                    <th>{{ __('routes.Head') }}</th>
                    <th>{{ __('routes.Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->employee->name }}</td>
                            <td class="d-flex   ">
                              @if (Auth::guard('employee')->user()->can('create-department'))
                                <a class="mr-2 btn btn-info mx-1" href="{{ route('company.department.department_edit',$item->id ) }}">{{ __('routes.Edit') }}</a>
                                        
                              @endif
                              
                              @if (Auth::guard('employee')->user()->can('create-department'))
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                {{-- <input type="hidden" id="employee_id" value="{{ $item->id }}"> --}}
                                {{-- <a class="mr-2 btn btn-danger" data-toggle="modal" data-target="#modal-danger" id='{{ $item->id }}'
                                data-route="{{ route('company.employees.employees_destroy', $item->id) }}"
                                data-url="{{ route('company.employees.employees_destroy', $item->id) }}" >Delete</a> --}}
                                <form method="post" class="delete-form" data-route="{{route('company.department.department_destroy', $item->id) }}">
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger  ">{{ __('routes.Delete') }}</button>
                                </form> 
                              @endif
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
          location.reload();
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