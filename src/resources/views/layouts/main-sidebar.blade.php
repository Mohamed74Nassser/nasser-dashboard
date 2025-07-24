<!--begin::Sidebar-->
<aside class="app-sidebar bg-gradient-primary shadow-lg">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand p-3 border-bottom border-light">
      <!--begin::Brand Text-->
      <div class="d-flex align-items-center justify-content-between">
      <button class="btn btn-link text-white p-0" onclick="toggleSidebar()" style="background: rgba(255,255,255,0.1); border-radius: 8px; padding: 8px !important; min-width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
          <i class="bi bi-list fs-5"></i>
      </button>
      <h4 class="brand-text fw-bold text-white mb-0">
              MNasser
          </h4>
      </div>
      <!--end::Brand Text-->
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper p-3">
      <nav class="mt-3">
          <!--begin::Sidebar Menu-->

          <ul class="nav sidebar-menu flex-column" 
              data-lte-toggle="treeview" 
              role="menu" 
              data-accordion="false">
            <!-- Dashboard Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-speedometer2 me-2"></i>Dashboard
                  </h6>
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-house-door me-3"></i>
                        <span>Dashboard</span>
                      </a>
                  </li>
              </div>

               <!-- Categories Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-collection me-2"></i>Categories
                  </h6>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.categories') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-folder me-3"></i>
                        <span>Main Categories</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.categories.subcategories') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-folder2-open me-3"></i>
                        <span>Subcategories</span>
                      </a>
                  </li>
              </div>
          
            
              <!-- Posts Management Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-file-text me-2"></i>Products
                  </h6>

                  <li class="nav-item">
                    <a href="{{ route('dashboard.products.all') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                      <i class="nav-icon bi bi-box me-3"></i>
                      <span>All Products</span>
                    </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('dashboard.products.pending') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-clock me-3"></i>
                        <span>Pending Products</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.products.approved') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-check-circle me-3"></i>
                        <span>Approved Products</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.products.rejected') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-x-circle me-3"></i>
                        <span>Rejected Products</span>
                      </a>
                  </li>
              </div>

              <!-- Orders Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-cart me-2"></i>Orders
                  </h6>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.orders.paid') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-credit-card me-3"></i>
                        <span>Paid Orders</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('dashboard.orders.pending') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-clock me-3"></i>
                        <span>Pending Orders</span>
                      </a>
                  </li>
              </div>

              <!-- Analytics Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-graph-up me-2"></i>Analytics
                  </h6>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.analytics') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-bar-chart me-3"></i>
                        <span>Analytics & Reports</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.reports') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-file-earmark-text me-3"></i>
                        <span>Advanced Reports</span>
                      </a>
                  </li>
              </div>

              <!-- Management Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-gear me-2"></i>Management
                  </h6>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.users') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-people me-3"></i>
                        <span>User Management</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.notifications') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-bell me-3"></i>
                        <span>Notifications</span>
                      </a>
                  </li>
              </div>

              <!-- Settings Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-gear me-2"></i>Settings
                  </h6>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.settings') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-sliders me-3"></i>
                        <span>General Settings</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.advanced-settings') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-gear-fill me-3"></i>
                        <span>Advanced Settings</span>
                      </a>
                  </li>
              </div>

              <!-- Support Section -->
              <div class="sidebar-section mb-4">
                  <h6 class="sidebar-heading text-white-50 text-uppercase fw-bold mb-3 px-3">
                      <i class="bi bi-question-circle me-2"></i>Support
                  </h6>
                  <li class="nav-item">
                      <a href="{{ route('dashboard.help') }}" class="nav-link text-white rounded-3 mb-2 hover-bg-light">
                        <i class="nav-icon bi bi-book me-3"></i>
                        <span>Help & Support</span>
                      </a>
                  </li>
              </div>

        </ul>
          <!--end::Sidebar Menu-->
      </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
<!--end::Sidebar-->