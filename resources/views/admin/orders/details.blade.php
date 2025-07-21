<div class="row">
    <div class="col-md-6">
        <h6 class="font-weight-bold">Order Information</h6>
        <table class="table table-sm">
            <tr>
                <td><strong>Order ID:</strong></td>
                <td>#{{ $order->id }}</td>
            </tr>
            <tr>
                <td><strong>Order Date:</strong></td>
                <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
            </tr>
            <tr>
                <td><strong>Status:</strong></td>
                <td>
                    @if($order->status == 'paid')
                        <span class="badge badge-success">Paid</span>
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
                <td><strong>Amount:</strong></td>
                <td>${{ number_format($order->price, 2) }}</td>
            </tr>
        </table>
    </div>
    
    <div class="col-md-6">
        <h6 class="font-weight-bold">Customer Information</h6>
        <table class="table table-sm">
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $order->user->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $order->user->email ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Phone:</strong></td>
                <td>{{ $order->user->phone ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <h6 class="font-weight-bold">Product Information</h6>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        @if($order->product && $order->product->getFirstMediaUrl('images'))
                            <img src="{{ $order->product->getFirstMediaUrl('images') }}" 
                                 alt="{{ $order->product->title }}" 
                                 class="img-fluid rounded">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <h6>{{ $order->product->title ?? 'N/A' }}</h6>
                        <p class="text-muted mb-2">{{ $order->product->description ?? 'No description available' }}</p>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Category:</strong> {{ optional($order->product->category)->name ?? 'N/A' }}
                                </small>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Condition:</strong> {{ optional($order->product->condition)->name ?? 'N/A' }}
                                </small>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Material:</strong> {{ optional($order->product->material)->name ?? 'N/A' }}
                                </small>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <strong>Color:</strong> {{ optional($order->product->color)->name ?? 'N/A' }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($order->notes)
<div class="row mt-3">
    <div class="col-12">
        <h6 class="font-weight-bold">Order Notes</h6>
        <div class="alert alert-info">
            {{ $order->notes }}
        </div>
    </div>
</div>
@endif 