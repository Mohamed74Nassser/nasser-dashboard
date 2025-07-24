@extends('nasser-dashboard::layouts.master')

@section('title', 'Approved Products - Admin Dashboard')

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
        'id' => 3,
        'title' => 'Sony WH-1000XM4 Headphones',
        'description' => 'Premium noise-cancelling wireless headphones',
        'price' => 349.99,
        'status' => 'approved',
        'brand' => 'Sony',
        'is_auction' => false,
        'created_at' => now()->subDays(3),
        'user' => (object) ['name' => 'Alice Johnson', 'email' => 'alice@example.com'],
        'category' => (object) ['name' => 'Electronics'],
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
                        <i class="bi bi-check-circle me-2"></i>
                        Approved Products
                    </h3>
                    <div class="card-tools">
                        <span class="badge bg-success">{{ $products->count() }} Approved Products</span>
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
                                        <th>Approved</th>
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
                                            <span class="badge bg-success">Approved</span>
                                        </td>
                                        <td>
                                            <small>{{ $product->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="#" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
                                                <button type="button" 
                                                        class="btn btn-sm btn-warning" 
                                                        onclick="rejectProduct({{ $product->id }})"
                                                        style="cursor: pointer;">
                                                    <i class="bi bi-x-lg"></i> Reject
                                                </button>
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
                            <i class="bi bi-check-circle text-success" style="font-size: 4rem;"></i>
                            <h4 class="mt-3 text-muted">No Approved Products</h4>
                            <p class="text-muted">No products have been approved yet!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function rejectProduct(productId) {
    console.log('Reject function called for product:', productId);
    
    if (confirm('Are you sure you want to reject this approved product?')) {
        console.log('User confirmed rejection');
        alert('Product rejected successfully! (Demo mode)');
    } else {
        console.log('User cancelled rejection');
    }
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