@extends('layouts.storefront')

@section('title', $course->name . ' — AL-TAQWA Institute')

@section('content')

<!-- Subhero Header Breadcrumb & Title -->
<section class="subhero">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mb-3" style="font-size: 0.85rem;">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: #BED8CC; text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('storefront.courses') }}" style="color: #BED8CC; text-decoration: none;">Courses</a></li>
                <li class="breadcrumb-item active" style="color: var(--gold);" aria-current="page">{{ $course->name }}</li>
            </ol>
        </nav>
        <span class="subhero-eyebrow">{{ $course->category ? $course->category->name : 'Academic Track' }}</span>
        <h1>{{ $course->name }}</h1>
        <p>{{ $course->subtitle }}</p>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        <!-- Main Column: Banner, Overview & Syllabus -->
        <div class="col-lg-8 mb-4 mb-lg-0">
            <!-- Full Widescreen Graphic Banner -->
            <div style="border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 24px; border: 1px solid var(--border); box-shadow: 0 4px 16px rgba(6, 61, 46, 0.08);">
                <img src="{{ asset(ltrim($course->thumbnail_url ?: 'assets/images/courses/tafseer-ul-quran.jpg', '/')) }}" alt="{{ $course->name }}" style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover; display: block;">
            </div>

            <!-- Course Summary Box -->
            <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 30px; box-shadow: 0 2px 8px rgba(6, 61, 46, 0.05); margin-bottom: 24px;">
                <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--primary-dark); margin-bottom: 12px;">About This Course</h3>
                <p style="color: var(--ink-soft); font-size: 1rem; line-height: 1.75; margin-bottom: 20px;">
                    {{ $course->overview ?: 'This program is crafted to provide a deep, authentic understanding of Islamic scholarship under certified instructors.' }}
                </p>

                <!-- Key Details Badges Grid -->
                <div style="background: var(--cream-alt); border-radius: var(--radius-md); padding: 18px 20px; font-size: 0.88rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 14px; border: 1px solid var(--border);">
                    <div>
                        <small style="color: var(--muted); display: block;">Program Duration</small>
                        <strong><i class="far fa-clock mr-1" style="color: var(--gold-dark);"></i> {{ $course->duration_label ?: 'Self-Paced' }}</strong>
                    </div>
                    <div>
                        <small style="color: var(--muted); display: block;">Class Schedule</small>
                        <strong><i class="far fa-calendar-alt mr-1" style="color: var(--gold-dark);"></i> {{ $course->class_days ?: 'Live Sessions' }}</strong>
                    </div>
                    <div>
                        <small style="color: var(--muted); display: block;">Gender Eligibility</small>
                        <strong>
                            @if($course->gender_eligibility === 'sisters_only')
                                <span style="color: #B3261E;"><i class="fas fa-female mr-1"></i> Sisters Only Batch</span>
                            @else
                                <span style="color: var(--primary);"><i class="fas fa-users mr-1"></i> Brothers & Sisters</span>
                            @endif
                        </strong>
                    </div>
                </div>
            </div>

            <!-- Refundable Policy Alert (if applicable) -->
            @if($course->fee_type === 'refundable_deposit' && $course->refund_threshold_percentage)
                <div style="background: #F0FBF7; border: 1px solid rgba(20, 100, 74, 0.3); border-left: 5px solid var(--primary) !important; border-radius: var(--radius-md); padding: 22px; margin-bottom: 24px;">
                    <h5 style="color: var(--primary); font-weight: 800; font-family: var(--font-sans); margin-bottom: 6px;">
                        <i class="fas fa-hand-holding-usd mr-2" style="color: var(--gold);"></i> 100% Commitment Refund Policy
                    </h5>
                    <p style="color: var(--ink-soft); font-size: 0.92rem; margin: 0; line-height: 1.6;">
                        This workshop is subsidized by the academy. We charge a refundable commitment deposit of <strong>₹{{ number_format($course->selling_price, 0) }}</strong> to ensure sincere attendance. When you attend the sessions and achieve <strong>≥{{ $course->refund_threshold_percentage }}%</strong> on the final assessment quiz, your full deposit is instantly credited back to your bank account or UPI!
                    </p>
                </div>
            @endif

            <!-- Structured Syllabus Breakdown -->
            <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 30px; box-shadow: 0 2px 8px rgba(6, 61, 46, 0.05);">
                <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--primary-dark); margin-bottom: 16px;">Structured Curriculum & Modules</h3>
                <div class="accordion" id="syllabusAccordion">
                    @forelse($course->parsed_syllabus as $term => $topics)
                        <div class="border rounded mb-3 overflow-hidden" style="border-color: var(--border) !important;">
                            <div class="p-3 d-flex justify-content-between align-items-center" style="background: var(--cream-alt);">
                                <h6 class="font-weight-bold mb-0" style="color: var(--primary-dark); font-family: var(--font-sans); font-size: 0.95rem;">
                                    <i class="fas fa-book-open mr-2" style="color: var(--gold);"></i> {{ $term }}
                                </h6>
                            </div>
                            <div class="p-3 bg-white" style="color: var(--muted); font-size: 0.9rem; line-height: 1.65;">
                                {{ $topics }}
                            </div>
                        </div>
                    @empty
                        <p style="color: var(--muted); font-size: 0.92rem;">Detailed module notes and lesson recordings are accessible directly through your student account upon batch enrollment.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar Column: Enrollment Card & Cohorts -->
        <div class="col-lg-4">
            <!-- Sticky Enrollment Card -->
            <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 28px; box-shadow: 0 8px 30px rgba(6, 61, 46, 0.08); margin-bottom: 24px;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--muted); letter-spacing: 0.05em;">Course Fee</span>
                    @if($course->fee_type === 'free')
                        <span class="course-pill pill-free">100% Free</span>
                    @elseif($course->fee_type === 'refundable_deposit')
                        <span class="course-pill pill-refundable">Refundable Deposit</span>
                    @else
                        <span class="course-pill pill-sub">Online Certified</span>
                    @endif
                </div>

                <div class="mb-3">
                    @if($course->fee_type === 'free')
                        <h2 style="font-family: var(--font-serif); font-size: 2.2rem; font-weight: 700; color: #166534; margin: 0;">₹0 <small style="font-size: 0.9rem; color: var(--muted); font-family: var(--font-sans);">/ Free</small></h2>
                    @else
                        <h2 style="font-family: var(--font-serif); font-size: 2.2rem; font-weight: 700; color: var(--primary); margin: 0;">
                            ₹{{ number_format($course->selling_price, 0) }}
                            @if($course->fee_type === 'monthly_subscription')
                                <small style="font-size: 0.9rem; color: var(--muted); font-family: var(--font-sans);">/ month</small>
                            @endif
                        </h2>
                        @if($course->mrp_price > $course->selling_price)
                            <span style="font-size: 0.82rem; color: var(--muted); text-decoration: line-through;">Regular Price: ₹{{ number_format($course->mrp_price, 0) }}</span>
                        @endif
                    @endif
                </div>

                @auth
                    <a href="{{ route('enrollments.checkout', $course->slug) }}" class="btn btn-gold btn-block" style="padding: 13px; font-size: 0.95rem; margin-bottom: 12px;">
                        <i class="fas fa-check-circle mr-1"></i> Enroll in this Course
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-gold btn-block" style="padding: 13px; font-size: 0.95rem; margin-bottom: 12px;">
                        <i class="fas fa-sign-in-alt mr-1"></i> Login to Enroll
                    </a>
                    <a href="{{ route('home') }}#admissions" class="btn btn-outline-gold btn-block" style="padding: 11px; font-size: 0.9rem; margin-bottom: 12px;">
                        Submit Admission Enquiry ↗
                    </a>
                @endauth

                <small style="color: var(--muted); display: block; text-align: center; font-size: 0.78rem;">
                    <i class="fas fa-shield-alt text-success mr-1"></i> Verified Digital Certificate upon completion
                </small>
            </div>

            <!-- Active Cohort / Batch Details -->
            @php $batch = $course->sections->first(); @endphp
            <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; box-shadow: 0 2px 8px rgba(6, 61, 46, 0.05); margin-bottom: 24px;">
                <h5 style="font-family: var(--font-serif); font-size: 1.25rem; color: var(--primary-dark); margin-bottom: 14px;">Active Cohort Details</h5>
                @if($batch)
                    <div class="mb-3">
                        <small style="color: var(--muted); display: block;">Batch Cohort</small>
                        <strong style="color: var(--primary-dark);">{{ $batch->name }}</strong>
                    </div>
                    <div class="mb-3">
                        <small style="color: var(--muted); display: block;">Live Timing</small>
                        <strong><i class="fas fa-clock mr-1" style="color: var(--gold);"></i> {{ $batch->class_timing ?: 'Evening Sessions' }}</strong>
                    </div>
                    <div class="mb-3">
                        <small style="color: var(--muted); display: block;">Live Classroom Room</small>
                        <span class="badge badge-light px-2 py-1 border"><i class="fas fa-video mr-1" style="color: var(--primary);"></i> {{ $batch->live_room_id ?: 'altaqwa-room' }}</span>
                    </div>
                @else
                    <p style="color: var(--muted); font-size: 0.86rem;">New cohort admissions are currently open. Enrolled students are assigned to the upcoming cohort automatically.</p>
                @endif

                <hr style="border-color: var(--border);">

                <h6 style="color: var(--primary-dark); font-weight: 700; font-size: 0.88rem; margin-bottom: 10px;">Program Highlights:</h6>
                <ul class="list-unstyled mb-0" style="font-size: 0.82rem; color: var(--muted); line-height: 1.8;">
                    <li><i class="fas fa-check text-success mr-2"></i> Live Interactive HD Classes</li>
                    <li><i class="fas fa-check text-success mr-2"></i> Unlimited Replay Recordings</li>
                    <li><i class="fas fa-check text-success mr-2"></i> Downloadable Study PDF Notes</li>
                    <li><i class="fas fa-check text-success mr-2"></i> Verified Completion Certificate</li>
                    <li><i class="fas fa-check text-success mr-2"></i> Ustadh Q&A & Support Forum</li>
                </ul>
            </div>

            <!-- Related Courses -->
            @if(count($relatedCourses) > 0)
                <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 24px; box-shadow: 0 2px 8px rgba(6, 61, 46, 0.05);">
                    <h5 style="font-family: var(--font-serif); font-size: 1.25rem; color: var(--primary-dark); margin-bottom: 14px;">Related Programs</h5>
                    @foreach($relatedCourses as $rel)
                        <div class="mb-3 pb-3 border-bottom" style="border-color: var(--border) !important;">
                            <h6 style="font-weight: 700; font-size: 0.92rem; margin-bottom: 4px;">
                                <a href="{{ route('storefront.course_detail', $rel->slug) }}" style="color: var(--primary-dark); text-decoration: none;">
                                    {{ $rel->name }}
                                </a>
                            </h6>
                            <div style="font-size: 0.8rem; color: var(--gold-dark); font-weight: 600;">
                                {{ $rel->duration_label }} &middot; {{ $rel->formatted_price }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
