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
