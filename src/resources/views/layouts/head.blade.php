<title>@yield('title')</title>



<meta name="csrf-token" content="{{ csrf_token() }}">

<!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('vendor/nasser-dashboard/assets/css/adminlte.css') }}" />

    <!--end::Required Plugin(AdminLTE)-->
    
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />

    <style>
        /* Custom Sidebar Styles */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        }
        
        .sidebar-section {
            border-radius: 10px;
        }
        
        .sidebar-heading {
            font-size: 0.75rem;
            letter-spacing: 1px;
        }
        
        .nav-link.hover-bg-light:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
            transform: translateX(5px);
            transition: all 0.3s ease;
        }
        
        .nav-link.rounded-3 {
            border-radius: 8px !important;
            padding: 12px 15px;
            margin: 2px 0;
            transition: all 0.3s ease;
        }
        
        .nav-link.rounded-3:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .brand-text {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        /* Enhanced Header Styles */
        .app-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        

        
        .header-actions .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        /* Sidebar Toggle Styles */
        .app-sidebar {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            width: 250px;
            min-width: 250px;
            transform: translateX(0);
            opacity: 1;
            position: relative;
            padding-bottom: 80px;
        }
        
        .app-sidebar.sidebar-collapsed {
            width: 60px !important;
            min-width: 60px !important;
            overflow: hidden;
            padding: 0 !important;
            transform: translateX(0);
            opacity: 1;
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-wrapper {
            display: none !important;
        }
        
        /* Hide brand section when collapsed */
        .app-sidebar.sidebar-collapsed .sidebar-brand {
            display: none !important;
        }
        

        
        .app-main {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            margin-left: 2px;
            margin-top: 10px;
            transform: translateX(0);
        }
        
        .app-main.sidebar-collapsed {
            margin-left: 60px !important;
            transform: translateX(0);
        }
        
        /* Fullscreen Styles */
        .fullscreen-icon {
            transition: transform 0.3s ease;
        }
        
        .fullscreen-icon:hover {
            transform: scale(1.1);
        }
        
        /* Custom Button Sizes */
        .btn-xs {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            line-height: 1.2;
            border-radius: 0.25rem;
        }
        
        .btn-xs i {
            font-size: 0.875rem;
        }
        
        /* Table Action Buttons */
        .btn-group .btn-xs {
            margin: 0 1px;
        }
        
        .btn-group .btn-xs:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease;
        }
        
        .header-actions .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        /* Page Title Styles */
        .page-title-section {
            margin-left: 15px;
        }
        
        .page-title-section h4 {
            font-size: 1.5rem;
            margin: 0;
            font-weight: 600;
            color: #007bff;
        }
        
        /* Hamburger Menu Animation */
        .btn[onclick="toggleSidebar()"] {
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        
        .btn[onclick="toggleSidebar()"]:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
            transform: scale(1.1);
        }
        
        .btn[onclick="toggleSidebar()"] i {
            transition: transform 0.3s ease;
        }
        
        .btn[onclick="toggleSidebar()"]:active i {
            transform: rotate(90deg);
        }
        
        /* Sidebar Brand Button Styles */
        .sidebar-brand .btn[onclick="toggleSidebar()"] {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .sidebar-brand .btn[onclick="toggleSidebar()"]:hover {
            background: rgba(255, 255, 255, 0.2) !important;
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }
        
        .sidebar-brand .btn[onclick="toggleSidebar()"]:active {
            transform: scale(0.95);
        }
        
        /* Keep brand section visible when collapsed */
        .app-sidebar.sidebar-collapsed .sidebar-brand {
            display: block !important;
            position: relative;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border-radius: 0 8px 8px 0;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            padding: 10px !important;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .app-sidebar.sidebar-collapsed .brand-text {
            display: none !important;
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-brand .d-flex {
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-brand .btn {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent !important;
            border: none !important;
            color: white !important;
            transition: all 0.3s ease;
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-brand .btn:hover {
            background: rgba(255, 255, 255, 0.15) !important;
            transform: scale(1.1);
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-brand .btn:active {
            transform: scale(0.9);
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-brand .btn i {
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-brand .btn:hover i {
            transform: rotate(90deg);
        }
        
        .app-sidebar.sidebar-collapsed .sidebar-brand:hover {
            background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
            box-shadow: 2px 0 12px rgba(0, 0, 0, 0.2);
            transform: translateX(2px);
        }
        
        /* Sidebar Footer Styles */
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .sidebar-footer .position-relative {
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        
        .sidebar-footer .position-relative:hover {
            transform: scale(1.1);
        }
        
        /* Hide footer when sidebar is collapsed */
        .app-sidebar.sidebar-collapsed .sidebar-footer {
            display: none !important;
        }
        
        /* Fixed Sidebar Icons */
        .fixed-sidebar-icons {
            position: fixed;
            left: 0;
            top: 80px;
            width: 60px;
            z-index: 999;
            display: none;
            flex-direction: column;
            gap: 5px;
            padding: 10px 0;
        }
        
        .fixed-icon-item {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
        
        .fixed-icon-item:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .fixed-icon-item i {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }
        
        .fixed-icon-item:hover i {
            transform: scale(1.1);
        }
        
        /* Show icons when sidebar is collapsed */
        .app-sidebar.sidebar-collapsed ~ .fixed-sidebar-icons {
            display: flex !important;
        }
        
        /* Hide icons when sidebar is visible */
        .app-sidebar:not(.sidebar-collapsed) ~ .fixed-sidebar-icons {
            display: none !important;
        }
        

        

        
        /* Sidebar Animation Keyframes */
        @keyframes slideInLeft {
            from {
                width: 60px;
                opacity: 0.5;
            }
            to {
                width: 250px;
                opacity: 1;
            }
        }
        
        @keyframes slideOutLeft {
            from {
                width: 250px;
                opacity: 1;
            }
            to {
                width: 60px;
                opacity: 0.5;
            }
        }
        
        /* Notification Badge Sizing */
        .position-absolute.top-0.start-100 {
            font-size: 0.65rem !important;
            padding: 0.15rem 0.35rem !important;
            min-width: 18px !important;
            height: 18px !important;
            line-height: 1.2 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        

        
        /* Monthly Revenue Grid */
        .revenue-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 10px 0;
        }
        
        .revenue-item {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            padding: 15px 10px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid #dee2e6;
        }
        
        .revenue-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }
        
        .month-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }
        
        .amount-display {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }
        
        .currency {
            font-size: 0.875rem;
            color: #007bff;
            font-weight: 600;
        }
        
        .amount {
            font-size: 1.25rem;
            font-weight: 700;
            color: #007bff;
            line-height: 1;
        }
        
        .thousands {
            font-size: 0.75rem;
            color: #6c757d;
            font-weight: 500;
        }
        

        
        .avatar-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Dropdown Enhancements */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            padding: 0.5rem 0;
        }
        
        .dropdown-header {
            font-weight: 600;
            color: #495057;
            padding: 0.5rem 1rem;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            transform: translateX(3px);
        }
        
        /* Notification Badge */
        .badge {
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        /* Responsive Improvements */
        @media (max-width: 768px) {
            .page-title-section h4 {
                font-size: 1.1rem;
            }
            
            .header-actions {
                display: none;
            }
        }
    </style>
    
    @yield('css')
