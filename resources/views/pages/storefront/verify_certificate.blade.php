@extends('layouts.storefront')

@section('title', 'Official Certificate Verification — AL-TAQWA Institute')

@section('content')

<!-- Subhero Header Banner -->
<section class="subhero">
    <div class="container text-center">
        <span class="subhero-eyebrow">Academic Integrity & Sanad</span>
        <h1>Certificate & Credential Verification</h1>
        <p class="mx-auto">Verify the authenticity of graduation credentials, Ijazah, and completion certificates issued by AL-TAQWA Institute of Islamic Studies.</p>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Search Input Box -->
            <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 34px 28px; box-shadow: 0 4px 18px rgba(6, 61, 46, 0.06); margin-bottom: 28px;">
                <form action="{{ route('storefront.verify_certificate') }}" method="GET">
                    <label style="font-weight: 700; color: var(--primary-dark); font-size: 0.92rem; display: block; margin-bottom: 8px;">
                        Enter Certificate Verification Code or Order ID:
                    </label>
                    <div class="input-group mb-2">
                        <input type="text" 
                               name="code" 
                               class="form-control form-control-lg text-uppercase" 
                               placeholder="e.g. ALT-1001 or certificate order code" 
                               value="{{ $verifyCode }}" 
                               required
                               style="border: 1.5px solid var(--border); border-radius: var(--radius-sm) 0 0 var(--radius-sm); font-size: 1rem; padding: 12px 16px;">
                        <div class="input-group-append">
                            <button class="btn btn-gold" type="submit" style="border-radius: 0 var(--radius-sm) var(--radius-sm) 0; padding: 0 24px;">
                                <i class="fas fa-search mr-1"></i> Verify Credential
                            </button>
                        </div>
                    </div>
                    <small style="color: var(--muted); font-size: 0.8rem;">
                        You can also scan the QR code printed on the official digital certificate or transcript.
                    </small>
                </form>
            </div>

            <!-- Verification Result -->
            @if($verifyCode)
                @if($enrollment)
                    <div style="background: #FFFFFF; border: 2px solid var(--gold); border-radius: var(--radius-lg); padding: 36px 30px; box-shadow: 0 8px 30px rgba(6, 61, 46, 0.1); text-align: center;">
                        <div style="width: 72px; height: 72px; border-radius: 50%; background: var(--primary-surface); color: var(--primary); display: grid; place-items: center; margin: 0 auto 16px; font-size: 2.2rem; border: 2px solid var(--gold);">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span class="course-pill pill-refundable" style="font-size: 0.82rem; padding: 6px 16px; margin-bottom: 16px; display: inline-block;">
                            <i class="fas fa-shield-alt mr-1"></i> Verified & Authentic Sanad
                        </span>
                        <h3 style="font-family: var(--font-serif); font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 4px;">
                            {{ $enrollment->student ? $enrollment->student->name : 'Registered Student' }}
                        </h3>
                        <p style="color: var(--muted); font-size: 0.95rem; margin-bottom: 20px;">
                            has successfully enrolled, fulfilled course requirements, and completed
                        </p>
                        
                        <div style="background: var(--cream-alt); border-radius: var(--radius-md); padding: 20px; margin-bottom: 22px; border: 1px solid var(--border);">
                            <h4 style="font-family: var(--font-serif); font-size: 1.35rem; color: var(--primary); margin-bottom: 6px;">
                                {{ $enrollment->course ? $enrollment->course->name : 'Academic Course' }}
                            </h4>
                            <div style="font-size: 0.85rem; color: var(--muted);">
                                Program Duration: <b>{{ $enrollment->course ? $enrollment->course->duration_label : 'Certified' }}</b> &middot; Status: <strong style="color: var(--primary); text-transform: uppercase;">{{ $enrollment->status }}</strong>
                            </div>
                        </div>

                        <div class="row text-left border-top pt-3" style="border-color: var(--border) !important; font-size: 0.84rem; color: var(--muted);">
                            <div class="col-6">
                                <strong>Certificate Reference:</strong><br>
                                <span style="color: var(--primary-dark); font-weight: 700;">{{ $verifyCode }}</span>
                            </div>
                            <div class="col-6 text-right">
                                <strong>Issuing Institution:</strong><br>
                                <span style="color: var(--primary-dark); font-weight: 700;">AL-TAQWA Institute</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div style="background: #FFFFFF; border: 1.5px solid #E57373; border-radius: var(--radius-lg); padding: 32px 26px; box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05); text-align: center;">
                        <div style="color: #D32F2F; font-size: 2.5rem; margin-bottom: 12px;">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h4 style="font-family: var(--font-serif); font-size: 1.4rem; color: var(--primary-dark); margin-bottom: 8px;">
                            No Record Found for Code: "{{ $verifyCode }}"
                        </h4>
                        <p style="color: var(--muted); font-size: 0.9rem; margin-bottom: 0;">
                            Please check the certificate code carefully and re-enter, or contact <a href="mailto:officialaltaqwa@gmail.com" style="color: var(--gold-dark); font-weight: 700;">officialaltaqwa@gmail.com</a> for manual transcript lookup.
                        </p>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

@endsection
