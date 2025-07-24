@extends('nasser-dashboard::layouts.master')

@section('title', 'Analytics & Reports')





@section('header-actions')
  <button class="btn btn-success btn-sm me-2">
    <i class="bi bi-download me-1"></i>Export Report
  </button>
  <button class="btn btn-info btn-sm">
    <i class="bi bi-calendar me-1"></i>Date Range
  </button>
@endsection

@php
// Static analytics data
$salesData = [
    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    'data' => [12000, 15000, 18000, 22000, 25000, 28000]
];

$productPerformance = collect([
    (object) [
        'name' => 'iPhone 14 Pro Max',
        'sales' => 45,
        'revenue' => 58499.55,
        'rating' => 4.8
    ],
    (object) [
        'name' => 'Samsung Galaxy S23 Ultra',
        'sales' => 32,
        'revenue' => 38399.68,
        'rating' => 4.6
    ],
    (object) [
        'name' => 'MacBook Pro 16" M2',
        'sales' => 18,
        'revenue' => 44999.82,
        'rating' => 4.9
    ],
    (object) [
        'name' => 'Nike Air Jordan 1 Retro',
        'sales' => 67,
        'revenue' => 11390.00,
        'rating' => 4.7
    ]
]);

$customerStats = [
    'total' => 1250,
    'new_this_month' => 89,
    'active' => 892,
    'premium' => 156
];

$topCategories = collect([
    (object) ['name' => 'Electronics', 'products' => 45, 'revenue' => 125000],
    (object) ['name' => 'Fashion', 'products' => 32, 'revenue' => 89000],
    (object) ['name' => 'Home & Garden', 'products' => 28, 'revenue' => 67000],
    (object) ['name' => 'Sports', 'products' => 22, 'revenue' => 45000]
]);
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <!-- Key Performance Indicators -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-primary">
                        <div class="inner">
                            <h3>${{ number_format(array_sum($salesData['data'])) }}</h3>
                            <p>Total Revenue (6 Months)</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            View Details <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{ $customerStats['total'] }}</h3>
                            <p>Total Customers</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            View Details <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-warning">
                        <div class="inner">
                            <h3>{{ $customerStats['new_this_month'] }}</h3>
                            <p>New Customers (This Month)</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            View Details <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-info">
                        <div class="inner">
                            <h3>{{ $productPerformance->sum('sales') }}</h3>
                            <p>Total Product Sales</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            View Details <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <!-- Sales Chart -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-graph-up me-2"></i>
                                Monthly Sales Revenue
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <div class="row">
                                    @foreach($salesData['labels'] as $index => $month)
                                        <div class="col-2 text-center">
                                            <div class="bg-primary text-white p-3 rounded mb-2">
                                                <h6 class="mb-0">${{ number_format($salesData['data'][$index]) }}</h6>
                                            </div>
                                            <small class="text-muted">{{ $month }}</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Distribution -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-pie-chart me-2"></i>
                                Customer Distribution
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="bg-success text-white p-3 rounded mb-2">
                                        <h4>{{ $customerStats['active'] }}</h4>
                                        <small>Active</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-warning text-white p-3 rounded mb-2">
                                        <h4>{{ $customerStats['premium'] }}</h4>
                                        <small>Premium</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-info text-white p-3 rounded mb-2">
                                        <h4>{{ $customerStats['new_this_month'] }}</h4>
                                        <small>New This Month</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-secondary text-white p-3 rounded mb-2">
                                        <h4>{{ $customerStats['total'] - $customerStats['active'] }}</h4>
                                        <small>Inactive</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Performance & Top Categories -->
            <div class="row">
                <!-- Product Performance -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-star me-2"></i>
                                Top Performing Products
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Sales</th>
                                            <th>Revenue</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productPerformance as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    <span class="badge bg-primary">{{ $product->sales }}</span>
                                                </td>
                                                <td>${{ number_format($product->revenue, 2) }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="text-warning me-1">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= $product->rating)
                                                                    <i class="bi bi-star-fill"></i>
                                                                @else
                                                                    <i class="bi bi-star"></i>
                                                                @endif
                                                            @endfor
                                                        </span>
                                                        <small class="text-muted">({{ $product->rating }})</small>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Categories -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-folder me-2"></i>
                                Top Categories by Revenue
                            </h3>
                        </div>
                        <div class="card-body">
                            @foreach($topCategories as $category)
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h6 class="mb-0">{{ $category->name }}</h6>
                                        <small class="text-muted">{{ $category->products }} products</small>
                                    </div>
                                    <div class="text-end">
                                        <h6 class="mb-0 text-primary">${{ number_format($category->revenue) }}</h6>
                                        <small class="text-muted">
                                            {{ round(($category->revenue / $topCategories->sum('revenue')) * 100, 1) }}%
                                        </small>
                                    </div>
                                </div>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar bg-primary" 
                                         style="width: {{ ($category->revenue / $topCategories->sum('revenue')) * 100 }}%">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Export & Reports Section -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-download me-2"></i>
                                Export Reports
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-file-earmark-excel fs-1 text-success mb-2"></i>
                                        <h6>Sales Report</h6>
                                        <p class="text-muted small">Monthly sales data in Excel format</p>
                                        <button class="btn btn-success btn-sm">
                                            <i class="bi bi-download me-1"></i>
                                            Export Excel
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-file-earmark-pdf fs-1 text-danger mb-2"></i>
                                        <h6>Customer Report</h6>
                                        <p class="text-muted small">Customer analytics in PDF format</p>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-download me-1"></i>
                                            Export PDF
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-file-earmark-text fs-1 text-info mb-2"></i>
                                        <h6>Product Report</h6>
                                        <p class="text-muted small">Product performance data</p>
                                        <button class="btn btn-info btn-sm">
                                            <i class="bi bi-download me-1"></i>
                                            Export CSV
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-graph-up fs-1 text-warning mb-2"></i>
                                        <h6>Analytics Report</h6>
                                        <p class="text-muted small">Complete analytics overview</p>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="bi bi-download me-1"></i>
                                            Export Report
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection 