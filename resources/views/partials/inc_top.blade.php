<link rel="icon" href="{{ asset('global_assets/images/favicon.png') }}">

{{--<!-- Global stylesheets -->--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

{{--DatePickers--}}
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" type="text/css">

{{-- Custom App CSS--}}
<link href=" {{ asset('assets/css/qs.css') }}" rel="stylesheet" type="text/css">

<!-- AL-Taqwa Institute Emerald & Gold Theme Overrides -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/altaqwa-theme.css') }}?v={{ time() }}">
<style>
    body {
        font-family: 'Outfit', sans-serif !important;
        background-color: #FDFBF7 !important;
    }
    .navbar-dark {
        background-color: #022c22 !important;
        border-bottom: 2px solid #D4AF37 !important;
    }
    .sidebar-dark {
        background-color: #064E3B !important;
    }
    .sidebar-dark .nav-sidebar .nav-item > .nav-link {
        color: #e2e8f0;
    }
    .sidebar-dark .nav-sidebar .nav-item > .nav-link.active,
    .sidebar-dark .nav-sidebar .nav-item > .nav-link:hover {
        background-color: #022c22 !important;
        color: #D4AF37 !important;
    }
    .sidebar-dark .nav-sidebar .nav-item-open > .nav-link {
        background-color: #022c22 !important;
    }
    .card-header:not([class*="bg-"]) {
        background-color: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }
    .badge-primary, .btn-primary {
        background-color: #064E3B !important;
        border-color: #064E3B !important;
    }
    .btn-primary:hover {
        background-color: #022c22 !important;
        border-color: #022c22 !important;
    }
    .badge-warning, .btn-warning {
        background-color: #D4AF37 !important;
        border-color: #D4AF37 !important;
        color: #064E3B !important;
    }
    .text-emerald {
        color: #064E3B !important;
    }
    .text-gold {
        color: #D4AF37 !important;
    }
</style>

{{--   Core JS files --}}
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }} "></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }} "></script>
