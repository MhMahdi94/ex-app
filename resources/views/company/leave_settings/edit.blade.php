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
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Employee</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../update/{{ $employee->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="company_id" value="{{ $employee->company->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $employee->name }}" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" value="{{ $employee->email }}" name="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">Mobile No</label>
                            <input type="text" value="{{ $employee->mobile_no }}" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group">
                          <label for="status">Status</label>
                          <select name="status" id="" class="form-control select2">
                            {{-- @foreach ($companies as $company) --}}
                              <option value="0" {{ $employee->status==0?'selected':'' }}>No</option>
                              <option value="1" {{ $employee->status==1?'selected':'' }}>Yes</option>
                            {{-- @endforeach --}}
                          </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name='confirm_password' placeholder="Confirm Password" required>
                        </div> --}}
                      
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