<nav class="app-header navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom">
  <div class="container-fluid">
    <!-- Left Side - Page Title -->
    <div class="d-flex align-items-center">
      <!-- Page Title Section -->
      <div class="page-title-section">
        <h4 class="text-primary mb-0 fw-bold" id="page-title">Dashboard</h4>
      </div>
    </div>

    <!-- Right Side - Actions & User -->
    <div class="d-flex align-items-center gap-3">
      <!-- Quick Actions -->
      @hasSection('header-actions')
        <div class="header-actions me-3">
          @yield('header-actions')
        </div>
      @endif
      
      <!-- Notifications -->
      <div class="dropdown">
        <button class="btn btn-link text-dark p-2 position-relative" type="button" data-bs-toggle="dropdown">
          <i class="bi bi-bell fs-5"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            3
          </span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><h6 class="dropdown-header">Notifications</h6></li>
          <li><a class="dropdown-item" href="#">New order received</a></li>
          <li><a class="dropdown-item" href="#">Product approved</a></li>
          <li><a class="dropdown-item" href="#">System update</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center" href="#">View all</a></li>
        </ul>
      </div>

      <!-- Fullscreen Toggle -->
      <button class="btn btn-link text-dark p-2" onclick="toggleFullscreen()" type="button">
        <i class="bi bi-arrows-fullscreen fs-5" id="fullscreen-icon"></i>
      </button>

      <!-- User Menu -->
      <div class="dropdown">
        <button class="btn btn-link text-dark p-2 d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
          <div class="avatar-circle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
            <i class="bi bi-person"></i>
          </div>
          <span class="fw-semibold d-none d-md-inline">
            @auth
              {{ Auth::user()->name }}
            @else
              Mohamed Nasser
            @endauth
          </span>
          <i class="bi bi-chevron-down"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><h6 class="dropdown-header">User Menu</h6></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); alert('Logout functionality (Demo mode)');">
              <i class="bi bi-box-arrow-right me-2"></i>Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<script>
// Toggle Sidebar Function
function toggleSidebar() {
    const sidebar = document.querySelector('.app-sidebar');
    const mainContent = document.querySelector('.app-main');
    const appWrapper = document.querySelector('.app-wrapper');
    const hamburgerIcon = document.querySelector('.btn[onclick="toggleSidebar()"] i');
    
    if (sidebar) {
        if (sidebar.classList.contains('sidebar-collapsed')) {
            // Show sidebar with animation
            sidebar.classList.remove('sidebar-collapsed');
            mainContent.classList.remove('sidebar-collapsed');
            appWrapper.classList.remove('sidebar-collapsed');
            hamburgerIcon.className = 'bi bi-list fs-4';
            
            // Add show animation
            sidebar.style.animation = 'slideInLeft 0.5s ease-out';
        } else {
            // Hide sidebar with animation
            sidebar.classList.add('sidebar-collapsed');
            mainContent.classList.add('sidebar-collapsed');
            appWrapper.classList.add('sidebar-collapsed');
            hamburgerIcon.className = 'bi bi-list fs-4';
            
            // Add hide animation
            sidebar.style.animation = 'slideOutLeft 0.5s ease-out';
        }
        
        // Remove animation after completion
        setTimeout(() => {
            sidebar.style.animation = '';
        }, 500);
        
        // Force reflow to ensure proper layout
        setTimeout(() => {
            window.dispatchEvent(new Event('resize'));
        }, 300);
        
        // Update fixed sidebar icons visibility
        const fixedSidebarIcons = document.querySelector('.fixed-sidebar-icons');
        if (fixedSidebarIcons) {
            if (sidebar.classList.contains('sidebar-collapsed')) {
                fixedSidebarIcons.style.display = 'flex';
            } else {
                fixedSidebarIcons.style.display = 'none';
            }
        }
        

        

        

    } else {
        // Fallback: try to find sidebar by different selectors
        const possibleSidebars = document.querySelectorAll('[class*="sidebar"], [class*="nav"], [class*="menu"]');
        possibleSidebars.forEach(element => {
            if (element.style.display !== 'none') {
                element.style.display = 'none';
            } else {
                element.style.display = 'block';
            }
        });
    }
}

// Toggle Fullscreen Function
function toggleFullscreen() {
    const fullscreenIcon = document.getElementById('fullscreen-icon');
    
    if (!document.fullscreenElement) {
        // Enter fullscreen
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        }
        fullscreenIcon.className = 'bi bi-fullscreen-exit fs-5';
    } else {
        // Exit fullscreen
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
        fullscreenIcon.className = 'bi bi-arrows-fullscreen fs-5';
    }
}

// Listen for fullscreen change events
document.addEventListener('fullscreenchange', updateFullscreenIcon);
document.addEventListener('webkitfullscreenchange', updateFullscreenIcon);
document.addEventListener('msfullscreenchange', updateFullscreenIcon);

function updateFullscreenIcon() {
    const fullscreenIcon = document.getElementById('fullscreen-icon');
    if (document.fullscreenElement || document.webkitFullscreenElement || document.msFullscreenElement) {
        fullscreenIcon.className = 'bi bi-fullscreen-exit fs-5';
    } else {
        fullscreenIcon.className = 'bi bi-arrows-fullscreen fs-5';
    }
}

// Update page title based on current URL
function updatePageTitle() {
    const pageTitle = document.getElementById('page-title');
    const currentPath = window.location.pathname;
    
    const pageTitles = {
        '/dashboard': 'Dashboard',
        '/dashboard/products/all': 'All Products',
        '/dashboard/products/pending': 'Pending Products',
        '/dashboard/products/approved': 'Approved Products',
        '/dashboard/products/rejected': 'Rejected Products',
        '/dashboard/orders/pending': 'Pending Orders',
        '/dashboard/orders/paid': 'Paid Orders',
        '/dashboard/categories': 'Main Categories',
        '/dashboard/categories/subcategories': 'Subcategories',
        '/dashboard/analytics': 'Analytics',
        '/dashboard/users': 'User Management',
        '/dashboard/notifications': 'Notifications',
        '/dashboard/help': 'Help & Support',
        '/dashboard/reports': 'Advanced Reports',
        '/dashboard/settings': 'System Settings',
        '/dashboard/advanced-settings': 'Advanced Settings'
    };
    
    if (pageTitles[currentPath]) {
        pageTitle.textContent = pageTitles[currentPath];
    } else {
        pageTitle.textContent = 'Dashboard';
    }
}

// Update title when page loads
document.addEventListener('DOMContentLoaded', updatePageTitle);
</script>


