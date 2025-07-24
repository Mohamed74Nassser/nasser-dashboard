@extends('nasser-dashboard::layouts.master')

@section('title', 'Notifications Center')





@section('header-actions')
  <button class="btn btn-success btn-sm me-2">
    <i class="bi bi-check-all me-1"></i>Mark All Read
  </button>
  <button class="btn btn-warning btn-sm">
    <i class="bi bi-gear me-1"></i>Settings
  </button>
@endsection

@section('content')
@php
// Static notifications data
$notifications = collect([
    (object) [
        'id' => 1,
        'type' => 'order',
        'title' => 'New Order Received',
        'message' => 'Order #1001 has been placed by John Doe for $1,299.99',
        'status' => 'unread',
        'priority' => 'high',
        'created_at' => now()->subMinutes(5),
        'icon' => 'bi-cart-plus'
    ],
    (object) [
        'id' => 2,
        'type' => 'product',
        'title' => 'Product Approval Required',
        'message' => 'New product "Samsung Galaxy S23 Ultra" needs approval',
        'status' => 'unread',
        'priority' => 'medium',
        'created_at' => now()->subHours(1),
        'icon' => 'bi-box'
    ],
    (object) [
        'id' => 3,
        'type' => 'system',
        'title' => 'System Maintenance',
        'message' => 'Scheduled maintenance will occur tonight at 2:00 AM',
        'status' => 'read',
        'priority' => 'low',
        'created_at' => now()->subHours(3),
        'icon' => 'bi-gear'
    ],
    (object) [
        'id' => 4,
        'type' => 'user',
        'title' => 'New User Registration',
        'message' => 'Sarah Wilson has registered as a new user',
        'status' => 'read',
        'priority' => 'medium',
        'created_at' => now()->subHours(5),
        'icon' => 'bi-person-plus'
    ],
    (object) [
        'id' => 5,
        'type' => 'inventory',
        'title' => 'Low Stock Alert',
        'message' => 'Product "Nike Air Jordan 1 Retro" is running low on stock',
        'status' => 'unread',
        'priority' => 'high',
        'created_at' => now()->subHours(8),
        'icon' => 'bi-exclamation-triangle'
    ],
    (object) [
        'id' => 6,
        'type' => 'payment',
        'title' => 'Payment Failed',
        'message' => 'Payment for Order #1002 has failed. Please review.',
        'status' => 'read',
        'priority' => 'high',
        'created_at' => now()->subDays(1),
        'icon' => 'bi-credit-card'
    ],
    (object) [
        'id' => 7,
        'type' => 'backup',
        'title' => 'Backup Completed',
        'message' => 'Daily backup has been completed successfully',
        'status' => 'read',
        'priority' => 'low',
        'created_at' => now()->subDays(1),
        'icon' => 'bi-cloud-check'
    ],
    (object) [
        'id' => 8,
        'type' => 'security',
        'title' => 'Login Alert',
        'message' => 'New login detected from unknown device',
        'status' => 'unread',
        'priority' => 'high',
        'created_at' => now()->subDays(2),
        'icon' => 'bi-shield-exclamation'
    ]
]);

