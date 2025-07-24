@extends('nasser-dashboard::layouts.master')

@section('title', 'Dashboard Overview')

@section('content')
@php
// Static data for demonstration
$recentOrders = collect([
    (object) [
        'id' => 1001,
        'customer' => 'John Doe',
        'amount' => 1299.99,
        'status' => 'paid',
        'date' => now()->subHours(2)
    ],
    (object) [
        'id' => 1002,
        'customer' => 'Jane Smith',
        'amount' => 899.99,
        'status' => 'pending',
        'date' => now()->subHours(5)
    ],
    (object) [
        'id' => 1003,
        'customer' => 'Mike Johnson',
        'amount' => 2499.99,
        'status' => 'paid',
        'date' => now()->subDays(1)
    ]
]);

$recentProducts = collect([
    (object) [
        'title' => 'iPhone 14 Pro Max',
        'price' => 1299.99,
        'status' => 'approved',
        'created_at' => now()->subDays(2)
    ],
    (object) [
        'title' => 'Samsung Galaxy S23 Ultra',
        'price' => 1199.99,
        'status' => 'pending',
        'created_at' => now()->subDays(3)
    ],
    (object) [
        'title' => 'MacBook Pro 16" M2',
        'price' => 2499.99,
        'status' => 'approved',
        'created_at' => now()->subDays(4)
    ]
]);

$monthlyStats = [
    'jan' => 12000,
    'feb' => 15000,
    'mar' => 18000,
    'apr' => 22000,
    'may' => 25000,
    'jun' => 28000
];
@endphp

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Total Products</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-box"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>3</h3>
                            <p>Pending Products</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>4</h3>
                            <p>Total Orders</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>4</h3>
                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-folder"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Additional Statistics -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>$4,700</h3>
                            <p>Total Revenue</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>12</h3>
                            <p>Total Customers</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>2</h3>
                            <p>Rejected Products</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner text-dark">
                            <h3>85%</h3>
                            <p>Approval Rate</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-graph-up text-dark"></i>
                        </div>
                        <a href="#" class="small-box-footer text-dark">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Orders & Products -->
            <div class="row">
                <!-- Recent Orders -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-clock-history me-2"></i>
                                Recent Orders
                            </h3>
                            <div class="card-tools">
                                <span class="badge bg-primary">{{ $recentOrders->count() }} Orders</span>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentOrders as $order)
                                            <tr>
                                                <td>#{{ $order->id }}</td>
                                                <td>{{ $order->customer }}</td>
                                                <td>${{ number_format($order->amount, 2) }}</td>
                                                <td>
                                                    @if($order->status == 'paid')
                                                        <span class="badge bg-success">Paid</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @endif
                                                </td>
                                                <td>{{ $order->date->format('M d, H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-primary btn-sm">View All Orders</a>
                        </div>
                    </div>
                </div>

                <!-- Recent Products -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-box me-2"></i>
                                Recent Products
                            </h3>
                            <div class="card-tools">
                                <span class="badge bg-info">{{ $recentProducts->count() }} Products</span>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentProducts as $product)
                                            <tr>
                                                <td>{{ $product->title }}</td>
                                                <td>${{ number_format($product->price, 2) }}</td>
                                                <td>
                                                    @if($product->status == 'approved')
                                                        <span class="badge bg-success">Approved</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @endif
                                                </td>
                                                <td>{{ $product->created_at->format('M d') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-info btn-sm">View All Products</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Information & Welcome -->
            <div class="row">
                <!-- System Information -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-info-circle me-2"></i>
                                System Information
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-1"><strong>PHP Version:</strong></p>
                                    <p class="mb-1"><strong>Laravel Version:</strong></p>
                                    <p class="mb-1"><strong>Database:</strong></p>
                                    <p class="mb-1"><strong>Server:</strong></p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 text-muted">8.1.0</p>
                                    <p class="mb-1 text-muted">10.x</p>
                                    <p class="mb-1 text-muted">MySQL 8.0</p>
                                    <p class="mb-1 text-muted">Apache 2.4</p>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <span class="badge bg-success">System Online</span>
                                <small class="text-muted d-block mt-1">Last updated: {{ now()->format('M d, Y H:i') }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Welcome Message -->
                <div class="col-lg-4">
                    <div class="card bg-gradient-primary">
                        <div class="card-body text-center text-white">
                            <i class="bi bi-star fs-1 mb-3"></i>
                            <h5>Welcome to GoingTwice Dashboard!</h5>
                            <p class="mb-3">This is a comprehensive demo dashboard with static data. Explore all features using the sidebar navigation.</p>
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-light btn-sm">
                                    <i class="bi bi-book me-2"></i>
                                    View Documentation
                                </a>
                                <a href="#" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-question-circle me-2"></i>
                                    Get Help
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Revenue Chart -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-graph-up me-2"></i>
                                Monthly Revenue Overview
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="revenue-grid">
                                @foreach($monthlyStats as $month => $amount)
                                    <div class="revenue-item">
                                        <div class="month-label">{{ strtoupper($month) }}</div>
                                        <div class="amount-display">
                                            <span class="currency">$</span>
                                            <span class="amount">{{ number_format($amount/1000, 0) }}</span>
                                            <span class="thousands">,000</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection 