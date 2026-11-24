{{--My Enrolled Courses--}}
<li class="nav-item">
    <a href="{{ route('enrollments.my_courses') }}" class="nav-link {{ Route::is('enrollments.my_courses') ? 'active' : '' }}">
        <i class="icon-graduation2"></i> <span>My Enrolled Courses</span>
    </a>
</li>

{{--Hifz Tracker--}}
@if(Qs::isHifzProgressEnabled())
<li class="nav-item">
    <a href="{{ route('hifz.index') }}" class="nav-link {{ Route::is('hifz.index') ? 'active' : '' }}">
        <i class="icon-book"></i> <span>Hifz Memorization Log</span>
    </a>
</li>
@endif

{{--Marksheet & Certificates--}}
<li class="nav-item">
    <a href="{{ route('marks.year_select', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.show', 'marks.year_selector']) ? 'active' : '' }}">
        <i class="icon-certificate"></i> <span>Grades & Transcript</span>
    </a>
</li>

{{-- Student Coins Leaderboard --}}
<li class="nav-item">
    <a href="{{ route('storefront.leaderboard', ['role' => 'student']) }}" target="_blank" class="nav-link">
        <i class="icon-trophy3"></i> <span>Coins Leaderboard ↗</span>
    </a>
</li>

{{-- Verify Certificate --}}
<li class="nav-item">
    <a href="{{ route('storefront.verify_certificate') }}" target="_blank" class="nav-link">
        <i class="icon-certificate"></i> <span>Verify Sanad ↗</span>
    </a>
</li>
