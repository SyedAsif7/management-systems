@extends('layouts.master')
@section('page_title', 'Institute LMS Portal Dashboard')
@section('content')

{{-- Academy Welcome Banner --}}
<div class="card mb-4" style="border-radius: 14px; background: linear-gradient(135deg, #063D2E 0%, #0A5C45 60%, #134E3E 100%); border: 2px solid #C9A35A; box-shadow: 0 6px 20px rgba(6, 61, 46, 0.25); overflow: hidden; position: relative;">
    <div style="position: absolute; right: -20px; bottom: -30px; opacity: 0.08; font-size: 15rem; color: #FAF9F5; pointer-events: none; font-family: 'Amiri', serif;">
        تقوى
    </div>
    <div class="card-body p-4 text-white">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-2">
                    <span class="badge px-3 py-1 mr-2" style="background: rgba(201, 163, 90, 0.25); color: #F4EFE6; border: 1px solid #C9A35A; font-weight: 700; letter-spacing: 1px; font-size: 0.75rem;">
                        AL-TAQWA INSTITUTE &middot; LMS PORTAL
                    </span>
                    <span class="text-uppercase font-size-xs" style="color: #C9A35A; letter-spacing: 1.5px; font-weight: 600;">
                        Taleem &bull; Tarbiyah &bull; Tazkiyah
                    </span>
                </div>
                <h2 class="mb-1 font-weight-bold text-white" style="font-family: 'Amiri', serif; font-size: 1.85rem;">
                    Assalamu Alaikum, {{ Auth::user()->name }}
                </h2>
                <p class="mb-0 font-size-sm" style="color: rgba(255, 255, 255, 0.85); max-width: 600px;">
                    Welcome to your personal dashboard. Track live Halqas, student progress, course registrations, and authentic Sanad credentials.
                </p>
            </div>
            <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
                <div class="d-inline-block text-left p-3 rounded" style="background: rgba(0, 0, 0, 0.2); border: 1px solid rgba(201, 163, 90, 0.3);">
                    <div class="font-size-xs text-uppercase" style="color: #C9A35A; font-weight: 700;">Account Role</div>
                    <div class="font-weight-bold text-white font-size-sm">
                        @if(Qs::userIsTeamSA())
                            <i class="icon-shield-check mr-1 text-warning"></i> Academic Administrator
                        @elseif(Qs::userIsTeacher())
                            <i class="icon-user-tie mr-1 text-warning"></i> Ustadh & Faculty Member
                        @elseif(Qs::userIsStudent())
                            <i class="icon-graduation mr-1 text-warning"></i> Talib-ul-Ilm (Student)
                        @else
                            {{ ucwords(str_replace('_', ' ', Auth::user()->user_type)) }}
                        @endif
                    </div>
                    <div class="font-size-xs text-muted mt-1" style="color: rgba(255, 255, 255, 0.7) !important;">
                        <i class="icon-calendar2 mr-1"></i> Academic Session 2026-2027
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Role-Tailored Structured Dashboard Content --}}
@if(Qs::userIsTeamSA())
    @include('pages.support_team.dashboard.admin')
@elseif(Qs::userIsTeacher())
    @include('pages.support_team.dashboard.teacher')
@elseif(Qs::userIsStudent())
    @include('pages.support_team.dashboard.student')
@else
    {{-- Generic Fallback if any other user type --}}
    @if(isset($users))
    <div class="row">
        <div class="col-sm-6 col-xl-4">
            <div class="card card-body bg-blue-400 has-bg-image">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                        <span class="text-uppercase font-size-xs font-weight-bold">Total Students</span>
                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="icon-users4 icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif

{{-- Events & Academic Calendar Begins --}}
<div class="card mt-2" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
    <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
        <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E;">
            <i class="icon-calendar3 mr-2" style="color: #C9A35A;"></i> Academic & Live Class Events Calendar
        </h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <div class="fullcalendar-basic"></div>
    </div>
</div>
{{-- Events Calendar Ends --}}

@endsection
