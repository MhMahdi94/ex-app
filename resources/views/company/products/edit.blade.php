@extends('layout.company')
@section('title')
Import/Export
@endsection
@section('page_name')
Import/Export Page
@endsection
@section('active_link')
<a href="#">Import/Export</a>
@endsection
@section('active_content')
Import/Export Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Import/Export</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
             
                <form method="POST" action="{{ route('company.department.department_update',$department->id) }}" class='needs-validation' novalidate>
                    @csrf
                    @method('put')
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $department->name }}" id="name" placeholder="Enter Name" required>
                        </div>
                       
                        <div class="form-group ">
                          <label for="employee_id">Head</label>
                          <select name="employee_id" id="" class="form-control select2">
                            @foreach ($employees as $employee)
                              <option value="{{ $employee->id }}" {{ $employee->id==$department->employee_id?'selected':'' }}>{{ $employee->name }}</option>
                              
                            @endforeach
                          </select>
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