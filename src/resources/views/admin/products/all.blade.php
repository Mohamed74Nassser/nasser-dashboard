@extends('nasser-dashboard::layouts.master')

@section('title', 'All Products - Admin Dashboard')

@section('content')
@php
// Static data for demonstration
$products = collect([
    (object) [
        'id' => 1,
        'title' => 'iPhone 14 Pro Max',
        'description' => 'Latest iPhone with advanced camera system and A16 Bionic chip',
        'price' => 1299.99,
        'status' => 'approved',
        'brand' => 'Apple',
        'is_auction' => false,
        'created_at' => now()->subDays(5),
        'user' => (object) ['name' => 'John Doe', 'email' => 'john@example.com'],
        'category' => (object) ['name' => 'Electronics'],
        'getMedia' => function() { return collect(); }
    ],
    (object) [
        'id' => 2,
        'title' => 'Samsung Galaxy S23 Ultra',
        'description' => 'Premium Android smartphone with S Pen and 200MP camera',
        'price' => 1199.99,
        'status' => 'pending',
        'brand' => 'Samsung',
        'is_auction' => false,
        'created_at' => now()->subDays(2),
        'user' => (object) ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
        'category' => (object) ['name' => 'Electronics'],
        'getMedia' => function() { return collect(); }
    ],
    (object) [
        'id' => 3,
        'title' => 'MacBook Pro 16" M2',
        'description' => 'Professional laptop with M2 Pro chip and Liquid Retina XDR display',
        'price' => 2499.99,
        'status' => 'approved',
        'brand' => 'Apple',
        'is_auction' => false,
        'created_at' => now()->subDays(10),
        'user' => (object) ['name' => 'Mike Johnson', 'email' => 'mike@example.com'],
        'category' => (object) ['name' => 'Computers'],
        'getMedia' => function() { return collect(); }
    ],
    (object) [
        'id' => 4,
        'title' => 'Nike Air Jordan 1 Retro',
        'description' => 'Classic basketball shoes in Chicago colorway',
        'price' => 170.00,
        'status' => 'rejected',
        'brand' => 'Nike',
        'is_auction' => false,
        'created_at' => now()->subDays(1),
        'user' => (object) ['name' => 'Sarah Wilson', 'email' => 'sarah@example.com'],
        'category' => (object) ['name' => 'Shoes'],
        'getMedia' => function() { return collect(); }
    ],
    (object) [
        'id' => 5,
        'title' => 'Vintage Rolex Submariner',
        'description' => 'Rare 1960s Rolex Submariner in excellent condition',
        'price' => 0,
        'status' => 'pending',
        'brand' => 'Rolex',
        'is_auction' => true,
        'auction' => (object) ['base_price' => 15000],
        'created_at' => now()->subHours(6),
        'user' => (object) ['name' => 'David Brown', 'email' => 'david@example.com'],
        'category' => (object) ['name' => 'Watches'],
        'getMedia' => function() { return collect(); }
    ]
]);
@endphp

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
                        <span class="badge bg-primary">{{ $products->count() }} Total Products</span>
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

                    @if($products->count() > 0)
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
                                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                                     style="width: 50px; height: 50px;">
                                                    <i class="bi bi-image text-muted"></i>
                                                </div>
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
                                                <a href="#" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
                                                @if($product->status === 'pending')
                                                    <button type="button" 
                                                            class="btn btn-sm btn-success" 
                                                            onclick="approveProduct({{ $product->id }})">
                                                        <i class="bi bi-check-lg"></i> Approve
                                                    </button>
                                                    <button type="button" 
                                                            class="btn btn-sm btn-danger" 
                                                            onclick="showRejectModal({{ $product->id }})">
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
                        <div class="d-flex justify-content-center mt-4">
                            <nav aria-label="Products pagination">
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
        alert('Product approved successfully! (Demo mode)');
    } else {
        console.log('User cancelled approval');
    }
}

function showRejectModal(productId) {
    console.log('Reject modal function called for product:', productId);
    
    const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
    
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
@endsection 