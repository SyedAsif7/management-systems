@extends('layouts.storefront')

@section('title', 'All Courses & Programs — AL-Taqwa Institute')

@section('content')

<!-- Header Banner -->
<div class="py-5 text-center text-white" style="background: linear-gradient(135deg, var(--primary-emerald-dark) 0%, var(--primary-emerald) 100%);">
    <div class="container">
        <h1 class="font-weight-bold display-5 mb-2">Academic Programs & Course Catalog</h1>
        <p class="lead text-white-50 mb-0">Explore our structured curriculum designed for authentic Islamic learning at every stage.</p>
    </div>
</div>

<div class="container py-5">
    <!-- Filter Tabs -->
    <div class="d-flex flex-wrap justify-content-center mb-5 gap-2">
        <a href="{{ route('storefront.courses') }}" 
           class="btn {{ empty($categoryCode) ? 'btn-gold shadow-sm' : 'btn-outline-dark' }} mr-2 mb-2">
            All Programs ({{ count($courses) }})
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('storefront.courses', ['category' => $cat->code]) }}" 
               class="btn {{ $categoryCode === $cat->code ? 'btn-gold shadow-sm' : 'btn-outline-dark' }} mr-2 mb-2">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <!-- Courses Grid -->
    <div class="row">
        @forelse($courses as $course)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-card">
                    <div class="position-relative">
                        <img src="{{ asset(ltrim($course->thumbnail_url ?: 'assets/images/courses/tafseer-ul-quran.jpg', '/')) }}" alt="{{ $course->name }}">
                        <div class="position-absolute" style="top: 12px; left: 12px;">
                            <span class="course-badge-category shadow-sm">
                                {{ $course->category ? $course->category->name : 'Program' }}
                            </span>
                        </div>
                        <div class="position-absolute" style="top: 12px; right: 12px;">
                            @if($course->fee_type === 'free')
                                <span class="course-badge-fee badge-free shadow-sm">100% FREE</span>
                            @elseif($course->fee_type === 'refundable_deposit')
                                <span class="course-badge-fee badge-refundable shadow-sm">
                                    <i class="fas fa-undo mr-1"></i> Refundable Deposit
                                </span>
                            @elseif($course->fee_type === 'monthly_subscription')
                                <span class="course-badge-fee badge-sub shadow-sm">Monthly Sub</span>
                            @else
                                <span class="course-badge-fee badge-sub shadow-sm">One-Time Fee</span>
                            @endif
                        </div>
                    </div>

                    <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <h5 class="font-weight-bold mb-2">
                                <a href="{{ route('storefront.course_detail', $course->slug) }}" class="text-dark text-decoration-none">
                                    {{ $course->name }}
                                </a>
                            </h5>
                            <p class="small text-muted mb-3" style="min-height: 40px;">
                                {{ \Illuminate\Support\Str::limit($course->subtitle, 90) }}
                            </p>

                            <div class="small text-muted mb-3 bg-light p-2 rounded">
                                <div class="mb-1"><i class="far fa-clock text-warning mr-1"></i> <strong>Duration:</strong> {{ $course->duration_label ?: 'Flexible' }}</div>
                                <div class="mb-1"><i class="far fa-calendar-alt text-warning mr-1"></i> <strong>Days:</strong> {{ $course->class_days ?: 'Live Sessions' }}</div>
                                @if($course->gender_eligibility === 'sisters_only')
                                    <div class="text-danger font-weight-bold"><i class="fas fa-female mr-1"></i> Sisters Only Batch</div>
                                @else
                                    <div><i class="fas fa-users text-muted mr-1"></i> Brothers & Sisters</div>
                                @endif
                                @if($course->refund_threshold_percentage)
                                    <div class="text-success font-weight-bold mt-1"><i class="fas fa-check-circle mr-1"></i> 100% Refundable on ≥{{ $course->refund_threshold_percentage }}% score</div>
                                @endif
                            </div>
                        </div>

                        <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                            <div>
                                @if($course->fee_type === 'free')
                                    <span class="h5 font-weight-bold text-success mb-0">FREE</span>
                                @else
                                    <span class="h5 font-weight-bold mb-0" style="color: var(--primary-emerald);">₹{{ number_format($course->selling_price, 0) }}</span>
                                    @if($course->mrp_price > $course->selling_price)
                                        <span class="small text-muted text-decoration-line-through">₹{{ number_format($course->mrp_price, 0) }}</span>
                                    @endif
                                    @if($course->fee_type === 'monthly_subscription')
                                        <span class="small text-muted">/mo</span>
                                    @endif
                                @endif
                            </div>
                            <a href="{{ route('storefront.course_detail', $course->slug) }}" class="btn btn-sm btn-emerald">
                                View Details & Enroll
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-book-reader fa-3x text-muted mb-3"></i>
                <h4>No courses found in this category.</h4>
                <a href="{{ route('storefront.courses') }}" class="btn btn-outline-gold mt-2">View All Courses</a>
            </div>
        @endforelse
    </div>
</div>

@endsection
