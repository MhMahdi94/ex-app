@extends('layout.pdf')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="">
                        <div class="d-flex gap-3">
                            <div class="">
                                <img src="{{ asset('assets/images/thrs.jpg') }}" width="80" height="80" alt="">
                            </div>
                            <div class="row">
                                <span class="fs-6 fw-bold">{{ Auth::guard('employee')->user()->company->name }}</span>
                                <span
                                    class="text-secondary fs-6 fw-normal">{{ Auth::guard('employee')->user()->company->email }}</span>
                                <label class="text-secondary  fw-normal"
                                    style="font-size: 12px">{{ Auth::guard('employee')->user()->mobile_no }}</label>
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <h6>
                            {{ __('routes.Balance Sheet') }} 
                        </h6>
                        <h6>{{ __('routes.Date') }}: {{ $date}}</h6>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive ">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            {{-- <th>{{ __('routes.Date') }}</th> --}}
                                            <th>{{ __('routes.Account No') }}</th>
                                            <th>{{ __('routes.Account Name') }}</th>
    
                                            <th>{{ __('routes.Debit') }}</th>
                                            <th>{{ __('routes.Credit') }}</th>
                                            {{-- <th>{{ __('routes.Description') }}</th>
                                            <th>{{ __('routes.Operation') }}</th> --}}
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
    
                                        @foreach ($accounts as $item)
                                                <tr>
                                                    <td>{{ $item->account->account_no??'' }}</td>
                                                    <td>{{ $item->account->account_name??'' }}</td>
                                                    <td>{{ $item->total_debit??''}}</td>
                                                    <td>{{$item->total_credit??'' }}</td>
                                                </tr>
                                            @endforeach
                                    </tbody>
    
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card-footer row">
                    <div class="col">
                        {{ __('routes.Total Debit') }}: {{ $total_debit }}
                    </div>
                    <div class="col">
                        {{ __('routes.Total Credit') }}: {{ $total_credit }}
                    </div>
                    <div class="col">
                        {{ __('routes.Balance') }}: {{ $diff }}
                    </div>
                </div>
            </div>

            
        </div>
    </div>
@endsection
