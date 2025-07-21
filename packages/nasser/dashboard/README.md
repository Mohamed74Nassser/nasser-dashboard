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
       "url": "https://github.com/USERNAME/nasser-dashboard"
     }
   ]
   ```
2. Require the package:
   ```bash
   composer require nasser/dashboard:dev-main
   ```

### If published on Packagist:

```bash
composer require nasser/dashboard
```

## Publish assets and views

```bash
php artisan vendor:publish --provider="Nasser\\Dashboard\\Providers\\DashboardServiceProvider" --tag=nasser-dashboard-assets
php artisan vendor:publish --provider="Nasser\\Dashboard\\Providers\\DashboardServiceProvider" --tag=nasser-dashboard-views
```

## Usage

In your Blade files:
```blade
@extends('nasser-dashboard::layouts.app')
```
Or copy/edit the published views in `resources/views/vendor/nasser-dashboard` as needed.

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

## License
MIT
