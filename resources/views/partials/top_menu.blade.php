<div class="navbar navbar-expand-md navbar-dark px-2 px-md-3">
    <div class="mt-1 mr-2 mr-md-4 d-flex align-items-center flex-grow-1 flex-md-grow-0" style="min-width: 0;">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center text-decoration-none" style="min-width: 0;">
            <img src="{{ asset('assets/images/altaqwa-logo.png') }}" onerror="this.src='{{ asset('global_assets/images/altaqwa_emblem.jpg') }}'" alt="AL-TAQWA Logo" style="height: 36px; width: 36px; border-radius: 6px; margin-right: 8px; border: 1.5px solid #C9A35A; background: #000000; object-fit: cover; flex-shrink: 0;">
            <div style="min-width: 0;">
                <h5 class="text-bold text-white mb-0" style="letter-spacing: 0.5px; font-size: 0.95rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">AL-TAQWA INSTITUTE</h5>
                <small class="text-warning text-uppercase d-block" style="font-size: 0.6rem; letter-spacing: 0.8px; line-height: 1; white-space: nowrap;">Taleem • Tarbiyah • Tazkiyah</small>
            </div>
        </a>
    </div>

    <div class="d-md-none d-flex align-items-center">
        @if(Auth::check() && Qs::userIsStudent())
        <span class="badge px-2 py-1 mr-2 text-warning d-inline-flex align-items-center" style="background: rgba(201, 163, 90, 0.2); border: 1px solid #C9A35A; font-size: 0.75rem; font-weight: 700; border-radius: 9999px;">
            🪙 {{ Auth::user()->coins_balance }}
        </span>
        @endif
        <button class="navbar-toggler sidebar-mobile-main-toggle p-2" type="button" aria-label="Toggle Sidebar Navigation" style="border: 1px solid rgba(201,163,90,0.4); border-radius: 6px; color: #DFBA6B;">
            <i class="icon-paragraph-justify3"></i>
        </button>
        <button class="navbar-toggler p-2 ml-1" type="button" data-toggle="collapse" data-target="#navbar-mobile" aria-label="Toggle User Navigation" style="border: 1px solid rgba(255,255,255,0.25); border-radius: 6px; color: #FFFFFF;">
            <i class="icon-user"></i>
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

            @if(Auth::check() && Qs::userIsStudent())
            <li class="nav-item d-flex align-items-center mr-lg-3">
                <span class="badge px-3 py-1 text-warning" style="background: rgba(201, 163, 90, 0.2); border: 1px solid #C9A35A; font-size: 0.82rem; font-weight: 700; border-radius: 9999px;">
                    🪙 {{ Auth::user()->coins_balance }} Coins
                </span>
            </li>
            @endif

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
