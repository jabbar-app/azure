<div class="horizontal-menu">
  <nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img
            src="{{ asset('assets/images/azure/azure_logo.png') }}" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img
            src="{{ asset('assets/images/azure/azure_favicon.png') }}" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search projects"
                aria-label="search" aria-describedby="search" />
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="nav-profile-img">
                <img src="{{ asset('assets/images/azure/empty.webp') }}" alt="image" />
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="text-black">{{ Auth::user()->name }}</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-flex full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count-symbol bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <p class="text-gray mb-0">No new messages</p>
                {{-- <div class="preview-thumbnail">
                  <img src="../../assets/images/faces/face2.jpg" alt="image" class="profile-pic" />
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal"> Cregh send you a message </h6>
                  <p class="text-gray mb-0">15 Minutes ago</p>
                </div> --}}
              </a>
              {{-- <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../assets/images/faces/face3.jpg" alt="image" class="profile-pic" />
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal"> Profile picture updated </h6>
                  <p class="text-gray mb-0">18 Minutes ago</p>
                </div>
              </a> --}}
              {{-- <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">No new messages</h6> --}}
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
              data-bs-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1"> Project setup is completed! </h6>
                  <p class="text-gray ellipsis mb-0">Congratulations! Your project setup is already completed. You can
                    start build your awesome project now.</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">Read all</h6>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-flex">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              this.closest('form').submit();">
                <i class="mdi mdi-power"></i>
              </a>
            </form>
            {{-- <a class="nav-link" href="#">
              <i class="mdi mdi-power"></i>
            </a> --}}
          </li>
          {{-- <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li> --}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="horizontal-menu-toggle">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </div>
  </nav>
  <nav class="bottom-navbar">
    <div class="container">
      <ul class="nav page-navigation justify-content-start gap-5">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            {{-- <i class="mdi mdi-compass-outline menu-icon"></i> --}}
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="https://learn.microsoft.com/en-us/docs/?wt.mc_id=developermscom">
            {{-- <i class="mdi mdi-compass-outline menu-icon"></i> --}}
            <span class="menu-title">Documentation</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="https://developer.microsoft.com/en-us/community">
            {{-- <i class="mdi mdi-compass-outline menu-icon"></i> --}}
            <span class="menu-title">Community</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>
