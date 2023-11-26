@extends('layout.admin')
@section('title')
Admins
@endsection
@section('page_name')
Roles Page
@endsection
@section('active_link')
<a href="#">Admins</a>
@endsection
@section('active_content')
Roles Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
     <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Roles List</h3>
              
              
              <div class="card-tools row">
                {{-- <a class="mr-2 btn btn-info" href="{{ route('admin.packages.packages_create') }}">Add Request</a> --}}
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
              {{-- <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Owner</th>
                    <th>Address</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Employees</th>
                    <th>Departments</th>
                    <th>Status</th>
                    <th>Actions</th>
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
                            <td><span class="badge {{ $item->status?'bg-teal':'bg-yellow' }} ">{{ $item->status?'Done':'pending' }}</span></td>
                            <td>
                                <a class="mr-2 btn btn-info" href="{{ route('admin.requests.requests_update',$item->id ) }}" id="update_request">Complete</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
              </table> --}}
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