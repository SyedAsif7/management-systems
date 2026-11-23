@extends('layouts.storefront')

@section('title', 'Official Courses & Programs — AL-TAQWA Institute')

@section('content')

<!-- Subhero Header Banner -->
<section class="subhero">
    <div class="container">
        <span class="subhero-eyebrow">Academic Curriculum</span>
        <h1>Official Courses & Programs</h1>
        <p>Explore all 12 authentic Islamic courses designed for spiritual growth and academic depth. Learn live online with dedicated scholars and structured progress tracking.</p>
    </div>
</section>

<div class="container py-5">
    <!-- Filter Tabs -->
    <div class="d-flex flex-wrap justify-content-center mb-4" style="gap: 8px;">
        <a href="{{ route('storefront.courses') }}" 
           class="filter-chip {{ empty($categoryCode) ? 'active' : '' }}">
            All Programs ({{ count($courses) }})
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('storefront.courses', ['category' => $cat->code]) }}" 
               class="filter-chip {{ $categoryCode === $cat->code ? 'active' : '' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <!-- Courses Grid -->
    <div class="row">
        @forelse($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4 d-flex">
                <article class="course-card w-100">
                    <div class="course-top-banner" style="background-image: url('{{ asset(ltrim($course->thumbnail_url ?: 'assets/images/courses/tafseer-ul-quran.jpg', '/')) }}');">
                        <span class="course-icon-badge" style="font-size: 1.6rem; filter: drop-shadow(0 2px 5px rgba(0,0,0,0.7));">
                            @if(strpos($course->name, 'Tafseer') !== false || strpos($course->name, 'Hifz') !== false)
                                📖
                            @elseif(strpos($course->name, 'Tajweed') !== false)
                                ◉
                            @elseif(strpos($course->name, 'Seerat') !== false)
                                🕌
                            @elseif(strpos($course->name, 'Arabic') !== false)
                                📜
                            @elseif(strpos($course->name, 'Urdu') !== false)
                                ✍️
                            @elseif(strpos($course->name, 'Public') !== false)
                                🎙️
                            @elseif(strpos($course->name, 'Namaz') !== false)
                                🤲
                            @elseif(strpos($course->name, 'Aqeedah') !== false)
                                ⚖️
                            @else
                                ✨
                            @endif
                        </span>
                        <div class="d-flex gap-1 flex-wrap justify-content-end" style="gap: 6px; z-index: 2;">
                            <span class="course-pill pill-cat">
                                {{ $course->category ? $course->category->name : 'Program' }}
                            </span>
                            @if($course->fee_type === 'free')
                                <span class="course-pill pill-free">100% FREE</span>
                            @elseif($course->fee_type === 'refundable_deposit')
                                <span class="course-pill pill-refundable">Refundable</span>
                            @elseif($course->fee_type === 'monthly_subscription')
                                <span class="course-pill pill-sub">Monthly Sub</span>
                            @else
                                <span class="course-pill pill-sub">One-Time Fee</span>
                            @endif
                        </div>
                    </div>

                    <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <span style="font-size: 0.72rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: var(--gold-dark); display: block; margin-bottom: 4px;">
                                {{ $course->category ? $course->category->name : 'Academic Track' }}
                            </span>
                            <h3 style="font-family: var(--font-serif); font-size: 1.25rem; line-height: 1.3; color: var(--primary-dark); margin-bottom: 8px; min-height: 48px;">
                                <a href="{{ route('storefront.course_detail', $course->slug) }}" style="color: inherit; text-decoration: none;">
                                    {{ $course->name }}
                                </a>
                            </h3>
                            <p style="font-size: 0.86rem; color: var(--muted); line-height: 1.55; margin-bottom: 16px; min-height: 40px;">
                                {{ \Illuminate\Support\Str::limit($course->subtitle, 110) }}
                            </p>

                            <div style="background: var(--cream-alt); border-radius: var(--radius-sm); padding: 10px 14px; margin-bottom: 18px; font-size: 0.78rem; display: flex; flex-direction: column; gap: 6px; border: 1px solid rgba(0,0,0,0.04);">
                                <div class="d-flex justify-content-between">
                                    <span>◷ Duration: <b>{{ $course->duration_label ?: 'Flexible' }}</b></span>
                                    <span style="font-size: 0.95rem; font-weight: 800; color: var(--primary);">
                                        @if($course->fee_type === 'free')
                                            FREE
                                        @else
                                            ₹{{ number_format($course->selling_price, 0) }}{{ $course->fee_type === 'monthly_subscription' ? '/mo' : '' }}
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>🗓 {{ $course->class_days ?: 'Live Sessions' }}</span>
                                    @if($course->gender_eligibility === 'sisters_only')
                                        <span style="color: #B3261E; font-weight: 700;">🧕 Sisters Only</span>
                                    @else
                                        <span>👥 Brothers & Sisters</span>
                                    @endif
                                </div>
                                @if($course->refund_threshold_percentage)
                                    <div style="color: var(--primary-light); font-weight: 700; font-size: 0.76rem; margin-top: 2px;">
                                        ✓ 100% Refundable on ≥{{ $course->refund_threshold_percentage }}% exam score
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <a href="{{ route('storefront.course_detail', $course->slug) }}" style="font-size: 0.84rem; font-weight: 700; color: var(--primary); text-decoration: none;">
                                Details ↗
                            </a>
                            <a href="{{ route('storefront.course_detail', $course->slug) }}" class="btn btn-green" style="padding: 7px 18px; font-size: 0.8rem;">
                                View & Enroll
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-book-reader fa-3x mb-3" style="color: var(--muted);"></i>
                <h4 style="color: var(--primary-dark);">No courses found in this category.</h4>
                <a href="{{ route('storefront.courses') }}" class="btn btn-outline-gold mt-3">View All Courses</a>
            </div>
        @endforelse
    </div>
</div>

@endsection
