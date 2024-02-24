@extends('layout.business')
@section('title')
    Business
@endsection
{{-- @section('page_name')
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
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $total_orders }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-cart fs-3 text-white'></i>
                            </div>
                        </div>
                        {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">{{ __('routes.Total Orders') }}</p>
                            {{-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $total_revenue }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar fs-3 text-white'></i>
                            </div>
                        </div>
                        {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">{{ __('routes.Total Revenue') }}</p>
                            {{-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $clients }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-group fs-3 text-white'></i>
                            </div>
                        </div>
                        {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">{{ __('routes.Client') }}</p>
                            {{-- <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-moonlit">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white">{{ $users }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-user fs-3 text-white'></i>
                            </div>
                        </div>
                        {{-- <div class="progress my-2 bg-opacity-25 bg-white" style="height:4px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">{{ __('routes.User List') }}</p>
                            {{-- <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">{{ __('routes.Sales') }}</h5>
                            </div>
                            {{-- <div class="dropdown options ms-auto">
                        <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                          <i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                          <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                          <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                      </div> --}}
                        </div>
                        <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                            {{-- <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-primary"></i> {{ __('routes.Sales') }}</span> --}}
                            {{-- <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i>Old Visitor</span> --}}
                        </div>
                        <div class="chart-container-1 h-100">
                            {!! $chart1->renderHtml() !!}
                            {{-- <canvas id="chart1"></canvas> --}}
                        </div>
                    </div>

                </div>
            </div>

            {{-- <div class="col-12 col-lg-4 col-xl-4 d-flex">
           <div class="card radius-10 overflow-hidden w-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <h5 class="mb-0">{{ __('routes.Best Seller') }}</h5>
                
              </div>
              
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center border-top">
                  Product 1
                  <span class="badge bg-primary rounded-pill">558</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Product 2
                  <span class="badge bg-success rounded-pill">204</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Product 3
                  <span class="badge bg-danger rounded-pill">108</span>
                </li>
              </ul>
            </div>
          </div>
        </div> --}}
        </div><!--End Row-->

    </div>
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
@endsection
