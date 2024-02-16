@extends('layout.company')
@section('title')
Financial Year
@endsection
@section('page_name')
Financial Year Page
@endsection
@section('active_link')
<a href="#">Financial Year</a>
@endsection
@section('active_content')
Financial Year Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Financial Year</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
             
                <form method="POST" action="{{ route('company.financial_calendar.financial_year_store') }}" class='needs-validation' novalidate>
                    @csrf
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body row">
                        <div class="form-group col-md-12">
                            <label for="finance_year">Finance Year</label>
                            <input type="text" name="finance_year" class="form-control" id="finance_year" placeholder="Enter Finance Year" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="desc">Description</label>
                          <textarea type="text" name="desc" class="form-control" id="desc"  required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="start_date">Start Date</label>
                          <input type="date" name="start_date" class="form-control" id="start_date"  required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="end_date">End Date</label>
                          <input type="date" name="end_date" class="form-control" id="end_date"  required>
                        </div>
                        {{-- <div class="form-group ">
                          <label for="employee_id">Head</label>
                          <select name="employee_id" id="" class="form-control select2">
                            @foreach ($employees as $employee)
                              <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                              
                            @endforeach
                          </select>
                        </div> --}}
                      
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