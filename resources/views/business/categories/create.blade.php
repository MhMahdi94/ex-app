@extends('layout.business')
{{-- @section('title')
Owners
@endsection
@section('page_name')
Owners Page
@endsection
@section('active_link')
<a href="#">Owners</a>
@endsection
@section('active_content')
Owners Page
@endsection --}}
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('routes.Add Category') }}</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="{{ route('business.categories.category_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <div class="card-body row g-3">
                        {{-- <div class="form-group mb-2">
                          <label for="name">Business Company</label>
                          <select name="business_id" id="" class="form-control select2">
                            @foreach ($companies as $company)
                              <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                          </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="name">{{ __('routes.Name') }}</label>
                            <input type="text" name="name" class="form-control" id="name"  required>
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