@extends('layouts.master')

@section('title', 'Paid Orders')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Paid Orders</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Paid Orders</h3>
                        </div>
                        <div class="card-body">
                            @if($orders->total() > 0)
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
                                                        <span class="badge badge-warning text-dark">Paid</span>
                                                    </td>
                                                    <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination Component -->
                                <x-pagination :paginator="$orders" label="paid orders" />

                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
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