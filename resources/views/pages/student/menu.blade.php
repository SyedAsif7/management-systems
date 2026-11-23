{{--My Enrolled Courses--}}
<li class="nav-item">
    <a href="{{ route('enrollments.my_courses') }}" class="nav-link {{ Route::is('enrollments.my_courses') ? 'active' : '' }}">
        <i class="icon-graduation2"></i> My Courses
    </a>
</li>

{{--Live Classroom--}}
<li class="nav-item">
    <a href="{{ route('live_sessions.index') }}" class="nav-link {{ Route::is('live_sessions.index') ? 'active' : '' }}">
        <i class="icon-video-camera"></i> Live Classes & Replays
    </a>
</li>

{{--Hifz Tracker--}}
@if(Qs::isHifzProgressEnabled())
<li class="nav-item">
    <a href="{{ route('hifz.index') }}" class="nav-link {{ Route::is('hifz.index') ? 'active' : '' }}">
        <i class="icon-book"></i> Hifz Memorization Log
    </a>
</li>
@endif

{{--Marksheet & Certificates--}}
<li class="nav-item">
    <a href="{{ route('marks.year_select', Qs::hash(Auth::user()->id)) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.show', 'marks.year_selector']) ? 'active' : '' }}">
        <i class="icon-certificate"></i> Grades & Transcript
    </a>
</li>
