@extends('layouts.master')

@section('title', 'Order Details #' . $order->id)

@section('content')
<div class="content-wrapper">
    <!-- Header Section -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="fas fa-file-invoice text-primary me-2"></i>
                        Order Details #{{ $order->id }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Order Details List -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-file-invoice text-primary me-2"></i>
                                Order Details #{{ $order->id }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="200"><strong>Order ID:</strong></td>
                                            <td>#{{ $order->id }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Date:</strong></td>
                                            <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Status:</strong></td>
                                            <td>
                                                @if($order->status == 'paid')
                                                    <span class="badge badge-warning text-dark">Paid</span>
                                                @elseif($order->status == 'new')
                                                    <span class="badge badge-warning text-dark">New</span>
                                                @elseif($order->status == 'confirmed')
                                                    <span class="badge badge-info text-dark">Confirmed</span>
                                                @elseif($order->status == 'canceled')
                                                    <span class="badge badge-danger">Cancelled</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ ucfirst($order->status) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Payment Status:</strong></td>
                                            <td>
                                                @if($order->payment_status == 'paid')
                                                    <span class="badge badge-warning text-dark">Paid</span>
                                                @else
                                                    <span class="badge badge-warning text-dark">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Amount:</strong></td>
                                            <td><strong class="text-primary h5">${{ number_format($order->price, 2) }}</strong></td>
                                        </tr>
                                        @if($order->payment_method)
                                        <tr>
                                            <td><strong>Payment Method:</strong></td>
                                            <td>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td><strong>Customer Name:</strong></td>
                                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Customer Email:</strong></td>
                                            <td>{{ $order->user->email ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Customer Phone:</strong></td>
                                            <td>{{ $order->user->phone ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Product Name:</strong></td>
                                            <td>{{ $order->product->title ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Product Category:</strong></td>
                                            <td>{{ optional($order->product->category)->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Product Condition:</strong></td>
                                            <td>{{ optional($order->product->condition)->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Product Material:</strong></td>
                                            <td>{{ optional($order->product->material)->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Product Color:</strong></td>
                                            <td>{{ optional($order->product->color)->name ?? 'N/A' }}</td>
                                        </tr>
                                        @if($order->product->brand)
                                        <tr>
                                            <td><strong>Product Brand:</strong></td>
                                            <td>{{ $order->product->brand }}</td>
                                        </tr>
                                        @endif
                                        @if($order->notes)
                                        <tr>
                                            <td><strong>Order Notes:</strong></td>
                                            <td>{{ $order->notes }}</td>
                                        </tr>
                                        @endif
                                    </table>
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