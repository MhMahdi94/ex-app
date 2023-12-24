@extends('layout.company')
@section('title')
Account
@endsection
@section('page_name')
Account Page
@endsection
@section('active_link')
<a href="#">Account</a>
@endsection
@section('active_content')
Account Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Account</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
             
                <form method="POST" action="{{ route('company.coa.coa_store') }}" class='needs-validation' novalidate>
                    @csrf
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body row">
                        <div class="form-group col-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-6">
                          <label for="account_number">Account Number</label>
                          <input type="text" name="account_number" class="form-control" id="account_number" placeholder="Enter Account Number" required>
                        </div>
                        <div class="form-group col-6">
                          <label for="parent_id">Account</label>
                          <select name="parent_id" id="" class="form-control select2">
                            @foreach ($collections as $item)
                              <option value="{{ $item->id }}">{{ $item->account_name }}</option>
                              
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label for="level">Level</label>
                          <input type="text" name="level" class="form-control" id="level" placeholder="Enter Level" required>
                        </div>
                        <div class="form-group col-6">
                          <label for="report_type">Report Type</label>
                          <select name="report_type" id="" class="form-control select2">
                            
                            @foreach ($report_types as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label for="account_type">Account Type</label>
                          <select name="account_type" id="" class="form-control select2">
                            
                            @foreach ($account_types as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-4">
                          <label for="debit">Debit</label>
                          <input type="text" name="debit" class="form-control" id="debit" placeholder="Enter Debit" required>
                        </div>
                        <div class="form-group col-4">
                          <label for="credit">Credit</label>
                          <input type="text" name="credit" class="form-control" id="credit" placeholder="Enter Credit" required>
                        </div>
                        <div class="form-group col-4">
                          <label for="balance">Balance</label>
                          <input type="text" name="balance" class="form-control" id="balance" placeholder="Enter Balance" required>
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