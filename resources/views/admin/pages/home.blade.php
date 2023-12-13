@extends('admin.template');

@section('pageTitle')
Home
@endsection

@section('mainContentAdmin')
<!-- Earning Reports Tabs-->
<div class="col-12 mb-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Earning Reports</h5>
                <small class="text-muted">Yearly Earnings Overview</small>
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="earningReportsTabsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsTabsId">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1 d-flex flex-nowrap" role="tablist">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn active d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-orders-id" aria-controls="navs-orders-id" aria-selected="true">
                        <div class="badge bg-label-secondary rounded p-2">
                            <i class="ti ti-shopping-cart ti-sm"></i>
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Orders</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sales-id" aria-controls="navs-sales-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2">
                            <i class="ti ti-chart-bar ti-sm"></i>
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Sales</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-profit-id" aria-controls="navs-profit-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2">
                            <i class="ti ti-currency-dollar ti-sm"></i>
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Profit</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex flex-column align-items-center justify-content-center" role="tab" data-bs-toggle="tab" data-bs-target="#navs-income-id" aria-controls="navs-income-id" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2">
                            <i class="ti ti-chart-pie-2 ti-sm"></i>
                        </div>
                        <h6 class="tab-widget-title mb-0 mt-2">Income</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link btn d-flex align-items-center justify-content-center disabled" role="tab" data-bs-toggle="tab" aria-selected="false">
                        <div class="badge bg-label-secondary rounded p-2">
                            <i class="ti ti-plus ti-sm"></i>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content p-0 ms-0 ms-sm-2">
                <div class="tab-pane fade show active" id="navs-orders-id" role="tabpanel">
                    <div id="earningReportsTabsOrders"></div>
                </div>
                <div class="tab-pane fade" id="navs-sales-id" role="tabpanel">
                    <div id="earningReportsTabsSales"></div>
                </div>
                <div class="tab-pane fade" id="navs-profit-id" role="tabpanel">
                    <div id="earningReportsTabsProfit"></div>
                </div>
                <div class="tab-pane fade" id="navs-income-id" role="tabpanel">
                    <div id="earningReportsTabsIncome"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-6 mb-4">
    <div class="card h-100">
        <div class="card-header d-flex justify-content-between">
            <div class="card-title mb-0">
                <h5 class="mb-0">Active Project</h5>
                <small class="text-muted">Average 72% Completed</small>
            </div>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="activeProjects" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects">
                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                    <a class="dropdown-item" href="javascript:void(0);">Download</a>
                    <a class="dropdown-item" href="javascript:void(0);">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/laravel-logo.png') }}" alt="laravel-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Laravel</h6>
                            <small class="text-muted">eCommerce</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">54%</span>
                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/figma-logo.png') }}" alt="figma-logo" class="me-3" width="35" />

                        <div>
                            <h6 class="mb-0">Figma</h6>
                            <small class="text-muted">App UI Kit</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">86%</span>
                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/vue-logo.png') }}" alt="vue-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">VueJs</h6>
                            <small class="text-muted">Calendar App</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">90%</span>
                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/react-logo.png') }}" alt="react-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">React</h6>
                            <small class="text-muted">Dashboard</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">37%</span>
                    </div>
                </li>
                <li class="mb-3 pb-1 d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/bootstrap-logo.png') }}" alt="bootstrap-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Bootstrap</h6>
                            <small class="text-muted">Website</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">22%</span>
                    </div>
                </li>
                <li class="d-flex">
                    <div class="d-flex w-50 align-items-center me-3">
                        <img src="{{ asset('/template/assets/img/icons/brands/sketch-logo.png') }}" alt="sketch-logo" class="me-3" width="35" />
                        <div>
                            <h6 class="mb-0">Sketch</h6>
                            <small class="text-muted">Website Design</small>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 align-items-center">
                        <div class="progress w-100 me-3" style="height: 8px">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="text-muted">29%</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Donut Chart -->
<div class="col-md-6 col-12 mb-4">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                <h5 class="card-title mb-0">Expense Ratio</h5>
                <small class="text-muted">Spending on various categories</small>
            </div>
            <div class="dropdown d-none d-sm-flex">
                <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-calendar"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                            Month</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div id="donutChart"></div>
        </div>
    </div>
</div>
@endsection
