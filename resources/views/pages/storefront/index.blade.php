@extends('layouts.storefront')

@section('title', 'AL-Taqwa Institute — Global Online Islamic Academy')

@section('content')

<!-- Hero Section -->
<section class="hero-banner text-center text-lg-left">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-inline-flex align-items-center mb-3 px-3 py-1 rounded-pill" style="background: rgba(212, 175, 55, 0.15); border: 1px solid rgba(212, 175, 55, 0.4);">
                    <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="Emblem" style="height: 24px; width: 24px; border-radius: 4px; margin-right: 8px; border: 1px solid var(--accent-gold);">
                    <span class="text-warning small font-weight-bold" style="letter-spacing: 1px;">TALEEM &bull; TARBIYAH &bull; TAZKIYAH</span>
                </div>
                <div class="arabic-text text-warning h3 mb-2">
                    بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ &bull; وَقُل رَّبِّ زِدْنِي عِلْمًا
                </div>
                <h1 class="display-4 font-weight-bold mb-3 text-white">
                    Master Authentic <span class="text-warning">Islamic Scholarship</span> From Home
                </h1>
                <p class="lead text-white-50 mb-4">
                    Join thousands of students across the globe in structured, certified Islamic programs. From Tajweed and Hifz to the 4-year Alima Course, learn directly under qualified Ustadhs and Alimaat with live interactive sessions.
                </p>
                <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start">
                    <a href="{{ route('storefront.courses') }}" class="btn btn-gold btn-lg mr-3 mb-2 shadow">
                        <i class="fas fa-book-open mr-2"></i> Browse 12 Official Courses
                    </a>
                    <a href="{{ route('storefront.courses', ['category' => 'WS']) }}" class="btn btn-outline-light btn-lg mb-2">
                        <i class="fas fa-gift mr-2 text-warning"></i> Free & Refundable Workshops
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('global_assets/images/altaqwa_logo.jpg') }}" 
                         alt="AL-TAQWA Institute of Islamic Studies" 
                         class="img-fluid rounded shadow-lg"
                         style="max-width: 440px; width: 100%; border: 3px solid var(--accent-gold); box-shadow: 0 15px 35px rgba(0,0,0,0.4) !important;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4 Core Pillars / Category Pills -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase text-muted font-weight-bold letter-spacing-1">Our Academic Faculties</h6>
            <h2 class="font-weight-bold" style="color: var(--primary-emerald);">Structured Learning Pathways</h2>
            <div style="width: 60px; height: 3px; background: var(--accent-gold); margin: 10px auto;"></div>
        </div>

        <div class="row">
            <!-- 1. Quran & Tajweed -->
            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('storefront.courses', ['category' => 'QT']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-3" style="border-radius: 12px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: #ecfdf5; color: #064E3B;">
                            <i class="fas fa-quran fa-2x"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark">Qur'an & Tajweed</h5>
                        <p class="small text-muted mb-0">Hifz, Tajweed Diploma, and Tafseer Programs</p>
                    </div>
                </a>
            </div>

            <!-- 2. Islamic Studies -->
            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('storefront.courses', ['category' => 'IS']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-3" style="border-radius: 12px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: #fef3c7; color: #92400e;">
                            <i class="fas fa-university fa-2x"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark">Islamic Studies</h5>
                        <p class="small text-muted mb-0">Alima Course, Seerah, Aqeedah & Fiqh</p>
                    </div>
                </a>
            </div>

            <!-- 3. Arabic & Urdu -->
            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('storefront.courses', ['category' => 'AU']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-3" style="border-radius: 12px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: #e0f2fe; color: #0369a1;">
                            <i class="fas fa-language fa-2x"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark">Arabic & Urdu</h5>
                        <p class="small text-muted mb-0">Noorani Qaida, Sarf/Nahw & Classical Urdu</p>
                    </div>
                </a>
            </div>

            <!-- 4. Workshops & Short Courses -->
            <div class="col-md-3 col-6 mb-4">
                <a href="{{ route('storefront.courses', ['category' => 'WS']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm text-center p-3" style="border-radius: 12px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: #fce7f3; color: #9d174d;">
                            <i class="fas fa-certificate fa-2x"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark">Workshops & Short</h5>
                        <p class="small text-muted mb-0">Namaz Translation & Public Speaking</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses Grid -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h6 class="text-uppercase text-muted font-weight-bold">Featured Programs</h6>
                <h2 class="font-weight-bold" style="color: var(--primary-emerald);">Join Our Top Enrolled Classes</h2>
            </div>
            <a href="{{ route('storefront.courses') }}" class="btn btn-outline-gold d-none d-md-inline-block">
                View All Courses <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="row">
            @foreach($featuredCourses as $course)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-card">
                        <div class="position-relative">
                            <img src="{{ $course->thumbnail_url ?: 'https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $course->name }}">
                            <div class="position-absolute" style="top: 12px; left: 12px;">
                                <span class="course-badge-category shadow-sm">
                                    {{ $course->category ? $course->category->name : 'Course' }}
                                </span>
                            </div>
                            <div class="position-absolute" style="top: 12px; right: 12px;">
                                @if($course->fee_type === 'free')
                                    <span class="course-badge-fee badge-free shadow-sm">100% FREE</span>
                                @elseif($course->fee_type === 'refundable_deposit')
                                    <span class="course-badge-fee badge-refundable shadow-sm">
                                        <i class="fas fa-undo-alt mr-1"></i> 100% Refundable
                                    </span>
                                @elseif($course->fee_type === 'monthly_subscription')
                                    <span class="course-badge-fee badge-sub shadow-sm">Monthly Sub</span>
                                @else
                                    <span class="course-badge-fee badge-sub shadow-sm">Certificate</span>
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
                                    {{ \Illuminate\Support\Str::limit($course->subtitle, 85) }}
                                </p>

                                <div class="small text-muted mb-3">
                                    <div><i class="far fa-clock text-warning mr-1"></i> <strong>Duration:</strong> {{ $course->duration_label ?: 'Flexible' }}</div>
                                    <div><i class="far fa-calendar-alt text-warning mr-1"></i> <strong>Days:</strong> {{ $course->class_days ?: 'Live Sessions' }}</div>
                                    @if($course->gender_eligibility === 'sisters_only')
                                        <div class="text-info font-weight-bold"><i class="fas fa-female mr-1"></i> Sisters Only Batch</div>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                                <div>
                                    @if($course->fee_type === 'free')
                                        <span class="h5 font-weight-bold text-success mb-0">₹0</span>
                                        <span class="small text-muted">/ Free</span>
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
                                    Details & Enroll
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-3 d-md-none">
            <a href="{{ route('storefront.courses') }}" class="btn btn-outline-gold">
                View All Courses <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</section>

<!-- Single Room ID Live Architecture Feature Callout -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-emerald) 0%, var(--primary-emerald-dark) 100%); color: #ffffff;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="badge badge-warning text-dark font-weight-bold px-3 py-2 mb-3">SINGLE ROOM ID ARCHITECTURE</span>
                <h2 class="font-weight-bold text-white mb-3">Seamless Live Classes Across Web & Mobile</h2>
                <p class="text-white-50 lead mb-4">
                    No confusing links or expiring invites. Each batch at AL-Taqwa is allocated a permanent, unified Classroom ID. One click from your student dashboard opens your live session, complete with interactive whiteboard, Ustadh screen sharing, and automatic session recording.
                </p>
                <div class="row text-left">
                    <div class="col-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-video fa-2x text-warning mr-3"></i>
                            <div>
                                <h6 class="font-weight-bold mb-0 text-white">Live HD Classroom</h6>
                                <small class="text-white-50">Web & Mobile Ready</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-play-circle fa-2x text-warning mr-3"></i>
                            <div>
                                <h6 class="font-weight-bold mb-0 text-white">Full Replays</h6>
                                <small class="text-white-50">Never miss a lecture</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white rounded-lg p-4 text-dark shadow-lg" style="border-radius: 16px;">
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                        <span class="badge badge-success px-2 py-1"><i class="fas fa-circle mr-1"></i> LIVE NOW</span>
                        <span class="small text-muted font-monospace"><i class="fas fa-hashtag mr-1"></i> altaqwa-tafseer-b1</span>
                    </div>
                    <h5 class="font-weight-bold text-emerald mb-1">Tafseer-ul-Qur’an (Surah Al-Baqarah)</h5>
                    <p class="small text-muted mb-3">Ustadh Muhammad &middot; 42 Students Joined</p>
                    <div class="embed-responsive embed-responsive-16by9 bg-dark rounded mb-3 d-flex align-items-center justify-content-center text-white" style="background: #022c22 !important;">
                        <div class="text-center p-4">
                            <i class="fas fa-chalkboard-teacher fa-3x text-warning mb-2"></i>
                            <h6 class="text-white font-weight-bold">Interactive Audio/Video Live Stream</h6>
                            <small class="text-white-50">Quranic Ayah Analysis & Makharij Practice</small>
                        </div>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-gold btn-block font-weight-bold">
                        <i class="fas fa-sign-in-alt mr-1"></i> Login to Enter Classroom
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Student Trust & Testimonials -->
<section class="py-5 bg-white">
    <div class="container text-center">
        <h6 class="text-uppercase text-muted font-weight-bold">Student Experiences</h6>
        <h2 class="font-weight-bold" style="color: var(--primary-emerald);">Transforming Lives Through Authentic Knowledge</h2>
        <div style="width: 60px; height: 3px; background: var(--accent-gold); margin: 10px auto 40px;"></div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-sm text-left h-100">
                    <div class="text-warning mb-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="font-italic text-muted">
                        "The Namaz Translation Workshop completely changed how I stand before Allah. For the first time in my life, my tears flow in Ruku and Sajdah because I actually understand what I am reciting. And my ₹99 deposit was promptly refunded after the assessment!"
                    </p>
                    <div class="font-weight-bold text-dark">— Brother Zeeshan A., Bangalore</div>
                    <small class="text-muted">Namaz Workshop Graduate</small>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-sm text-left h-100">
                    <div class="text-warning mb-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="font-italic text-muted">
                        "As a homemaker and mother, joining a traditional offline madrasa was impossible. The 4-year Alima Course at AL-Taqwa allows me to study classical Dars-e-Nizami with experienced Alimaat from home. The portal recordings are a blessing."
                    </p>
                    <div class="font-weight-bold text-dark">— Sister Fatima K., Hyderabad</div>
                    <small class="text-muted">Alima Course Year 2 Student</small>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-sm text-left h-100">
                    <div class="text-warning mb-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="font-italic text-muted">
                        "The daily Hifz tracker is so motivating. Every day after Fajr, my Ustadh listens to my Sabaq, Sabqi, and Manzil, logs the remarks, and I can track my memorization progress towards completing all 30 Juz inshaAllah."
                    </p>
                    <div class="font-weight-bold text-dark">— Brother Bilal M., Delhi</div>
                    <small class="text-muted">Advanced Hifz Program</small>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
