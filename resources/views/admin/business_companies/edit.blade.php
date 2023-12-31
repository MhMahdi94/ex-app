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
    <div class="row g-3">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Business Company</h3>

              
            </div>
            <!-- /.card-header -->
          
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../update/{{ $business_company->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body row g-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $business_company->name }}" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" value="{{ $business_company->email }}" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Mobile No</label>
                            <input type="text" name="mobile_no" value="{{ $business_company->mobile_no }}" class="form-control" id="mobile_no" placeholder="Enter Mobile Number" required>
                        </div>
                        {{--  --}}
                        <div class="row g-1">
                          <div class="form-group col-6">
                              <label for="subscriptionStart">Subscription Start</label>
                              <input type="date" name="subscriptionStart" class="form-control" id="subscriptionStart" value={{ $business_company->subscriptionStart }}   required>
                          </div>
                          <div class="form-group col-6">
                              <label for="subscriptionEnd">Subscription End</label>
                              <input type="date" name="subscriptionEnd" class="form-control" id="subscriptionEnd" value={{ $business_company->subscriptionEnd }}  required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" placeholder="Description" name='description'   required>{{ $business_company->desc }}</textarea>
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