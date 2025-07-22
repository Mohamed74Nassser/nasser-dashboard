@if($paginator->hasPages())
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Pagination navigation">
            <ul class="pagination pagination-sm shadow-sm">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    
    {{-- Pagination Info --}}
    <div class="text-center text-muted mt-2">
        <small>
            Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} 
            of {{ $paginator->total() }} {{ $label }}
        </small>
    </div>
@endif

<style>
/* Custom Pagination Styles - Inline for immediate application */
.pagination {
    border-radius: 0.5rem !important;
    overflow: hidden !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
}

.pagination .page-link {
    border: none !important;
    color: #6c757d !important;
    padding: 0.5rem 0.75rem !important;
    transition: all 0.2s ease-in-out !important;
    background-color: #fff !important;
}

.pagination .page-link:hover {
    background-color: #e9ecef !important;
    color: #495057 !important;
    transform: translateY(-1px) !important;
    box-shadow: 0 2px 4px rgba(0,0,0,0.15) !important;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd !important;
    border-color: #0d6efd !important;
    color: white !important;
    font-weight: 600 !important;
    box-shadow: 0 2px 4px rgba(13, 110, 253, 0.3) !important;
}

.pagination .page-item.disabled .page-link {
    color: #adb5bd !important;
    background-color: #f8f9fa !important;
    cursor: not-allowed !important;
}

.pagination .page-item:first-child .page-link,
.pagination .page-item:last-child .page-link {
    border-radius: 0 !important;
}

/* Hover effects for pagination info */
.text-muted small {
    transition: color 0.2s ease-in-out !important;
}

.text-muted:hover small {
    color: #6c757d !important;
}

/* Responsive pagination */
@media (max-width: 576px) {
    .pagination {
        font-size: 0.875rem !important;
    }
    
    .pagination .page-link {
        padding: 0.375rem 0.5rem !important;
    }
}
</style> 