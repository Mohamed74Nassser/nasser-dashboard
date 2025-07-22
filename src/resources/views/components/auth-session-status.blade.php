@props(['status', 'class' => ''])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-success alert-dismissible ' . $class]) }}>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <i class="bi bi-check-circle me-2"></i>
        {{ $status }}
    </div>
@endif 