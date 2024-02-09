@extends('layout.company')
@section('title')
Company
@endsection
@section('page_name')
Company Page
@endsection
@section('active_link')
<a href="#">Company</a>
@endsection
@section('active_content')
Company Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase ">{{ __('routes.Edit Employee') }}</h6>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../update/{{ $employee->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="company_id" value="{{ $employee->company->id }}">
                    <div class="card-body row g-3">
                      <div class="form-group col-md-6">
                        <label for="english_name">{{ __('routes.Name(English)') }}</label>
                        <input type="text" name="english_name" class="form-control" id="english_name" value="{{ $employee->getTranslation('name', 'en')}}"
                            placeholder="Enter Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="arabic_name">{{ __('routes.Name(Arabic)') }}</label>
                        <input type="text" name="arabic_name" class="form-control" id="arabic_name" value="{{ $employee->getTranslation('name', 'ar')}}"
                            placeholder="Enter Name" required>
                    </div>
                       
                        <div class="form-group">
                            <label for="email">{{__('routes.Email')}}</label>
                            <input type="email" value="{{ $employee->email }}" name="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">{{__('routes.Mobile No')}}</label>
                            <input type="text" value="{{ $employee->mobile_no }}" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group">
                          <label for="status">{{__('routes.Status')}}</label>
                          <select name="status" id="" class="form-control select2">
                            {{-- @foreach ($companies as $company) --}}
                              <option value="0" {{ $employee->status==0?'selected':'' }}>No</option>
                              <option value="1" {{ $employee->status==1?'selected':'' }}>Yes</option>
                            {{-- @endforeach --}}
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="multiple-select-field" class="form-label">{{ __('routes.Role') }}</label>
                          <select class="form-select" id="multiple-select-field" data-placeholder="Select Role"
                              id="roles" name="roles[]" multiple required>

                              @foreach ($roles as $role)
                                  <option value="{{ $role }}"
                                      {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                      {{ $role }}
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      
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