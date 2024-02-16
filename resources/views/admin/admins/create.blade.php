@extends('layout.admin')
@section('title')
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
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title ">{{ __('routes.Create Admin') }}</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive ">
                <form method="POST" action="{{ route('admin.admins.admins_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <div class="card-body row g-3">
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('routes.Name') }}</label>
                            <input type="text" name="name" class="form-control" id="name"  required>
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="email">{{ __('routes.Email') }}</label>
                            <input type="email" name="email" class="form-control" id="email"  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">{{ __('routes.Mobile No') }}</label>
                            <input type="text" name="mobile_no" class="form-control" id="mobile_no"  required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="password">{{ __('routes.Password') }}</label>
                            <input type="password" class="form-control" name="password" id="password"  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm_password">{{ __('routes.Confirm Password') }}</label>
                            <input type="password" class="form-control" id="confirm_password" name='confirm_password'  required>
                        </div>

                        <div class="form-group col-md-12">
                          <label for="multiple-select-field" class="form-label">{{ __('routes.Role') }}</label>
                          <select class="form-select" id="multiple-select-field"
                               id="roles" name="roles[]" multiple required>

                              @foreach ($roles as $role)
                              <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                {{ $role }}
                                </option>
                              @endforeach
                          </select>
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">{{ __('routes.Submit') }}</button>
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