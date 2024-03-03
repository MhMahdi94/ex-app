@extends('layout.business')
{{-- @section('title')
Owners
@endsection
@section('page_name')
Owners Page
@endsection
@section('active_link')
<a href="#">Owners</a>
@endsection
@section('active_content')
Owners Page
@endsection --}}
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="invoice">
                            <div class="toolbar hidden-print">
                                <div class="text-end">
                                    <button type="button" class="btn btn-dark"><i class="fa fa-print"></i>
                                        {{ __('routes.Print') }}</button>
                                    {{-- <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as
                                        PDF</button> --}}
                                </div>
                                <hr />
                            </div>
                            <form method="POST" action="{{ route('business.invoices.invoices_store') }}"
                                class='needs-validation' novalidate>
                                @csrf
                                <div class="invoice overflow-auto">
                                    <div style="min-width: 600px">
                                        <header>
                                            <div class="row">
                                                <div class="col">
                                                    {{-- <a href="javascript:;"> --}}
                                                    <img src="{{ asset('assets/images/thrs.jpg') }}" width="120"
                                                        alt="" />
                                                    {{-- </a> --}}
                                                </div>
                                                <div class="col company-details">
                                                    <h2 class="name">
                                                        {{-- <a target="_blank" href="javascript:;"> --}}
                                                        {{ Auth::guard('business')->user()->company->name }}
                                                        {{-- </a> --}}
                                                    </h2>

                                                    {{-- <div>{{ Auth::guard('business')->user()->company->address }}</div> --}}
                                                    <div>{{ Auth::guard('business')->user()->company->mobile_no }}</div>
                                                    <div>{{ Auth::guard('business')->user()->company->email }}</div>
                                                </div>
                                            </div>
                                        </header>
                                        <main>
                                            <div class="row contacts">
                                                <div class="col invoice-to">
                                                    <div class="text-gray-light">{{ __('routes.INVOICE TO:') }}</div>
                                                    <select name="client_id" id="client_id" class="form-control select2">
                                                        @foreach ($clients as $client)
                                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="address"></div>
                                                    <div class="email"><a href="mailto:john@example.com"></a>
                                                    </div>
                                                </div>
                                                <div class="col invoice-details">
                                                    <h1 class="invoice-id">
                                                        {{ __('routes.INVOICE NO:') }}{{ $invoice_count + 1 }}</h1>
                                                    <div class="date">{{ __('routes.Date') }}: {{ $invoice_date }}</div>

                                                </div>
                                            </div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        {{-- <th>#</th> --}}
                                                        <th class="">{{ __('routes.Service') }}</th>
                                                        <th class="text-left">{{ __('routes.Price') }}</th>
                                                        {{-- <th class="text-right">HOURS</th>
                                                    <th class="text-right">TOTAL</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        {{-- <td class="no">04</td> --}}
                                                        <td class="text-left">
                                                            <select name="service_id" id="service_id"
                                                                class="form-control select2">
                                                                @foreach ($services as $service)
                                                                    <option value="{{ $service->id }}">
                                                                        {{ $service->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td class="">
                                                            <div class="form-group mb-2 col-md-12">
                                                                {{-- <label for="name" >{{__('routes.Name')}}</label> --}}
                                                                <input type="text" name="price" class="form-control"
                                                                    id="price" required>
                                                            </div>
                                                        </td>
                                                        {{-- <td class="qty">100</td>
                                                    <td class="total">$0.00</td> --}}
                                                    </tr>

                                                </tbody>
                                                <tfoot>

                                                    <tr>
                                                        <td colspan="2">
                                                            <button type="submit" class="btn btn-dark"><i
                                                                    class="fa fa-print"></i>
                                                                {{ __('routes.Submit') }}</button>

                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </main>
                                    </div>
                                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                    <div></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection
