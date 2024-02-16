@extends('layout.admin')
@section('title')
Admins
@endsection
@section('page_name')
Services Page
@endsection
@section('active_link')
<a href="#">Services</a>
@endsection
@section('active_content')
Services Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('routes.Create Service') }}</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="{{ route('admin.packages.packages_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <div class="card-body row g-2">
                        <div class="form-group col-md-6">
                            <label for="english_name">{{ __('routes.Name(English)') }}</label>
                            <input type="text" name="english_name" class="form-control" id="english_name"  required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="arabic_name">{{ __('routes.Name(Arabic)') }}</label>
                          <input type="text" name="arabic_name" class="form-control" id="arabic_name"  required>
                      </div>
                        <div class="form-group col-md-12">
                          <label for="english_desc">{{ __('routes.Description(English)') }}</label>
                          <textarea type="text" name="english_desc" class="form-control" id="english_desc"  required></textarea>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="arabic_desc">{{ __('routes.Description(Arabic)') }}</label>
                          <textarea type="text" name="arabic_desc" class="form-control" id="arabic_desc"  required></textarea>
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