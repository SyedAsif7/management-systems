<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AL-Taqwa Institute — Online Islamic Academy')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 4.6 & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Adhan.js for Dynamic Prayer Times -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/adhan/4.4.3/Adhan.min.js"></script>

    <style>
        :root {
            --primary-emerald: #064E3B;
            --primary-emerald-dark: #022c22;
            --primary-emerald-light: #0f766e;
            --soft-cream: #FDFBF7;
            --accent-gold: #D4AF37;
            --accent-gold-hover: #b8972b;
            --text-dark: #1F2937;
            --text-muted: #6B7280;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--soft-cream);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .arabic-text {
            font-family: 'Amiri', serif;
        }

        /* Top Bar & Prayer Widget */
        .prayer-bar {
            background-color: var(--primary-emerald-dark);
            color: #d1fae5;
            font-size: 0.85rem;
            padding: 6px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.25);
        }

        .prayer-badge {
            background: rgba(212, 175, 55, 0.15);
            border: 1px solid rgba(212, 175, 55, 0.4);
            color: #fef3c7;
            padding: 2px 8px;
            border-radius: 12px;
            margin-right: 6px;
            font-weight: 500;
        }

        /* Main Navbar */
        .altaqwa-navbar {
            background-color: var(--primary-emerald);
            box-shadow: 0 4px 15px rgba(6, 78, 59, 0.15);
            padding: 12px 0;
        }

        .altaqwa-navbar .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: #ffffff !important;
            letter-spacing: 0.5px;
        }

        .altaqwa-navbar .navbar-brand span {
            color: var(--accent-gold);
        }

        .altaqwa-navbar .nav-link {
            color: #e2e8f0 !important;
            font-weight: 500;
            margin: 0 8px;
            transition: color 0.2s ease;
        }

        .altaqwa-navbar .nav-link:hover {
            color: var(--accent-gold) !important;
        }

        .btn-gold {
            background-color: var(--accent-gold);
            color: #064E3B !important;
            font-weight: 600;
            border: none;
            padding: 8px 20px;
            border-radius: 25px;
            transition: all 0.2s ease;
        }

        .btn-gold:hover {
            background-color: var(--accent-gold-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
        }

        .btn-outline-gold {
            border: 1.5px solid var(--accent-gold);
            color: var(--accent-gold) !important;
            font-weight: 600;
            padding: 7px 18px;
            border-radius: 25px;
            transition: all 0.2s ease;
        }

        .btn-outline-gold:hover {
            background-color: var(--accent-gold);
            color: var(--primary-emerald) !important;
        }

        .btn-emerald {
            background-color: var(--primary-emerald);
            color: #ffffff !important;
            font-weight: 600;
            padding: 8px 22px;
            border-radius: 25px;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-emerald:hover {
            background-color: var(--primary-emerald-dark);
            transform: translateY(-1px);
        }

        /* Hero & Section Headers */
        .hero-banner {
            background: linear-gradient(135deg, var(--primary-emerald-dark) 0%, var(--primary-emerald) 100%);
            color: #ffffff;
            padding: 70px 0 60px;
            position: relative;
        }

        .hero-banner::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 15px;
            background: repeating-linear-gradient(45deg, var(--accent-gold), var(--accent-gold) 10px, transparent 10px, transparent 20px);
            opacity: 0.35;
        }

        /* Course Cards */
        .course-card {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f5f9;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(6, 78, 59, 0.12);
        }

        .course-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
        }

        .course-badge-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: var(--primary-emerald);
            background-color: #ecfdf5;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-block;
        }

        .course-badge-fee {
            font-size: 0.8rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .badge-free {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-sub {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-refundable {
            background-color: #e0f2fe;
            color: #0369a1;
        }

        /* Footer */
        .altaqwa-footer {
            background-color: var(--primary-emerald-dark);
            color: #cbd5e1;
            padding: 50px 0 25px;
            border-top: 3px solid var(--accent-gold);
            margin-top: 60px;
        }

        .altaqwa-footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .altaqwa-footer a:hover {
            color: var(--accent-gold);
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Dynamic Salah / Prayer Times Bar -->
    <div class="prayer-bar">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">
            <div class="d-flex align-items-center flex-wrap my-1">
                <span class="mr-2 text-warning"><i class="fas fa-mosque mr-1"></i> <strong id="prayer-city">Daily Salah Times</strong>:</span>
                <span id="prayer-times-container" class="d-flex flex-wrap align-items-center">
                    <span class="prayer-badge">Fajr: <strong id="pt-fajr">--:--</strong></span>
                    <span class="prayer-badge">Dhuhr: <strong id="pt-dhuhr">--:--</strong></span>
                    <span class="prayer-badge">Asr: <strong id="pt-asr">--:--</strong></span>
                    <span class="prayer-badge">Maghrib: <strong id="pt-maghrib">--:--</strong></span>
                    <span class="prayer-badge">Isha: <strong id="pt-isha">--:--</strong></span>
                </span>
            </div>
            <div class="my-1">
                <span class="text-white-50"><i class="fas fa-globe mr-1"></i> Global Online Classes</span>
                <a href="{{ route('storefront.verify_certificate') }}" class="ml-3 text-warning"><i class="fas fa-certificate mr-1"></i> Verify Certificate</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark altaqwa-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-Taqwa Logo" style="height: 44px; width: 44px; border-radius: 8px; margin-right: 12px; border: 1.5px solid var(--accent-gold); box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                <div>
                    <span style="font-weight: 800; letter-spacing: 0.5px;">AL-TAQWA</span>&nbsp;<span class="text-warning font-weight-normal">INSTITUTE</span>
                    <small class="d-block text-warning text-uppercase" style="font-size: 0.62rem; letter-spacing: 1.5px; font-weight: 600; line-height: 1;">Institute of Islamic Studies</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#altaqwaNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="altaqwaNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('storefront.courses') }}">All Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('storefront.courses', ['category' => 'QT']) }}">Qur'an & Tajweed</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('storefront.courses', ['category' => 'IS']) }}">Islamic Studies</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('storefront.courses', ['category' => 'AU']) }}">Arabic & Urdu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('storefront.courses', ['category' => 'WS']) }}">Workshops</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-gold mr-2">
                            <i class="fas fa-chalkboard-teacher mr-1"></i> LMS Portal
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-gold mr-2">
                            <i class="fas fa-sign-in-alt mr-1"></i> Login
                        </a>
                        <a href="{{ route('storefront.courses') }}" class="btn btn-gold">
                            <i class="fas fa-graduation-cap mr-1"></i> Enroll Now
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Yield -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="altaqwa-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-Taqwa" style="height: 48px; width: 48px; border-radius: 8px; margin-right: 12px; border: 1.5px solid var(--accent-gold);">
                        <div>
                            <h5 class="text-white font-weight-bold mb-0">AL-Taqwa Institute</h5>
                            <small class="text-warning text-uppercase font-weight-bold" style="font-size: 0.7rem; letter-spacing: 1.5px;">Taleem &bull; Tarbiyah &bull; Tazkiyah</small>
                        </div>
                    </div>
                    <p class="small text-white-50">
                        Dedicated to spreading authentic, traditional Islamic scholarship across the globe through structured online programs, live Ustadh mentorship, and interactive classrooms.
                    </p>
                    <p class="small text-warning">
                        <i class="fas fa-envelope mr-1"></i> admissions@joinaltaqwa.com<br>
                        <i class="fas fa-globe mr-1"></i> www.joinaltaqwa.com
                    </p>
                </div>
                <div class="col-md-2 col-6 mb-4">
                    <h6 class="text-white font-weight-bold mb-3">Programs</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('storefront.courses', ['category' => 'QT']) }}">Hifz-ul-Qur'an</a></li>
                        <li class="mb-2"><a href="{{ route('storefront.courses', ['category' => 'QT']) }}">Tajweed Diploma</a></li>
                        <li class="mb-2"><a href="{{ route('storefront.courses', ['category' => 'IS']) }}">Alima Course (4 Yrs)</a></li>
                        <li class="mb-2"><a href="{{ route('storefront.courses', ['category' => 'AU']) }}">Arabic Language</a></li>
                        <li class="mb-2"><a href="{{ route('storefront.courses', ['category' => 'WS']) }}">Namaz Workshop</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <h6 class="text-white font-weight-bold mb-3">Academy</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('login') }}">Student & Ustadh Portal</a></li>
                        <li class="mb-2"><a href="{{ route('storefront.verify_certificate') }}">Verify Certificates</a></li>
                        <li class="mb-2"><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                        <li class="mb-2"><a href="{{ route('terms_of_use') }}">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="text-white font-weight-bold mb-3">Scholarship & Support</h6>
                    <p class="small text-white-50">
                        AL-Taqwa believes authentic Islamic knowledge should be accessible to every sincere seeker. Need-based scholarships are available for Alima and Hifz students.
                    </p>
                    <a href="{{ route('storefront.courses') }}" class="btn btn-sm btn-gold btn-block">Explore All 12 Courses</a>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <div class="d-flex flex-wrap justify-content-between align-items-center small text-white-50">
                <div>&copy; {{ date('Y') }} AL-Taqwa Institute (www.joinaltaqwa.com). All rights reserved.</div>
                <div>Excellence in Islamic Education &middot; Faith &middot; Akhlaq</div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Dynamic Adhan.js Calculation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            try {
                // Default coordinates (New Delhi / Mumbai, IST)
                var lat = 28.6139;
                var lng = 77.2090;
                var coordinates = new adhan.Coordinates(lat, lng);
                var params = adhan.CalculationMethod.Karachi();
                params.madhab = adhan.Madhab.Hanafi;

                var date = new Date();
                var prayerTimes = new adhan.PrayerTimes(coordinates, date, params);

                function formatTime(d) {
                    return d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true });
                }

                document.getElementById('pt-fajr').innerText = formatTime(prayerTimes.fajr);
                document.getElementById('pt-dhuhr').innerText = formatTime(prayerTimes.dhuhr);
                document.getElementById('pt-asr').innerText = formatTime(prayerTimes.asr);
                document.getElementById('pt-maghrib').innerText = formatTime(prayerTimes.maghrib);
                document.getElementById('pt-isha').innerText = formatTime(prayerTimes.isha);

                // Try to detect user location if permitted
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var userCoords = new adhan.Coordinates(position.coords.latitude, position.coords.longitude);
                        var userPT = new adhan.PrayerTimes(userCoords, new Date(), params);
                        document.getElementById('pt-fajr').innerText = formatTime(userPT.fajr);
                        document.getElementById('pt-dhuhr').innerText = formatTime(userPT.dhuhr);
                        document.getElementById('pt-asr').innerText = formatTime(userPT.asr);
                        document.getElementById('pt-maghrib').innerText = formatTime(userPT.maghrib);
                        document.getElementById('pt-isha').innerText = formatTime(userPT.isha);
                        document.getElementById('prayer-city').innerText = 'Local Salah Times';
                    }, function () {
                        // Keep default
                    }, { timeout: 4000 });
                }
            } catch (err) {
                console.warn('Adhan.js prayer times widget:', err);
            }
        });
    </script>

    @yield('scripts')
</body>
</html>
