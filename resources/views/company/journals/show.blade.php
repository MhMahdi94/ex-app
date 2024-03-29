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
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="mb-0 text-uppercase">{{ __('routes.Show Journal') }}</h3>

                <a class="mr-2 btn btn-dark" href="{{ route('company.journals.journals_pdf',$header ->id) }}" target="_blank">{{ __('routes.Print') }}</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
             
                <form method="POST" action="{{ route('company.journals.journals_store') }}" class='needs-validation' novalidate>
                    @csrf
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body row">
                        <div class="form-group col-md-6">
                            <label for="journal_date">{{ __('routes.Date') }}</label>
                            <input type="text" disabled name="journal_date" class="form-control" id="journal_date" placeholder="Enter Journal Date" value=" {{ $header ->journal_date }} " required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="journal_number">{{ __('routes.Journal Number') }}</label>
                          <input type="text" disabled  name="journal_number" class="form-control" id="journal_number" placeholder="Enter journal_number" value="{{ $header ->id }}" required>
                        </div>
                        {{-- <div class="form-group col-md-12">
                          <label for="description">Description</label>
                          <input type="text" disabled value={{ $header ->journal_description }}  name="description" class="form-control" id="description"  required>
                      </div> --}}
                      <hr>
                      <div class="card-header">
                        <h6 class="mb-0 text-uppercase">{{ __('routes.Journal Details') }}</h6>
          
                        
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered" id="dynamicAddRemove">  
                          <tr>
                              <th>{{ __('routes.Account Name') }}</th>
                              <th>{{ __('routes.Debit') }}</th>
                              <th>{{ __('routes.Credit') }}</th>
                              <th>{{ __('routes.Description') }}</th>
                              {{-- <th>Action</th> --}}
                          </tr>
                          @foreach ($details as $item )
                          <tr>
                           
                              <td width="15%">{{ $item->account->account_name }}</td>  
                              <td width="15%">{{ $item->journal_debit }}</td> 
                              <td width="15%">{{ $item->journal_credit }}</td> 
                              <td width="35%">{{ $item->journal_description }}</td>  
                              {{-- <td width="15%"></td>   --}}
                            
                            
                          </tr>  @endforeach  
                      </table> 
                      </div>
                      
                       
                      
                    </div>
                    <!-- /.card-body -->
    
                      {{-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{__('routes.Submit')}}</button>
                      </div> --}}
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
      
           $("#dynamicAddRemove").append('<tr><td>'+
                          '</td>'+
            '<td><input type="text" name="journalDetails['+i+'][debit]" placeholder="Enter {{ __("routes.Debit") }}" class="form-control" /></td>'+
            '<td><input type="text" name="journalDetails['+i+'][credit]" placeholder="Enter Credit" class="form-control" /></td>'+
            '<td><input type="text" name="journalDetails['+i+'][descriprtion]"  class="form-control" /></td>'+
            '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
       });  
</script>
 @endsection