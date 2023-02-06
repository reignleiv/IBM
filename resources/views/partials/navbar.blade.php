<nav class="navbar navbar-expand-lg navbar-dark bg-success {{ Request::is('login*') ? 'visually-hidden' : '' }} {{ Request::is('register*') ? 'visually-hidden' : '' }}">
    <div class="container">
      <a class="navbar-brand" href="/">IBM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "Diskusi") ? 'active' : '' }}" href="/diskusi">Diskusi</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard/ibm"><i class="bi bi-layout-text-sidebar"></i>My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-right"></i>Logout
                  </button>
                </form>
              </li>
            </ul>
          </ul>
        </li>
            @else
              <li class="nav-item">
                <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i> Login</a>
              </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>