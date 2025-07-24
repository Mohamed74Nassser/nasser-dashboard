@extends('nasser-dashboard::layouts.master')

@section('title', 'Advanced Reports')





@section('header-actions')
  <button class="btn btn-success btn-sm me-2">
    <i class="bi bi-file-earmark-pdf me-1"></i>PDF Report
  </button>
  <button class="btn btn-warning btn-sm me-2">
    <i class="bi bi-file-earmark-excel me-1"></i>Excel Export
  </button>
  <button class="btn btn-primary btn-sm">
    <i class="bi bi-plus-circle me-1"></i>New Report
  </button>
@endsection

@section('content')
@php
// Static reports data
$salesReport = collect([
    (object) ['month' => 'Jan', 'sales' => 12000, 'orders' => 45, 'customers' => 32],
    (object) ['month' => 'Feb', 'sales' => 15000, 'orders' => 52, 'customers' => 38],
    (object) ['month' => 'Mar', 'sales' => 18000, 'orders' => 61, 'customers' => 45],
    (object) ['month' => 'Apr', 'sales' => 22000, 'orders' => 73, 'customers' => 52],
    (object) ['month' => 'May', 'sales' => 25000, 'orders' => 84, 'customers' => 58],
    (object) ['month' => 'Jun', 'sales' => 28000, 'orders' => 92, 'customers' => 65]
]);

$topProducts = collect([
    (object) ['name' => 'iPhone 14 Pro Max', 'sales' => 45, 'revenue' => 58499.55, 'growth' => '+12%'],
    (object) ['name' => 'Samsung Galaxy S23 Ultra', 'sales' => 32, 'revenue' => 38399.68, 'growth' => '+8%'],
    (object) ['name' => 'MacBook Pro 16" M2', 'sales' => 18, 'revenue' => 44999.82, 'growth' => '+15%'],
    (object) ['name' => 'Nike Air Jordan 1 Retro', 'sales' => 67, 'revenue' => 11390.00, 'growth' => '+5%'],
    (object) ['name' => 'Sony WH-1000XM4', 'sales' => 28, 'revenue' => 8399.72, 'growth' => '+20%']
]);

