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
    </style>
    
    @yield('css')
