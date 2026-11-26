@extends('layouts.login_master')

@section('content')
    <div class="page-content login-cover" style="min-height: calc(100vh - 160px);">

        <!-- Main content -->
        <div class="content-wrapper" style="min-height: calc(100vh - 160px); display: flex; flex-direction: column; justify-content: center; padding: 40px 0;">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login card -->
                <form class="login-form" method="post" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="card mb-0 shadow-lg" style="border-radius: 18px; border: 2px solid rgba(201, 163, 90, 0.5); overflow: hidden; background: #FFFFFF;">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <img src="{{ asset('assets/images/altaqwa-logo.png') }}" onerror="this.src='{{ asset('global_assets/images/altaqwa_emblem.jpg') }}'" alt="AL-TAQWA Logo" style="width: 82px; height: 82px; border-radius: 16px; border: 2.5px solid #C9A35A; box-shadow: 0 6px 18px rgba(0,0,0,0.25); background: #000000; object-fit: cover;" class="mb-3 mt-1">
                                <h4 class="mb-1 font-weight-bold" style="color: #063D2E; letter-spacing: 0.5px; font-family: var(--font-serif, Georgia, serif);">AL-TAQWA INSTITUTE</h4>
                                <span class="d-block text-muted small" style="letter-spacing: 0.3px;">Taleem &bull; Tarbiyah &bull; Tazkiyah</span>
                                <span class="badge text-white font-weight-bold mt-2" style="background-color: #f4511e; font-size: 11px; padding: 5px 14px; border-radius: 5px; letter-spacing: 0.5px; text-transform: uppercase;">Institute Login</span>
                                <div class="text-muted mt-2" style="font-size: 11.5px; font-weight: 500;">Unified Login for Students, Asatizah & Administration</div>
                            </div>

                            <!-- Role Quick Selectors -->
                            <div class="d-flex justify-content-center mb-3" style="gap: 6px;">
                                <button type="button" class="btn btn-sm btn-outline-success font-weight-bold role-chip" data-user="syedasif" data-pass="cj" style="font-size: 11px; padding: 4px 14px; border-radius: 999px; border: 1.5px solid #063D2E; color: #063D2E;">
                                    <i class="icon-graduation2 mr-1"></i> Student (Syed Asif)
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-success font-weight-bold role-chip" data-user="ahmed" data-pass="cj" style="font-size: 11px; padding: 4px 14px; border-radius: 999px; border: 1.5px solid #063D2E; color: #063D2E;">
                                    <i class="icon-users4 mr-1"></i> Teacher (Ahmed)
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-success font-weight-bold role-chip" data-user="admin" data-pass="cj" style="font-size: 11px; padding: 4px 14px; border-radius: 999px; border: 1.5px solid #063D2E; color: #063D2E;">
                                    <i class="icon-user-lock mr-1"></i> Admin
                                </button>
                            </div>

                            @if (session('flash_danger'))
                            <div class="alert alert-warning alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span class="font-weight-semibold"><i class="icon-alarm mr-1"></i></span> {{ session('flash_danger') }}
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span class="font-weight-semibold">Oops!</span> {{ implode('<br>', $errors->all()) }}
                            </div>
                            @endif

                            <div class="form-group">
                                <input type="text" class="form-control" name="identity" id="identityField" value="{{ old('identity') }}" placeholder="Login ID or Email" required autofocus style="border-radius: 8px; padding: 12px 14px;">
                            </div>

                            <div class="form-group">
                                <input required name="password" id="passwordField" type="password" class="form-control" placeholder="{{ __('Password') }}" style="border-radius: 8px; padding: 12px 14px;">
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label text-muted" style="font-size: 13px;">
                                        <input type="checkbox" name="remember" class="form-input-styled" {{ old('remember') ? 'checked' : '' }} data-fouc>
                                        Remember
                                    </label>
                                </div>

                                <a href="{{ route('password.request') }}" class="ml-auto small text-primary font-weight-semibold">Forgot password?</a>
                            </div>

                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary btn-block shadow-sm" style="background-color: #064E3B; border-color: #064E3B; font-weight: 700; border-radius: 8px; padding: 11px; font-size: 14px;">
                                    Sign in <i class="icon-circle-right2 ml-2"></i>
                                </button>
                            </div>

                            <div class="text-center mt-3 pt-2 border-top">
                                <a href="{{ route('home') }}" class="small text-muted font-weight-semibold">
                                    <i class="icon-arrow-left52 mr-1"></i> Back to AL-TAQWA Homepage
                                </a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        document.querySelectorAll('.role-chip').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var user = this.getAttribute('data-user');
                var pass = this.getAttribute('data-pass');
                document.getElementById('identityField').value = user;
                document.getElementById('passwordField').value = pass;
                document.querySelectorAll('.role-chip').forEach(function(b) {
                    b.classList.remove('btn-success', 'text-white');
                    b.classList.add('btn-outline-success');
                });
                this.classList.remove('btn-outline-success');
                this.classList.add('btn-success', 'text-white');
            });
        });
    </script>
@endsection
