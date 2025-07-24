# Nasser Dashboard

Reusable Laravel Blade admin dashboard package.

## Features
- Ready-made admin dashboard views (Blade)
- Modular layouts and components
- Includes all required CSS, JS, and image assets
- Easy integration with any Laravel project

## Requirements
- Laravel 8.x or higher
- PHP 7.4 or higher

## Installation

### If using from GitHub (VCS):

1. Add the repository to your `composer.json`:
   ```json
   "repositories": [
     {
       "type": "vcs",
       "url": "https://github.com/Mohamed74Nassser/nasser-dashboard"
     }
   ]
   ```

2. Require the package:
   ```bash
   composer require nasser/dashboard:dev-main
   ```

## Publish assets and views

```bash
php artisan vendor:publish --tag=nasser-dashboard-assets
php artisan vendor:publish --tag=nasser-dashboard-views
```

## Usage

In your Blade files:
```blade
@extends('nasser-dashboard::layouts.master')
```
Or copy/edit the published views in `resources/views/vendor/nasser-dashboard` as needed.

## Routing Setup

To fully enable the dashboard views and pages, you can add the following routes to your `routes/web.php` file:

```php
<?php

use Illuminate\Support\Facades\Route;

// Nasser Dashboard Routes
Route::prefix('dashboard')->group(function () {
    // Dashboard Home
    Route::get('/', function () {
        return view('nasser-dashboard::admin.dashboard');
    })->name('dashboard');

    // Products Routes
    Route::get('/products/all', function () {
        return view('nasser-dashboard::admin.products.all');
    })->name('dashboard.products.all');

    Route::get('/products/pending', function () {
        return view('nasser-dashboard::admin.products.pending');
    })->name('dashboard.products.pending');

    Route::get('/products/approved', function () {
        return view('nasser-dashboard::admin.products.approved');
    })->name('dashboard.products.approved');

    Route::get('/products/rejected', function () {
        return view('nasser-dashboard::admin.products.rejected');
    })->name('dashboard.products.rejected');

    Route::get('/products/show', function () {
        return view('nasser-dashboard::admin.products.show');
    })->name('dashboard.products.show');

    // Orders Routes
    Route::get('/orders/pending', function () {
        return view('nasser-dashboard::admin.orders.pending');
    })->name('dashboard.orders.pending');

    Route::get('/orders/paid', function () {
        return view('nasser-dashboard::admin.orders.paid');
    })->name('dashboard.orders.paid');

    Route::get('/orders/show', function () {
        return view('nasser-dashboard::admin.orders.show');
    })->name('dashboard.orders.show');

    Route::get('/orders/details', function () {
        return view('nasser-dashboard::admin.orders.details');
    })->name('dashboard.orders.details');

    // Categories Routes
    Route::get('/categories', function () {
        return view('nasser-dashboard::admin.categories.index');
    })->name('dashboard.categories');

    Route::get('/categories/subcategories', function () {
        return view('nasser-dashboard::admin.categories.subcategories');
    })->name('dashboard.categories.subcategories');

    // New Advanced Dashboard Pages
    Route::get('/analytics', function () {
        return view('nasser-dashboard::admin.analytics');
    })->name('dashboard.analytics');

    Route::get('/users', function () {
        return view('nasser-dashboard::admin.users');
    })->name('dashboard.users');

    Route::get('/notifications', function () {
        return view('nasser-dashboard::admin.notifications');
    })->name('dashboard.notifications');

    Route::get('/help', function () {
        return view('nasser-dashboard::admin.help');
    })->name('dashboard.help');

    Route::get('/reports', function () {
        return view('nasser-dashboard::admin.reports');
    })->name('dashboard.reports');

    Route::get('/settings', function () {
        return view('nasser-dashboard::admin.settings');
    })->name('dashboard.settings');

    Route::get('/advanced-settings', function () {
        return view('nasser-dashboard::admin.advanced-settings');
    })->name('dashboard.advanced-settings');
});
```

Once added, you can access the dashboard at:

```
http://your-domain.com/dashboard
```

## Quick Test

Add this to your `routes/web.php`:
```php
Route::get('/test-dashboard', function () {
    return view('nasser-dashboard::layouts.master');
});
```
Then visit `/test-dashboard` in your browser.

## Customization
- You can override any view by copying it to your own `resources/views/vendor/nasser-dashboard` directory.
- Assets will be available in `public/vendor/nasser-dashboard/assets`.

## Notes
- Some links in the dashboard are placeholders (`#`). Customize them as needed for your project.
- If you use components that depend on authentication, make sure the user is logged in.

## 📸 Dashboard Preview
Here are some screenshots of the Nasser Dashboard in action:
<img width="1895" height="907" alt="image" src="https://github.com/user-attachments/assets/c2a86393-03a6-4425-aa37-8ceb9477bb0f" />
<img width="1919" height="908" alt="image" src="https://github.com/user-attachments/assets/97af6be4-38f3-41ac-9b82-c97827bf0756" />
<img width="1919" height="904" alt="image" src="https://github.com/user-attachments/assets/6d5a0213-211c-4359-880e-732d0cfe27b1" />
<img width="1919" height="908" alt="image" src="https://github.com/user-attachments/assets/5c9d3c55-ebeb-4eea-96dc-7f5a1a354dff" />
<img width="1919" height="911" alt="image" src="https://github.com/user-attachments/assets/74fb182e-d7d1-4d97-a9cb-7771ecd493ed" />
<img width="1896" height="913" alt="image" src="https://github.com/user-attachments/assets/e2a45ef9-4f53-46f8-a78c-470efc885bc3" />
<img width="1898" height="904" alt="image" src="https://github.com/user-attachments/assets/726803d8-f663-4132-ba4a-c6e99f4f0470" />
<img width="1896" height="909" alt="image" src="https://github.com/user-attachments/assets/432cc132-235f-453f-b295-bc5f522f3140" />
<img width="1895" height="906" alt="image" src="https://github.com/user-attachments/assets/c70d4a90-b51a-4bef-954a-d1a51dbc939e" />
<img width="1917" height="909" alt="image" src="https://github.com/user-attachments/assets/fef26cb4-b037-44c3-8099-b5b716a22f83" />
<img width="1898" height="907" alt="image" src="https://github.com/user-attachments/assets/9db2998a-6538-4f9a-86d3-8aedda03dcb5" />
