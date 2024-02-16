@extends('layout.company')
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
              <h3 class="card-title">Edit Role</h3>

              
            </div>
            <!-- /.card-header -->
          
            <div class="card-body table-responsive p-0">
              <form method="POST" action="{{ route('company.roles.roles_update',$role->id) }}" class='needs-validation'
              novalidate>
              @csrf
              @method("PUT")
              <div class="card-body ">
                  <div class="form-group">
                      <label for="name" >{{__('routes.Name')}}</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}"
                           required>
                  </div>
                 
                  <div class="form-group  mb-4 mt-2">
                     
                      <label for="multiple-select-field" class="form-label" >{{__('routes.Permissions')}}</label>
                      <select class="form-select" id="multiple-select-field"
                           id="permissions" name="permissions[]" multiple required>

                          @foreach ($permissions as $permission)
                              <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                  {{ $permission->name }}
                              </option>
                          @endforeach
                      </select>
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