<nav class="app-header navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid">
    <!-- Left Side -->
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list fs-4"></i>
        </a>
      </li>
    </ul>

    <!-- Right Side -->
    <ul class="navbar-nav ms-auto gap-3 align-items-center">
      <!-- Fullscreen -->
      <li class="nav-item">
        <a class="nav-link px-3" data-lte-toggle="fullscreen" href="#">
          <i class="bi bi-arrows-fullscreen fs-5"></i>
        </a>
      </li>

     

      <!-- User Info -->
      @auth
      <li class="nav-item">
        <span class="nav-link text-dark fw-semibold">
          {{ Auth::user()->name }} 
        </span>
      </li>
      @endauth

      <!-- Logout Button -->
      <li class="nav-item">
        <form method="POST" action="" style="display: inline;">
          @csrf
          <button type="submit" class="nav-link text-dark fw-semibold border-0 bg-transparent">
          Logout
          </button>
        </form>
      </li>
    </ul>
  </div>
</nav>
