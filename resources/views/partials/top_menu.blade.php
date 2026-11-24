<div class="navbar navbar-expand-md navbar-dark">
    <div class="mt-1 mr-4 d-flex align-items-center">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-Taqwa Logo" style="height: 38px; width: 38px; border-radius: 6px; margin-right: 10px; border: 1.5px solid #D4AF37;">
            <div>
                <h5 class="text-bold text-white mb-0" style="letter-spacing: 0.5px;">AL-TAQWA INSTITUTE</h5>
                <small class="text-warning text-uppercase d-block" style="font-size: 0.65rem; letter-spacing: 1px; line-height: 1;">Institute of Islamic Studies</small>
            </div>
        </a>
    </div>
  {{--  <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="{{ asset('global_assets/images/logo_light.png') }}" alt="">
        </a>
    </div>--}}

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="navbar-nav-link text-warning" target="_blank">
                    <i class="icon-earth mr-1"></i> Public Website
                </a>
            </li>
        </ul>

			<span class="navbar-text ml-md-3 mr-md-auto"></span>

        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img style="width: 38px; height:38px;" src="{{ Auth::user()->photo }}" class="rounded-circle" alt="photo">
                    <span>{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    @php
                        $sr = Qs::userIsStudent() ? Qs::findStudentRecord(Auth::user()->id) : null;
                        $profileUrl = ($sr && isset($sr->id)) ? route('students.show', Qs::hash($sr->id)) : route('users.show', Qs::hash(Auth::user()->id));
                    @endphp
                    <a href="{{ $profileUrl }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('my_account') }}" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
