@extends('layout.admin')
@section('title')
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
@endsection
@section('content')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $admins_count }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-shield fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">{{ __('routes.Admins') }}</p>
                        {{-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $new_requests_count }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-file fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">{{ __('routes.Requests') }}</p>
                        {{-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $companies_count }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-building fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">{{ __('routes.Company') }}</p>
                        {{-- <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-moonlit">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $business_count }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-shopping-bag fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">{{ __('routes.Business') }}</p>
                        {{-- <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-scooter">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $employees_count }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-user-circle fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">{{ __('routes.Employees') }}</p>
                        {{-- <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card radius-10 bg-gradient-blooker">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $departments_count }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-grid-horizontal fs-3 text-white'></i>
                        </div>
                    </div>
                    {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">{{ __('routes.Departments') }}</p>
                        {{-- <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $id=0; 
    @endphp
    <div class="row row-cols-1 row-cols-md-1 row-cols-xl-2">
        <div class="col">
            <div class="card px-2">
                <div class="card-header ">
                    <h6 class="mb-0 text-uppercase">{{__('routes.Companies List')  }}</h6>
                  

                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('routes.Name') }}</th>
                                <th scope="col">{{ __('routes.Status') }}</th>
                                {{-- <th scope="col">{{ __('routes.Name') }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($last_companies as $company )
                            <tr>
                                <th scope="row">{{ ++$id }}</th>
                                <td>{{ $company->name }}</td>
                                <td><span
                                    class="badge {{ $company->isActive ? 'bg-success' : 'bg-danger' }} ">{{ $company->isActive ? __('routes.Active') : __('routes.Not Active') }}</span>
                                </td>
                                {{-- <td>@mdo</td> --}}
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @php
            $id=0; 
        @endphp
        <div class="col">
            <div class="card px-2">
                <div class="card-header ">
                    <h6 class="mb-0 text-uppercase">{{__('routes.Requests')  }}</h6>
                  

                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('routes.Name') }}</th>
                                <th scope="col">{{ __('routes.Owner') }}</th>
                                <th scope="col">{{ __('routes.Status') }}</th>
                                {{-- <th scope="col">{{ __('routes.Name') }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($last_requests as $request )
                            <tr>
                                <th scope="row">{{ ++$id }}</th>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->owner }}</td>
                                <td><span
                                    class="badge {{ $request->status ? 'bg-success' : 'bg-danger' }} ">{{ $request->status ? __('routes.Active') : __('routes.Not Active') }}</span>
                                </td>
                                {{-- <td>@mdo</td> --}}
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection