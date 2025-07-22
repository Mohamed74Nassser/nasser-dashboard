@extends('layouts.master')

@section('title', 'Main Categories - Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('admin.categories.subcategories') }}" class="btn btn-info me-2">
                            <i class="bi bi-folder2-open me-2"></i>Subcategories
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                            <i class="bi bi-plus-lg me-2"></i>Add Category
                        </button>
                    </div>
                    <h5 class="text-primary mb-3">
                        <i class="bi bi-folder me-2"></i>
                        Main Categories ({{ $mainCategories->total() }})
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
                            
                            <!-- Pagination Component -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Main Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editCategory(id, name, parentId) {
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_parent_id').value = parentId || '';
    
    const form = document.getElementById('editCategoryForm');
    form.action = `{{ url('admin/categories') }}/${id}`;
    
    const modal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
    modal.show();
}

function deleteCategory(id, name) {
    if (confirm(`Are you sure you want to delete the category "${name}"?`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `{{ url('admin/categories') }}/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        document.body.appendChild(form);
        form.submit();
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