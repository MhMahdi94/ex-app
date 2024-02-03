@extends('layout.company')

@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase ">Employee Details</h6>

              
            </div>
            {{-- {{ $departments }} --}}
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
           
                <form method="POST" action="{{ route('company.employee-details.employee_details_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $id }}">
                    <input type="hidden" name="company_id" value="{{ $employee->company->id??'' }}">
                    <div class="card-body row g-3">
                        <div class="form-group col-6 ">
                            <label for="jobTitle">Job Title</label>
                            <input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="Enter Job Title" value="{{ $details->jobTitle??'' }}" required>
                        </div>
                        <div class="form-group col-6">
                          <label for="dept_id">Department</label>
                          <select name="dept_id" id="" class="form-control select2">
                            @foreach ($departments as $department)
                              <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
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
                        <div class="table-responsive mt-3">
                       
                          <table class="table table-bordered" id="dynamicAddRemove">  
                            <tr>
                                <th>Allowence Name</th>
                                <th>Allowence Value</th>
                                <th>Action</th>
                            </tr>
                            
                            <tr> 
                              @if (count($allowences)>0)
                                <tr>
                                  <input type="hidden" name="allowenceFields[0][id]" value="{{ $allowences[0]['id']??'' }}"/> --}}
                                  <td><input type="text" name="allowenceFields[0][all_name]" value="{{ $allowences[0]['allName'] }}" placeholder="Allowence Name" class="form-control" /></td>  
                                  <td><input type="text" name="allowenceFields[0][all_val]" value="{{ $allowences[0]['allVal'] }}" placeholder="Allowence Value" class="form-control" /></td>  
                                  <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>  
                                </tr>  
                                @for ($i=1; $i< count($allowences) ; $i++)
                                  <tr>
                                    <input type="hidden" name="allowenceFields[{{ $i }}][id]" value="{{ $allowences[$i]['id'] }}">
                                    <td><input type="text" name="allowenceFields[{{ $i }}][all_name]" value="{{ $allowences[$i]['allName'] }}" placeholder="Allowence Name" class="form-control" /></td>  
                                    <td><input type="text" name="allowenceFields[{{ $i }}][all_val]" value="{{ $allowences[$i]['allVal'] }}" placeholder="Allowence Value" class="form-control" /></td>  
                                    <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td> 
                                  </tr>
                                @endfor
                              @else
                              <tr>
                                <td><input type="text" name="allowenceFields[0][all_name]" placeholder="Allowence Name" class="form-control" /></td>  
                                <td><input type="text" name="allowenceFields[0][all_val]"  placeholder="Allowence Value" class="form-control" /></td>  
                                <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>  
                              </tr>  
                              @endif
                              
                          </table> 
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