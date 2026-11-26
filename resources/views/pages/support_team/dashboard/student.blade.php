{{-- Talib-ul-Ilm / Student Dashboard --}}

{{-- Top Metrics Bar for Student --}}
{{-- Top Metrics Bar for Student (Responsive 2x2 Grid on Mobile) --}}
<div class="row mx-n2 mx-md-n3">
    {{-- Card 1: My Enrolled Courses --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #063D2E 0%, #0A5C45 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">My Courses</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $my_enrollments->count() }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-checkmark-circle mr-1 text-success"></i> <b>{{ $active_courses_count }}</b> Active</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(201, 163, 90, 0.2); display: grid; place-items: center; border: 1px solid #C9A35A;">
                        <i class="icon-graduation2" style="color: #F4EFE6; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 2: Live Classes Available --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #1B4D3E 0%, #285E4D 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Live Halqas</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $upcoming_sessions->count() }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-play3 mr-1 text-warning"></i> Scheduled</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(201, 163, 90, 0.2); display: grid; place-items: center; border: 1px solid #C9A35A;">
                        <i class="icon-video-camera" style="color: #F4EFE6; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 3: Earned Certificates & Sanads --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #063D2E 0%, #0F4C3A 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Earned Sanads</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $completed_certs->count() }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-certificate mr-1 text-warning"></i> Credentials</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(201, 163, 90, 0.2); display: grid; place-items: center; border: 1px solid #C9A35A;">
                        <i class="icon-certificate" style="color: #F4EFE6; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 4: Taqwa Coins & Seeker Standing --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #8A6D2B 0%, #C9A35A 100%); border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 4px 15px rgba(138, 109, 43, 0.25);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #FFFFFF; letter-spacing: 0.6px; font-size: 0.72rem;">Taqwa Coins</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">🪙 {{ number_format($my_coins) }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.95); font-size: 0.7rem;">
                        <span><i class="icon-trophy3 mr-1"></i> <b>#{{ $my_coin_rank }}</b> &middot; {{ $my_tier['name'] }}</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(255, 255, 255, 0.2); display: grid; place-items: center; border: 1px solid rgba(255, 255, 255, 0.4);">
                        <i class="icon-coins" style="color: #FFFFFF; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Student Fast Action Strip (Mobile Swipe Friendly) --}}
<div class="card mb-4" style="border-radius: 10px; border: 1px solid #E2E8F0; background: #FFFFFF; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
    <div class="card-body py-2 px-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-2 mb-md-0">
                <span class="badge mr-2 px-2 py-1" style="background: #063D2E; color: #C9A35A; font-weight: 700; font-size: 0.78rem;">
                    <i class="icon-compass mr-1"></i> STUDENT DASHBOARD
                </span>
                <span class="text-muted font-size-sm d-none d-sm-inline">Student Quick Access:</span>
            </div>
            <div class="d-flex flex-wrap mobile-swipe-actions gap-2" style="width: 100%;">
                <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-success mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-video-camera mr-1"></i> Enter Live Halqa
                </a>
                <a href="{{ route('enrollments.my_courses') }}" class="btn btn-sm btn-outline-primary mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-graduation2 mr-1"></i> My Courses
                </a>
                <a href="{{ route('storefront.leaderboard', ['role' => 'student']) }}" class="btn btn-sm btn-outline-warning text-dark mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-trophy3 mr-1"></i> Coins Leaderboard
                </a>
                @if(Qs::isHifzProgressEnabled())
                <a href="{{ route('hifz.index') }}" class="btn btn-sm btn-outline-info mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-book mr-1"></i> Hifz Daily Progress
                </a>
                @endif
                <a href="{{ route('storefront.courses') }}" target="_blank" class="btn btn-sm btn-outline-secondary mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-grid6 mr-1"></i> Browse 12 Courses
                </a>
                <a href="{{ route('storefront.verify_certificate') }}" target="_blank" class="btn btn-sm mb-1 font-weight-semibold" style="background: #C9A35A; color: #FFFFFF; border-radius: 6px;">
                    <i class="icon-certificate mr-1"></i> Verify Certificates
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Two-Column Grid --}}
<div class="row">
    {{-- Left 8-col: My Enrolled Courses & Live Halqas --}}
    <div class="col-lg-8">

        {{-- My Enrolled Courses Classroom --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1.05rem;">
                    <i class="icon-books mr-2" style="color: #C9A35A;"></i> My Enrolled Courses & Virtual Classroom
                </h6>
                <a href="{{ route('enrollments.my_courses') }}" class="btn btn-sm btn-link text-muted font-weight-semibold p-0">
                    View Classroom <i class="icon-arrow-right5 ml-1"></i>
                </a>
            </div>

            <div class="card-body p-3">
                @if($my_enrollments->isNotEmpty())
                    <div class="row">
                        @foreach($my_enrollments as $enr)
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 mb-0" style="border: 1.5px solid #E2E8F0; border-radius: 10px; overflow: hidden; transition: transform 0.2s, box-shadow 0.2s; background: #FFFFFF;">
                                <div style="height: 120px; overflow: hidden; position: relative; background: #063D2E;">
                                    @if($enr->course && $enr->course->thumbnail_url)
                                        <img src="{{ $enr->course->thumbnail_url }}" alt="{{ $enr->course->name }}" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.85;">
                                    @else
                                        <div style="width: 100%; height: 100%; display: grid; place-items: center; color: #C9A35A; font-size: 2rem;">
                                            <i class="icon-book3"></i>
                                        </div>
                                    @endif
                                    <div style="position: absolute; top: 10px; right: 10px;">
                                        @if($enr->status == 'completed')
                                            <span class="badge badge-success px-2 py-1"><i class="icon-checkmark mr-1"></i> Certified</span>
                                        @elseif($enr->status == 'active')
                                            <span class="badge badge-primary px-2 py-1"><i class="icon-spinner4 mr-1"></i> Active</span>
                                        @else
                                            <span class="badge badge-secondary px-2 py-1">{{ ucfirst($enr->status) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <h6 class="font-weight-bold mb-1" style="color: #063D2E; font-size: 0.95rem; line-height: 1.3;">
                                            {{ $enr->course ? $enr->course->name : 'Course' }}
                                        </h6>
                                        <div class="text-muted font-size-xs mb-2">
                                            <span><i class="icon-calendar2 mr-1 text-success"></i> {{ $enr->course ? $enr->course->class_days : 'Sat & Sun' }}</span> &middot;
                                            <span><i class="icon-clock mr-1 text-primary"></i> {{ $enr->course ? $enr->course->duration_label : 'Program' }}</span>
                                        </div>
                                        @if($enr->batch)
                                            <div class="font-size-xs mb-2 text-dark font-weight-semibold">
                                                <i class="icon-users4 mr-1 text-muted"></i> Cohort: {{ $enr->batch->name }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mt-2 pt-2 border-top d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Ref: {{ $enr->order_id ?: ('#' . $enr->id) }}</small>
                                        @if($enr->status == 'completed' || $enr->order_id)
                                            <div>
                                                <a href="{{ route('storefront.verify_certificate', $enr->order_id ?: Qs::hash($enr->id)) }}" target="_blank" class="btn btn-xs btn-outline-warning text-dark font-weight-bold mr-1">
                                                    <i class="icon-certificate mr-1"></i> Sanad
                                                </a>
                                                <a href="{{ route('storefront.download_certificate', $enr->order_id ?: Qs::hash($enr->id)) }}" class="btn btn-xs btn-gold font-weight-bold" title="Download Official PDF Sanad">
                                                    <i class="icon-file-pdf mr-1"></i> PDF
                                                </a>
                                            </div>
                                        @else
                                            <a href="{{ route('live_sessions.index') }}" class="btn btn-xs btn-outline-success font-weight-bold">
                                                <i class="icon-video-camera mr-1"></i> Go to Live
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="icon-graduation2 icon-3x text-muted opacity-50 mb-2"></i>
                        <h6 class="font-weight-bold text-dark">You are not yet enrolled in any Islamic courses</h6>
                        <p class="text-muted font-size-sm">Explore our 12 world-class authentic programs in Qur'an, Tajweed, Arabic, and Islamic Studies.</p>
                        <a href="{{ route('storefront.courses') }}" target="_blank" class="btn btn-sm btn-success px-3">
                            <i class="icon-search4 mr-1"></i> Explore Course Catalog
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- Live Classroom Schedule for Student --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1.05rem;">
                    <i class="icon-video-camera mr-2 text-danger"></i> Live Halqas & Classroom Schedule
                </h6>
                <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-outline-success font-weight-semibold">
                    <i class="icon-enter mr-1"></i> Open Live Hub
                </a>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($upcoming_sessions as $sess)
                    <div class="list-group-item d-flex flex-wrap align-items-center justify-content-between p-3">
                        <div class="d-flex align-items-center">
                            <div style="width: 44px; height: 44px; border-radius: 8px; background: rgba(6, 61, 46, 0.08); color: #063D2E; display: grid; place-items: center; font-size: 1.3rem; margin-right: 14px; border: 1px solid rgba(6, 61, 46, 0.15);">
                                <i class="icon-play3"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 font-weight-bold" style="color: #063D2E;">{{ $sess->title }}</h6>
                                <div class="text-muted font-size-xs">
                                    <span class="mr-2"><i class="icon-calendar mr-1"></i> {{ $sess->session_date ? $sess->session_date->format('l, M d') : 'Scheduled' }}</span>
                                    <span class="mr-2"><i class="icon-alarm mr-1"></i> {{ $sess->start_time }} - {{ $sess->end_time }}</span>
                                    <span><i class="icon-users4 mr-1"></i> {{ $sess->section ? $sess->section->name : 'Cohort' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mt-md-0">
                            @if($sess->meeting_url)
                                <a href="{{ $sess->meeting_url }}" target="_blank" class="btn btn-sm btn-success px-3 font-weight-semibold" style="border-radius: 6px;">
                                    <i class="icon-video-camera mr-1"></i> Join Halqa
                                </a>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        No upcoming live sessions scheduled today. Check your cohort batch schedule for weekly class times.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    {{-- Right 4-col: Certificates, Hifz Progress, and Recommended Courses --}}
    <div class="col-lg-4">

        {{-- Student Coins Leaderboard & Personal Standing Card --}}
        <div class="card mb-4" style="border-radius: 12px; border: 2px solid #C9A35A; background: #FFFFFF; box-shadow: 0 4px 18px rgba(201, 163, 90, 0.15); overflow: hidden;">
            <div class="card-header py-3 px-3 header-elements-inline" style="background: linear-gradient(135deg, #063D2E 0%, #0A5C45 100%); color: #FFFFFF; border-bottom: 2px solid #C9A35A;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #FFFFFF; font-size: 0.98rem;">
                    <i class="icon-trophy3 mr-2" style="color: #C9A35A;"></i> Student Coins Leaderboard
                </h6>
                <a href="{{ route('storefront.leaderboard', ['role' => 'student']) }}" target="_blank" class="btn btn-xs btn-gold font-weight-bold">
                    Full Board ↗
                </a>
            </div>

            {{-- Student's Personal Standing Banner --}}
            <div class="p-3 border-bottom d-flex align-items-center justify-content-between" style="background: #FAF9F5;">
                <div>
                    <div class="font-size-xs text-uppercase font-weight-bold" style="color: #5F7369; letter-spacing: 0.05em;">Your Seeker Standing</div>
                    <div class="d-flex align-items-center mt-1">
                        <span class="badge mr-2 px-2 py-1 font-weight-bold" style="background: #063D2E; color: #DFBA6B;">
                            Rank #{{ $my_coin_rank }}
                        </span>
                        <span class="font-weight-bold" style="color: #063D2E; font-size: 0.88rem;">
                            {{ $my_tier['icon'] }} {{ $my_tier['name'] }}
                        </span>
                    </div>
                </div>
                <div class="text-right">
                    <span class="font-weight-bold" style="color: #063D2E; font-size: 1.25rem;">
                        🪙 {{ number_format($my_coins) }}
                    </span>
                    <div class="font-size-xs text-muted">Taqwa Coins</div>
                </div>
            </div>

            {{-- Top 5 Students List --}}
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($student_leaderboard as $st)
                    <div class="list-group-item d-flex align-items-center justify-content-between py-2 px-3 {{ $st->id === Auth::id() ? 'bg-light font-weight-bold' : '' }}">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 text-center font-weight-bold" style="width: 24px; font-size: 0.9rem;">
                                @if($st->rank == 1) 🥇
                                @elseif($st->rank == 2) 🥈
                                @elseif($st->rank == 3) 🥉
                                @else #{{ $st->rank }}
                                @endif
                            </span>
                            <div class="rounded-circle mr-2 d-flex align-items-center justify-content-center text-white font-weight-bold" style="width: 30px; height: 30px; background: #063D2E; font-size: 0.75rem; border: 1px solid #C9A35A;">
                                {{ strtoupper(substr($st->name, 0, 1)) }}
                            </div>
                            <div>
                                <div style="color: #063D2E; font-size: 0.85rem; line-height: 1.2;">
                                    {{ $st->name }}
                                    @if($st->id === Auth::id())
                                        <span class="badge badge-warning font-size-xs ml-1" style="font-size: 0.65rem;">You</span>
                                    @endif
                                </div>
                                <small class="text-muted" style="font-size: 0.72rem;">{{ $st->tier['name'] }}</small>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="badge" style="background: rgba(201, 163, 90, 0.15); border: 1px solid #C9A35A; color: #063D2E; font-weight: 800; font-size: 0.8rem;">
                                🪙 {{ number_format($st->coins_balance) }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="p-3 text-center text-muted font-size-sm">No student rankings recorded yet.</div>
                    @endforelse
                </div>
            </div>

            {{-- Footer earning callout --}}
            <div class="p-2 text-center border-top font-size-xs" style="background: #FDFCF9; color: #5F7369;">
                <span>Earn +15 per Halqa &bull; +50 per Hifz Milestone &bull; +10 per 100 Zikr</span>
            </div>
        </div>

        {{-- Verified Certificates & Sanads Card --}}
        @if($completed_certs->isNotEmpty())
        <div class="card mb-4" style="border-radius: 12px; border: 2px solid #C9A35A; background: #FAF9F5; box-shadow: 0 4px 15px rgba(201, 163, 90, 0.2);">
            <div class="card-header header-elements-inline py-3 border-bottom" style="background: transparent; border-color: rgba(201, 163, 90, 0.3) !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E;">
                    <i class="icon-certificate mr-2" style="color: #C9A35A;"></i> My Verified Sanads ({{ $completed_certs->count() }})
                </h6>
            </div>
            <div class="card-body p-3">
                @foreach($completed_certs as $cert)
                <div class="p-3 mb-2 rounded bg-white" style="border: 1px solid #E2E8F0;">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge badge-success font-size-xs"><i class="icon-shield-check mr-1"></i> Authentic Sanad</span>
                        <small class="text-muted font-weight-bold">{{ $cert->order_id }}</small>
                    </div>
                    <h6 class="mb-1 font-weight-bold" style="color: #063D2E; font-size: 0.9rem;">
                        {{ $cert->course ? $cert->course->name : 'Completed Course' }}
                    </h6>
                    <div class="mt-2 text-right">
                        <a href="{{ route('storefront.verify_certificate', $cert->order_id) }}" target="_blank" class="btn btn-xs btn-outline-warning text-dark font-weight-bold">
                            <i class="icon-new-tab mr-1"></i> Verify & View Credential
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- My Hifz Recitation Progress Log (Shown when enabled by Admin) --}}
        @if(Qs::isHifzProgressEnabled())
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1rem;">
                    <i class="icon-book mr-2" style="color: #C9A35A;"></i> My Hifz Memorization Progress
                </h6>
                <a href="{{ route('hifz.index') }}" class="btn btn-xs btn-outline-primary">
                    View Log
                </a>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush font-size-sm">
                    @forelse($my_hifz_logs as $hz)
                    <div class="list-group-item py-3 px-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="font-weight-bold" style="color: #063D2E;">
                                <i class="icon-bookmark mr-1 text-primary"></i> {{ $hz->sabaq_surah_ayah ?: 'Sabaq' }}
                            </span>
                            <span class="badge badge-warning text-dark font-weight-semibold" style="background: #F4EFE6; border: 1px solid #C9A35A;">
                                {{ $hz->sabqi_status ?: 'Graded' }}
                            </span>
                        </div>
                        <div class="text-muted font-size-xs mb-1">
                            <span class="mr-2"><i class="icon-calendar mr-1"></i> {{ $hz->date ? $hz->date->format('M d, Y') : 'Recent' }}</span>
                            <span><i class="icon-book2 mr-1 text-success"></i> <b>Manzil:</b> {{ $hz->manzil_juz ?: 'Juz Review' }}</span>
                        </div>
                        @if($hz->ustadh_remarks)
                        <div class="p-2 rounded mt-2" style="background: #FAF9F5; border-left: 3px solid #C9A35A; font-size: 0.78rem; font-style: italic; color: #475569;">
                            "{{ $hz->ustadh_remarks }}"
                        </div>
                        @endif
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        No Hifz recitation logs recorded yet. Attend your live halqa to have your Sabaq evaluated.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        @endif

        {{-- Recommended Courses to Advance Islamic Knowledge --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1rem;">
                    <i class="icon-graduation2 mr-2" style="color: #C9A35A;"></i> Recommended Next Courses
                </h6>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush font-size-sm">
                    @forelse($featured_courses as $fc)
                    <div class="list-group-item py-2 px-3 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="font-weight-semibold" style="color: #063D2E; font-size: 0.85rem;">{{ $fc->name }}</div>
                            <small class="text-muted">{{ $fc->duration_label }} &middot; {{ $fc->formatted_price }}</small>
                        </div>
                        <a href="{{ route('storefront.course_detail', $fc->slug) }}" target="_blank" class="btn btn-xs btn-outline-success">
                            View
                        </a>
                    </div>
                    @empty
                    <div class="p-3 text-center text-muted">Check out our catalog.</div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
