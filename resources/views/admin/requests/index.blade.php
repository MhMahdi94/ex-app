@extends('layout.admin')
@section('title')
Admins
@endsection
@section('page_name')
Requests Page
@endsection
@section('active_link')
<a href="#">Admins</a>
@endsection
@section('active_content')
Requests Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
   <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="mb-0 text-uppercase">{{ __('routes.Requests List') }}</h6>
              <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                <input class="form-control px-5" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
                </div>
              
              
        </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>{{ __('routes.Name') }}</th>
                    <th>{{ __('routes.Owner') }}</th>
                    <th>{{ __('routes.Address') }}</th>
                    <th>{{ __('routes.Mobile No') }}</th>
                    <th>{{ __('routes.Email') }}</th>
                    <th>{{ __('routes.Employees') }}</th>
                    <th>{{ __('routes.Departments') }}</th>
                    <th>{{ __('routes.Status') }}</th>
                    <th>{{ __('routes.Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->owner }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->mobileNo }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->noOfEmployee }}</td>
                            <td>{{ $item->noOfDepts }}</td>
                            <td><span class="badge {{ $item->status?'bg-success':'bg-warning' }} ">{{ $item->status?'Done':'pending' }}</span></td>
                            <td>
                                <a class="mr-2 btn btn-info" href="{{ route('admin.requests.requests_update',$item->id ) }}" id="update_request">{{ __('routes.Complete') }}</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                
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
<script>
    $('#update_request').click(function(){
        console.log('click')
        var userURL = $(this).data('url');
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