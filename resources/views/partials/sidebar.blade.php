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
          {{-- <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div> --}}
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
      {{-- <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li> --}}
      @if(Auth::user()->role_id ==  1 || Auth::user()->role_id ==  4)
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('activities')}}">
          <span class="menu-icon">
            <i class="mdi mdi-settings"></i>
          </span>
          <span class="menu-title">Activities</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('artists')}}">
          <span class="menu-icon">
            <i class="mdi mdi-nature-people"></i>
          </span>
          <span class="menu-title">Artists</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('sportstars')}}">
          <span class="menu-icon">
            <i class="mdi mdi-controller-classic"></i>
          </span>
          <span class="menu-title">Sport Stars</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('judges')}}">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Judges</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('levels')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-check"></i>
          </span>
          <span class="menu-title">Approval Levels</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{route('approval.disaproval.logs')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-check"></i>
          </span>
          <span class="menu-title">Approvals & Rejects</span>
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
