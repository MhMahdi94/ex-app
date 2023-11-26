@extends('layout.admin')
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
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Company</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="{{ route('admin.companies.companies_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                          <label>Owner</label>
                          <select class="form-control select2" style="width: 100%;" required name="owner_id">
                            {{-- <option >Select Owner</option> --}}
                            @foreach ($owners as $owner )
                              <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Mobile No</label>
                            <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                              <label for="noOfEmployee">No of Employees</label>
                              <input type="number" name="noOfEmployee" class="form-control" id="noOfEmployee"  required>
                          </div>
                          <div class="form-group col-6">
                              <label for="noOfDept">No of Departments</label>
                              <input type="number" name="noOfDept" class="form-control" id="noOfDept"  required>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                              <label for="subscriptionStart">Subscription Start</label>
                              <input type="date" name="subscriptionStart" class="form-control" id="subscriptionStart"  required>
                          </div>
                          <div class="form-group col-6">
                              <label for="subscriptionEnd">Subscription End</label>
                              <input type="date" name="subscriptionEnd" class="form-control" id="subscriptionEnd"  required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" placeholder="Description" name='description' required></textarea>
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