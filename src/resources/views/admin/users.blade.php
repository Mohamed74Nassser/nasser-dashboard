@extends('nasser-dashboard::layouts.master')

@section('title', 'User Management')





@section('header-actions')
  <button class="btn btn-primary btn-sm">
    <i class="bi bi-plus-circle me-1"></i>Add User
  </button>
@endsection

@section('content')
@php
// Static users data
$users = collect([
    (object) [
        'id' => 1,
        'name' => 'Admin User',
        'email' => 'admin@nasser-dashboard.com',
        'role' => 'Super Admin',
        'status' => 'active',
        'last_login' => now()->subHours(2),
        'avatar' => null,
        'created_at' => now()->subMonths(6)
    ],
    (object) [
        'id' => 2,
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'role' => 'Manager',
        'status' => 'active',
        'last_login' => now()->subDays(1),
        'avatar' => null,
        'created_at' => now()->subMonths(3)
    ],
    (object) [
        'id' => 3,
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'role' => 'Editor',
        'status' => 'active',
        'last_login' => now()->subDays(3),
        'avatar' => null,
        'created_at' => now()->subMonths(2)
    ],
    (object) [
        'id' => 4,
        'name' => 'Mike Johnson',
        'email' => 'mike@example.com',
        'role' => 'Viewer',
        'status' => 'inactive',
        'last_login' => now()->subWeeks(2),
        'avatar' => null,
        'created_at' => now()->subMonths(1)
    ],
    (object) [
        'id' => 5,
        'name' => 'Sarah Wilson',
        'email' => 'sarah@example.com',
        'role' => 'Editor',
        'status' => 'active',
        'last_login' => now()->subHours(5),
        'avatar' => null,
        'created_at' => now()->subWeeks(2)
    ]
]);

$roles = collect([
    (object) ['name' => 'Super Admin', 'users' => 1, 'permissions' => 'All'],
    (object) ['name' => 'Manager', 'users' => 2, 'permissions' => 'Manage Products, Orders, Users'],
    (object) ['name' => 'Editor', 'users' => 3, 'permissions' => 'Edit Products, View Orders'],
    (object) ['name' => 'Viewer', 'users' => 1, 'permissions' => 'View Only']
]);
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $users->count() }}</h3>
                            <p>Total Users</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $users->where('status', 'active')->count() }}</h3>
                            <p>Active Users</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $users->where('status', 'inactive')->count() }}</h3>
                            <p>Inactive Users</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-x"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $roles->count() }}</h3>
                            <p>User Roles</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-shield"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row">
                <!-- Users List -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-list me-2"></i>
                                All Users
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="bi bi-person-plus me-1"></i>
                                    Add New User
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Last Login</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm me-3">
                                                            @if($user->avatar)
                                                                <img src="{{ $user->avatar }}" class="rounded-circle" width="40" height="40">
                                                            @else
                                                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                                    <i class="bi bi-person text-white"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0">{{ $user->name }}</h6>
                                                            <small class="text-muted">ID: {{ $user->id }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->role == 'Super Admin')
                                                        <span class="badge bg-danger">{{ $user->role }}</span>
                                                    @elseif($user->role == 'Manager')
                                                        <span class="badge bg-primary">{{ $user->role }}</span>
                                                    @elseif($user->role == 'Editor')
                                                        <span class="badge bg-success">{{ $user->role }}</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $user->role }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->status == 'active')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <small class="text-muted">
                                                        {{ $user->last_login->diffForHumans() }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-sm btn-outline-primary" 
                                                                data-bs-toggle="modal" data-bs-target="#editUserModal">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-info">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-warning">
                                                            <i class="bi bi-key"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="Users pagination">
                                <ul class="pagination justify-content-center mb-0">
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
                    </div>
                </div>

                <!-- User Roles & Quick Actions -->
                <div class="col-lg-4">
                    <!-- User Roles -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-shield me-2"></i>
                                User Roles
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                @foreach($roles as $role)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-0">{{ $role->name }}</h6>
                                                <small class="text-muted">{{ $role->permissions }}</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-primary me-2">{{ $role->users }} users</span>
                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-lightning me-2"></i>
                                Quick Actions
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-success">
                                    <i class="bi bi-person-plus me-2"></i>
                                    Invite New User
                                </button>
                                <button type="button" class="btn btn-info">
                                    <i class="bi bi-download me-2"></i>
                                    Export Users List
                                </button>
                                <button type="button" class="btn btn-warning">
                                    <i class="bi bi-shield-check me-2"></i>
                                    Manage Permissions
                                </button>
                                <button type="button" class="btn btn-secondary">
                                    <i class="bi bi-gear me-2"></i>
                                    User Settings
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-clock-history me-2"></i>
                                Recent Activity
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="bi bi-person-plus text-success"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">New user registered</h6>
                                            <small class="text-muted">Sarah Wilson joined 2 hours ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="bi bi-key text-warning"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Password changed</h6>
                                            <small class="text-muted">John Doe updated password 1 day ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="bi bi-shield text-info"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Role updated</h6>
                                            <small class="text-muted">Mike Johnson role changed to Viewer 3 days ago</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-person-plus me-2"></i>
                    Add New User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="userName" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="userEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Role</label>
                        <select class="form-control" id="userRole" required>
                            <option value="">Select Role</option>
                            <option value="manager">Manager</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="userPasswordConfirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="userPasswordConfirm" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>
                    Create User
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-shield-plus me-2"></i>
                    Add New Role
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="roleName" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="roleName" required>
                    </div>
                    <div class="mb-3">
                        <label for="roleDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="roleDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Permissions</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permUsers">
                            <label class="form-check-label" for="permUsers">
                                Manage Users
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permProducts">
                            <label class="form-check-label" for="permProducts">
                                Manage Products
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permOrders">
                            <label class="form-check-label" for="permOrders">
                                Manage Orders
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="permSettings">
                            <label class="form-check-label" for="permSettings">
                                Manage Settings
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>
                    Create Role
                </button>
            </div>
        </div>
    </div>
</div>

@endsection 