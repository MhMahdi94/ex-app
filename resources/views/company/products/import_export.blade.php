@extends('layout.company')
@section('title')
    Import/Export
@endsection
@section('page_name')
    Import/Export Page
@endsection
@section('active_link')
    <a href="#">Import/Export</a>
@endsection
@section('active_content')
    Import/Export Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('routes.Import/Export') }}</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ق">

                        <form method="POST" action="{{ route('company.stock.stock_import_export_update') }}"
                            class='needs-validation row g-2' novalidate>
                            @csrf
                            {{-- @method('put') --}}
                            {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                            <div class="row gap-2 mb-2">
                                <div class="form-group ">
                                    <label for="name">{{ __('routes.Name') }}</label>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    <input type="text" readonly name="name" class="form-control"
                                        value="{{ $product->name }}" id="name" required>
                                </div>

                                <div class="form-group ">
                                    <label for="operation_id">{{ __('routes.Operation') }}</label>
                                    <select name="operation_id" id="" class="form-control select2">
                                        @foreach ($opertions as $opertion)
                                            <option value="{{ $opertion->id }}">{{ $opertion->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="current_quantity"> {{ __('routes.Current Quantity') }}</label>
                                    <input type="number" readonly name="current_quantity" class="form-control"
                                        value="{{ $product->quantity }}" id="current_quantity" required>
                                </div>

                                <div class="form-group ">
                                    <label for="quantity">{{ __('routes.Quantity') }}</label>
                                    <input type="number" name="quantity" class="form-control" id="quantity" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="price">{{ __('routes.Price') }}</label>
                                        <input type="number" name="price" step="0.0001" class="form-control price"
                                            id="price" required min="0">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price_usd">{{ __('routes.Price (USD)') }}</label>
                                        <input readonly type="number" step="0.0001" name="price_usd" class="form-control"
                                            id="price_usd" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="currency_id">{{ __('routes.Currency') }}</label>
                                        <select name="currency_id" id="" class="form-control select2 exchange_rate">
                                            @foreach ($currencies as $currency)
                                            
                                                <option class="currency-val" data-value="{{ $currency->exchange_rate }}" value="{{ $currency->id }}">{{ $currency->name }}
                                                    ({{ $currency->code }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


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
    <script>
        var exchange_rate=1;
        $(".price").keyup(function() {
            console.log("The text has been changed." +this.value );
            $('#price_usd').val(this.value/exchange_rate);
        });
        $(".price").change(function() {
            console.log("The text has been changed." +this.value );
            $('#price_usd').val(this.value/exchange_rate);
        });
        $(".exchange_rate").change(function() {
            // console.log($('.currency-val').data('value'));
            var option = $('option:selected', this).attr('data-value');
            console.log(option);
            exchange_rate=option;
            $('#price_usd').val($(".price").val()/exchange_rate);
        });
    </script>
@endsection
