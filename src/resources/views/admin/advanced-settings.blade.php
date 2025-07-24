@extends('nasser-dashboard::layouts.master')

@section('title', 'Advanced Settings')





@section('header-actions')
  <button class="btn btn-success btn-sm me-2">
    <i class="bi bi-check-circle me-1"></i>Apply Changes
  </button>
  <button class="btn btn-warning btn-sm me-2">
    <i class="bi bi-exclamation-triangle me-1"></i>Test Settings
  </button>
  <button class="btn btn-secondary btn-sm">
    <i class="bi bi-arrow-clockwise me-1"></i>Reset to Default
  </button>
@endsection

@section('content')
@php
// Static advanced settings data
$currentSettings = [
    'cache_enabled' => true,
    'cache_duration' => 3600,
    'debug_mode' => false,
    'maintenance_mode' => false,
    'api_rate_limit' => 1000,
    'session_timeout' => 30,
    'max_upload_size' => 10,
    'backup_frequency' => 'daily',
    'log_level' => 'info',
    'cron_enabled' => true
];
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">

            <!-- Settings Navigation -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Settings Categories</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#performance" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Performance
                                </a>
                                <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-shield me-2"></i>
                                    Security
                                </a>
                                <a href="#api" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-code-slash me-2"></i>
                                    API Settings
                                </a>
                                <a href="#database" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-database me-2"></i>
                                    Database
                                </a>
                                <a href="#caching" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-lightning me-2"></i>
                                    Caching
                                </a>
                                <a href="#logging" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-journal-text me-2"></i>
                                    Logging
                                </a>
                                <a href="#cron" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-clock me-2"></i>
                                    Cron Jobs
                                </a>
                                <a href="#maintenance" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-tools me-2"></i>
                                    Maintenance
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Performance Settings -->
                        <div class="tab-pane fade show active" id="performance">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-speedometer2 me-2"></i>
                                        Performance Optimization
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Max Upload Size (MB)</label>
                                                <input type="number" class="form-control" value="{{ $currentSettings['max_upload_size'] }}" min="1" max="100">
                                                <small class="form-text text-muted">Maximum file upload size in megabytes</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Session Timeout (minutes)</label>
                                                <input type="number" class="form-control" value="{{ $currentSettings['session_timeout'] }}" min="5" max="480">
                                                <small class="form-text text-muted">How long before user session expires</small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="gzip_compression" checked>
                                            <label class="custom-control-label" for="gzip_compression">
                                                Enable GZIP Compression
                                            </label>
                                        </div>
                                        <small class="form-text text-muted">Compress responses to reduce bandwidth usage</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="minify_assets" checked>
                                            <label class="custom-control-label" for="minify_assets">
                                                Minify CSS & JavaScript
                                            </label>
                                        </div>
                                        <small class="form-text text-muted">Reduce file sizes for faster loading</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="image_optimization" checked>
                                            <label class="custom-control-label" for="image_optimization">
                                                Enable Image Optimization
                                            </label>
                                        </div>
                                        <small class="form-text text-muted">Automatically optimize uploaded images</small>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Performance Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <div class="tab-pane fade" id="security">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-shield me-2"></i>
                                        Security Configuration
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password Minimum Length</label>
                                                <select class="form-control">
                                                    <option>6 characters</option>
                                                    <option selected>8 characters</option>
                                                    <option>10 characters</option>
                                                    <option>12 characters</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Failed Login Attempts</label>
                                                <select class="form-control">
                                                    <option>3 attempts</option>
                                                    <option selected>5 attempts</option>
                                                    <option>10 attempts</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="two_factor_auth" checked>
                                            <label class="custom-control-label" for="two_factor_auth">
                                                Require Two-Factor Authentication
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="ip_whitelist">
                                            <label class="custom-control-label" for="ip_whitelist">
                                                Enable IP Address Whitelist
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="ssl_required" checked>
                                            <label class="custom-control-label" for="ssl_required">
                                                Force HTTPS/SSL
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="security_headers" checked>
                                            <label class="custom-control-label" for="security_headers">
                                                Enable Security Headers
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Security Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- API Settings -->
                        <div class="tab-pane fade" id="api">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-code-slash me-2"></i>
                                        API Configuration
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>API Rate Limit (requests/hour)</label>
                                                <input type="number" class="form-control" value="{{ $currentSettings['api_rate_limit'] }}" min="100" max="10000">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>API Version</label>
                                                <select class="form-control">
                                                    <option>v1.0</option>
                                                    <option selected>v2.0</option>
                                                    <option>v3.0 (Beta)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>API Documentation URL</label>
                                        <input type="url" class="form-control" value="https://api.nasser-dashboard.com/docs">
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="api_logging" checked>
                                            <label class="custom-control-label" for="api_logging">
                                                Enable API Request Logging
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="api_cors" checked>
                                            <label class="custom-control-label" for="api_cors">
                                                Enable CORS for API
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6>API Keys Management</h6>
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Key Name</th>
                                                            <th>Created</th>
                                                            <th>Last Used</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Production API Key</td>
                                                            <td>2025-01-15</td>
                                                            <td>2025-01-23 10:30</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-danger">Revoke</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Development API Key</td>
                                                            <td>2025-01-20</td>
                                                            <td>2025-01-22 15:45</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-danger">Revoke</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button class="btn btn-primary btn-sm">
                                                <i class="bi bi-plus me-1"></i>
                                                Generate New API Key
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save API Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Database Settings -->
                        <div class="tab-pane fade" id="database">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-database me-2"></i>
                                        Database Configuration
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Database Type</label>
                                                <select class="form-control">
                                                    <option selected>MySQL</option>
                                                    <option>PostgreSQL</option>
                                                    <option>SQLite</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Connection Pool Size</label>
                                                <input type="number" class="form-control" value="10" min="1" max="50">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="db_logging" checked>
                                            <label class="custom-control-label" for="db_logging">
                                                Enable Database Query Logging
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="db_backup" checked>
                                            <label class="custom-control-label" for="db_backup">
                                                Enable Automatic Database Backups
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6>Database Statistics</h6>
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <h4 class="text-primary">1.2 GB</h4>
                                                    <small>Database Size</small>
                                                </div>
                                                <div class="col-4">
                                                    <h4 class="text-success">15,432</h4>
                                                    <small>Total Records</small>
                                                </div>
                                                <div class="col-4">
                                                    <h4 class="text-info">24</h4>
                                                    <small>Tables</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Database Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Caching Settings -->
                        <div class="tab-pane fade" id="caching">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-lightning me-2"></i>
                                        Caching Configuration
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="cache_enabled" 
                                                   {{ $currentSettings['cache_enabled'] ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="cache_enabled">
                                                Enable Caching
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cache Duration (seconds)</label>
                                                <input type="number" class="form-control" value="{{ $currentSettings['cache_duration'] }}" min="60" max="86400">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cache Driver</label>
                                                <select class="form-control">
                                                    <option>File</option>
                                                    <option selected>Redis</option>
                                                    <option>Memcached</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="page_cache" checked>
                                            <label class="custom-control-label" for="page_cache">
                                                Enable Page Caching
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="query_cache" checked>
                                            <label class="custom-control-label" for="query_cache">
                                                Enable Query Caching
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6>Cache Management</h6>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-warning">
                                                    <i class="bi bi-arrow-clockwise me-2"></i>
                                                    Clear All Cache
                                                </button>
                                                <button class="btn btn-info">
                                                    <i class="bi bi-eye me-2"></i>
                                                    View Cache Statistics
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Caching Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Logging Settings -->
                        <div class="tab-pane fade" id="logging">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-journal-text me-2"></i>
                                        Logging Configuration
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Log Level</label>
                                        <select class="form-control">
                                            <option>Debug</option>
                                            <option selected>Info</option>
                                            <option>Warning</option>
                                            <option>Error</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Log Retention (days)</label>
                                        <input type="number" class="form-control" value="30" min="1" max="365">
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="error_logging" checked>
                                            <label class="custom-control-label" for="error_logging">
                                                Log Errors
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="access_logging" checked>
                                            <label class="custom-control-label" for="access_logging">
                                                Log Access Requests
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="performance_logging">
                                            <label class="custom-control-label" for="performance_logging">
                                                Log Performance Metrics
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6>Log Files</h6>
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Log File</th>
                                                            <th>Size</th>
                                                            <th>Last Modified</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>error.log</td>
                                                            <td>2.1 MB</td>
                                                            <td>2025-01-23 10:30</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                                                <button class="btn btn-sm btn-outline-danger">Clear</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>access.log</td>
                                                            <td>15.7 MB</td>
                                                            <td>2025-01-23 10:30</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                                                <button class="btn btn-sm btn-outline-danger">Clear</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Logging Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Cron Jobs -->
                        <div class="tab-pane fade" id="cron">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-clock me-2"></i>
                                        Cron Jobs Configuration
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="cron_enabled" 
                                                   {{ $currentSettings['cron_enabled'] ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="cron_enabled">
                                                Enable Cron Jobs
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Job Name</th>
                                                    <th>Schedule</th>
                                                    <th>Last Run</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Database Backup</td>
                                                    <td>Daily at 2:00 AM</td>
                                                    <td>2025-01-23 02:00</td>
                                                    <td><span class="badge bg-success">Success</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Run Now</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cache Cleanup</td>
                                                    <td>Every 6 hours</td>
                                                    <td>2025-01-23 06:00</td>
                                                    <td><span class="badge bg-success">Success</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Run Now</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email Queue</td>
                                                    <td>Every 5 minutes</td>
                                                    <td>2025-01-23 10:25</td>
                                                    <td><span class="badge bg-success">Success</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Run Now</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Log Cleanup</td>
                                                    <td>Weekly</td>
                                                    <td>2025-01-20 03:00</td>
                                                    <td><span class="badge bg-success">Success</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary">Run Now</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Cron Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Maintenance -->
                        <div class="tab-pane fade" id="maintenance">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-tools me-2"></i>
                                        Maintenance Mode
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-warning">
                                        <h6><i class="bi bi-exclamation-triangle me-2"></i>Maintenance Mode</h6>
                                        <p class="mb-0">When enabled, only administrators can access the system. Regular users will see a maintenance page.</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="maintenance_mode" 
                                                   {{ $currentSettings['maintenance_mode'] ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="maintenance_mode">
                                                Enable Maintenance Mode
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Maintenance Message</label>
                                        <textarea class="form-control" rows="3" placeholder="We are currently performing scheduled maintenance. Please check back soon."></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Allowed IP Addresses</label>
                                        <input type="text" class="form-control" placeholder="127.0.0.1, 192.168.1.1">
                                        <small class="form-text text-muted">Comma-separated list of IP addresses that can access during maintenance</small>
                                    </div>
                                    
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6>System Health Check</h6>
                                            <div class="row text-center">
                                                <div class="col-3">
                                                    <i class="bi bi-check-circle text-success fs-3"></i>
                                                    <p class="mb-0">Database</p>
                                                </div>
                                                <div class="col-3">
                                                    <i class="bi bi-check-circle text-success fs-3"></i>
                                                    <p class="mb-0">Cache</p>
                                                </div>
                                                <div class="col-3">
                                                    <i class="bi bi-check-circle text-success fs-3"></i>
                                                    <p class="mb-0">Storage</p>
                                                </div>
                                                <div class="col-3">
                                                    <i class="bi bi-check-circle text-success fs-3"></i>
                                                    <p class="mb-0">Services</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-warning">
                                            <i class="bi bi-arrow-clockwise me-2"></i>
                                            Clear All Caches
                                        </button>
                                        <button class="btn btn-info">
                                            <i class="bi bi-database me-2"></i>
                                            Optimize Database
                                        </button>
                                        <button class="btn btn-secondary">
                                            <i class="bi bi-gear me-2"></i>
                                            System Diagnostics
                                        </button>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Maintenance Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection 