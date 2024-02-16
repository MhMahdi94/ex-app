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
              <h3 class="card-title">Employee Details</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            
                <form method="POST" action="{{ route('company.employee-details.employee_details_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $id }}">
                    <input type="hidden" name="company_id" value="{{ $employee->company->id??'' }}">
                    <div class="card-body row">
                        <div class="form-group col-6">
                            <label for="jobTitle">Job Title</label>
                            <input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="Enter Job Title" value="{{ $details->jobTitle??'' }}" required>
                        </div>
                        <div class="form-group col-6">
                          <label for="dept_id">Company</label>
                          <select name="dept_id" id="" class="form-control select2">
                            {{-- @foreach ($companies as $company) --}}
                              <option value="1">Department 1</option>
                              <option value="2">Department 2</option>
                              <option value="3">Department 3</option>
                            {{-- @endforeach --}}
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label for="job_type">Job Type</label>
                          <select name="job_type" id="" class="form-control select2">
                            {{-- @foreach ($companies as $company) --}}
                              <option value="1">Full Time</option>
                              <option value="2">Part Time</option>
                              <option value="3">Remotly</option>
                              <option value="3">Hybrid</option>
                            {{-- @endforeach --}}
                          </select>
                        </div>
                        <div class="form-group col-6">
                          <label for="salary">Salary</label>
                          <input type="text" value="{{ $details->salary??'' }}" name="salary" class="form-control" id="salary" placeholder="Enter salary" required>
                        </div>
                        {{-- <div class="form-group col-5">
                          <label for="allowence_name">Allowence Name</label>
                          <input type="text" name="allowence_name" class="form-control" id="allowence_name" placeholder="EnterAllowence Name" required>
                      </div>
                      <div class="form-group col-5">
                        <label for="allowence_value">Allowence Value</label>
                        <input type="text" name="allowence_value" class="form-control" id="allowence_value" placeholder="Enter Allowence Value" required>
                      </div>
                      <div class="form-group col-12 ">
                        
                        <button type="" class="btn btn-primary  mt-4 add_allow">Add More</button>
                      </div> --}}
                      <table class="table table-bordered" id="dynamicAddRemove">  
                        <tr>
                            <th>Allowence Name</th>
                            <th>Allowence Value</th>
                            <th>Action</th>
                        </tr>
                        <tr>  
                            <td><input type="text" name="allowenceFields[0][all_name]" placeholder="Allowence Name" class="form-control" /></td>  
                            <td><input type="text" name="allowenceFields[0][all_val]" placeholder="Allowence Value" class="form-control" /></td>  
                            <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>  
                        </tr>  
                    </table> 
                       {{--  <div class="form-group">
                            <label for="email">{{__('routes.Email')}}</label>
                            <input type="email" name="email" class="form-control" id="email"  required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">{{__('routes.Mobile No')}}</label>
                            <input type="text" name="mobile_no" class="form-control" id="mobile_no"  required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password"  required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name='confirm_password'  required>
                        </div>--}}
                      
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
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script>
  var i = 0;
       
       $("#add-btn").click(function(){
      
           ++i;
      
           $("#dynamicAddRemove").append('<tr><td><input type="text" name="allowenceFields['+i+'][all_name]" placeholder="Allowence Name" class="form-control" /></td><td><input type="text" name="allowenceFields['+i+'][all_val]" placeholder="Allowence Value" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
       });  
</script>
<script>
  $('.btn-del-select').hide();
  $(document).on('click','.add-select', function(){
      $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass("clone-row");
      $('.btn-del-select').fadeIn();
      $(this).parent().parent().find(".btn-del-select").click(function(e) {
          $(this).parent().parent().remove(); 
      });
  });
</script>
 @endsection