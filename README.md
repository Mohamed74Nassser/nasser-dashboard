# Nasser Dashboard

Reusable Laravel Blade admin dashboard package.

## Features
- Ready-made admin dashboard views (Blade)
- Modular layouts and components
- Includes all required CSS, JS, and image assets
- Easy integration with any Laravel project

## Installation

1. Add the package to your Laravel project (as a VCS repo or via Packagist):

```
composer require nasser/dashboard
```

2. Publish assets and views:

```
php artisan vendor:publish --provider="Nasser\\Dashboard\\Providers\\DashboardServiceProvider" --tag=nasser-dashboard-assets
php artisan vendor:publish --provider="Nasser\\Dashboard\\Providers\\DashboardServiceProvider" --tag=nasser-dashboard-views
```

3. Use the views/layouts/components in your Blade files:

```
@extends('nasser-dashboard::layouts.app')
```

Or copy/edit the published views in `resources/views/vendor/nasser-dashboard` as needed.

## Customization
- You can override any view by copying it to your own `resources/views/vendor/nasser-dashboard` directory.
- Assets will be available in `public/vendor/nasser-dashboard/assets`.

## License
MIT 