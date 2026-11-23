@extends('layouts.storefront')

@section('title', 'Official Certificate Verification — AL-Taqwa Institute')

@section('content')

<div class="py-5 text-center text-white" style="background: linear-gradient(135deg, var(--primary-emerald-dark) 0%, var(--primary-emerald) 100%);">
    <div class="container">
        <h1 class="font-weight-bold display-5 mb-2">Certificate & Credential Verification</h1>
        <p class="lead text-white-50 mb-0">Verify the authenticity of graduation credentials and completion certificates issued by AL-Taqwa Institute.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <!-- Search Input Box -->
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 12px;">
                <form action="{{ route('storefront.verify_certificate') }}" method="GET">
                    <label class="font-weight-bold text-dark">Enter Certificate Verification Code or Order ID:</label>
                    <div class="input-group mb-2">
                        <input type="text" 
                               name="code" 
                               class="form-control form-control-lg font-monospace text-uppercase" 
                               placeholder="e.g. ALTAQWA-TAFSEER-1234 or order ID" 
                               value="{{ $verifyCode }}" 
                               required>
                        <div class="input-group-append">
                            <button class="btn btn-gold px-4 font-weight-bold" type="submit">
                                <i class="fas fa-search mr-1"></i> Verify
                            </button>
                        </div>
                    </div>
                    <small class="text-muted">You can also scan the QR code printed on the physical or PDF certificate.</small>
                </form>
            </div>

            <!-- Verification Result -->
            @if($verifyCode)
                @if($enrollment)
                    <div class="card border-success shadow p-4 text-center" style="border-radius: 12px; border-width: 2px;">
                        <div class="text-success mb-3">
                            <i class="fas fa-check-circle fa-4x"></i>
                        </div>
                        <span class="badge badge-success text-uppercase font-weight-bold px-3 py-1 mx-auto mb-3">
                            <i class="fas fa-shield-alt mr-1"></i> Verified & Authentic Credential
                        </span>
                        <h4 class="font-weight-bold text-dark mb-1">{{ $enrollment->student ? $enrollment->student->name : 'Registered Student' }}</h4>
                        <p class="text-muted mb-3">has successfully enrolled & fulfilled requirements for</p>
                        
                        <div class="p-3 bg-light rounded mb-3">
                            <h5 class="font-weight-bold mb-1" style="color: var(--primary-emerald);">
                                {{ $enrollment->course ? $enrollment->course->name : 'Academic Course' }}
                            </h5>
                            <div class="small text-muted">
                                Duration: {{ $enrollment->course ? $enrollment->course->duration_label : 'Certified' }} &middot; Status: <strong class="text-success text-uppercase">{{ $enrollment->status }}</strong>
                            </div>
                        </div>

                        <div class="row text-left small text-muted border-top pt-3">
                            <div class="col-6">
                                <strong>Certificate Code:</strong><br>
                                <span class="font-monospace text-dark">{{ $verifyCode }}</span>
                            </div>
                            <div class="col-6 text-right">
                                <strong>Issued By:</strong><br>
                                <span class="text-dark">AL-Taqwa Institute</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card border-warning shadow-sm p-4 text-center" style="border-radius: 12px;">
                        <div class="text-warning mb-3">
                            <i class="fas fa-exclamation-triangle fa-3x"></i>
                        </div>
                        <h5 class="font-weight-bold text-dark">No Record Found for Code: "{{ $verifyCode }}"</h5>
                        <p class="text-muted small mb-0">Please check the characters carefully and re-enter, or contact <a href="mailto:officialaltaqwa@gmail.com">officialaltaqwa@gmail.com</a> for manual transcript lookup.</p>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>

@endsection
