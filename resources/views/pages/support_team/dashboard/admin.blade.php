{{-- Academic Administrator Dashboard --}}

{{-- Top Metrics Bar --}}
{{-- Top Metrics Bar for Administrator (Responsive 2x2 Grid on Mobile) --}}
<div class="row mx-n2 mx-md-n3">
    {{-- Card 1: Students & Faculty --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #063D2E 0%, #0A5C45 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Learners</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $users->where('user_type', 'student')->count() }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-user-tie mr-1 text-warning"></i> <b>{{ $users->where('user_type', 'teacher')->count() }}</b> Faculty</span>
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(201, 163, 90, 0.2); display: grid; place-items: center; border: 1px solid #C9A35A;">
                        <i class="icon-users4" style="color: #F4EFE6; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 2: Published Courses & Batches --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #1B4D3E 0%, #285E4D 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Courses</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $total_courses }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-book3 mr-1 text-warning"></i> <b>{{ $total_sections }}</b> Batches</span>
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

    {{-- Card 3: Enrollments & Certificates --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #063D2E 0%, #0F4C3A 100%); border-radius: 12px; border: 1px solid rgba(201, 163, 90, 0.4); box-shadow: 0 4px 15px rgba(6, 61, 46, 0.15);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #C9A35A; letter-spacing: 0.6px; font-size: 0.72rem;">Enrollments</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.25rem, 4vw, 1.8rem);">{{ $total_enrollments }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.85); font-size: 0.7rem;">
                        <span><i class="icon-checkmark-circle mr-1 text-success"></i> <b>{{ $active_enrollments }}</b> Active</span>
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

    {{-- Card 4: Tuition Revenue & Refunds --}}
    <div class="col-6 col-xl-3 mb-3 px-2 px-md-3">
        <div class="card card-body text-white p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #8A6D2B 0%, #C9A35A 100%); border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 4px 15px rgba(138, 109, 43, 0.25);">
            <div class="media align-items-center">
                <div class="media-body min-w-0">
                    <span class="text-uppercase font-size-xs font-weight-bold d-block text-truncate" style="color: #FFFFFF; letter-spacing: 0.6px; font-size: 0.72rem;">Tuition</span>
                    <h2 class="mb-0 font-weight-bold mt-1 text-white" style="font-size: clamp(1.1rem, 3.8vw, 1.7rem);">&#8377;{{ number_format($total_revenue, 0) }}</h2>
                    <div class="font-size-xs mt-1 text-truncate" style="color: rgba(255, 255, 255, 0.9); font-size: 0.7rem;">
                        @if($pending_refunds > 0)
                            <span class="badge badge-danger">{{ $pending_refunds }} Pending</span>
                        @else
                            <span><i class="icon-shield-check mr-1"></i> Clean</span>
                        @endif
                    </div>
                </div>
                <div class="ml-2 ml-sm-3 align-self-center d-none d-sm-block">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(255, 255, 255, 0.2); display: grid; place-items: center; border: 1px solid rgba(255, 255, 255, 0.4);">
                        <i class="icon-cash3" style="color: #FFFFFF; font-size: 1.25rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Fast-Action Command Strip (Mobile Swipe Friendly) --}}
<div class="card mb-4" style="border-radius: 10px; border: 1px solid #E2E8F0; background: #FFFFFF; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
    <div class="card-body py-2 px-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-2 mb-md-0">
                <span class="badge mr-2 px-2 py-1" style="background: #063D2E; color: #C9A35A; font-weight: 700; font-size: 0.78rem;">
                    <i class="icon-command mr-1"></i> QUICK ACTIONS
                </span>
                <span class="text-muted font-size-sm d-none d-sm-inline">Administrative Shortcuts:</span>
            </div>
            <div class="d-flex flex-wrap mobile-swipe-actions gap-2 align-items-center" style="width: 100%;">
                {{-- Fast ON/OFF Button for Hifz Progress --}}
                <form action="{{ route('hifz.toggle_feature') }}" method="POST" class="d-inline mr-2 mb-1">
                    @csrf
                    @if(Qs::isHifzProgressEnabled())
                        <input type="hidden" name="enabled" value="0">
                        <button type="submit" class="btn btn-sm btn-success font-weight-bold" style="border-radius: 20px; box-shadow: 0 2px 6px rgba(16, 185, 129, 0.25);" title="Click to Turn OFF My Hifz Memorization Progress for students">
                            <i class="icon-switch mr-1"></i> Hifz Progress: <b>ON</b> <span class="badge badge-light ml-1 text-danger font-size-xs">Turn OFF</span>
                        </button>
                    @else
                        <input type="hidden" name="enabled" value="1">
                        <button type="submit" class="btn btn-sm btn-danger font-weight-bold" style="border-radius: 20px; box-shadow: 0 2px 6px rgba(239, 68, 68, 0.25);" title="Click to Turn ON My Hifz Memorization Progress for students">
                            <i class="icon-switch mr-1"></i> Hifz Progress: <b>OFF</b> <span class="badge badge-light ml-1 text-success font-size-xs">Turn ON</span>
                        </button>
                    @endif
                </form>

                <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-outline-success mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-video-camera mr-1"></i> Live Class Hub
                </a>
                <a href="{{ route('hifz.index') }}" class="btn btn-sm btn-outline-primary mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-book mr-1"></i> Hifz Log Tracker
                </a>
                <a href="{{ route('enrollments.index') }}" class="btn btn-sm btn-outline-warning text-dark mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-cash mr-1"></i> Enrollments & Fees
                </a>
                <a href="{{ route('classes.index') }}" class="btn btn-sm btn-outline-info mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-books mr-1"></i> Manage Courses ({{ $total_courses }})
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-success mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-graduation2 mr-1"></i> Faculty & Users ({{ $users->where('user_type', 'teacher')->count() }})
                </a>
                <a href="{{ route('exams.index') }}" class="btn btn-sm btn-outline-danger mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-pencil5 mr-1"></i> Exams & Tests
                </a>
                <a href="{{ route('sections.index') }}" class="btn btn-sm btn-outline-secondary mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-users4 mr-1"></i> Batches / Halqas
                </a>
                <a href="{{ route('coins.admin_index') }}" class="btn btn-sm btn-outline-warning text-dark mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-coins mr-1"></i> Taqwa Coins &amp; Tasks
                </a>
                <a href="{{ route('storefront.leaderboard') }}" target="_blank" class="btn btn-sm btn-outline-dark mr-2 mb-1" style="border-radius: 6px; font-weight: 600;">
                    <i class="icon-trophy3 mr-1"></i> Coins Leaderboard ↗
                </a>
                <a href="{{ route('storefront.verify_certificate') }}" target="_blank" class="btn btn-sm mb-1" style="background: #C9A35A; color: #FFFFFF; border-radius: 6px; font-weight: 600;">
                    <i class="icon-certificate mr-1"></i> Verify Certificates
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Main Taqwa Coins Institute Circulation & Global Champions Leaderboard --}}
<div class="card mb-4" style="border-radius: 12px; border: 2px solid #C9A35A; background: #FFFFFF; box-shadow: 0 4px 18px rgba(201, 163, 90, 0.15); overflow: hidden;">
    <div class="card-header py-3 px-3 header-elements-inline" style="background: linear-gradient(135deg, #063D2E 0%, #0A5C45 100%); color: #FFFFFF; border-bottom: 2px solid #C9A35A;">
        <h6 class="card-title font-weight-bold mb-0" style="color: #FFFFFF; font-size: 1.05rem;">
            <i class="icon-coins mr-2" style="color: #C9A35A;"></i> Taqwa Coins Institute Circulation &amp; Main Leaderboard
        </h6>
        <div class="header-elements">
            <a href="{{ route('coins.admin_index') }}" class="btn btn-sm btn-gold font-weight-bold mr-2">
                <i class="icon-cog mr-1"></i> Coins Console
            </a>
            <a href="{{ route('storefront.leaderboard') }}" target="_blank" class="btn btn-sm btn-outline-light font-weight-bold">
                <i class="icon-trophy3 mr-1" style="color: #C9A35A;"></i> Full Leaderboard ↗
            </a>
        </div>
    </div>
    <div class="card-body p-3">
        {{-- 4 Mini KPI stats --}}
        <div class="row mb-3">
            <div class="col-md-3 col-6 mb-2">
                <div class="p-2 rounded text-center" style="background: #FAF9F5; border: 1px solid #E5E0D5;">
                    <div class="font-size-xs text-uppercase font-weight-bold" style="color: #5F7369;">Total Circulation</div>
                    <div style="font-size: 1.25rem; font-weight: 800; color: #063D2E;">🪙 {{ number_format($coin_overview['total_circulation']) }}</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <div class="p-2 rounded text-center" style="background: #FAF9F5; border: 1px solid #E5E0D5;">
                    <div class="font-size-xs text-uppercase font-weight-bold" style="color: #5F7369;">Student Pool</div>
                    <div style="font-size: 1.25rem; font-weight: 800; color: #063D2E;">📖 {{ number_format($coin_overview['student_coins']) }}</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <div class="p-2 rounded text-center" style="background: #FAF9F5; border: 1px solid #E5E0D5;">
                    <div class="font-size-xs text-uppercase font-weight-bold" style="color: #5F7369;">Total Redeemed</div>
                    <div style="font-size: 1.25rem; font-weight: 800; color: #063D2E;">🎁 {{ number_format($coin_overview['total_redeemed']) }}</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-2">
                <div class="p-2 rounded text-center" style="background: #FAF9F5; border: 1px solid #E5E0D5;">
                    <div class="font-size-xs text-uppercase font-weight-bold" style="color: #5F7369;">Transactions</div>
                    <div style="font-size: 1.25rem; font-weight: 800; color: #063D2E;">📜 {{ number_format($coin_overview['transactions_count']) }}</div>
                </div>
            </div>
        </div>

        {{-- Top Champions Table --}}
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <thead style="background: #063D2E; color: #FFFFFF;">
                    <tr>
                        <th style="width: 55px;" class="text-center">Rank</th>
                        <th>Student (Talib-ul-Ilm)</th>
                        <th>Role</th>
                        <th>Honorific Tier</th>
                        <th class="text-right">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coin_leaderboard as $ch)
                    <tr>
                        <td class="font-weight-bold text-center">
                            @if($ch->rank == 1) 🥇
                            @elseif($ch->rank == 2) 🥈
                            @elseif($ch->rank == 3) 🥉
                            @else #{{ $ch->rank }}
                            @endif
                        </td>
                        <td>
                            <span class="font-weight-bold" style="color: #063D2E;">{{ $ch->name }}</span>
                            <small class="text-muted d-block">{{ $ch->email }}</small>
                        </td>
                        <td>
                            <span class="badge" style="background: #FFF8E7; color: #9F7E3A; border: 1px solid #C9A35A; font-weight: 700;">Talib-ul-Ilm</span>
                        </td>
                        <td>
                            <span class="badge badge-light border" style="font-weight: 700;">{{ $ch->tier['icon'] }} {{ $ch->tier['name'] }}</span>
                        </td>
                        <td class="text-right font-weight-bold" style="color: #063D2E;">
                            <span class="badge" style="background: rgba(201,163,90,0.15); border: 1px solid #C9A35A; color: #063D2E; font-weight: 800; font-size: 0.85rem;">
                                🪙 {{ number_format($ch->coins_balance) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-3 text-muted">No coin balances recorded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Two-Column Main Grid --}}
<div class="row">
    {{-- Left 8-col: Recent Enrollments & Upcoming Live Classes --}}
    <div class="col-lg-8">
        
        {{-- Recent Enrollments Table --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1.05rem;">
                    <i class="icon-clipboard3 mr-2" style="color: #C9A35A;"></i> Recent Enrollments & Course Registrations
                </h6>
                <div class="header-elements">
                    <a href="{{ route('enrollments.index') }}" class="btn btn-sm btn-link text-muted font-weight-semibold p-0">
                        View All ({{ $total_enrollments }}) <i class="icon-arrow-right5 ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: #FAF9F5; font-size: 0.8rem; text-transform: uppercase; color: #64748B;">
                        <tr>
                            <th>Order / Ref</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_enrollments as $enr)
                        <tr>
                            <td>
                                <span class="badge badge-light font-weight-bold" style="border: 1px solid #CBD5E1; color: #063D2E;">
                                    {{ $enr->order_id ?: ('#' . $enr->id) }}
                                </span>
                            </td>
                            <td>
                                <div class="font-weight-semibold" style="color: #1E293B;">
                                    {{ $enr->student ? $enr->student->name : 'N/A' }}
                                </div>
                                <small class="text-muted">{{ $enr->student ? $enr->student->email : '' }}</small>
                            </td>
                            <td>
                                <div class="text-truncate" style="max-width: 200px; font-weight: 500; color: #063D2E;">
                                    {{ $enr->course ? $enr->course->name : 'Course' }}
                                </div>
                                <small class="text-muted">{{ $enr->course ? $enr->course->duration_label : '' }}</small>
                            </td>
                            <td>
                                <span class="font-weight-bold" style="color: #063D2E;">&#8377;{{ number_format($enr->amount_paid, 2) }}</span>
                            </td>
                            <td>
                                @if($enr->status == 'completed')
                                    <span class="badge badge-success px-2 py-1"><i class="icon-checkmark mr-1"></i> Completed</span>
                                @elseif($enr->status == 'active')
                                    <span class="badge badge-primary px-2 py-1"><i class="icon-spinner4 mr-1"></i> Active</span>
                                @else
                                    <span class="badge badge-secondary px-2 py-1">{{ ucfirst($enr->status) }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($enr->status == 'completed' && $enr->order_id)
                                    <a href="{{ route('storefront.verify_certificate', $enr->order_id) }}" target="_blank" class="btn btn-xs btn-outline-warning text-dark py-1 px-2" title="Verify Certificate">
                                        <i class="icon-certificate"></i> Sanad
                                    </a>
                                @else
                                    <a href="{{ route('enrollments.index') }}" class="btn btn-xs btn-outline-secondary py-1 px-2">
                                        <i class="icon-eye"></i> Details
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No recent enrollment records found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Live Classroom Hub Schedule --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1.05rem;">
                    <i class="icon-video-camera mr-2 text-danger"></i> Live Halqas & Classroom Schedule
                </h6>
                <div class="header-elements">
                    <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-outline-success font-weight-semibold">
                        <i class="icon-plus2 mr-1"></i> Schedule Session
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($upcoming_sessions as $sess)
                    <div class="list-group-item d-flex flex-wrap align-items-center justify-content-between py-3 px-3">
                        <div class="d-flex align-items-center">
                            <div style="width: 44px; height: 44px; border-radius: 8px; background: rgba(6, 61, 46, 0.08); color: #063D2E; display: grid; place-items: center; font-size: 1.3rem; margin-right: 14px; border: 1px solid rgba(6, 61, 46, 0.15);">
                                <i class="icon-play3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-weight-bold" style="color: #063D2E; font-size: 0.95rem;">
                                    {{ $sess->title }}
                                </h6>
                                <div class="text-muted font-size-xs mt-1">
                                    <span class="mr-2"><i class="icon-calendar2 mr-1"></i> {{ $sess->session_date ? $sess->session_date->format('M d, Y') : 'Scheduled' }}</span>
                                    <span class="mr-2"><i class="icon-alarm mr-1"></i> {{ $sess->start_time ?: 'Class Time' }} - {{ $sess->end_time ?: '' }}</span>
                                    <span><i class="icon-users4 mr-1"></i> {{ $sess->section ? $sess->section->name : 'All Batches' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 mt-md-0 d-flex align-items-center">
                            @if($sess->status == 'live')
                                <span class="badge badge-danger mr-2 py-1 px-2 animate-pulse"><i class="icon-radio-checked mr-1"></i> LIVE NOW</span>
                            @elseif($sess->status == 'completed')
                                <span class="badge badge-secondary mr-2 py-1 px-2"><i class="icon-checkmark mr-1"></i> Completed</span>
                            @else
                                <span class="badge badge-info mr-2 py-1 px-2"><i class="icon-clock mr-1"></i> Scheduled</span>
                            @endif

                            @if($sess->meeting_url)
                                <a href="{{ $sess->meeting_url }}" target="_blank" class="btn btn-sm btn-success px-3" style="border-radius: 6px;">
                                    <i class="icon-enter mr-1"></i> Join Halqa
                                </a>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        <i class="icon-video-camera icon-2x opacity-50 mb-2"></i>
                        <p class="mb-0">No live sessions currently scheduled. Click 'Schedule Session' to create one.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    {{-- Right 4-col: Hifz Recitation Activity & Popular Courses --}}
    <div class="col-lg-4">

        {{-- Hifz Feature Controller Card (ON / OFF Toggle) --}}
        <div class="card mb-4" style="border-radius: 12px; border: 2px solid {{ Qs::isHifzProgressEnabled() ? '#10B981' : '#EF4444' }}; background: #FFFFFF; box-shadow: 0 4px 15px rgba(0,0,0,0.06); overflow: hidden;">
            <div class="card-header py-2 px-3 d-flex align-items-center justify-content-between" style="background: {{ Qs::isHifzProgressEnabled() ? '#ECFDF5' : '#FEF2F2' }}; border-bottom: 1px solid {{ Qs::isHifzProgressEnabled() ? '#A7F3D0' : '#FECACA' }};">
                <span class="font-size-xs font-weight-bold text-uppercase" style="color: {{ Qs::isHifzProgressEnabled() ? '#065F46' : '#991B1B' }}; letter-spacing: 0.5px;">
                    <i class="icon-switch mr-1"></i> Student Feature Control
                </span>
                <span class="badge {{ Qs::isHifzProgressEnabled() ? 'badge-success' : 'badge-danger' }} font-weight-bold px-2 py-1">
                    {{ Qs::isHifzProgressEnabled() ? 'ENABLED (ON)' : 'DISABLED (OFF)' }}
                </span>
            </div>
            <div class="card-body p-3">
                <h6 class="font-weight-bold mb-1" style="color: #063D2E; font-size: 0.95rem;">
                    My Hifz Memorization Progress
                </h6>
                <p class="font-size-xs text-muted mb-3" style="line-height: 1.4;">
                    Turn this switch ON or OFF to control whether students can view the Hifz Memorization Progress card and tracker on their dashboard.
                </p>
                <form action="{{ route('hifz.toggle_feature') }}" method="POST">
                    @csrf
                    @if(Qs::isHifzProgressEnabled())
                        <input type="hidden" name="enabled" value="0">
                        <button type="submit" class="btn btn-block btn-danger font-weight-bold" style="border-radius: 8px; box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);">
                            <i class="icon-switch2 mr-1"></i> TURN OFF FOR STUDENTS
                        </button>
                    @else
                        <input type="hidden" name="enabled" value="1">
                        <button type="submit" class="btn btn-block btn-success font-weight-bold" style="border-radius: 8px; box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);">
                            <i class="icon-checkmark-circle mr-1"></i> TURN ON FOR STUDENTS
                        </button>
                    @endif
                </form>
            </div>
        </div>

        {{-- Hifz Tracker Activity --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1rem;">
                    <i class="icon-book mr-2" style="color: #C9A35A;"></i> Hifz Memorization Activity
                </h6>
                <div class="header-elements">
                    <a href="{{ route('hifz.index') }}" class="btn btn-xs btn-outline-primary">
                        Open Tracker
                    </a>
                </div>
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
                            <i class="icon-bookmark mr-1 text-primary"></i> <b>Sabaq:</b> {{ $hz->sabaq_surah_ayah ?: 'Ayah Log' }}
                        </div>
                        <div class="text-muted font-size-xs mb-1">
                            <i class="icon-book2 mr-1 text-success"></i> <b>Manzil:</b> {{ $hz->manzil_juz ?: 'Juz Review' }}
                        </div>
                        @if($hz->ustadh_remarks)
                        <div class="p-2 rounded mt-2" style="background: #FAF9F5; border-left: 3px solid #C9A35A; font-size: 0.78rem; font-style: italic; color: #475569;">
                            "{{ $hz->ustadh_remarks }}"
                        </div>
                        @endif
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        No recent Hifz logs recorded today.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Top Courses Catalog Overview --}}
        <div class="card mb-4" style="border-radius: 12px; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
            <div class="card-header bg-white header-elements-inline py-3 border-bottom" style="border-color: #E2E8F0 !important;">
                <h6 class="card-title font-weight-bold mb-0" style="color: #063D2E; font-size: 1rem;">
                    <i class="icon-graduation2 mr-2" style="color: #C9A35A;"></i> Core Islamic Programs
                </h6>
                <div class="header-elements">
                    <a href="{{ route('storefront.courses') }}" target="_blank" class="btn btn-xs btn-link text-muted p-0">
                        Catalog <i class="icon-new-tab ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="list-group list-group-flush font-size-sm">
                    @forelse($top_courses as $tc)
                    <div class="list-group-item py-3 px-3 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="font-weight-semibold" style="color: #063D2E;">{{ $tc->name }}</div>
                            <small class="text-muted">
                                <i class="icon-clock mr-1"></i> {{ $tc->duration_label }} &middot; 
                                <span class="text-primary font-weight-bold">{{ $tc->enrollments_count }} enrolled</span>
                            </small>
                        </div>
                        <a href="{{ route('storefront.course_detail', $tc->slug) }}" target="_blank" class="btn btn-xs btn-outline-success">
                            <i class="icon-arrow-right5"></i>
                        </a>
                    </div>
                    @empty
                    <div class="p-4 text-center text-muted">
                        No courses available.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Verification & Transcript Lookup Tile --}}
        <div class="card text-white p-3 mb-4" style="border-radius: 12px; background: linear-gradient(135deg, #063D2E 0%, #0F4C3A 100%); border: 1px solid #C9A35A;">
            <div class="d-flex align-items-center mb-2">
                <i class="icon-shield-check icon-2x mr-3 text-warning"></i>
                <div>
                    <h6 class="mb-0 font-weight-bold text-white">Official Credential Verification</h6>
                    <small style="color: rgba(255, 255, 255, 0.8);">Verify student Sanads & digital certificates.</small>
                </div>
            </div>
            <a href="{{ route('storefront.verify_certificate') }}" target="_blank" class="btn btn-block btn-sm mt-2 font-weight-bold" style="background: #C9A35A; color: #FFFFFF; border-radius: 6px;">
                <i class="icon-search4 mr-1"></i> Verify Credentials Online
            </a>
        </div>

    </div>
</div>
