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
              <h3 class="card-title">{{ __('routes.Renew Contract') }}</h3>

              
            </div>
            <!-- /.card-header -->
          
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../renew/{{ $company->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body row g-3">
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('routes.Name') }}</label>
                            <input disabled type="text" name="name" value="{{ $company->name }}" class="form-control" id="name"  required>
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="email">{{ __('routes.Email') }}</label>
                            <input disabled type="email" name="email" value="{{ $company->email }}" class="form-control" id="email"  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subscriptionStart">{{ __('routes.Subscription Start') }}</label>
                            <input disabled  type="text" name="subscriptionStart" value="{{ $company->subscriptionStart }}" class="form-control" id="mobile_no"  required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="subscriptionEnd">{{ __('routes.Subscription End') }}</label>
                          <input disabled  type="text" name="subscriptionEnd" value="{{ $company->subscriptionEnd }}" class="form-control" id="mobile_no"  required>
                      </div>
                      <hr/>
                      <div class="form-group col-md-6">
                        <label for="subscriptionStart">{{ __('routes.Subscription Start') }}</label>
                        <input   type="date" name="subscriptionStart"  class="form-control" id="subscriptionStart"  required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="duration">{{ __('routes.Duration') }}</label>
                      <input type="number" name="duration"  class="form-control" id="duration" value="1" min="1" max="12"  required>
                  </div>
                        {{-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password"  required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name='confirm_password'  required>
                        </div> --}}
                      
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