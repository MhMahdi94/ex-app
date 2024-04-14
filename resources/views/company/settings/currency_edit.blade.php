@extends('layout.company')
{{-- @section('title')
    Company
@endsection
@section('page_name')
    Company Page
@endsection
@section('active_link')
    <a href="#">Company</a>
@endsection
@section('active_content')
    Company Page
@endsection --}}
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h6 class="mb-0 text-uppercase ">{{ __('routes.Add Currency') }}</h6>



                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.settings.settings_currnecy_update', $currency->id) }}"
                            class='needs-validation' novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-body row">
                                <div class="form-group">
                                    <label for="currency_name">{{ __('routes.Name') }}</label>
                                    <input type="text" name="currency_name" class="form-control" id="currency_name"
                                        required value="{{ $currency->name }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="currency_code">{{ __('routes.Currency Code') }}</label>
                                    <input type="text" name="currency_code" class="form-control" id="currency_code"
                                        required value="{{ $currency->code }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exchange_rate">{{ __('routes.Exchange Rate') }}</label>
                                    <input type="number" step="0.01" name="exchange_rate" class="form-control"
                                        id="exchange_rate" value="{{ $currency->exchange_rate }}" required>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('routes.Submit') }}</button>
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
