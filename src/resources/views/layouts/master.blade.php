<!doctype html>
<html lang="en">
  

    @include('nasser-dashboard::layouts.head')

  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      
      @include('nasser-dashboard::layouts.main-headerbar')

      @include('nasser-dashboard::layouts.main-sidebar')
      
      <!-- Fixed Sidebar Icons when collapsed -->
      <div class="fixed-sidebar-icons">
          <!-- Dashboard Icon -->
          <div class="fixed-icon-item" onclick="window.location.href='{{ route('dashboard') }}'">
              <i class="bi bi-house-door text-white"></i>
          </div>
          
          <!-- Categories Icon -->
          <div class="fixed-icon-item" onclick="window.location.href='{{ route('dashboard.categories') }}'">
              <i class="bi bi-folder text-white"></i>
          </div>
          
          <!-- Products Icon -->
          <div class="fixed-icon-item" onclick="window.location.href='{{ route('dashboard.products.all') }}'">
              <i class="bi bi-box text-white"></i>
          </div>
          
          <!-- Orders Icon -->
          <div class="fixed-icon-item" onclick="window.location.href='{{ route('dashboard.orders.paid') }}'">
              <i class="bi bi-cart text-white"></i>
          </div>
          
          <!-- Analytics Icon -->
          <div class="fixed-icon-item" onclick="window.location.href='{{ route('dashboard.analytics') }}'">
              <i class="bi bi-graph-up text-white"></i>
          </div>
          
          <!-- Settings Icon -->
          <div class="fixed-icon-item" onclick="window.location.href='{{ route('dashboard.settings') }}'">
              <i class="bi bi-gear text-white"></i>
          </div>
      </div>
      
      <!--begin::App Main-->
     
      <main class="app-main">     
        @yield('content')
      
      </main>
      <!--end::App Main-->

      @include('nasser-dashboard::layouts.footer')

    </div>
    <!--end::App Wrapper-->

    @include('nasser-dashboard::layouts.footer-scripts')

  </body>
  <!--end::Body-->
</html>
