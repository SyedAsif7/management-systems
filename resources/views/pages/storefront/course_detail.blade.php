@extends('layouts.storefront')

@section('title', $course->name . ' — AL-Taqwa Institute')

@section('content')

<!-- Header Breadcrumb & Title -->
<div class="py-5 text-white" style="background: linear-gradient(135deg, var(--primary-emerald-dark) 0%, var(--primary-emerald) 100%);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mb-3">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('storefront.courses') }}" class="text-white-50">Courses</a></li>
                <li class="breadcrumb-item active text-warning" aria-current="page">{{ $course->name }}</li>
            </ol>
        </nav>
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge badge-warning text-dark font-weight-bold px-3 py-1 mb-2">
                    {{ $course->category ? $course->category->name : 'Program' }}
                </span>
                <h1 class="font-weight-bold display-5 text-white mb-3">{{ $course->name }}</h1>
                <p class="lead text-white-50 mb-0">{{ $course->subtitle }}</p>
            </div>
            <div class="col-lg-4 text-lg-right mt-4 mt-lg-0">
                <div class="bg-white p-4 rounded text-dark text-left shadow-lg">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small">Course Fee</span>
                        @if($course->fee_type === 'free')
                            <span class="badge badge-success px-2 py-1">100% Free</span>
                        @elseif($course->fee_type === 'refundable_deposit')
                            <span class="badge badge-info px-2 py-1">100% Refundable Deposit</span>
                        @else
                            <span class="badge badge-warning px-2 py-1">Online Certified</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        @if($course->fee_type === 'free')
                            <h2 class="font-weight-bold text-success mb-0">₹0 <small class="text-muted h6 font-weight-normal">/ Free</small></h2>
                        @else
                            <h2 class="font-weight-bold mb-0" style="color: var(--primary-emerald);">
                                ₹{{ number_format($course->selling_price, 0) }}
                                @if($course->fee_type === 'monthly_subscription')
                                    <small class="text-muted h6 font-weight-normal">/ month</small>
                                @endif
                            </h2>
                            @if($course->mrp_price > $course->selling_price)
                                <span class="small text-muted text-decoration-line-through">Regular Price: ₹{{ number_format($course->mrp_price, 0) }}</span>
                            @endif
                        @endif
                    </div>

                    @auth
                        <a href="{{ route('enrollments.checkout', $course->slug) }}" class="btn btn-gold btn-block font-weight-bold shadow-sm mb-2">
                            <i class="fas fa-check-circle mr-1"></i> Enroll in this Course
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-gold btn-block font-weight-bold shadow-sm mb-2">
                            <i class="fas fa-user-plus mr-1"></i> Login to Enroll
                        </a>
                    @endauth

                    <small class="text-muted d-block text-center">
                        <i class="fas fa-shield-alt text-success mr-1"></i> Official Certificate upon completion
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <!-- Main Column: Overview & Syllabus -->
        <div class="col-lg-8">
            <!-- Course Summary Box -->
            <div class="card border-0 shadow-sm mb-4 p-4" style="border-radius: 12px;">
                <h4 class="font-weight-bold mb-3" style="color: var(--primary-emerald);">About This Course</h4>
                <p class="text-muted leading-relaxed" style="font-size: 1.05rem; line-height: 1.7;">
                    {{ $course->overview ?: 'This program is crafted to provide a deep, authentic understanding of Islamic scholarship under certified instructors.' }}
                </p>

                <!-- Key Details Badges -->
                <div class="row mt-3 bg-light p-3 rounded">
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <small class="text-muted d-block">Duration</small>
                        <strong><i class="far fa-clock text-warning mr-1"></i> {{ $course->duration_label ?: 'Self-Paced' }}</strong>
                    </div>
                    <div class="col-sm-4 mb-2 mb-sm-0">
                        <small class="text-muted d-block">Class Schedule</small>
                        <strong><i class="far fa-calendar-alt text-warning mr-1"></i> {{ $course->class_days ?: 'Weekend' }}</strong>
                    </div>
                    <div class="col-sm-4">
                        <small class="text-muted d-block">Eligibility</small>
                        <strong>
                            @if($course->gender_eligibility === 'sisters_only')
                                <span class="text-danger"><i class="fas fa-female mr-1"></i> Sisters Only</span>
                            @else
                                <span class="text-success"><i class="fas fa-users mr-1"></i> Brothers & Sisters</span>
                            @endif
                        </strong>
                    </div>
                </div>
            </div>

            <!-- Refundable Policy Alert (if applicable) -->
            @if($course->fee_type === 'refundable_deposit' && $course->refund_threshold_percentage)
                <div class="alert alert-info border-0 shadow-sm p-4 mb-4" style="border-radius: 12px; background-color: #ecfeff; border-left: 5px solid #06b6d4 !important;">
                    <h5 class="font-weight-bold text-info mb-2">
                        <i class="fas fa-hand-holding-usd mr-2"></i> 100% Commitment Refund Policy
                    </h5>
                    <p class="text-muted mb-0">
                        This workshop is completely subsidized by the academy. We charge a refundable commitment deposit of <strong>₹{{ number_format($course->selling_price, 0) }}</strong> to ensure sincere attendance. When you attend the sessions and achieve <strong>≥{{ $course->refund_threshold_percentage }}%</strong> on the final assessment quiz, your full deposit is instantly credited back to your bank account or UPI!
                    </p>
                </div>
            @endif

            <!-- Structured Syllabus Breakdown -->
            <div class="card border-0 shadow-sm mb-4 p-4" style="border-radius: 12px;">
                <h4 class="font-weight-bold mb-3" style="color: var(--primary-emerald);">Structured Curriculum</h4>
                <div class="accordion" id="syllabusAccordion">
                    @forelse($course->parsed_syllabus as $term => $topics)
                        <div class="border rounded mb-3 overflow-hidden">
                            <div class="p-3 bg-light d-flex justify-content-between align-items-center">
                                <h6 class="font-weight-bold mb-0 text-dark">
                                    <i class="fas fa-chevron-circle-right text-warning mr-2"></i> {{ $term }}
                                </h6>
                            </div>
                            <div class="p-3 bg-white text-muted">
                                {{ $topics }}
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Detailed syllabus modules will be shared upon enrollment in the student classroom portal.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="col-lg-4">
            <!-- Active Cohort / Batch Information -->
            @php $batch = $course->sections->first(); @endphp
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 12px;">
                <h5 class="font-weight-bold mb-3" style="color: var(--primary-emerald);">Active Batch Details</h5>
                @if($batch)
                    <div class="mb-3">
                        <small class="text-muted d-block">Batch Cohort</small>
                        <strong class="text-dark">{{ $batch->name }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Live Timing</small>
                        <strong><i class="fas fa-clock text-warning mr-1"></i> {{ $batch->class_timing ?: 'Evening Sessions' }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block">Unified Live Classroom</small>
                        <span class="badge badge-secondary px-2 py-1"><i class="fas fa-hashtag mr-1"></i> {{ $batch->live_room_id ?: 'altaqwa-room' }}</span>
                    </div>
                @else
                    <p class="text-muted small">New cohort admissions are currently open. Enrolled students are assigned to the upcoming cohort automatically.</p>
                @endif

                <hr>

                <h6 class="font-weight-bold text-dark mb-2">What's Included:</h6>
                <ul class="list-unstyled small text-muted mb-0">
                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Live Interactive HD Classes</li>
                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Unlimited Replay Recordings</li>
                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Downloadable Study PDF Notes</li>
                    <li class="mb-2"><i class="fas fa-check text-success mr-2"></i> Verified Completion Certificate</li>
                    <li><i class="fas fa-check text-success mr-2"></i> Ustadh Q&A & Support Forum</li>
                </ul>
            </div>

            <!-- Related Courses -->
            @if(count($relatedCourses) > 0)
                <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
                    <h5 class="font-weight-bold mb-3" style="color: var(--primary-emerald);">Related Programs</h5>
                    @foreach($relatedCourses as $rel)
                        <div class="mb-3 pb-3 border-bottom">
                            <h6 class="font-weight-bold mb-1">
                                <a href="{{ route('storefront.course_detail', $rel->slug) }}" class="text-dark text-decoration-none">
                                    {{ $rel->name }}
                                </a>
                            </h6>
                            <div class="small text-muted">{{ $rel->duration_label }} &middot; {{ $rel->formatted_price }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
