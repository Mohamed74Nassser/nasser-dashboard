@extends('nasser-dashboard::layouts.master')

@section('title', 'Main Categories - Admin Dashboard')

@section('content')
@php
// Static data for demonstration
$mainCategories = collect([
    (object) [
        'id' => 1,
        'name' => 'Electronics',
        'created_at' => now()->subDays(30),
        'children' => collect([
            (object) ['id' => 1, 'name' => 'Smartphones'],
            (object) ['id' => 2, 'name' => 'Laptops'],
            (object) ['id' => 3, 'name' => 'Tablets']
        ]),
        'products' => collect([
            (object) ['id' => 1, 'name' => 'iPhone 14 Pro Max'],
            (object) ['id' => 2, 'name' => 'Samsung Galaxy S23 Ultra'],
            (object) ['id' => 3, 'name' => 'MacBook Pro 16" M2']
        ])
    ],
    (object) [
        'id' => 2,
        'name' => 'Fashion',
        'created_at' => now()->subDays(25),
        'children' => collect([
            (object) ['id' => 4, 'name' => 'Men\'s Clothing'],
            (object) ['id' => 5, 'name' => 'Women\'s Clothing'],
            (object) ['id' => 6, 'name' => 'Shoes']
        ]),
        'products' => collect([
            (object) ['id' => 4, 'name' => 'Nike Air Jordan 1 Retro'],
            (object) ['id' => 5, 'name' => 'Adidas Ultraboost']
        ])
    ],
    (object) [
        'id' => 3,
        'name' => 'Home & Garden',
        'created_at' => now()->subDays(20),
        'children' => collect([
            (object) ['id' => 7, 'name' => 'Furniture'],
            (object) ['id' => 8, 'name' => 'Kitchen'],
            (object) ['id' => 9, 'name' => 'Garden Tools']
        ]),
        'products' => collect([
            (object) ['id' => 6, 'name' => 'IKEA Sofa'],
            (object) ['id' => 7, 'name' => 'Kitchen Mixer']
        ])
    ],
    (object) [
        'id' => 4,
        'name' => 'Sports',
        'created_at' => now()->subDays(15),
        'children' => collect([
            (object) ['id' => 10, 'name' => 'Football'],
            (object) ['id' => 11, 'name' => 'Basketball'],
            (object) ['id' => 12, 'name' => 'Tennis']
        ]),
        'products' => collect([
            (object) ['id' => 8, 'name' => 'Nike Football Boots'],
            (object) ['id' => 9, 'name' => 'Wilson Tennis Racket']
        ])
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
                            <i class="bi bi-folder2-open me-2"></i>Subcategories
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                            <i class="bi bi-plus-lg me-2"></i>Add Category
                        </button>
                    </div>
                    <h5 class="text-primary mb-3">
                        <i class="bi bi-folder me-2"></i>
                        Main Categories ({{ $mainCategories->count() }})
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

                    <!-- Main Categories -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Subcategories</th>
                                            <th>Products</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mainCategories as $category)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder text-warning me-2"></i>
                                                    <strong>{{ $category->name }}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-info">{{ $category->children->count() }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">{{ $category->products->count() }}</span>
                                            </td>
                                            <td>
                                                <small>{{ $category->created_at->format('M d, Y') }}</small>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" 
                                                            class="btn btn-sm btn-outline-primary" 
                                                            onclick="editCategory({{ $category->id }}, '{{ $category->name }}', null)">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </button>
                                                    <button type="button" 
                                                            class="btn btn-sm btn-outline-danger" 
                                                            onclick="deleteCategory({{ $category->id }}, '{{ $category->name }}')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                <i class="bi bi-folder-x" style="font-size: 2rem;"></i>
                                                <p class="mt-2">No main categories found</p>
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

<script>
function editCategory(id, name, description) {
    console.log('Edit category:', id, name, description);
    alert('Edit category: ' + name + ' (Demo mode)');
}

function deleteCategory(id, name) {
    if (confirm('Are you sure you want to delete category "' + name + '"?')) {
        console.log('Delete category:', id, name);
        alert('Category deleted successfully! (Demo mode)');
    }
}

// Handle add category form
function handleAddCategory() {
    const name = document.getElementById('category_name').value;
    console.log('Add category:', name);
    alert('Category added successfully! (Demo mode)');
    
    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
    modal.hide();
    
    // Reset form
    document.getElementById('addCategoryForm').reset();
}
</script>

@endsection 