$customerReport = collect([
    (object) ['segment' => 'New Customers', 'count' => 89, 'percentage' => 35, 'trend' => '+12%'],
    (object) ['segment' => 'Returning Customers', 'count' => 156, 'percentage' => 45, 'trend' => '+8%'],
    (object) ['segment' => 'Premium Customers', 'count' => 45, 'percentage' => 20, 'trend' => '+15%']
]);
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <!-- Report Filters -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-funnel me-2"></i>
                                Report Filters
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Range</label>
                                        <select class="form-control">
                                            <option>Last 7 Days</option>
                                            <option selected>Last 30 Days</option>
                                            <option>Last 3 Months</option>
                                            <option>Last 6 Months</option>
                                            <option>Last Year</option>
                                            <option>Custom Range</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Report Type</label>
                                        <select class="form-control">
                                            <option>Sales Report</option>
                                            <option>Product Performance</option>
                                            <option>Customer Analysis</option>
                                            <option>Inventory Report</option>
                                            <option>Financial Summary</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control">
                                            <option>All Categories</option>
                                            <option>Electronics</option>
                                            <option>Fashion</option>
                                            <option>Home & Garden</option>
                                            <option>Sports</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary">
                                                <i class="bi bi-search me-2"></i>
                                                Generate Report
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Report Types -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Sales</h3>
                            <p>Revenue & Orders</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <a href="#salesReport" class="small-box-footer">
                            View Report <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Products</h3>
                            <p>Performance & Inventory</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-box"></i>
                        </div>
                        <a href="#productReport" class="small-box-footer">
                            View Report <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Customers</h3>
                            <p>Segmentation & Behavior</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <a href="#customerReport" class="small-box-footer">
                            View Report <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Financial</h3>
                            <p>P&L & Cash Flow</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <a href="#financialReport" class="small-box-footer">
                            View Report <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sales Report -->
            <div class="row" id="salesReport">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-graph-up me-2"></i>
                                Sales Performance Report
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-download me-1"></i>
                                        Export PDF
                                    </button>
                                    <button type="button" class="btn btn-outline-success btn-sm">
                                        <i class="bi bi-file-earmark-excel me-1"></i>
                                        Export Excel
                                    </button>
                                    <button type="button" class="btn btn-outline-info btn-sm">
                                        <i class="bi bi-share me-1"></i>
                                        Share
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Month</th>
                                                    <th>Sales ($)</th>
                                                    <th>Orders</th>
                                                    <th>Customers</th>
                                                    <th>Avg Order Value</th>
                                                    <th>Growth</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($salesReport as $report)
                                                    <tr>
                                                        <td><strong>{{ $report->month }}</strong></td>
                                                        <td>${{ number_format($report->sales) }}</td>
                                                        <td>{{ $report->orders }}</td>
                                                        <td>{{ $report->customers }}</td>
                                                        <td>${{ number_format($report->sales / $report->orders, 2) }}</td>
                                                        <td>
                                                            @if($loop->index > 0)
                                                                @php
                                                                    $prevSales = $salesReport[$loop->index - 1]->sales;
                                                                    $growth = (($report->sales - $prevSales) / $prevSales) * 100;
                                                                @endphp
                                                                <span class="badge {{ $growth >= 0 ? 'bg-success' : 'bg-danger' }}">
                                                                    {{ $growth >= 0 ? '+' : '' }}{{ number_format($growth, 1) }}%
                                                                </span>
                                                            @else
                                                                <span class="badge bg-secondary">N/A</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot class="table-light">
                                                <tr>
                                                    <td><strong>Total</strong></td>
                                                    <td><strong>${{ number_format($salesReport->sum('sales')) }}</strong></td>
                                                    <td><strong>{{ $salesReport->sum('orders') }}</strong></td>
                                                    <td><strong>{{ $salesReport->sum('customers') }}</strong></td>
                                                    <td><strong>${{ number_format($salesReport->sum('sales') / $salesReport->sum('orders'), 2) }}</strong></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="card-title">Key Metrics</h6>
                                            <div class="row text-center">
                                                <div class="col-6 mb-3">
                                                    <div class="bg-primary text-white p-3 rounded">
                                                        <h4>${{ number_format($salesReport->sum('sales')) }}</h4>
                                                        <small>Total Revenue</small>
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <div class="bg-success text-white p-3 rounded">
                                                        <h4>{{ $salesReport->sum('orders') }}</h4>
                                                        <small>Total Orders</small>
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <div class="bg-info text-white p-3 rounded">
                                                        <h4>{{ $salesReport->sum('customers') }}</h4>
                                                        <small>Total Customers</small>
                                                    </div>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <div class="bg-warning text-white p-3 rounded">
                                                        <h4>${{ number_format($salesReport->sum('sales') / $salesReport->sum('orders'), 2) }}</h4>
                                                        <small>Avg Order Value</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Performance Report -->
            <div class="row" id="productReport">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-box me-2"></i>
                                Top Performing Products
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Product Name</th>
                                            <th>Units Sold</th>
                                            <th>Revenue</th>
                                            <th>Growth</th>
                                            <th>Performance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($topProducts as $index => $product)
                                            <tr>
                                                <td>
                                                    @if($index == 0)
                                                        <span class="badge bg-warning">🥇</span>
                                                    @elseif($index == 1)
                                                        <span class="badge bg-secondary">🥈</span>
                                                    @elseif($index == 2)
                                                        <span class="badge bg-warning">🥉</span>
                                                    @else
                                                        <span class="badge bg-light text-dark">#{{ $index + 1 }}</span>
                                                    @endif
                                                </td>
                                                <td><strong>{{ $product->name }}</strong></td>
                                                <td>{{ $product->sales }}</td>
                                                <td>${{ number_format($product->revenue, 2) }}</td>
                                                <td>
                                                    <span class="badge bg-success">{{ $product->growth }}</span>
                                                </td>
                                                <td>
                                                    <div class="progress" style="height: 20px;">
                                                        @php
                                                            $maxRevenue = $topProducts->max('revenue');
                                                            $percentage = ($product->revenue / $maxRevenue) * 100;
                                                        @endphp
                                                        <div class="progress-bar bg-primary" style="width: {{ $percentage }}%">
                                                            {{ number_format($percentage, 1) }}%
                                                        </div>
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
            </div>

            <!-- Customer Analysis Report -->
            <div class="row" id="customerReport">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-people me-2"></i>
                                Customer Segmentation
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Customer Segment</th>
                                            <th>Count</th>
                                            <th>Percentage</th>
                                            <th>Trend</th>
                                            <th>Revenue Contribution</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customerReport as $segment)
                                            <tr>
                                                <td><strong>{{ $segment->segment }}</strong></td>
                                                <td>{{ $segment->count }}</td>
                                                <td>{{ $segment->percentage }}%</td>
                                                <td>
                                                    <span class="badge bg-success">{{ $segment->trend }}</span>
                                                </td>
                                                <td>
                                                    <div class="progress" style="height: 20px;">
                                                        <div class="progress-bar bg-info" style="width: {{ $segment->percentage }}%">
                                                            {{ $segment->percentage }}%
                                                        </div>
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-pie-chart me-2"></i>
                                Customer Distribution
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>New Customers</span>
                                        <span class="badge bg-primary">{{ $customerReport->where('segment', 'New Customers')->first()->percentage }}%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" style="width: {{ $customerReport->where('segment', 'New Customers')->first()->percentage }}%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Returning Customers</span>
                                        <span class="badge bg-success">{{ $customerReport->where('segment', 'Returning Customers')->first()->percentage }}%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: {{ $customerReport->where('segment', 'Returning Customers')->first()->percentage }}%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Premium Customers</span>
                                        <span class="badge bg-warning">{{ $customerReport->where('segment', 'Premium Customers')->first()->percentage }}%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: {{ $customerReport->where('segment', 'Premium Customers')->first()->percentage }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Export Options -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-download me-2"></i>
                                Export & Share Reports
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-file-earmark-pdf fs-1 text-danger mb-2"></i>
                                        <h6>PDF Report</h6>
                                        <p class="text-muted small">High-quality printable report</p>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-download me-1"></i>
                                            Export PDF
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-file-earmark-excel fs-1 text-success mb-2"></i>
                                        <h6>Excel Report</h6>
                                        <p class="text-muted small">Data for further analysis</p>
                                        <button class="btn btn-success btn-sm">
                                            <i class="bi bi-download me-1"></i>
                                            Export Excel
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-file-earmark-text fs-1 text-info mb-2"></i>
                                        <h6>CSV Report</h6>
                                        <p class="text-muted small">Raw data export</p>
                                        <button class="btn btn-info btn-sm">
                                            <i class="bi bi-download me-1"></i>
                                            Export CSV
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="text-center">
                                        <i class="bi bi-share fs-1 text-warning mb-2"></i>
                                        <h6>Share Report</h6>
                                        <p class="text-muted small">Send via email</p>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="bi bi-share me-1"></i>
                                            Share
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