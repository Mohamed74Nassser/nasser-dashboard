@extends('nasser-dashboard::layouts.master')

@section('title', 'Subcategories - Admin Dashboard')

@section('content')
@php
// Static data for demonstration
$subcategories = collect([
    (object) [
        'id' => 1,
        'name' => 'Smartphones',
        'description' => 'Mobile phones and smartphones',
        'parent' => (object) ['name' => 'Electronics'],
        'products' => collect([
            (object) ['id' => 1, 'name' => 'iPhone 14 Pro Max'],
            (object) ['id' => 2, 'name' => 'Samsung Galaxy S23 Ultra']
        ]),
        'created_at' => now()->subDays(30)
    ],
    (object) [
        'id' => 2,
        'name' => 'Laptops',
        'description' => 'Portable computers and laptops',
        'parent' => (object) ['name' => 'Electronics'],
        'products' => collect([
            (object) ['id' => 3, 'name' => 'MacBook Pro 16" M2'],
            (object) ['id' => 4, 'name' => 'Dell XPS 13']
        ]),
        'created_at' => now()->subDays(25)
    ],
    (object) [
        'id' => 3,
        'name' => 'Men\'s Clothing',
        'description' => 'Clothing for men',
        'parent' => (object) ['name' => 'Fashion'],
        'products' => collect([
            (object) ['id' => 5, 'name' => 'Nike T-Shirt'],
            (object) ['id' => 6, 'name' => 'Levi\'s Jeans']
        ]),
        'created_at' => now()->subDays(20)
    ],
    (object) [
        'id' => 4,
        'name' => 'Women\'s Clothing',
        'description' => 'Clothing for women',
        'parent' => (object) ['name' => 'Fashion'],
        'products' => collect([
            (object) ['id' => 7, 'name' => 'Zara Dress'],
            (object) ['id' => 8, 'name' => 'H&M Blouse']
        ]),
        'created_at' => now()->subDays(18)
    ],
    (object) [
        'id' => 5,
        'name' => 'Shoes',
        'description' => 'Footwear for all ages',
        'parent' => (object) ['name' => 'Fashion'],
        'products' => collect([
            (object) ['id' => 9, 'name' => 'Nike Air Jordan 1 Retro'],
            (object) ['id' => 10, 'name' => 'Adidas Ultraboost']
        ]),
        'created_at' => now()->subDays(15)
    ],
    (object) [
        'id' => 6,
        'name' => 'Furniture',
        'description' => 'Home and office furniture',
        'parent' => (object) ['name' => 'Home & Garden'],
        'products' => collect([
            (object) ['id' => 11, 'name' => 'IKEA Sofa'],
            (object) ['id' => 12, 'name' => 'Office Desk']
        ]),
        'created_at' => now()->subDays(12)
    ]
]);
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="#" class="btn btn-info me-2">
                            <i class="bi bi-folder me-2"></i>Main Categories
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                            <i class="bi bi-plus-lg me-2"></i>Add Subcategory
                        </button>
                    </div>
                    <h5 class="text-primary mb-3">
                        <i class="bi bi-folder2-open me-2"></i>
                        Subcategories ({{ $subcategories->count() }})
                    </h5>
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

                    <!-- Subcategories -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Parent Category</th>
                                            <th>Description</th>
                                            <th>Products</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($subcategories as $subcategory)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2 text-info me-2"></i>
                                                    <strong>{{ $subcategory->name }}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary text-white fw-bold" style="font-size: 1rem; letter-spacing: 0.5px;">{{ $subcategory->parent->name }}</span>
                                            </td>
                                            <td>
                                                <small class="text-dark" style="font-size: 1rem;">{{ Str::limit($subcategory->description, 50) }}</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">{{ $subcategory->products->count() }}</span>
                                            </td>
                                            <td>
                                                <small>{{ $subcategory->created_at->format('M d, Y') }}</small>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" 
                                                            class="btn btn-sm btn-outline-primary" 
                                                            onclick="editSubcategory({{ $subcategory->id }}, '{{ $subcategory->name }}', '{{ $subcategory->description }}')">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </button>
                                                    <button type="button" 
                                                            class="btn btn-sm btn-outline-danger" 
                                                            onclick="deleteSubcategory({{ $subcategory->id }}, '{{ $subcategory->name }}')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">
                                                <i class="bi bi-folder2-x" style="font-size: 2rem;"></i>
                                                <p class="mt-2">No subcategories found</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Subcategory Modal -->
<div class="modal fade" id="" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addSubcategoryForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="subcategory_name" class="form-label">Subcategory Name</label>
                        <input type="text" class="form-control" id="subcategory_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="parent_category" class="form-label">Parent Category</label>
                        <select class="form-control" id="parent_category" name="parent_id" required>
                            <option value="">Select Parent Category</option>
                            <option value="1">Electronics</option>
                            <option value="2">Fashion</option>
                            <option value="3">Home & Garden</option>
                            <option value="4">Sports</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subcategory_description" class="form-label">Description (Optional)</label>
                        <textarea class="form-control" id="subcategory_description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Subcategory</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editSubcategory(id, name, description) {
    console.log('Edit subcategory:', id, name, description);
    alert('Edit subcategory: ' + name + ' (Demo mode)');
}

function deleteSubcategory(id, name) {
    if (confirm('Are you sure you want to delete subcategory "' + name + '"?')) {
        console.log('Delete subcategory:', id, name);
        alert('Subcategory deleted successfully! (Demo mode)');
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