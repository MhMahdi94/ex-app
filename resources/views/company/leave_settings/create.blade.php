@extends('layout.company')
@section('title')
Leave Slots
@endsection
@section('page_name')
Leave Slots Page
@endsection
@section('active_link')
<a href="#">Leave Slots</a>
@endsection
@section('active_content')
Leave Slots Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row ">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Leave Slots</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
             
                <form method="POST" action="{{ route('company.leave-settings.leave_settings_store') }}" class='needs-validation' novalidate>
                    @csrf
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body row g-2">
                        <div class="form-group col-6">
                            <label for="from">From: </label>
                            <input type="date" name="from" class="form-control" id="from"  required>
                        </div>
                       
                        <div class="form-group col-6">
                            <label for="to">To:</label>
                            <input type="date" name="to" class="form-control" id="to" required>
                        </div>
                        
                        <div class="form-group col-12">
                          <label for="status">Status</label>
                          <select name="status" id="" class="form-control select2" required>
                            <option value="">--Select--</option>
                              <option value="0">Allowed</option>
                              <option value="1">Maybe</option>
                              <option value="2">Blocked</option>
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