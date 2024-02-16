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
              <h3 class="card-title">{{ __('routes.Edit Company') }}</h3>

              
            </div>
            <!-- /.card-header -->
          
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../update/{{ $admin->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                          <label for="name">{{ __('routes.Name') }}</label>
                          <input type="text" name="name" class="form-control" id="name"  required>
                      </div>
                      <div class="form-group">
                          <label for="email">{{ __('routes.Email') }}</label>
                          <input type="email" name="email" class="form-control" id="email"  required>
                      </div>
                      <div class="form-group">
                          <label for="mobile_no">{{ __('routes.Mobile No') }}</label>
                          <input type="text" name="mobile_no" class="form-control" id="mobile_no"  required>
                      </div>
                      <div class="row g-1">
                        <div class="form-group col-6">
                            <label for="noOfEmployee">{{ __('routes.Employees') }}</label>
                            <input type="number" name="noOfEmployee" class="form-control" id="noOfEmployee"  required>
                        </div>
                        <div class="form-group col-6">
                            <label for="noOfDept">{{ __('routes.Departments') }}</label>
                            <input type="number" name="noOfDept" class="form-control" id="noOfDept"  required>
                        </div>
                      </div>
                      <div class="row g-1">
                        <div class="form-group col-6">
                            <label for="subscriptionStart">{{ __('routes.Subscription Start') }}</label>
                            <input type="date" name="subscriptionStart" class="form-control" id="subscriptionStart"  required>
                        </div>
                        <div class="form-group col-6">
                            <label for="subscriptionEnd">{{ __('routes.Subscription End') }}</label>
                            <input type="date" name="subscriptionEnd" class="form-control" id="subscriptionEnd"  required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description">{{ __('routes.Description') }}</label>
                        <textarea class="form-control" id="description"  name='description' required></textarea>
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