<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard/ibm">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/ibm*') ? 'active' : '' }}" href="/dashboard/ibm">
            <span data-feather="file-text" class="align-text-bottom"></span>
            IBM
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
            <span data-feather="file-text" class="align-text-bottom"></span>
            User
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/diskusi*') ? 'active' : '' }}" href="/dashboard/diskusi">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Diskusi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/komentar*') ? 'active' : '' }}" href="/dashboard/komentar">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Komentar
          </a>
        </li>
      </ul>
      

      @can('admin')    
      <h5 class="sidebar-heading d-flex justify-content-beetwen align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h5>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="grid" class="align-text-bottom"></span>
            Post Categories
          </a>
        </li>
      </ul>
      @endcan
    </div>
  </nav>