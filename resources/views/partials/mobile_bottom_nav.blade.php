{{-- Mobile Floating App Navigation Bar (Only for viewports <= 768px) --}}
@auth
<nav class="mobile-app-bottom-bar d-md-none" aria-label="Mobile Bottom Navigation">
    <a href="{{ route('dashboard') }}" class="mobile-nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
        <div class="nav-icon-wrap">
            <i class="icon-home4"></i>
        </div>
        <span>Home</span>
    </a>

    @if(Qs::userIsStudent())
        <a href="{{ route('enrollments.my_courses') }}" class="mobile-nav-item {{ Route::is('enrollments.*') ? 'active' : '' }}">
            <div class="nav-icon-wrap">
                <i class="icon-graduation2"></i>
            </div>
            <span>Courses</span>
        </a>
    @elseif(Qs::userIsTeacher())
        <a href="{{ route('live_sessions.index') }}" class="mobile-nav-item {{ Route::is('live_sessions.*') ? 'active' : '' }}">
            <div class="nav-icon-wrap">
                <i class="icon-video-camera"></i>
            </div>
            <span>Halqas</span>
        </a>
    @else
        <a href="{{ route('classes.index') }}" class="mobile-nav-item {{ Route::is('classes.*') ? 'active' : '' }}">
            <div class="nav-icon-wrap">
                <i class="icon-books"></i>
            </div>
            <span>Classes</span>
        </a>
    @endif

    <a href="{{ route('storefront.zikr_durood') }}" class="mobile-nav-item {{ Route::is('storefront.zikr_durood') ? 'active' : '' }}">
        <div class="nav-icon-wrap zikr-special">
            <span style="font-size: 1.15rem; line-height: 1;">📿</span>
        </div>
        <span>Tasbeeh</span>
    </a>

    @if(Qs::userIsTeacher())
        <a href="{{ route('hifz.index') }}" class="mobile-nav-item {{ Route::is('hifz.*') ? 'active' : '' }}">
            <div class="nav-icon-wrap">
                <i class="icon-book"></i>
            </div>
            <span>Sabaq</span>
        </a>
    @else
        <a href="{{ route('storefront.leaderboard') }}" class="mobile-nav-item {{ Route::is('storefront.leaderboard') ? 'active' : '' }}">
            <div class="nav-icon-wrap">
                <i class="icon-trophy3"></i>
            </div>
            <span>Ranks</span>
        </a>
    @endif

    <button type="button" class="mobile-nav-item sidebar-mobile-main-toggle" aria-label="Open Navigation Menu">
        <div class="nav-icon-wrap">
            <i class="icon-menu7"></i>
        </div>
        <span>Menu</span>
    </button>
</nav>
@endauth
