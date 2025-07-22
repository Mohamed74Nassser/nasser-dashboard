@extends('layouts.master')

@section('title', 'Approved Products - Admin Dashboard')

@section('content')
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
                        <span class="badge bg-success">{{ $products->total() }} Approved</span>
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
                                        <th>Approved Date</th>
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
                                                <span class="badge bg-success"> {{ $product->brand }} </span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{ $product->updated_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.products.show', $product->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
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

@endsection

<script>
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