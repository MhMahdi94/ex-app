@extends('layout.company')
@section('title')
Document
@endsection
@section('page_name')
Document Page
@endsection
@section('active_link')
<a href="#">Journal</a>
@endsection
@section('active_content')
Document Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Document</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
             
                <form method="POST" action="{{ route('company.documents.document_store') }}" class='needs-validation' novalidate>
                    @csrf
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body row">
                        <div class="form-group col-md-4">
                            <label for="document_date">Date</label>
                            <input type="text" readonly name="document_date" class="form-control" id="document_date" placeholder="Enter document Date" value="{{ $date }}" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="document_number">Document number</label>
                          <input type="text" readonly  name="document_number" class="form-control" id="document_number" placeholder="Enter document_number" value="{{ $count +1 }}" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="document_type">Document Type</label>
                          <select name="document_type" id="" class="form-control select2">
                            @foreach ($document_types as $type)
                              <option value="{{ $type->id }}">{{ $type->name }}</option>
                              
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="description">Description</label>
                          <input type="text"  name="description" class="form-control" id="description" placeholder="Enter description" required>
                      </div>
                      <hr>
                      <div class="card-header">
                        <h3 class="card-title">Documents Details</h3>
          
                        
                      </div>
                      <table class="table table-bordered" id="dynamicAddRemove">  
                        <tr>
                            <th>Account Name</th>
                            <th>Amount</th>
                            {{-- <th>Credit</th>
                            <th>Description</th> --}}
                            <th>Action</th>
                        </tr>
                        <tr>  
                            <td width="15%">
                              {{-- <input type="text" name="journalDetails[0][account_no]" placeholder="Enter Account Name" class="form-control" /> --}}
                            <div class="form-group ">
                          {{-- <label for="journalDetails[0][account_no]">Head</label> --}}
                          <select name="documentDetails[0][account_no]" id="" class="form-control select2">
                            @foreach ($accounts as $account)
                              <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                              
                            @endforeach
                          </select>
                        </div>
                            </td>  
                            <td width="15%"><input type="text" name="documentDetails[0][amount]" placeholder="Enter Amount" class="form-control" /></td> 
                            {{-- <td width="15%"><input type="text" name="documentDetails[0][credit]" placeholder="Enter credit" class="form-control" /></td>  --}}
                            {{-- <td width="35%"><input type="text" name="documentDetails[0][descriprtion]" placeholder="Enter Description" class="form-control" /></td>   --}}
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
      
           $("#dynamicAddRemove").append('<tr><td><select name="documentDetails['+i+'][account_no]" id="" class="form-control select2">'+
                            '@foreach ($accounts as $account)'+
                              '<option value="{{ $account->id }}">{{ $account->account_name }}</option>'+                              
                            '@endforeach'+
                          '</select>'+
                          '</td>'+
            '<td><input type="text" name="documentDetails['+i+'][amount]" placeholder="Enter Amount" class="form-control" /></td>'+
            '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
       });  
</script>
 @endsection