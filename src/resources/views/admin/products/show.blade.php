@extends('layouts.master')

@section('title', 'Product Details - Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="bi bi-box me-2"></i>
                            Product Details
                        </h3>
                        <div>
                            @if($product->status === 'pending')
                                <span class="badge bg-warning">Pending Review</span>
                            @elseif($product->status === 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($product->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible mb-4">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible mb-4">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <!-- Product Images -->
                        <div class="col-md-6">
                            <div class="product-images">
                                @if($product->getMedia('product_images')->count() > 0)
                                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($product->getMedia('product_images') as $index => $media)
                                                @php
                                                    $imageUrl = asset('storage/' . $media->getPathRelativeToRoot());
                                                @endphp
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <img src="{{ $imageUrl }}" 
                                                         class="d-block w-100 rounded" 
                                                         alt="Product Image {{ $index + 1 }}"
                                                         style="max-height: 400px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        </div>
                                        @if($product->getMedia('product_images')->count() > 1)
                                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                            </button>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-center py-5 bg-light rounded">
                                        <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                                        <p class="text-muted mt-2">No images available</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Product Information -->
                        <div class="col-md-6">
                            <div class="product-info">
                                <h2 class="mb-3">{{ $product->title }}</h2>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Price:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @if($product->is_auction)
                                            <span class="text-warning">
                                                <i class="bi bi-gavel me-1"></i>
                                                Auction Item
                                            </span>
                                            @if($product->auction)
                                                <br>
                                                <strong>Base Price: ${{ number_format($product->auction->base_price, 2) }}</strong>
                                            @endif
                                        @else
                                            <strong class="text-success">${{ number_format($product->price, 2) }}</strong>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Category:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <span class="badge bg-info">{{ $product->category->name }}</span>
                                    </div>
                                </div>

                                @if($product->brand)
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Brand:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $product->brand }}
                                    </div>
                                </div>
                                @endif

                                @if($product->color)
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Color:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $product->color->name }}
                                    </div>
                                </div>
                                @endif

                                @if($product->condition)
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Condition:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $product->condition->name }}
                                    </div>
                                </div>
                                @endif

                                @if($product->material)
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Material:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $product->material->name }}
                                    </div>
                                </div>
                                @endif

                                @if($product->dimensions)
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Dimensions:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @if(isset($product->dimensions['height']))
                                            Height: {{ $product->dimensions['height'] }}cm<br>
                                        @endif
                                        @if(isset($product->dimensions['width']))
                                            Width: {{ $product->dimensions['width'] }}cm<br>
                                        @endif
                                        @if(isset($product->dimensions['length']))
                                            Length: {{ $product->dimensions['length'] }}cm<br>
                                        @endif
                                        @if(isset($product->dimensions['weight']))
                                            Weight: {{ $product->dimensions['weight'] }}kg
                                        @endif
                                    </div>
                                </div>
                                @endif

                                @if($product->available_until)
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Available Until:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        @if($product->available_until instanceof \Carbon\Carbon)
                                            {{ $product->available_until->format('M d, Y H:i') }}
                                        @else
                                            {{ $product->available_until }}
                                        @endif
                                    </div>
                                </div>
                                @endif

                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Posted:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $product->created_at->format('M d, Y H:i') }}
                                        <br>
                                        <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>

                                @if($product->rejection_reason)
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Rejection Reason:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="alert alert-danger">
                                            {{ $product->rejection_reason }}
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($product->description)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Description</h4>
                            <div class="card">
                                <div class="card-body">
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Seller Information -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Seller Information</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Name:</strong> {{ $product->user->name }}<br>
                                            <strong>Email:</strong> {{ $product->user->email }}<br>
                                            <strong>Phone:</strong> {{ $product->user->phone ?? 'Not provided' }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Member Since:</strong> {{ $product->user->created_at->format('M d, Y') }}<br>
                                            <strong>Total Products:</strong> {{ $product->user->products->count() }}<br>
                                            <strong>Approved Products:</strong> {{ $product->user->products->where('status', 'approved')->count() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    @if($product->status === 'pending')
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex gap-2">
                                <button type="button" 
                                        class="btn btn-success btn-lg" 
                                        onclick="approveProduct({{ $product->id }})">
                                    <i class="bi bi-check-lg me-2"></i>
                                    Approve Product
                                </button>
                                <button type="button" 
                                        class="btn btn-danger btn-lg" 
                                        onclick="showRejectModal({{ $product->id }})">
                                    <i class="bi bi-x-lg me-2"></i>
                                    Reject Product
                                </button>
                                <a href="{{ route('admin.products.pending') }}" 
                                   class="btn btn-secondary btn-lg">
                                    <i class="bi bi-arrow-left me-2"></i>
                                    Back to Pending
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row mt-4">
                        <div class="col-12">
                            <a href="{{ route('admin.products.pending') }}" 
                               class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-left me-2"></i>
                                Back to Pending
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="rejection_reason" class="form-label">Rejection Reason</label>
                        <textarea class="form-control" id="rejection_reason" name="rejection_reason" rows="4" required 
                                  placeholder="Please provide a reason for rejecting this product..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Reject Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

<script>
function approveProduct(productId) {
    if (confirm('Are you sure you want to approve this product?')) {
        // Disable the button to prevent double-clicking
        const button = event.target.closest('button');
        const originalText = button.innerHTML;
        button.disabled = true;
        button.innerHTML = '<i class="bi bi-hourglass-split"></i> Processing...';
        
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `{{ url('admin/products') }}/${productId}/approve`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        form.appendChild(csrfToken);
        document.body.appendChild(form);
        form.submit();
    }
}

function showRejectModal(productId) {
    const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
    const form = document.getElementById('rejectForm');
    form.action = `{{ url('admin/products') }}/${productId}/reject`;
    
    // Clear previous form data
    document.getElementById('rejection_reason').value = '';
    
    modal.show();
}

// Auto-hide alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script> 