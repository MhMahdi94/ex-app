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
    <title>Document</title>

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
        <h1>Document</h1>
        <h5>Date :{{ $date }}</h5>
        <div class="row">
            <div class="card-body row g-2">
                <div class="form-group col-md-4">
                    <label for="journal_date">Date</label>
                    <input type="text" disabled name="journal_date" class="form-control"
                        id="journal_date" placeholder="Enter Journal Date"
                        value=" {{ $header->document_date }} " required>
                </div>
                <div class="form-group col-md-4">
                    <label for="journal_number">Document No</label>
                    <input type="text" disabled name="journal_number" class="form-control"
                        id="journal_number" placeholder="Enter journal_number" value="{{ $header->id }}"
                        required>
                </div>
                <div class="form-group col-md-4">
                    <label for="journal_number">Document Type</label>
                    <input type="text" disabled name="journal_number" class="form-control"
                        id="journal_number" placeholder="Enter journal_number"
                        value="{{ $header->documentType->name }}" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <input type="text" disabled value={{ $header->document_description }}
                        name="description" class="form-control" id="description"
                        placeholder="Enter description" required>
                </div>
                <hr>
                <div class="card-header">
                    <h3 class="card-title">Document Details</h3>


                </div>
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Account Name</th>
                        <th>amount</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                    @foreach ($details as $item)
                        <tr>
                            <td width="15%">{{ $item->account->account_name }}</td>
                            <td width="15%">{{ $item->amount }}</td>
                        </tr>
                    @endforeach
                </table>
                <hr/>
                <div class="form-group col-md-12">
                    <label for="description">By</label>
                    <input type="text" disabled value="{{ $header->user->name }}"
                        name="description" class="form-control" id="description"
                        placeholder="Enter description" required>
                </div>


            </div>
        </div>

    </div>
</body>

</html>
