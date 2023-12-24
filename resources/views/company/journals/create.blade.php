@extends('layout.company')
@section('title')
Journal
@endsection
@section('page_name')
Journal Page
@endsection
@section('active_link')
<a href="#">Journal</a>
@endsection
@section('active_content')
Journal Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Journal</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
             
                <form method="POST" action="{{ route('company.journals.journals_store') }}" class='needs-validation' novalidate>
                    @csrf
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body row">
                        <div class="form-group col-md-6">
                            <label for="journal_date">Date</label>
                            <input type="text" readonly name="journal_date" class="form-control" id="journal_date" placeholder="Enter Journal Date" value="{{ $date }}" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="journal_number">Journal number</label>
                          <input type="text" readonly  name="journal_number" class="form-control" id="journal_number" placeholder="Enter journal_number" value="{{ $count +1 }}" required>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="description">Description</label>
                          <input type="text"  name="description" class="form-control" id="description" placeholder="Enter description" required>
                      </div>
                      <hr>
                      <div class="card-header">
                        <h3 class="card-title">Journal Details</h3>
          
                        
                      </div>
                      <table class="table table-bordered" id="dynamicAddRemove">  
                        <tr>
                            <th>Account Name</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        <tr>  
                            <td width="15%">
                              {{-- <input type="text" name="journalDetails[0][account_no]" placeholder="Enter Account Name" class="form-control" /> --}}
                            <div class="form-group ">
                          {{-- <label for="journalDetails[0][account_no]">Head</label> --}}
                          <select name="journalDetails[0][account_no]" id="" class="form-control select2">
                            @foreach ($accounts as $account)
                              <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                              
                            @endforeach
                          </select>
                        </div>
                            </td>  
                            <td width="15%"><input type="text" name="journalDetails[0][debit]" placeholder="Enter Debit" class="form-control" /></td> 
                            <td width="15%"><input type="text" name="journalDetails[0][credit]" placeholder="Enter credit" class="form-control" /></td> 
                            <td width="35%"><input type="text" name="journalDetails[0][descriprtion]" placeholder="Enter Description" class="form-control" /></td>  
                            <td width="15%"><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>  
                        </tr>  
                    </table> 
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
      
           $("#dynamicAddRemove").append('<tr><td><select name="journalDetails['+i+'][account_no]" id="" class="form-control select2">'+
                            '@foreach ($accounts as $account)'+
                              '<option value="{{ $account->id }}">{{ $account->account_name }}</option>'+                              
                            '@endforeach'+
                          '</select>'+
                          '</td>'+
            '<td><input type="text" name="journalDetails['+i+'][debit]" placeholder="Enter Debit" class="form-control" /></td>'+
            '<td><input type="text" name="journalDetails['+i+'][credit]" placeholder="Enter Credit" class="form-control" /></td>'+
            '<td><input type="text" name="journalDetails['+i+'][descriprtion]" placeholder="Enter Description" class="form-control" /></td>'+
            '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
       });  
</script>
 @endsection