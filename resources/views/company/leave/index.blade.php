@extends('layout.company')
@section('title')
Leave Requests
@endsection
@section('page_name')
Leave Requests Page
@endsection
@section('active_link')
<a href="#">Leave Requests</a>
@endsection
@section('active_content')
Leave Requests Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="mb-0 text-uppercase ">Leave Requests List</h6>
              <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                  data-bs-target="#SearchModal">
                  <input class="form-control px-5" disabled type="search" placeholder="Search">
                  <span
                      class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                          class='bx bx-search'></i></span>
              </div>





              <div class="d-flex ustify-content-between align-items-center" width='200'>
                  {{-- <a class=" btn btn-primary float-right"
                      href="{{ route('company.journals.journals_create') }}">Add
                      Journal</a> --}}
              </div>
          </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Employee</th>
                    <th>Start Leave</th>
                    <th>End Leave</th>
                    <th>Leave Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->employee->name }}</td>
                            <td>{{ $item->startLeave }}</td>
                            <td>{{ $item->endLeave }}</td>
                            <td>{{ $item->getLeaveType->name }}</td>
                            <td>
                              @if ($item->status==0)
                                <span class="badge bg-warning ">Pending</span>
                              @elseif ($item->status==1)  
                                <span class="badge bg-success ">Accepted</span>
                              @else
                                <span class="badge bg-danger ">Rejected</span>
                              @endif
                              {{-- <span class="badge {{ $item->status?'bg-green':'bg-yellow' }} ">{{ $item->status?'Accepted':'Pending' }}</span> --}}
                            </td>
                            <td class="d-flex">
                                {{-- <a class="mr-2 btn btn-info" href="{{ route('company.employees.employees_edit',$item->id ) }}">Accept</a> --}}
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                {{-- <input type="hidden" id="employee_id" value="{{ $item->id }}"> --}}
                                {{-- <a class="mr-2 btn btn-danger" data-toggle="modal" data-target="#modal-danger" id='{{ $item->id }}'
                                data-route="{{ route('company.employees.employees_destroy', $item->id) }}"
                                data-url="{{ route('company.employees.employees_destroy', $item->id) }}" >Delete</a> --}}
                                <form method="post" class="accept-form" data-route="{{route('company.leave-requests.leave_requests_update', $item->id) }}">
                                  @method('put')
                                  <button type="submit" class="btn btn-success mr-2 ">Accept</button>
                                </form>
                                <form method="post" class="delete-form mx-2" data-route="{{route('company.leave-requests.leave_requests_update', $item->id) }}">
                                  @method('put')
                                  <button type="submit" class="btn btn-danger  ">Reject</button>
                                </form>
                              
                                {{-- <a class="ml-2 btn btn-warning " href="{{ route('company.employees.employees_details',$item->id ) }}">Details</a> --}}
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
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

  $(document).ready(function() {

  $('.delete-form').on('submit', function(e) {
      e.preventDefault();
      console.log($(this).data('route'));
      Swal.fire({
        title: "Are you sure?",
        // text: "You want be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, reject it!"
      }).then((result) => {
      
        if (result.isConfirmed) {
          $.ajax({
            type: 'put',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).data('route'),
            data: {
              '_method': 'delete',
              'status':2
            },
            success: function (response, textStatus, xhr) {
              Swal.fire({
                title: "Updated!",
                text: "Leave Request has been rejected.",
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
  $('.accept-form').on('submit', function(e) {
      e.preventDefault();
      console.log($(this).data('route'));
      Swal.fire({
        title: "Are you sure?",
        // text: "You want be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, accept it!"
      }).then((result) => {
      
        if (result.isConfirmed) {
          $.ajax({
            type: 'put',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).data('route'),
            data: {
              '_method': 'put',
              'status':1
            },
            success: function (response, textStatus, xhr) {
              Swal.fire({
                title: "Updated!",
                text: "Leave Request has been accepted.",
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

</script>
 @endsection