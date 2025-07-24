@extends('nasser-dashboard::layouts.master')

@section('title', 'Product Details - Admin Dashboard')

@section('content')
@php
// Static data for demonstration
$product = (object) [
    'id' => 1,
    'title' => 'iPhone 14 Pro Max',
    'description' => 'Latest iPhone with advanced camera system and A16 Bionic chip. Features include:\n\n• 6.7-inch Super Retina XDR display\n• A16 Bionic chip with 6-core GPU\n• 48MP Main camera with 2x Telephoto\n• Cinematic mode up to 4K HDR\n• Action mode for smooth, steady videos\n• Crash Detection\n• Emergency SOS via satellite\n• All-day battery life',
    'price' => 1299.99,
    'status' => 'approved',
    'brand' => 'Apple',
    'is_auction' => false,
    'is_customizable' => true,
    'base_price' => 1299.99,
    'created_at' => now()->subDays(5),
    'updated_at' => now()->subDays(2),
    'user' => (object) [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '+1 (555) 123-4567'
    ],
    'category' => (object) [
        'name' => 'Electronics',
        'description' => 'Electronic devices and gadgets'
    ],
    'getMedia' => function() { return collect(); },
    'availabilities' => collect([
        (object) [
            'id' => 1,
            'grade' => (object) ['name' => 'Grade 1'],
            'price' => 1299.99,
            'is_active' => true
        ],
        (object) [
            'id' => 2,
            'grade' => (object) ['name' => 'Grade 2'],
            'price' => 1199.99,
            'is_active' => true
        ]
    ]),
    'customizationOptions' => collect([
        (object) [
            'id' => 1,
            'name' => 'Storage',
            'options' => collect([
                (object) ['name' => '128GB', 'price_adjustment' => 0],
                (object) ['name' => '256GB', 'price_adjustment' => 100],
                (object) ['name' => '512GB', 'price_adjustment' => 300]
            ])
        ],
        (object) [
            'id' => 2,
            'name' => 'Color',
            'options' => collect([
                (object) ['name' => 'Space Black', 'price_adjustment' => 0],
                (object) ['name' => 'Silver', 'price_adjustment' => 0],
                (object) ['name' => 'Gold', 'price_adjustment' => 0],
                (object) ['name' => 'Deep Purple', 'price_adjustment' => 0]
            ])
        ]
    ])
];
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Back Button -->
            <div class="mb-3">
                <a href="#" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Back to Products
                </a>
            </div>

            <!-- Product Details Card -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="bi bi-box me-2"></i>
                            Product Details
                        </h3>
                        <div class="card-tools">
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
                    <div class="row">
                        <!-- Product Images -->
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                     style="width: 300px; height: 300px; margin: 0 auto;">
                                        <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                                    </div>
                                <p class="text-muted mt-2">Product Images</p>
                            </div>
                        </div>

                        <!-- Product Information -->
                        <div class="col-md-8">
                            <h4>{{ $product->title }}</h4>
                            <p class="text-muted mb-3">Posted by {{ $product->user->name }} on {{ $product->created_at->format('M d, Y') }}</p>
                                
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Category:</strong> {{ $product->category->name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Brand:</strong> {{ $product->brand ?? 'N/A' }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Base Price:</strong> ${{ number_format($product->base_price, 2) }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Customizable:</strong> 
                                    @if($product->is_customizable)
                                        <span class="badge bg-success">Yes</span>
                                        @else
                                        <span class="badge bg-secondary">No</span>
                                @endif
                        </div>
                    </div>

                            <div class="mb-3">
                                <strong>Description:</strong>
                                <div class="mt-2 p-3 bg-light rounded">
                                    {!! nl2br(e($product->description)) !!}
                                </div>
                            </div>

                    <!-- Seller Information -->
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h6 class="mb-0"><i class="bi bi-person me-2"></i>Seller Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Name:</strong> {{ $product->user->name }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Email:</strong> {{ $product->user->email }}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <strong>Phone:</strong> {{ $product->user->phone }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Availability by Grade -->
                    @if($product->availabilities->count() > 0)
                        <div class="mt-4">
                            <h5><i class="bi bi-list-check me-2"></i>Availability by Grade</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Grade</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->availabilities as $availability)
                                            <tr>
                                                <td>{{ $availability->grade->name }}</td>
                                                <td>${{ number_format($availability->price, 2) }}</td>
                                                <td>
                                                    @if($availability->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-secondary">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    <!-- Customization Options -->
                    @if($product->customizationOptions->count() > 0)
                        <div class="mt-4">
                            <h5><i class="bi bi-gear me-2"></i>Customization Options</h5>
                            @foreach($product->customizationOptions as $option)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h6 class="mb-0">{{ $option->name }}</h6>
                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($option->options as $opt)
                                                <div class="col-md-3 mb-2">
                                                    <div class="border rounded p-2 text-center">
                                                        <strong>{{ $opt->name }}</strong>
                                                        @if($opt->price_adjustment > 0)
                                                            <br><small class="text-success">+${{ number_format($opt->price_adjustment, 2) }}</small>
                                                        @elseif($opt->price_adjustment < 0)
                                                            <br><small class="text-danger">${{ number_format($opt->price_adjustment, 2) }}</small>
                    @else
                                                            <br><small class="text-muted">No additional cost</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="mt-4 text-center">
                        @if($product->status === 'pending')
                            <button type="button" class="btn btn-success me-2" onclick="approveProduct({{ $product->id }})">
                                <i class="bi bi-check-lg me-2"></i>Approve Product
                            </button>
                            <button type="button" class="btn btn-danger me-2" onclick="showRejectModal({{ $product->id }})">
                                <i class="bi bi-x-lg me-2"></i>Reject Product
                            </button>
                        @elseif($product->status === 'rejected')
                            <button type="button" class="btn btn-success me-2" onclick="approveProduct({{ $product->id }})">
                                <i class="bi bi-check-lg me-2"></i>Approve Product
                            </button>
                        @endif
                        <button type="button" class="btn btn-primary" onclick="editProduct({{ $product->id }})">
                            <i class="bi bi-pencil me-2"></i>Edit Product
                        </button>
                    </div>
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
            <form id="rejectForm">
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

function editProduct(productId) {
    console.log('Edit function called for product:', productId);
    alert('Edit product functionality (Demo mode)');
}

// Handle reject form
document.getElementById('rejectForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const reason = document.getElementById('rejection_reason').value;
    console.log('Reject product with reason:', reason);
    alert('Product rejected successfully! (Demo mode)');
    
    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('rejectModal'));
    modal.hide();
    
    // Reset form
    this.reset();
});
</script> 

@endsection 