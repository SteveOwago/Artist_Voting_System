<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}">
            <img src="{{asset('backend/assets/images/logo.png')}}" alt="tusker logo image" height="50px" width="100px" style="border-radius:30%">
        </a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="/profile_pictures/{{Auth::user()->profile}}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{Auth::user()->name}}</h5>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('home')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @if (Auth::user()->role_id ==  1 || Auth::user()->role_id ==  4)

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('add.whitelist')}}">
          <span class="menu-icon">
            <i class="mdi mdi-nature-people"></i>
          </span>
          <span class="menu-title">Add Whitelist</span>
        </a>
      </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{route('artists.finalists')}}">
          <span class="menu-icon">
            <i class="mdi mdi-nature-people"></i>
          </span>
                    <span class="menu-title">Artists Finalists</span>
                </a>
            </li>

      @endif
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('profile',Auth::id())}}">
          <span class="menu-icon">
            <i class="mdi mdi-account"></i>
          </span>
          <span class="menu-title">My Profile</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <span class="menu-icon">
                                                        <i class="mdi mdi-logout"></i>
                                                      </span>
                                                      <span class="menu-title"> {{ __('Logout') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      </li>
    </ul>
  </nav>
