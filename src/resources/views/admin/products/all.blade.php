@extends('layouts.master')

@section('title', 'All Products - Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-box me-2"></i>
                        All Products
                    </h3>
                    <div class="card-tools">
                        <span class="badge bg-primary">{{ $products->total() }} Total Products</span>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($products->total() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Seller</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Brand</th>
                                        <th>Status</th>
                                        <th>Posted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($product->getMedia('product_images')->count() > 0)
                                                    @php
                                                        $media = $product->getMedia('product_images')->first();
                                                        $imageUrl = $media ? asset('storage/' . $media->getPathRelativeToRoot()) : null;
                                                    @endphp
                                                    @if($imageUrl)
                                                        <img src="{{ $imageUrl }}" 
                                                             alt="{{ $product->title }}" 
                                                             class="rounded me-3" 
                                                             style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="bi bi-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                                         style="width: 50px; height: 50px;">
                                                        <i class="bi bi-image text-muted"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <h6 class="mb-0">{{ $product->title }}</h6>
                                                    <small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <strong>{{ $product->user->name }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $product->user->email }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $product->category->name }}</span>
                                        </td>
                                        <td>
                                            @if($product->is_auction)
                                                <span class="text-warning">
                                                    <i class="bi bi-gavel me-1"></i>
                                                    Auction
                                                </span>
                                                @if($product->auction)
                                                    <br>
                                                    <small class="text-muted">Base: ${{ number_format($product->auction->base_price, 2) }}</small>
                                                @endif
                                            @else
                                                <strong>${{ number_format($product->price, 2) }}</strong>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->brand)
                                                <span class="badge bg-success">{{ $product->brand }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->status === 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($product->status === 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif($product->status === 'rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @elseif($product->status === 'sold')
                                                <span class="badge bg-info">Sold</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{ $product->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.products.show', $product->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
                                                @if($product->status === 'pending')
                                                    <button type="button" 
                                                            class="btn btn-sm btn-success" 
                                                            onclick="approveProduct({{ $product->id }})"
                                                            style="cursor: pointer;">
                                                        <i class="bi bi-check-lg"></i> Approve
                                                    </button>
                                                    <button type="button" 
                                                            class="btn btn-sm btn-danger" 
                                                            onclick="showRejectModal({{ $product->id }})"
                                                            style="cursor: pointer;">
                                                        <i class="bi bi-x-lg"></i> Reject
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination Component -->

                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-box text-muted" style="font-size: 4rem;"></i>
                            <h4 class="mt-3 text-muted">No Products Found</h4>
                            <p class="text-muted">No products have been added yet!</p>
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

<script>
// Test if JavaScript is working
console.log('JavaScript loaded successfully!');

function approveProduct(productId) {
    console.log('Approve function called for product:', productId);
    
    if (confirm('Are you sure you want to approve this product?')) {
        console.log('User confirmed approval');
        
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
        
        console.log('Form action:', form.action);
        console.log('CSRF token:', csrfToken.value);
        
        form.appendChild(csrfToken);
        document.body.appendChild(form);
        form.submit();
    } else {
        console.log('User cancelled approval');
    }
}

function showRejectModal(productId) {
    console.log('Reject modal function called for product:', productId);
    
    const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
    const form = document.getElementById('rejectForm');
    form.action = `{{ url('admin/products') }}/${productId}/reject`;
    
    // Clear previous form data
    document.getElementById('rejection_reason').value = '';
    
    console.log('Modal action set to:', form.action);
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
@endsection 