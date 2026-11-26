{{-- Mobile Floating App Navigation Bar (Only for viewports <= 768px) --}}
@auth
<style>
.mobile-app-bottom-bar {
    position: fixed !important;
    bottom: 0 !important;
    left: 0 !important;
    right: 0 !important;
    height: calc(60px + env(safe-area-inset-bottom, 0px)) !important;
    padding-bottom: env(safe-area-inset-bottom, 0px) !important;
    background: rgba(6, 61, 46, 0.98) !important;
    backdrop-filter: blur(16px) !important;
    -webkit-backdrop-filter: blur(16px) !important;
    border-top: 1.5px solid #C9A35A !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-around !important;
    z-index: 99999 !important;
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.35) !important;
    margin: 0 !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
}

@media (min-width: 769px) {
    .mobile-app-bottom-bar {
        display: none !important;
    }
}

.mobile-app-bottom-bar .mobile-nav-item {
    flex: 1 !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    color: #BED8CC !important;
    text-decoration: none !important;
    font-size: 0.7rem !important;
    font-weight: 600 !important;
    padding: 6px 0 !important;
    min-height: 48px !important;
    background: transparent !important;
    border: none !important;
    cursor: pointer !important;
    -webkit-tap-highlight-color: transparent !important;
    touch-action: manipulation !important;
    transition: all 0.2s ease !important;
    line-height: 1.2 !important;
}

.mobile-app-bottom-bar .mobile-nav-item:active {
    transform: scale(0.92) !important;
}

.mobile-app-bottom-bar .mobile-nav-item .nav-icon-wrap {
    font-size: 1.25rem !important;
    line-height: 1 !important;
    margin-bottom: 3px !important;
    transition: all 0.2s ease !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: inherit !important;
}

.mobile-app-bottom-bar .mobile-nav-item.active {
    color: #DFBA6B !important;
    font-weight: 700 !important;
}

.mobile-app-bottom-bar .mobile-nav-item.active .nav-icon-wrap {
    color: #C9A35A !important;
    transform: translateY(-2px) !important;
}

.mobile-app-bottom-bar .mobile-nav-item .zikr-special {
    background: rgba(201, 163, 90, 0.2) !important;
    border-radius: 50% !important;
    width: 28px !important;
    height: 28px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

@media (max-width: 768px) {
    body.has-mobile-bottom-nav .content-wrapper,
    body.has-mobile-bottom-nav footer.footer {
        padding-bottom: calc(72px + env(safe-area-inset-bottom, 0px)) !important;
    }
}
</style>
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
