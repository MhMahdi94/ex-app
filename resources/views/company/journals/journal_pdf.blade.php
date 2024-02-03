<!doctype html>
<html lang="en">
<head>


 	<!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--favicon-->
   <link rel="icon" href="{{ asset('assets/images/thrs.jpg') }}" type="image/png"/>
   <!--plugins-->
   <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
   <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
   <!-- loader-->
   <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet"/>
   <script src="{{ asset('assets/js/pace.min.js') }}"></script>
   <!-- Bootstrap CSS -->
   <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
   <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
   <!-- Theme Style CSS -->
   <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}"/>
   <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}"/>
   <title>journal</title>
</head>
<body>
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
</body>
</html>
