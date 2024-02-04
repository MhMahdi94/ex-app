<!doctype html>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/thrs.jpg') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/header-colors.css') }}" />
    <title>Attendence Report</title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                
                  
                    <!-- /.card-header -->
                  
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="mb-0 text-uppercase ">Payroll Sheet( {{ $from }} -> {{ $to }})</h3>
                            {{-- <a class=" btn btn-primary float-right" href="{{ route('company.payroll.payroll_pdf') }}">Print</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Total Days</th>
                                            <th>Working</th>
                                            <th>Absent</th>
                                            <th>Salary</th>
                                            <th>Current Salary</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $diff }}</td>
                                                <td>{{ $employee->check_in }}</td>
                                                <td>{{ $diff-$employee->check_in }}</td>
                                                <td>{{$employee->details->salary }}</td>
                                                <td>{{$employee->current_salary }}</td>
                                                {{-- <td class="d-flex ">
                                                    <div class="mx-2">
                                                        <a class="btn btn-primary px-4"
                                                            href="{{ route('company.roles.roles_edit', $employee->id) }}">Edit</a>
                                                    </div>
                                                    <div class="">
                                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                                        <form method="post" class="delete-form"
                                                            data-route="{{ route('company.roles.roles_destroy', $employee->id) }}">
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger px-4 ">Delete</button>
                                                        </form>
                                                    </div>
    
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
    
                                </table>
                            </div>
                        </div>
                    
                        
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</body>

</html>
