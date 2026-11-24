<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AL-TAQWA Institute — Online Islamic Academy')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap 4.6 & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ==========================================================================
           AL-TAQWA UNIFIED THEME SYSTEM
           ========================================================================== */
        :root {
            --primary: #063D2E;
            --primary-dark: #03251C;
            --primary-light: #0B5742;
            --primary-surface: #F0F6F3;
            --gold: #C9A35A;
            --gold-light: #DFBA6B;
            --gold-dark: #9F7E3A;
            --cream: #FAF9F5;
            --cream-alt: #F3EFE6;
            --white: #FFFFFF;
            --ink: #14261F;
            --ink-soft: #2D433A;
            --muted: #5F7369;
            --border: #E5E0D5;
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --radius-pill: 9999px;
            --font-serif: "Playfair Display", Georgia, serif;
            --font-arabic: "Amiri", "Traditional Arabic", serif;
            --font-sans: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--cream);
            color: var(--ink);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4 {
            font-family: var(--font-serif);
        }

        .arabic-text {
            font-family: var(--font-arabic);
        }

        /* ----------------- Main Navbar ----------------- */
        .nav-header {
            background: var(--primary);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 2px solid var(--gold);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        .brandmark {
            width: 46px;
            height: 46px;
            border-radius: var(--radius-sm);
            overflow: hidden;
            border: 1.5px solid var(--gold);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            flex-shrink: 0;
        }
        .brandmark img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .brand-titles strong {
            display: block;
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            color: #FFFFFF;
            line-height: 1.15;
            font-family: var(--font-sans);
        }
        .brand-titles strong span {
            color: var(--gold);
        }
        .brand-titles small {
            display: block;
            font-size: 0.65rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: #BED8CC;
            font-weight: 600;
            margin-top: 2px;
            font-family: var(--font-sans);
        }

        .navlink-item {
            color: #E2EEE8 !important;
            font-size: 0.88rem;
            font-weight: 600;
            padding: 8px 16px !important;
            border-radius: var(--radius-pill);
            text-decoration: none !important;
            transition: all 0.2s ease;
        }
        .navlink-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #FFFFFF !important;
        }
        .navlink-item.active {
            background: var(--gold);
            color: var(--primary-dark) !important;
        }

        /* Buttons */
        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: var(--primary-dark) !important;
            font-weight: 700;
            border: none;
            border-radius: var(--radius-pill);
            padding: 9px 20px;
            box-shadow: 0 4px 14px rgba(201, 163, 90, 0.35);
            transition: all 0.25s ease;
            text-decoration: none !important;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, var(--gold-light) 0%, #EBD08C 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(201, 163, 90, 0.45);
        }
        .btn-green {
            background: var(--primary);
            color: #FFFFFF !important;
            font-weight: 700;
            border: none;
            border-radius: var(--radius-pill);
            padding: 9px 22px;
            box-shadow: 0 4px 14px rgba(6, 61, 46, 0.25);
            transition: all 0.25s ease;
            text-decoration: none !important;
        }
        .btn-green:hover {
            background: var(--primary-light);
            color: #FFFFFF !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(6, 61, 46, 0.35);
        }
        .btn-outline-gold {
            border: 1.5px solid var(--gold);
            color: var(--gold) !important;
            background: transparent;
            font-weight: 700;
            border-radius: var(--radius-pill);
            padding: 8px 18px;
            transition: all 0.2s ease;
            text-decoration: none !important;
        }
        .btn-outline-gold:hover {
            background: var(--gold);
            color: var(--primary-dark) !important;
            transform: translateY(-2px);
        }

        /* ----------------- Subhero Banner ----------------- */
        .subhero {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 65%, var(--primary-light) 100%);
            color: #FFFFFF;
            padding: 60px 0 54px;
            position: relative;
            border-bottom: 3px solid var(--gold);
            overflow: hidden;
        }
        .subhero::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(201, 163, 90, 0.15) 1px, transparent 1px);
            background-size: 24px 24px;
            pointer-events: none;
        }
        .subhero-eyebrow {
            display: inline-block;
            font-size: 0.75rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 800;
            margin-bottom: 8px;
            font-family: var(--font-sans);
        }
        .subhero h1 {
            font-size: clamp(2rem, 3.5vw, 3rem);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 12px;
            color: #FFFFFF;
        }
        .subhero p {
            color: #D3E6DC;
            font-size: 1.05rem;
            max-width: 720px;
            line-height: 1.6;
        }

        /* ----------------- Cards ----------------- */
        .course-card {
            background: #FFFFFF;
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(6, 61, 46, 0.05);
            display: flex;
            flex-direction: column;
            transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
        }
        .course-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(6, 61, 46, 0.12);
            border-color: rgba(201, 163, 90, 0.6);
        }
        .course-top-banner {
            height: 195px;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 14px;
            border-bottom: 2px solid rgba(201, 163, 90, 0.35);
        }
        .course-top-banner::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(3, 37, 28, 0.4) 0%, rgba(3, 37, 28, 0.05) 45%, rgba(3, 37, 28, 0.85) 100%);
            pointer-events: none;
        }
        .course-pill {
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: var(--radius-pill);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            font-family: var(--font-sans);
        }
        .pill-cat {
            background: rgba(6, 61, 46, 0.88);
            color: #FFFFFF;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .pill-free {
            background: #14644A;
            color: #FFFFFF;
        }
        .pill-sub {
            background: #063D2E;
            color: #FFFFFF;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .pill-refundable {
            background: var(--gold);
            color: var(--primary-dark);
        }

        .filter-chip {
            border: 1.5px solid var(--border);
            background: #FFFFFF;
            color: var(--ink-soft);
            border-radius: var(--radius-pill);
            padding: 8px 18px;
            font-weight: 700;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            text-decoration: none !important;
            display: inline-block;
        }
        .filter-chip:hover {
            border-color: var(--primary);
            color: var(--primary);
        }
        .filter-chip.active {
            background: var(--primary);
            color: #FFFFFF !important;
            border-color: var(--primary);
        }

        /* ----------------- Footer ----------------- */
        .footer {
            background: var(--primary-dark);
            color: #CBDCD4;
            padding: 60px 0 24px;
            border-top: 3px solid var(--gold);
            margin-top: 60px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr 1fr 1fr;
            gap: 36px;
            margin-bottom: 40px;
        }
        .footer-col h4 {
            color: #FFFFFF;
            font-size: 0.88rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 18px;
            border-left: 3px solid var(--gold);
            padding-left: 8px;
            font-family: var(--font-sans);
        }
        .footer-col a {
            display: block;
            font-size: 0.84rem;
            color: #A9C2B7;
            margin-bottom: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .footer-col a:hover {
            color: var(--gold);
            transform: translateX(3px);
        }
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            padding-top: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 0.78rem;
            color: #8CA99D;
        }

        @media (max-width: 992px) {
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 768px) {
            .footer-grid { grid-template-columns: 1fr; }
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Main Navigation Header -->
    <header class="nav-header">
        <div class="container d-flex align-items-center justify-content-between" style="height: 74px;">
            <a class="d-flex align-items-center text-decoration-none" href="{{ route('home') }}" style="gap: 14px;">
                <div class="brandmark">
                    <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-TAQWA Emblem">
                </div>
                <div class="brand-titles">
                    <strong>AL-TAQWA <span>INSTITUTE</span></strong>
                    <small>Taleem • Tarbiyah • Tazkiyah</small>
                </div>
            </a>

            <!-- Mobile Nav Toggle -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#mainNavDropdown" style="color: var(--gold); border: 1.5px solid var(--gold); border-radius: var(--radius-sm); padding: 6px 10px;">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse d-lg-flex justify-content-end align-items-center" id="mainNavDropdown">
                <nav class="d-flex flex-column flex-lg-row align-items-center py-3 py-lg-0" style="gap: 6px;">
                    <a href="{{ route('home') }}" class="navlink-item {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('storefront.courses') }}" class="navlink-item {{ request()->routeIs('storefront.courses*') ? 'active' : '' }}">Courses</a>
                    <a href="{{ route('home') }}#teachers" class="navlink-item">Faculty</a>
                    <a href="{{ route('home') }}#about" class="navlink-item">About Us</a>
                    <a href="{{ route('home') }}#admissions" class="navlink-item">Admissions</a>
                    <a href="{{ route('home') }}#contact" class="navlink-item">Contact</a>
                    <a href="{{ route('storefront.verify_certificate') }}" class="navlink-item {{ request()->routeIs('storefront.verify_certificate*') ? 'active' : '' }}">Verify Certificate ↗</a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-gold ml-lg-2">My Dashboard ↗</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-gold ml-lg-2">Login ↗</a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Yield -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="d-flex align-items-center mb-3" style="gap: 12px;">
                        <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-TAQWA" style="width: 44px; height: 44px; border-radius: 8px; border: 1.5px solid var(--gold);">
                        <div>
                            <strong style="color: #FFFFFF; font-size: 1.15rem; display: block; line-height: 1.1; font-family: var(--font-sans);">AL-TAQWA</strong>
                            <small style="color: #BED8CC; font-size: 0.68rem; letter-spacing: 0.12em; text-transform: uppercase;">Institute of Islamic Studies</small>
                        </div>
                    </div>
                    <p style="font-size: 0.84rem; line-height: 1.6; color: #A9C2B7; margin-bottom: 16px;">
                        Dedicated to cultivating authentic, balanced Islamic scholarship and moral refinement (Taleem, Tarbiyah, and Tazkiyah) across the globe through structured online live classrooms.
                    </p>
                    <p style="font-size: 0.84rem; color: var(--gold);">
                        Email: officialaltaqwa@gmail.com<br>
                        Website: altaqwauniversity.com
                    </p>
                </div>

                <div class="footer-col">
                    <h4>Explore</h4>
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('storefront.courses') }}">All 12 Programs</a>
                    <a href="{{ route('home') }}#teachers">Faculty & Scholars</a>
                    <a href="{{ route('home') }}#about">About Institute</a>
                    <a href="{{ route('home') }}#admissions">Student Admissions</a>
                    <a href="{{ route('home') }}#contact">Contact Helpdesk</a>
                </div>

                <div class="footer-col">
                    <h4>Academic Pathways</h4>
                    <a href="{{ route('storefront.course_detail', 'tafseer-ul-quran-weekend-program') }}">Tafseer-ul-Qur’an (₹99/mo)</a>
                    <a href="{{ route('storefront.course_detail', 'alima-course-advanced-diploma-in-islamic-studies') }}">Alima Course — 4 Yrs</a>
                    <a href="{{ route('storefront.course_detail', 'hifz-ul-quran-program-advanced-diploma') }}">Hifz-ul-Qur’an Diploma</a>
                    <a href="{{ route('storefront.course_detail', 'diploma-in-tajweed-e-quran') }}">Diploma in Tajweed</a>
                    <a href="{{ route('storefront.course_detail', 'diploma-in-arabic-language') }}">Diploma in Arabic</a>
                    <a href="{{ route('storefront.course_detail', 'seerat-un-nabi-program') }}">Seerat-un-Nabi ﷺ (Free)</a>
                </div>

                <div class="footer-col">
                    <h4>Account & Legal</h4>
                    <a href="{{ route('login') }}" style="color: var(--gold); font-weight: 700;">Student / Teacher Login ↗</a>
                    <a href="{{ route('storefront.verify_certificate') }}" style="color: var(--gold); font-weight: 700;">Verify Certificate Online ↗</a>
                    <a href="{{ route('privacy_policy') }}">Privacy Policy</a>
                    <a href="{{ route('terms_of_use') }}">Terms of Service</a>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} AL-TAQWA Institute of Islamic Studies. All Rights Reserved.</span>
                <span>Centered around Taleem · Tarbiyah · Tazkiyah</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
