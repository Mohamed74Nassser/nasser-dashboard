@extends('nasser-dashboard::layouts.master')

@section('title', 'System Settings')





@section('header-actions')
  <button class="btn btn-success btn-sm me-2">
    <i class="bi bi-check-circle me-1"></i>Save Changes
  </button>
  <button class="btn btn-secondary btn-sm">
    <i class="bi bi-arrow-clockwise me-1"></i>Reset
  </button>
@endsection

@section('content')
@php
// Static settings data
$currentSettings = [
    'site_name' => 'Nasser Dashboard',
    'site_description' => 'Professional E-commerce Admin Dashboard',
    'admin_email' => 'admin@nasser-dashboard.com',
    'timezone' => 'UTC',
    'date_format' => 'Y-m-d',
    'time_format' => 'H:i:s',
    'currency' => 'USD',
    'language' => 'en',
    'maintenance_mode' => false,
    'email_notifications' => true,
    'sms_notifications' => false,
    'auto_backup' => true,
    'backup_frequency' => 'daily'
];
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Settings Navigation -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Settings Categories</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#general" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                                    <i class="bi bi-gear me-2"></i>
                                    General Settings
                                </a>
                                <a href="#appearance" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-palette me-2"></i>
                                    Appearance
                                </a>
                                <a href="#notifications" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-bell me-2"></i>
                                    Notifications
                                </a>
                                <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-shield me-2"></i>
                                    Security
                                </a>
                                <a href="#backup" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-cloud-arrow-up me-2"></i>
                                    Backup & Restore
                                </a>
                                <a href="#integrations" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="bi bi-plug me-2"></i>
                                    Integrations
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <!-- Settings Content -->
                    <div class="tab-content">
                        <!-- General Settings -->
                        <div class="tab-pane fade show active" id="general">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-gear me-2"></i>
                                        General Settings
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="site_name">Site Name</label>
                                                    <input type="text" class="form-control" id="site_name" 
                                                           value="{{ $currentSettings['site_name'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="admin_email">Admin Email</label>
                                                    <input type="email" class="form-control" id="admin_email" 
                                                           value="{{ $currentSettings['admin_email'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="site_description">Site Description</label>
                                            <textarea class="form-control" id="site_description" rows="3">{{ $currentSettings['site_description'] }}</textarea>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="timezone">Timezone</label>
                                                    <select class="form-control" id="timezone">
                                                        <option value="UTC" {{ $currentSettings['timezone'] == 'UTC' ? 'selected' : '' }}>UTC</option>
                                                        <option value="America/New_York">Eastern Time</option>
                                                        <option value="America/Chicago">Central Time</option>
                                                        <option value="America/Denver">Mountain Time</option>
                                                        <option value="America/Los_Angeles">Pacific Time</option>
                                                        <option value="Europe/London">London</option>
                                                        <option value="Europe/Paris">Paris</option>
                                                        <option value="Asia/Dubai">Dubai</option>
                                                        <option value="Asia/Tokyo">Tokyo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="currency">Currency</label>
                                                    <select class="form-control" id="currency">
                                                        <option value="USD" {{ $currentSettings['currency'] == 'USD' ? 'selected' : '' }}>USD ($)</option>
                                                        <option value="EUR">EUR (€)</option>
                                                        <option value="GBP">GBP (£)</option>
                                                        <option value="AED">AED (د.إ)</option>
                                                        <option value="SAR">SAR (ر.س)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="language">Language</label>
                                                    <select class="form-control" id="language">
                                                        <option value="en" {{ $currentSettings['language'] == 'en' ? 'selected' : '' }}>English</option>
                                                        <option value="ar">العربية</option>
                                                        <option value="es">Español</option>
                                                        <option value="fr">Français</option>
                                                        <option value="de">Deutsch</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="maintenance_mode" 
                                                       {{ $currentSettings['maintenance_mode'] ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="maintenance_mode">
                                                    Enable Maintenance Mode
                                                </label>
                                            </div>
                                            <small class="form-text text-muted">
                                                When enabled, only administrators can access the site.
                                            </small>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-circle me-2"></i>
                                            Save General Settings
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Appearance Settings -->
                        <div class="tab-pane fade" id="appearance">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-palette me-2"></i>
                                        Appearance Settings
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Theme Options</h6>
                                            <div class="form-group">
                                                <label>Color Scheme</label>
                                                <div class="d-flex gap-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="theme" id="light" checked>
                                                        <label class="form-check-label" for="light">
                                                            <i class="bi bi-sun text-warning"></i> Light
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="theme" id="dark">
                                                        <label class="form-check-label" for="dark">
                                                            <i class="bi bi-moon text-secondary"></i> Dark
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="theme" id="auto">
                                                        <label class="form-check-label" for="auto">
                                                            <i class="bi bi-circle-half text-info"></i> Auto
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Sidebar Style</label>
                                                <select class="form-control">
                                                    <option>Default</option>
                                                    <option>Compact</option>
                                                    <option>Mini</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h6>Logo & Branding</h6>
                                            <div class="form-group">
                                                <label>Upload Logo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logo">
                                                    <label class="custom-file-label" for="logo">Choose file</label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Favicon</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="favicon">
                                                    <label class="custom-file-label" for="favicon">Choose file</label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Primary Color</label>
                                                <input type="color" class="form-control form-control-color" value="#007bff">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Appearance Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Notifications Settings -->
                        <div class="tab-pane fade" id="notifications">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-bell me-2"></i>
                                        Notification Settings
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Email Notifications</h6>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="email_notifications" 
                                                           {{ $currentSettings['email_notifications'] ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="email_notifications">
                                                        Enable Email Notifications
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="new_order_email" checked>
                                                    <label class="custom-control-label" for="new_order_email">
                                                        New Order Notifications
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="low_stock_email" checked>
                                                    <label class="custom-control-label" for="low_stock_email">
                                                        Low Stock Alerts
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="system_alerts_email" checked>
                                                    <label class="custom-control-label" for="system_alerts_email">
                                                        System Alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h6>SMS Notifications</h6>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="sms_notifications" 
                                                           {{ $currentSettings['sms_notifications'] ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="sms_notifications">
                                                        Enable SMS Notifications
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>SMS Provider</label>
                                                <select class="form-control">
                                                    <option>Twilio</option>
                                                    <option>Vonage</option>
                                                    <option>Custom</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="tel" class="form-control" placeholder="+1234567890">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Notification Settings
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
                                        Security Settings
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Password Policy</h6>
                                            <div class="form-group">
                                                <label>Minimum Password Length</label>
                                                <select class="form-control">
                                                    <option>6 characters</option>
                                                    <option selected>8 characters</option>
                                                    <option>10 characters</option>
                                                    <option>12 characters</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="require_uppercase" checked>
                                                    <label class="custom-control-label" for="require_uppercase">
                                                        Require Uppercase Letters
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="require_numbers" checked>
                                                    <label class="custom-control-label" for="require_numbers">
                                                        Require Numbers
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="require_symbols">
                                                    <label class="custom-control-label" for="require_symbols">
                                                        Require Special Characters
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h6>Session & Login</h6>
                                            <div class="form-group">
                                                <label>Session Timeout (minutes)</label>
                                                <input type="number" class="form-control" value="30" min="5" max="480">
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="two_factor" checked>
                                                    <label class="custom-control-label" for="two_factor">
                                                        Enable Two-Factor Authentication
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="login_notifications" checked>
                                                    <label class="custom-control-label" for="login_notifications">
                                                        Login Notifications
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="ip_whitelist">
                                                    <label class="custom-control-label" for="ip_whitelist">
                                                        IP Address Whitelist
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Security Settings
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Backup & Restore -->
                        <div class="tab-pane fade" id="backup">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-cloud-arrow-up me-2"></i>
                                        Backup & Restore
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Automatic Backups</h6>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="auto_backup" 
                                                           {{ $currentSettings['auto_backup'] ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="auto_backup">
                                                        Enable Automatic Backups
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Backup Frequency</label>
                                                <select class="form-control">
                                                    <option value="daily" {{ $currentSettings['backup_frequency'] == 'daily' ? 'selected' : '' }}>Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Backup Retention (days)</label>
                                                <input type="number" class="form-control" value="30" min="1" max="365">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Backup Storage</label>
                                                <select class="form-control">
                                                    <option>Local Storage</option>
                                                    <option>Amazon S3</option>
                                                    <option>Google Cloud Storage</option>
                                                    <option>Dropbox</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h6>Manual Actions</h6>
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="bi bi-download me-2"></i>
                                                    Create Backup Now
                                                </button>
                                                <button type="button" class="btn btn-success">
                                                    <i class="bi bi-upload me-2"></i>
                                                    Restore from Backup
                                                </button>
                                                <button type="button" class="btn btn-info">
                                                    <i class="bi bi-list me-2"></i>
                                                    View Backup History
                                                </button>
                                                <button type="button" class="btn btn-warning">
                                                    <i class="bi bi-gear me-2"></i>
                                                    Test Backup Connection
                                                </button>
                                            </div>
                                            
                                            <hr>
                                            
                                            <h6>Recent Backups</h6>
                                            <div class="list-group">
                                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h6 class="mb-0">Full Backup</h6>
                                                        <small class="text-muted">2025-01-23 10:30 AM</small>
                                                    </div>
                                                    <span class="badge bg-success">Success</span>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h6 class="mb-0">Database Backup</h6>
                                                        <small class="text-muted">2025-01-22 10:30 AM</small>
                                                    </div>
                                                    <span class="badge bg-success">Success</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Integrations -->
                        <div class="tab-pane fade" id="integrations">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="bi bi-plug me-2"></i>
                                        Third-Party Integrations
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <i class="bi bi-google text-danger fs-3 me-3"></i>
                                                        <div>
                                                            <h6 class="mb-0">Google Analytics</h6>
                                                            <small class="text-muted">Track website traffic</small>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="google_analytics">
                                                                <label class="custom-control-label" for="google_analytics"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Google Analytics ID">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <i class="bi bi-facebook text-primary fs-3 me-3"></i>
                                                        <div>
                                                            <h6 class="mb-0">Facebook Pixel</h6>
                                                            <small class="text-muted">Track conversions</small>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="facebook_pixel">
                                                                <label class="custom-control-label" for="facebook_pixel"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Facebook Pixel ID">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <i class="bi bi-envelope text-info fs-3 me-3"></i>
                                                        <div>
                                                            <h6 class="mb-0">Mailchimp</h6>
                                                            <small class="text-muted">Email marketing</small>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="mailchimp">
                                                                <label class="custom-control-label" for="mailchimp"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Mailchimp API Key">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="card border">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <i class="bi bi-chat text-success fs-3 me-3"></i>
                                                        <div>
                                                            <h6 class="mb-0">Intercom</h6>
                                                            <small class="text-muted">Customer support</small>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="intercom">
                                                                <label class="custom-control-label" for="intercom"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Intercom App ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="bi bi-check-circle me-2"></i>
                                        Save Integration Settings
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