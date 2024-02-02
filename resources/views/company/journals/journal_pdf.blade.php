{{-- @extends('layout.company') --}}
{{-- @section('title')
Chart of Account
@endsection
@section('page_name')
Chart of Account Page
@endsection
@section('active_link')
<a href="#">Chart of Account</a>
@endsection
@section('active_content')
Chart of Account Page
@endsection--}}
@section('content') 
<div class="page-content">
<h1>Journal</h1>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h6 class="mb-0 text-uppercase">Show Journal</h3>

          
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
         
            <form method="POST" action="{{ route('company.journals.journals_store') }}" class='needs-validation' novalidate>
                @csrf
                {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label for="journal_date">Date</label>
                        <input type="text" disabled name="journal_date" class="form-control" id="journal_date" placeholder="Enter Journal Date" value=" {{ $header ->journal_date }} " required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="journal_number">Journal No</label>
                      <input type="text" disabled  name="journal_number" class="form-control" id="journal_number" placeholder="Enter journal_number" value="{{ $header ->id }}" required>
                    </div>
                    {{-- <div class="form-group col-md-12">
                      <label for="description">Description</label>
                      <input type="text" disabled value={{ $header ->journal_description }}  name="description" class="form-control" id="description" placeholder="Enter description" required>
                  </div> --}}
                  <hr>
                  <div class="card-header">
                    <h6 class="mb-0 text-uppercase">Journal Details</h6>
      
                    
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered" id="dynamicAddRemove">  
                      <tr>
                          <th>Account Name</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Description</th>
                          {{-- <th>Action</th> --}}
                      </tr>
                      @foreach ($details as $item )
                      <tr>
                       
                          <td width="15%">{{ $item->journal_account_no }}</td>  
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div> --}}
              </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

</div>
    @endsection