<link rel="icon" type="image/jpeg" href="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}">

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">

<!-- Unified Typography Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

<style>
    :root {
        --primary: #063D2E;
        --primary-dark: #03251C;
        --primary-light: #0B5742;
        --gold: #C9A35A;
        --gold-light: #DFBA6B;
        --cream: #FAF9F5;
        --border: #E5E0D5;
        --font-serif: "Playfair Display", Georgia, serif;
        --font-sans: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    body {
        font-family: var(--font-sans) !important;
        background-color: var(--primary-dark) !important;
        background-image: radial-gradient(rgba(201, 163, 90, 0.15) 1px, transparent 1px) !important;
        background-size: 24px 24px !important;
        color: #14261F;
    }

    .nav-header {
        background: var(--primary) !important;
        border-bottom: 2px solid var(--gold) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .navlink-item {
        color: #E2EEE8 !important;
        font-size: 0.88rem;
        font-weight: 600;
        padding: 8px 16px !important;
        border-radius: 9999px;
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

    .login-form .card {
        border-radius: 18px !important;
        box-shadow: 0 16px 45px rgba(0, 0, 0, 0.35) !important;
        border: 2px solid rgba(201, 163, 90, 0.5) !important;
    }

    .btn-login-submit {
        background: var(--primary) !important;
        border-color: var(--primary) !important;
        color: #FFFFFF !important;
        font-weight: 700;
        border-radius: 8px;
        padding: 12px;
        transition: all 0.25s ease;
    }
    .btn-login-submit:hover {
        background: var(--primary-light) !important;
        border-color: var(--primary-light) !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(6, 61, 46, 0.3);
    }
</style>

<!-- Core JS files -->
<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>

<!-- Theme JS files -->
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/login.js') }}"></script>
