<!-- Main 3-Zone Navigation Header -->
<header class="nav-header">
    <div class="container navin">
        <!-- ZONE 1: BRAND IDENTITY -->
        <a class="brand" href="{{ route('home') }}" title="AL-TAQWA Institute of Islamic Studies">
            <div class="brandmark">
                <img src="{{ asset('assets/images/altaqwa-logo.png') }}" onerror="this.src='{{ asset('global_assets/images/altaqwa_emblem.jpg') }}'" alt="AL-TAQWA Emblem">
            </div>
            <div class="brand-titles">
                <strong class="brand-name">AL-TAQWA <span>INSTITUTE</span></strong>
                <small class="brand-motto">Taleem • Tarbiyah • Tazkiyah</small>
            </div>
        </a>

        <!-- ZONE 2: PRIMARY NAVIGATION LINKS -->
        <nav class="nav-menu" id="loginNavMenu">
            <a href="{{ route('home') }}" class="navlink-item">Home</a>
            <a href="{{ route('storefront.courses') }}" class="navlink-item">Courses</a>
            <a href="{{ route('storefront.zikr_durood') }}" class="navlink-item">Zikr &amp; Durood</a>
            <a href="{{ route('storefront.leaderboard') }}" class="navlink-item">Leaderboard</a>
            <a href="{{ route('storefront.verify_certificate') }}" class="navlink-item">Verify Sanad&nbsp;↗</a>
            <a href="{{ route('home') }}#teachers" class="navlink-item">Scholars</a>
            <a href="{{ route('home') }}#about" class="navlink-item">About &amp; Admissions</a>
        </nav>

        <!-- ZONE 3: ACTIONS & UTILITIES -->
        <div class="nav-actions">
            <a href="{{ route('home') }}#about" class="btn btn-outline-gold nav-btn">Apply Now</a>
            <span class="btn btn-gold nav-btn active" style="box-shadow: 0 0 0 2px var(--gold-light);">Sign In&nbsp;↗</span>

            <!-- Mobile Hamburger Toggle Button -->
            <button class="nav-toggle-btn" id="loginNavToggleBtn" aria-label="Toggle Navigation Menu" aria-expanded="false">
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
                <span class="toggle-bar"></span>
            </button>
        </div>
    </div>

    <!-- RESPONSIVE MOBILE DRAWER (Below 1024px) -->
    <div class="nav-mobile-drawer" id="loginNavMobileDrawer">
        <div class="mobile-drawer-inner">
            <div class="mobile-nav-links">
                <a href="{{ route('home') }}" class="mobile-navlink">
                    <span class="nav-bullet">✦</span> Home
                </a>
                <a href="{{ route('storefront.courses') }}" class="mobile-navlink">
                    <span class="nav-bullet">✦</span> Courses &amp; Programs
                </a>
                <a href="{{ route('storefront.zikr_durood') }}" class="mobile-navlink">
                    <span class="nav-bullet">✦</span> Zikr &amp; Durood Sanctuary
                </a>
                <a href="{{ route('storefront.leaderboard') }}" class="mobile-navlink">
                    <span class="nav-bullet">✦</span> Taqwa Coins Leaderboard
                </a>
                <a href="{{ route('storefront.verify_certificate') }}" class="mobile-navlink">
                    <span class="nav-bullet">✦</span> Verify Sanad Certificate&nbsp;↗
                </a>
                <a href="{{ route('home') }}#teachers" class="mobile-navlink">
                    <span class="nav-bullet">✦</span> Meet Our Scholars
                </a>
                <a href="{{ route('home') }}#about" class="mobile-navlink">
                    <span class="nav-bullet">✦</span> About &amp; Admissions
                </a>
            </div>
            <div class="mobile-drawer-footer">
                <div class="mobile-btn-grid">
                    <a class="btn btn-outline-gold" href="{{ route('home') }}#about" style="flex: 1; justify-content: center; text-align: center;">Apply Now</a>
                    <span class="btn btn-gold" style="flex: 1; justify-content: center; text-align: center;">Sign In&nbsp;↗</span>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("loginNavToggleBtn");
        const drawer = document.getElementById("loginNavMobileDrawer");
        if (toggleBtn && drawer) {
            toggleBtn.addEventListener("click", function() {
                const isOpen = drawer.classList.toggle("open");
                toggleBtn.classList.toggle("open", isOpen);
                toggleBtn.setAttribute("aria-expanded", isOpen ? "true" : "false");
            });
        }
    });
</script>
