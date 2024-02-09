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
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Business Owner</h3>

              
            </div>
            <!-- /.card-header -->
          
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../update/{{ $owner->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $owner->name }}" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                       {{--  --}}
                        <div class="form-group mb-2">
                            <label for="email">{{__('routes.Email')}}</label>
                            <input type="email" name="email" value="{{ $owner->email }}" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="mobile_no">{{__('routes.Mobile No')}}</label>
                            <input type="text" name="mobile_no" value="{{ $owner->mobile_no }}" class="form-control" id="mobile_no" placeholder="Enter Mobile Number" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name='confirm_password' placeholder="Confirm Password" required>
                        </div> --}}
                      
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">{{__('routes.Submit')}}</button>
                    </div>
                  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>

<script>
    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
 @endsection