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
    <title>Stock Report</title>

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
        <h1>Accounts</h1>
        <h5>Date :{{ $date }}</h5>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Account No</th>
                        <th>Total Debit</th>
                        <th>Total Credit</th>
                        <th>Balance</th>
                        {{-- <th>Quantity</th>
                        <th>Date</th>
                        <th>By</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->account_name }}</td>
                            <td>{{ $item->account_no }}</td>
                            <td>{{ $item->account_debit }}</td>
                            <td>{{ $item->account_credit }}</td>
                            <td>{{ $item->account_balance }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
