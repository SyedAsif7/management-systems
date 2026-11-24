<!-- Main Navbar -->
<header class="nav-header">
    <div class="container d-flex align-items-center justify-content-between" style="height: 74px;">
        <a class="d-flex align-items-center text-decoration-none" href="{{ route('home') }}" style="gap: 14px;">
            <div style="width: 46px; height: 46px; border-radius: 8px; overflow: hidden; border: 1.5px solid var(--gold); box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); flex-shrink: 0;">
                <img src="{{ asset('assets/images/altaqwa-logo.png') }}" onerror="this.src='{{ asset('global_assets/images/altaqwa_emblem.jpg') }}'" alt="AL-TAQWA Emblem" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div>
                <strong style="display: block; font-size: 1.15rem; font-weight: 800; letter-spacing: 0.08em; color: #FFFFFF; line-height: 1.15;">
                    AL-TAQWA <span style="color: var(--gold);">INSTITUTE</span>
                </strong>
                <small style="display: block; font-size: 0.65rem; letter-spacing: 0.16em; text-transform: uppercase; color: #BED8CC; font-weight: 600; margin-top: 2px;">
                    Taleem • Tarbiyah • Tazkiyah
                </small>
            </div>
        </a>

        <!-- Mobile Nav Toggle -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#loginNavDropdown" style="color: var(--gold); border: 1.5px solid var(--gold); border-radius: 6px; padding: 6px 10px;">
            <i class="icon-menu7"></i>
        </button>

        <!-- Nav Links -->
        <div class="collapse navbar-collapse d-lg-flex justify-content-end align-items-center" id="loginNavDropdown">
            <nav class="d-flex flex-column flex-lg-row align-items-center py-3 py-lg-0" style="gap: 6px;">
                <a href="{{ route('home') }}" class="navlink-item">Home</a>
                <a href="{{ route('storefront.courses') }}" class="navlink-item">Courses</a>
                <a href="{{ route('storefront.zikr_durood') }}" class="navlink-item">Zikr & Durood</a>
                <a href="{{ route('storefront.verify_certificate') }}" class="navlink-item">Verify Sanad ↗</a>
                <a href="{{ route('home') }}#teachers" class="navlink-item">Scholars</a>
                <span class="navlink-item active ml-lg-2">Sign In</span>
            </nav>
        </div>
    </div>
</header>
