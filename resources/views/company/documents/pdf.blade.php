
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title></title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            /* max-width: 800px; */
            width: 500px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: 'almarai', sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="invoice-box {{ app()->getLocale() == 'en' ? '' : 'rtl' }}">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('assets/images/thrs.jpg') }}" alt="Company logo"
                                    style="width: 100px; max-width: 100px" />
                            </td>



                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{ Auth::guard('employee')->user()->company->name }}<br />
                                {{ Auth::guard('employee')->user()->company->email }}<br />
                                {{ Auth::guard('employee')->user()->mobile_no }}
                            </td>

                            <td>
                                {{ $header->documentType->name }}<br />
                                {{ __('routes.Date') }}: {{ date('d-m-Y', strtotime($header->document_date)) }}<br />
                                {{ __('routes.Document number') }}:{{ $header->id }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <div class="card-body table-responsive p-0">

                <form method="POST" action="{{ route('company.journals.journals_store') }}" class='needs-validation'
                    novalidate>
                    @csrf
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="card-body row">


                        <div class="card-body">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>{{ __('routes.Account Name') }}</th>
                                    <th>{{ __('routes.Amount') }}</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                                @foreach ($details as $item)
                                    <tr>
                                        <td width="15%">{{ $item->account->account_name }}</td>
                                        <td width="15%">{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">By</label>
                            <input type="text" disabled value="{{ $header->user->name }}" name="description"
                                class="form-control" id="description" placeholder="Enter description" required>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    {{-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('routes.Submit')}}</button>
                </div> --}}
                </form>
            </div>
        </table>

    </div>
</body>

</html>
