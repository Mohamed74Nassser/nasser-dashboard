@extends('nasser-dashboard::layouts.master')

@section('title', 'Paid Orders')

@section('content')
@php
// Static data for demonstration
$orders = collect([
    (object) [
        'id' => 2001,
        'user' => (object) ['name' => 'Alice Johnson', 'email' => 'alice@example.com'],
        'product' => (object) ['title' => 'Sony WH-1000XM4 Headphones'],
        'price' => 349.99,
        'status' => 'paid',
        'created_at' => now()->subDays(3)
    ],
    (object) [
        'id' => 2002,
        'user' => (object) ['name' => 'Bob Wilson', 'email' => 'bob@example.com'],
        'product' => (object) ['title' => 'Canon EOS R6 Camera'],
        'price' => 2499.99,
        'status' => 'paid',
        'created_at' => now()->subDays(5)
    ],
    (object) [
        'id' => 2003,
        'user' => (object) ['name' => 'Carol Davis', 'email' => 'carol@example.com'],
        'product' => (object) ['title' => 'Dell XPS 13 Laptop'],
        'price' => 1299.99,
        'status' => 'paid',
        'created_at' => now()->subDays(7)
    ],
    (object) [
        'id' => 2004,
        'user' => (object) ['name' => 'David Miller', 'email' => 'david@example.com'],
        'product' => (object) ['title' => 'Apple Watch Series 8'],
        'price' => 399.99,
        'status' => 'paid',
        'created_at' => now()->subDays(10)
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
                            <h3 class="card-title">All Paid Orders</h3>
                            <div class="card-tools">
                                <span class="badge bg-success">{{ $orders->count() }} Paid Orders</span>
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
                                                        <span class="badge bg-success text-white">Paid</span>
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
                                    <i class="fas fa-credit-card fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No paid orders found</h5>
                                    <p class="text-muted">There are currently no paid orders in the system.</p>
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