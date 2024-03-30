@extends('layout.company')
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
        @if ($remaining <= 45)
            <div class="alert alert-warning d-flex align-items-center gap-2" role="alert">
                <i class='bx bx-info-circle bx-md'></i>
                <h6 class="text-dark">{{ $remaining }} {{ __('routes.Days remaining in your subscription') }}</h6>
            </div>
        @endif
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            {{-- <div class="col row  row-cols-1 row-cols-md-2 row-cols-xl-2"> --}}
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $employees_count }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-user fs-3 text-white'></i>
                            </div>
                        </div>
                        {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">{{ __('routes.Employees') }}</p>
                            {{-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
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
                            {{-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $total_revenues }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar-circle fs-3 text-white'></i>
                            </div>
                        </div>
                        {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">{{ __('routes.Revenue') }}</p>
                            {{-- <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-moonlit">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $total_expenses }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar-circle fs-3 text-white'></i>
                            </div>
                        </div>
                        {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">{{ __('routes.Expenses') }}</p>
                            {{-- <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- </div> --}}

        </div>
        <div class="row">
            <div class="col-8">
                <div class="card h-max">
                    <div class="card-header">
                        <h6 class="mb-0 text-uppercase">{{ __('routes.Attendence Sheet') }}</h6>
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <div class="card radius-15 bg-success">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">

                                        {{-- <img src="assets/images/avatars/avatar-9.png" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt=""> --}}
                                        <h5 class="mb-3 mt-0 text-white">{{ $check_in_count }}</h5>
                                        <p class="mb-0 text-white">{{ __('routes.Check in') }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-15 bg-danger">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">

                                        {{-- <img src="assets/images/avatars/avatar-9.png" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt=""> --}}
                                        <h5 class="mb-3 mt-0 text-white">{{ $employees_count - $check_in_count }}</h5>
                                        <p class="mb-0 text-white">{{ __('routes.Absent') }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card ">
                    <div class="card-header">
                        <h6 class="mb-0 text-uppercase">{{ __('routes.Leave Request') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="card radius-15 bg-success">
                            <div class="card-body text-center">
                                <div class="p-4 radius-15">

                                    {{-- <img src="assets/images/avatars/avatar-9.png" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt=""> --}}
                                    <h5 class="mb-3 mt-0 text-white">{{ $leave_requests }}</h5>
                                    <p class="mb-0 text-white">{{ __('routes.Leave Request') }}</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row px-1 mb-2">
            <div class="col-12 ">
                <div class="card px-3">

                    {!! $chart1->renderHtml() !!}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="card px-2">
                    <div class="card-header ">
                        <h6 class="mb-0 text-uppercase">{{ __('routes.Employees') }}</h6>
                    </div>
                    <div class="card-body">
                        @php
                            $id = 0;
                        @endphp
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
                                @foreach ($last_employees as $employee)
                                    <tr>
                                        <th scope="row">{{ ++$id }}</th>
                                        <td>{{ $employee->name }}</td>
                                        <td><span
                                                class="badge {{ $employee->status ? 'bg-success' : 'bg-danger' }} ">{{ $employee->status ? __('routes.Active') : __('routes.Not Active') }}</span>
                                        </td>
                                        {{-- <td>@mdo</td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-max">
                    <div class="card-header">
                        <h6 class="mb-0 text-uppercase">{{ __('routes.Stock Managment') }}</h6>
                    </div>
                    <div class="card-body row">
                        <div class="col">
                            <div class="card radius-15 bg-primary">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">

                                        {{-- <img src="assets/images/avatars/avatar-9.png" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt=""> --}}
                                        <h5 class="mb-3 mt-0 text-white">{{ $products }}</h5>
                                        <p class="mb-0 text-white">{{ __('routes.Product') }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-15 bg-dark">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">

                                        {{-- <img src="assets/images/avatars/avatar-9.png" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt=""> --}}
                                        <h5 class="mb-3 mt-0 text-white">{{ $products_sum }}</h5>
                                        <p class="mb-0 text-white">{{ __('routes.Price') }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
@endsection