$notificationTypes = [
    'all' => $notifications->count(),
    'order' => $notifications->where('type', 'order')->count(),
    'product' => $notifications->where('type', 'product')->count(),
    'system' => $notifications->where('type', 'system')->count(),
    'user' => $notifications->where('type', 'user')->count(),
    'inventory' => $notifications->where('type', 'inventory')->count(),
    'payment' => $notifications->where('type', 'payment')->count(),
    'backup' => $notifications->where('type', 'backup')->count(),
    'security' => $notifications->where('type', 'security')->count()
];
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <!-- Statistics Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $notifications->count() }}</h3>
                            <p>Total Notifications</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bell"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            View All <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $notifications->where('status', 'unread')->count() }}</h3>
                            <p>Unread Notifications</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bell-fill"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Mark All Read <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $notifications->where('priority', 'high')->count() }}</h3>
                            <p>High Priority</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            View High Priority <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $notifications->where('status', 'read')->count() }}</h3>
                            <p>Read Notifications</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Clear Read <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row">
                <!-- Notifications List -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-list me-2"></i>
                                All Notifications
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-check-all me-1"></i>
                                        Mark All Read
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash me-1"></i>
                                        Clear All
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            @if($notifications->count() > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($notifications as $notification)
                                        <div class="list-group-item {{ $notification->status == 'unread' ? 'bg-light' : '' }}">
                                            <div class="d-flex align-items-start">
                                                <div class="me-3 mt-1">
                                                    @if($notification->priority == 'high')
                                                        <i class="bi {{ $notification->icon }} text-danger fs-5"></i>
                                                    @elseif($notification->priority == 'medium')
                                                        <i class="bi {{ $notification->icon }} text-warning fs-5"></i>
                                                    @else
                                                        <i class="bi {{ $notification->icon }} text-info fs-5"></i>
                                                    @endif
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h6 class="mb-1 {{ $notification->status == 'unread' ? 'fw-bold' : '' }}">
                                                                {{ $notification->title }}
                                                                @if($notification->status == 'unread')
                                                                    <span class="badge bg-primary ms-2">New</span>
                                                                @endif
                                                            </h6>
                                                            <p class="mb-1 text-muted">{{ $notification->message }}</p>
                                                            <small class="text-muted">
                                                                <i class="bi bi-clock me-1"></i>
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </small>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                                    type="button" data-bs-toggle="dropdown">
                                                                <i class="bi bi-three-dots"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                @if($notification->status == 'unread')
                                                                    <li><a class="dropdown-item" href="#">
                                                                        <i class="bi bi-check me-2"></i>Mark as Read
                                                                    </a></li>
                                                                @else
                                                                    <li><a class="dropdown-item" href="#">
                                                                        <i class="bi bi-arrow-clockwise me-2"></i>Mark as Unread
                                                                    </a></li>
                                                                @endif
                                                                <li><a class="dropdown-item" href="#">
                                                                    <i class="bi bi-star me-2"></i>Pin Notification
                                                                </a></li>
                                                                <li><hr class="dropdown-divider"></li>
                                                                <li><a class="dropdown-item text-danger" href="#">
                                                                    <i class="bi bi-trash me-2"></i>Delete
                                                                </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="bi bi-bell-slash fs-1 text-muted mb-3"></i>
                                    <h5 class="text-muted">No notifications found</h5>
                                    <p class="text-muted">You're all caught up! No new notifications at the moment.</p>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <nav aria-label="Notifications pagination">
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

                <!-- Filters & Settings -->
                <div class="col-lg-4">
                    <!-- Notification Filters -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-funnel me-2"></i>
                                Filters
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Notification Type</label>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active">
                                        All Notifications
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['all'] }}</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Orders
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['order'] }}</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Products
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['product'] }}</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        System
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['system'] }}</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Users
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['user'] }}</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Inventory
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['inventory'] }}</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Payments
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['payment'] }}</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Security
                                        <span class="badge bg-primary rounded-pill">{{ $notificationTypes['security'] }}</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Priority Level</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="highPriority" checked>
                                    <label class="form-check-label text-danger" for="highPriority">
                                        High Priority
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mediumPriority" checked>
                                    <label class="form-check-label text-warning" for="mediumPriority">
                                        Medium Priority
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lowPriority" checked>
                                    <label class="form-check-label text-info" for="lowPriority">
                                        Low Priority
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="unreadStatus" checked>
                                    <label class="form-check-label" for="unreadStatus">
                                        Unread
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="readStatus" checked>
                                    <label class="form-check-label" for="readStatus">
                                        Read
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-gear me-2"></i>
                                Notification Settings
                            </h3>
                        </div>
                        <div class="card-body">
                            <h6>Email Notifications</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="emailOrders" checked>
                                <label class="form-check-label" for="emailOrders">
                                    New Orders
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="emailProducts" checked>
                                <label class="form-check-label" for="emailProducts">
                                    Product Approvals
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="emailInventory" checked>
                                <label class="form-check-label" for="emailInventory">
                                    Low Stock Alerts
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="emailSecurity">
                                <label class="form-check-label" for="emailSecurity">
                                    Security Alerts
                                </label>
                            </div>
                            
                            <h6>Push Notifications</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="pushOrders" checked>
                                <label class="form-check-label" for="pushOrders">
                                    New Orders
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="pushProducts" checked>
                                <label class="form-check-label" for="pushProducts">
                                    Product Updates
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="pushSystem">
                                <label class="form-check-label" for="pushSystem">
                                    System Notifications
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Notification Frequency</label>
                                <select class="form-control">
                                    <option>Immediate</option>
                                    <option>Every 15 minutes</option>
                                    <option>Every hour</option>
                                    <option>Daily digest</option>
                                </select>
                            </div>
                            
                            <button type="button" class="btn btn-primary w-100">
                                <i class="bi bi-check-circle me-2"></i>
                                Save Settings
                            </button>
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
                                    <i class="bi bi-check-all me-2"></i>
                                    Mark All as Read
                                </button>
                                <button type="button" class="btn btn-info">
                                    <i class="bi bi-download me-2"></i>
                                    Export Notifications
                                </button>
                                <button type="button" class="btn btn-warning">
                                    <i class="bi bi-gear me-2"></i>
                                    Notification Preferences
                                </button>
                                <button type="button" class="btn btn-secondary">
                                    <i class="bi bi-clock-history me-2"></i>
                                    View History
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection 