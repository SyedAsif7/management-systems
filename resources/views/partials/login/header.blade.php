<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="mt-1 mr-4 d-flex align-items-center">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-Taqwa Logo" style="height: 40px; width: 40px; border-radius: 8px; margin-right: 12px; border: 1.5px solid #D4AF37;">
            <div>
                <h4 class="text-bold text-white mb-0" style="letter-spacing: 0.5px;">AL-TAQWA INSTITUTE</h4>
                <small class="text-warning text-uppercase d-block font-weight-bold" style="font-size: 0.65rem; letter-spacing: 1.5px; line-height: 1;">Institute of Islamic Studies</small>
            </div>
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="{{ route('home') }}" class="navbar-nav-link">
                    <i class="icon-home"></i>
                    <span class="d-md-none ml-2">Home</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="{{ route('login') }}" class="navbar-nav-link">
                    <i class="icon-user-tie"></i>
                    <span class="d-md-none ml-2">My Account</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-cog3"></i>
                    <span class="d-md-none ml-2">Options</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
