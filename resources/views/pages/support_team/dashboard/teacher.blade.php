{{-- Ustadh / Teacher Faculty Dashboard --}}

{{-- Top Metrics Bar for Teacher --}}
{{-- Top Metrics Bar for Teacher (Responsive 2x2 Grid on Mobile) --}}
<div class="row mx-n2 mx-md-n3">
    {{-- Card 1: My Assigned Batches --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #063D2E 0%, #0A5C45 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">My Halqas</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $total_batches }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-users4 mr-1 text-warning"></i> Cohorts</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(201, 163, 90, 0.2); display: grid; place-items: center; border: 1px solid #C9A35A;">
                        <i class="icon-books" style="color: #F4EFE6; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 2: Students Under Guidance --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #1B4D3E 0%, #285E4D 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Enrolled</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $total_students }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-graduation mr-1 text-warning"></i> Seekers</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(201, 163, 90, 0.2); display: grid; place-items: center; border: 1px solid #C9A35A;">
                        <i class="icon-users" style="color: #F4EFE6; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 3: Upcoming Live Sessions --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #063D2E 0%, #0F4C3A 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Live Classes</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $upcoming_sessions->count() }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-play3 mr-1 text-success"></i> Scheduled</span>
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

    {{-- Card 4: Quran Memorization & Sabaq Progress --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #134E3E 0%, #1D6F59 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Hifz Logs</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ number_format($total_hifz_logs ?? 0) }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-book mr-1 text-warning"></i> Sabaq Logs</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(201, 163, 90, 0.2); display: grid; place-items: center; border: 1px solid #C9A35A;">
                        <i class="icon-book2" style="color: #F4EFE6; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Teacher Fast Action Strip (Mobile Touch Friendly) --}}
<div class="card mb-4" style="border-radius: 10px; border: 1px solid #E2E8F0; background: #FFFFFF; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
    <div class="card-body py-2 px-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-2 mb-md-0">
                <span class="badge mr-2 px-2 py-1" style="background: #063D2E; color: #C9A35A; font-weight: 700; font-size: 0.78rem;">
                    <i class="icon-command mr-1"></i> USTADH SHORTCUTS
                </span>
                <span class="text-muted font-size-sm d-none d-sm-inline">Teaching Quick Actions:</span>
            </div>
            <div class="d-flex flex-wrap mobile-swipe-actions gap-2" style="width: 100%;">
                <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-success mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-video-camera mr-1"></i> Start Live Halqa Now
                </a>
                <a href="{{ route('hifz.index') }}" class="btn btn-sm btn-outline-primary mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-book mr-1"></i> Record Sabaq / Manzil
                </a>
                <a href="{{ route('marks.index') }}" class="btn btn-sm btn-outline-info mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-pencil5 mr-1"></i> Marks & Grades
                </a>
                <a href="#my-halqas" class="btn btn-sm btn-outline-secondary mr-2 mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-users4 mr-1"></i> My Halqas
                </a>
                <a href="{{ route('storefront.verify_certificate') }}" target="_blank" class="btn btn-sm mb-1 font-weight-semibold" style="background: #C9A35A; color: #FFFFFF; border-radius: 6px;">
                    <i class="icon-certificate mr-1"></i> Verify Sanad ↗
                </a>
                <a href="{{ route('my_account') }}" class="btn btn-sm btn-outline-dark mb-1 font-weight-semibold" style="border-radius: 6px;">
                    <i class="icon-user mr-1"></i> My Profile
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Two Column Grid --}}
<div class="row">
    {{-- Left 7-col: My Assigned Halqas & Live Classes --}}
    <div class="col-lg-7">
        
        {{-- My Assigned Batches Card --}}
        <div id="my-halqas" class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1.05rem;">
                    <i class="icon-books mr-2" style="color: #C9A35A;"></i> My Assigned Cohorts & Halqas
                </h6>
                <span class="badge badge-success px-2 py-1 font-weight-bold">{{ $my_sections->count() }} Batches Assigned</span>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($my_sections as $sec)
                    <div class="list-group-item p-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <span class="badge badge-light border mb-1" style="color: #063D2E; font-weight: 700;">
                                    {{ $sec->my_class ? $sec->my_class->name : 'Islamic Course' }}
                                </span>
                                <h5 class="mb-1 font-weight-bold" style="color: #063D2E;">
                                    {{ $sec->name }}
                                </h5>
                                <div class="text-muted font-size-xs">
                                    <span class="mr-3"><i class="icon-alarm mr-1 text-primary"></i> <b>Schedule:</b> {{ $sec->class_timing ?: 'Scheduled as per Course' }}</span>
                                    <span><i class="icon-calendar2 mr-1 text-success"></i> <b>Days:</b> {{ $sec->my_class ? $sec->my_class->class_days : 'Sat & Sun' }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                @if($sec->meeting_link || $sec->live_room_id)
                                    <a href="{{ $sec->meeting_link ?: ('https://meet.jit.si/' . $sec->live_room_id) }}" target="_blank" class="btn btn-sm btn-success font-weight-semibold" style="border-radius: 6px;">
                                        <i class="icon-video-camera mr-1"></i> Start Room
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        No cohorts are currently assigned to your instructor profile.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Upcoming Live Classes --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1.05rem;">
                    <i class="icon-play3 mr-2 text-danger"></i> Live Halqas Schedule
                </h6>
                <div class="header-elements">
                    <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-outline-success font-weight-semibold">
                        <i class="icon-plus2 mr-1"></i> Add Session
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($upcoming_sessions as $sess)
                    <div class="list-group-item d-flex flex-wrap align-items-center justify-content-between p-3">
                        <div>
                            <h6 class="mb-1 font-weight-bold" style="color: #063D2E;">{{ $sess->title }}</h6>
                            <div class="text-muted font-size-xs">
                                <span class="mr-2"><i class="icon-calendar mr-1"></i> {{ $sess->session_date ? $sess->session_date->format('l, M d') : 'Scheduled' }}</span>
                                <span class="mr-2"><i class="icon-alarm mr-1"></i> {{ $sess->start_time }} - {{ $sess->end_time }}</span>
                                <span><i class="icon-users4 mr-1"></i> {{ $sess->section ? $sess->section->name : 'Batch' }}</span>
                            </div>
                        </div>
                        <div class="mt-2 mt-md-0">
                            @if($sess->meeting_url)
                                <a href="{{ $sess->meeting_url }}" target="_blank" class="btn btn-sm btn-success px-3" style="border-radius: 6px;">
                                    <i class="icon-enter mr-1"></i> Enter Classroom
                                </a>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        No upcoming live sessions found.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    {{-- Right 5-col: Hifz Recitations & Teaching Resources --}}
    <div class="col-lg-5">
        
        {{-- Recent Hifz Evaluations Logged --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1rem;">
                    <i class="icon-book mr-2" style="color: #C9A35A;"></i> Recent Sabaq Evaluations
                </h6>
                <a href="{{ route('hifz.index') }}" class="btn btn-xs btn-outline-primary">
                    Record New
                </a>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush font-size-sm">
                    @forelse($recent_hifz as $hz)
                    <div class="list-group-item py-3 px-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="font-weight-bold" style="color: #063D2E;">
                                {{ $hz->student ? $hz->student->name : 'Talib-ul-Ilm' }}
                            </span>
                            <span class="badge badge-warning text-dark font-weight-semibold" style="background: #F4EFE6; border: 1px solid #C9A35A;">
                                {{ $hz->sabqi_status ?: 'Evaluated' }}
                            </span>
                        </div>
                        <div class="text-muted font-size-xs mb-1">
                            <i class="icon-bookmark mr-1 text-primary"></i> <b>Sabaq:</b> {{ $hz->sabaq_surah_ayah ?: 'Ayat Recited' }}
                        </div>
                        @if($hz->ustadh_remarks)
                        <div class="p-2 rounded mt-2" style="background: #FAF9F5; border-left: 3px solid #C9A35A; font-size: 0.78rem; font-style: italic; color: #475569;">
                            "{{ $hz->ustadh_remarks }}"
                        </div>
                        @endif
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        No recitation evaluations logged yet. Click 'Record New' to log student Sabaq.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Ustadh Etiquettes & Best Practices Card --}}
        <div class="card p-3 mb-4" style="border-radius: 12px; background: #FAF9F5; border: 1.5px solid #C9A35A;">
            <div class="d-flex align-items-center mb-2">
                <div style="width: 36px; height: 36px; border-radius: 50%; background: #063D2E; color: #C9A35A; display: grid; place-items: center; margin-right: 12px;">
                    <i class="icon-lamp2"></i>
                </div>
                <h6 class="mb-0 font-weight-bold" style="color: #063D2E;">Faculty Sacred Trust (Amanah)</h6>
            </div>
            <p class="font-size-xs text-muted mb-2">
                "The best of you are those who learn the Qur'an and teach it." (Sahih Bukhari).
            </p>
            <ul class="font-size-xs text-muted pl-3 mb-0" style="line-height: 1.6;">
                <li>Start every live Halqa on time with Khutbat-ul-Hajah.</li>
                <li>Ensure recording links and session notes are saved in the Live Hub.</li>
                <li>Maintain student Sabaq, Sabqi, and Manzil daily logs with encouraging remarks.</li>
            </ul>
        </div>

    </div>
</div>
