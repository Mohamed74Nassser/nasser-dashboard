@extends('nasser-dashboard::layouts.master')

@section('title', 'Order Details - Admin Dashboard')

@section('content')
@php
// Static data for demonstration
$order = (object) [
    'id' => 1001,
    'order_number' => 'ORD-2024-001',
    'status' => 'pending',
    'total_amount' => 1299.99,
    'quantity' => 1,
    'notes' => 'Please deliver to the main entrance of the building.',
    'created_at' => now()->subHours(2),
    'updated_at' => now()->subHours(1),
    'user' => (object) [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+1 (555) 123-4567'
    ],
    'product' => (object) [
        'id' => 1,
        'title' => 'iPhone 14 Pro Max',
        'description' => 'Latest iPhone with advanced camera system and A16 Bionic chip',
        'price' => 1299.99,
        'brand' => 'Apple',
        'category' => (object) ['name' => 'Electronics'],
        'condition' => (object) ['name' => 'New'],
        'material' => (object) ['name' => 'Aluminum'],
        'color' => (object) ['name' => 'Space Black'],
        'getMedia' => function() { return collect(); }
    ]
];
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Back Button -->
            <div class="mb-3">
                <a href="#" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Back to Orders
                </a>
            </div>

            <!-- Order Details Card -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="bi bi-cart me-2"></i>
                            Order Details
                        </h3>
                        <div class="card-tools">
                            <span class="badge bg-warning">Order #{{ $order->order_number }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Order Information -->
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Order Information</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Order ID:</strong></td>
                                            <td>#{{ $order->id }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Number:</strong></td>
                                            <td>{{ $order->order_number }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status:</strong></td>
                                            <td>
                                                @if($order->status === 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($order->status === 'paid')
                                                    <span class="badge bg-success">Paid</span>
                                                @elseif($order->status === 'shipped')
                                                    <span class="badge bg-info">Shipped</span>
                                                @elseif($order->status === 'delivered')
                                                    <span class="badge bg-success">Delivered</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Amount:</strong></td>
                                            <td><strong class="text-success">${{ number_format($order->total_amount, 2) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Quantity:</strong></td>
                                            <td>{{ $order->quantity }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Date:</strong></td>
                                            <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated:</strong></td>
                                            <td>{{ $order->updated_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <h5>Customer Information</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Name:</strong></td>
                                            <td>{{ $order->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td>{{ $order->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone:</strong></td>
                                            <td>{{ $order->user->phone }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Product Information -->
                            <div class="mt-4">
                                <h5>Product Information</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 100px; height: 100px;">
                                                    <i class="bi bi-image text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <h6>{{ $order->product->title }}</h6>
                                                <p class="text-muted mb-2">{{ $order->product->description }}</p>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <small class="text-muted">
                                                            <strong>Category:</strong> {{ $order->product->category->name }}
                                                        </small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small class="text-muted">
                                                            <strong>Condition:</strong> {{ $order->product->condition->name }}
                                                        </small>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <small class="text-muted">
                                                            <strong>Material:</strong> {{ $order->product->material->name }}
                                                        </small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small class="text-muted">
                                                            <strong>Color:</strong> {{ $order->product->color->name }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($order->notes)
                            <div class="mt-4">
                                <h5>Order Notes</h5>
                                <div class="alert alert-info">
                                    {{ $order->notes }}
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Action Panel -->
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="bi bi-gear me-2"></i>Actions</h6>
                                </div>
                                <div class="card-body">
                                    @if($order->status === 'pending')
                                        <button type="button" class="btn btn-success w-100 mb-2" onclick="markAsPaid({{ $order->id }})">
                                            <i class="bi bi-check-circle me-2"></i>Mark as Paid
                                        </button>
                                        <button type="button" class="btn btn-info w-100 mb-2" onclick="markAsShipped({{ $order->id }})">
                                            <i class="bi bi-truck me-2"></i>Mark as Shipped
                                        </button>
                                    @elseif($order->status === 'paid')
                                        <button type="button" class="btn btn-info w-100 mb-2" onclick="markAsShipped({{ $order->id }})">
                                            <i class="bi bi-truck me-2"></i>Mark as Shipped
                                        </button>
                                    @elseif($order->status === 'shipped')
                                        <button type="button" class="btn btn-success w-100 mb-2" onclick="markAsDelivered({{ $order->id }})">
                                            <i class="bi bi-check-lg me-2"></i>Mark as Delivered
                                        </button>
                                    @endif
                                    
                                    <button type="button" class="btn btn-primary w-100 mb-2" onclick="editOrder({{ $order->id }})">
                                        <i class="bi bi-pencil me-2"></i>Edit Order
                                    </button>
                                    
                                    <button type="button" class="btn btn-danger w-100" onclick="cancelOrder({{ $order->id }})">
                                        <i class="bi bi-x-circle me-2"></i>Cancel Order
                                    </button>
                                </div>
                            </div>

                            <!-- Order Timeline -->
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="bi bi-clock-history me-2"></i>Order Timeline</h6>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <div class="timeline-marker bg-success"></div>
                                            <div class="timeline-content">
                                                <h6 class="mb-1">Order Placed</h6>
                                                <small class="text-muted">{{ $order->created_at->format('M d, Y H:i') }}</small>
                                            </div>
                                        </div>
                                        @if($order->status !== 'pending')
                                        <div class="timeline-item">
                                            <div class="timeline-marker bg-success"></div>
                                            <div class="timeline-content">
                                                <h6 class="mb-1">Payment Received</h6>
                                                <small class="text-muted">{{ $order->updated_at->format('M d, Y H:i') }}</small>
                                            </div>
                                        </div>
                                        @endif
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

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #dee2e6;
}

.timeline-item:not(:last-child)::after {
    content: '';
    position: absolute;
    left: -29px;
    top: 17px;
    width: 2px;
    height: calc(100% + 3px);
    background-color: #dee2e6;
}
</style>

<script>
function markAsPaid(orderId) {
    console.log('Mark as paid function called for order:', orderId);
    
    if (confirm('Are you sure you want to mark this order as paid?')) {
        console.log('User confirmed mark as paid');
        alert('Order marked as paid successfully! (Demo mode)');
    } else {
        console.log('User cancelled mark as paid');
    }
}

function markAsShipped(orderId) {
    console.log('Mark as shipped function called for order:', orderId);
    
    if (confirm('Are you sure you want to mark this order as shipped?')) {
        console.log('User confirmed mark as shipped');
        alert('Order marked as shipped successfully! (Demo mode)');
    } else {
        console.log('User cancelled mark as shipped');
    }
}

function markAsDelivered(orderId) {
    console.log('Mark as delivered function called for order:', orderId);
    
    if (confirm('Are you sure you want to mark this order as delivered?')) {
        console.log('User confirmed mark as delivered');
        alert('Order marked as delivered successfully! (Demo mode)');
    } else {
        console.log('User cancelled mark as delivered');
    }
}

function editOrder(orderId) {
    console.log('Edit function called for order:', orderId);
    alert('Edit order functionality (Demo mode)');
}

function cancelOrder(orderId) {
    console.log('Cancel function called for order:', orderId);
    
    if (confirm('Are you sure you want to cancel this order? This action cannot be undone.')) {
        console.log('User confirmed cancel order');
        alert('Order cancelled successfully! (Demo mode)');
    } else {
        console.log('User cancelled order cancellation');
    }
}
</script>

@endsection 