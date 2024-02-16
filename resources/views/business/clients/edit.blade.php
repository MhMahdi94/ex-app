@extends('layout.business')
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
              <h3 class="card-title">{{ __('routes.Edit Client') }}</h3>

              
            </div>
            <!-- /.card-header -->
          
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../update/{{ $client->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body row g-3">
                        <div class="form-group mb-2 col-md-4">
                            <label for="name" >{{__('routes.Name')}}</label>
                            <input type="text" name="name" value="{{ $client->name }}" class="form-control" id="name"  required>
                        </div>
                       
                      <div class="form-group col-md-4">
                        <label for="mobile_no ">{{__('routes.Mobile No')}}</label>
                        <input type="text" name="mobile_no" class="form-control" id="mobile_no" value="{{ $client->mobile_no }}"  required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email" value="{{ $client->email }}"  required>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ $client->address }}"  required>
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