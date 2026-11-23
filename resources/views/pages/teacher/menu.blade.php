{{-- Live Classroom Hub --}}
<li class="nav-item">
    <a href="{{ route('live_sessions.index') }}" class="nav-link {{ Route::is('live_sessions.*') ? 'active' : '' }}">
        <i class="icon-video-camera"></i> Live Classes & Recordings
    </a>
</li>

{{-- Hifz Daily Recitation Tracker --}}
<li class="nav-item">
    <a href="{{ route('hifz.index') }}" class="nav-link {{ Route::is('hifz.*') ? 'active' : '' }}">
        <i class="icon-book"></i> Hifz Sabaq Tracker
    </a>
</li>

{{-- Timetables --}}
<li class="nav-item">
    <a href="{{ route('tt.index') }}" class="nav-link {{ Route::is('tt.*') ? 'active' : '' }}">
        <i class="icon-calendar"></i> Academic Timetable
    </a>
</li>

{{-- Public Certificate Verification --}}
<li class="nav-item">
    <a href="{{ route('storefront.verify_certificate') }}" target="_blank" class="nav-link">
        <i class="icon-certificate"></i> Verify Certificate
    </a>
</li>
