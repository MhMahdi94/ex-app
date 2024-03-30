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

                        <h6 class="mb-0 text-uppercase ">{{ __('routes.Currency') }}</h6>
                       
                        <div class="d-flex ustify-content-between align-items-center" width='200'>
                            
                                <a class=" btn btn-primary float-right" href="{{ route('company.settings.settings_currnecy_create') }}">{{ __('routes.Add Currency') }}</a>
                          
                                
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('routes.Name') }}</th>
                                        <th>{{ __('routes.Currency Code') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($currencies as $currency)
                                        <tr>
                                            <td>{{ $currency->name }}</td>
                                            <td>{{ $currency->code }}</td>
                                            
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
@endsection
