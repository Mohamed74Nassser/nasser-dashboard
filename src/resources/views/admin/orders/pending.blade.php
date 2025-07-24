@extends('nasser-dashboard::layouts.master')

@section('title', 'Pending Orders')

@section('content')
@php
// Static data for demonstration
$orders = collect([
    (object) [
        'id' => 1001,
        'user' => (object) ['name' => 'John Doe', 'email' => 'john@example.com'],
        'product' => (object) ['title' => 'iPhone 14 Pro Max'],
        'price' => 1299.99,
        'status' => 'pending',
        'created_at' => now()->subHours(2)
    ],
    (object) [
        'id' => 1002,
        'user' => (object) ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
        'product' => (object) ['title' => 'Samsung Galaxy S23 Ultra'],
        'price' => 1199.99,
        'status' => 'pending',
        'created_at' => now()->subHours(5)
    ],
    (object) [
        'id' => 1003,
        'user' => (object) ['name' => 'Mike Johnson', 'email' => 'mike@example.com'],
        'product' => (object) ['title' => 'MacBook Pro 16" M2'],
        'price' => 2499.99,
        'status' => 'pending',
        'created_at' => now()->subDays(1)
    ],
    (object) [
        'id' => 1004,
        'user' => (object) ['name' => 'Sarah Wilson', 'email' => 'sarah@example.com'],
        'product' => (object) ['title' => 'Nike Air Jordan 1 Retro'],
        'price' => 170.00,
        'status' => 'pending',
        'created_at' => now()->subDays(2)
    ]
]);
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Pending Orders</h3>
                            <div class="card-tools">
                                <span class="badge bg-warning text-dark fw-bold">{{ $orders->count() }} Pending Orders</span>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($orders->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Product</th>
                                                <th>Amount</th>
                                                <th>Payment Status</th>
                                                <th>Order Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                                                    <td>{{ $order->product->title ?? 'N/A' }}</td>
                                                    <td>${{ number_format($order->price, 2) }}</td>
                                                    <td>
                                                        <span class="badge bg-warning text-dark fw-bold">Pending</span>
                                                    </td>
                                                    <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination Component -->
                                <div class="d-flex justify-content-center mt-4">
                                    <nav aria-label="Orders pagination">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <span class="page-link">Previous</span>
                                            </li>
                                            <li class="page-item active">
                                                <span class="page-link">1</span>
                                            </li>
                                            <li class="page-item disabled">
                                                <span class="page-link">Next</span>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-clock fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No pending orders found</h5>
                                    <p class="text-muted">There are currently no pending orders in the system.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection 