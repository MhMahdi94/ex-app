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
              <h3 class="card-title">Create Client</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="{{ route('business.clients.clients_store') }}" class='needs-validation' novalidate>
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
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="mobile_no ">Mobile No</label>
                          <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter mobile_no" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="address">Address</label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" required>
                  </div>
                       
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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