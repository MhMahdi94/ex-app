@extends('layout.pdf')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
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
                    <div class="col float-right">
                        <h6>
                            {{ $header->documentType->name }} (#{{$header->id  }})
                        </h6>
                        <span>{{ __('routes.Date')  }}:{{  $header->document_date }}</span>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive ">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('routes.Account Name') }}</th>
                                            <th>{{ __('routes.Amount') }}</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $item)
                                            <tr>

                                                @foreach ($details as $item)
                                                <tr>
                                                    <td >{{ $item->account->account_name }}</td>
                                                    <td >{{ $item->amount }}</td>
                                                </tr>
                                            @endforeach


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
            </div>
        </div>
    </div>
@endsection

