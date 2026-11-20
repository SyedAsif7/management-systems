@extends('layouts.storefront')

@section('title', 'Secure Checkout — ' . $course->name)

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg p-4" style="border-radius: 16px;">
                <div class="text-center pb-3 border-bottom mb-4">
                    <span class="badge badge-warning text-dark font-weight-bold px-3 py-1 mb-2">SECURE PAYMENT</span>
                    <h3 class="font-weight-bold" style="color: var(--primary-emerald);">Confirm Your Enrollment</h3>
                    <p class="text-muted small mb-0">AL-Taqwa Institute &middot; Razorpay Encrypted Gateway</p>
                </div>

                <!-- Order Details Card -->
                <div class="bg-light p-3 rounded mb-4">
                    <h5 class="font-weight-bold text-dark mb-1">{{ $course->name }}</h5>
                    <p class="small text-muted mb-2">{{ $course->subtitle }}</p>
                    <div class="d-flex justify-content-between text-muted small">
                        <span>Cohort / Batch:</span>
                        <strong class="text-dark">{{ $batch ? $batch->name : 'Upcoming Cohort' }}</strong>
                    </div>
                    <div class="d-flex justify-content-between text-muted small mt-1">
                        <span>Program Duration:</span>
                        <strong class="text-dark">{{ $course->duration_label ?: 'Standard' }}</strong>
                    </div>
                    <div class="d-flex justify-content-between text-muted small mt-1">
                        <span>Fee Structure:</span>
                        <strong class="text-dark text-capitalize">{{ str_replace('_', ' ', $course->fee_type) }}</strong>
                    </div>
                </div>

                @if($course->fee_type === 'refundable_deposit')
                    <div class="alert alert-info py-2 px-3 small mb-4">
                        <i class="fas fa-undo-alt mr-1"></i> <strong>100% Refundable:</strong> Score &ge;{{ $course->refund_threshold_percentage }}% on the final workshop assessment to receive a full refund.
                    </div>
                @endif

                <!-- Payment Breakdown -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Course Tuition:</span>
                        <span>₹{{ number_format($course->selling_price, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">GST & Taxes:</span>
                        <span class="text-success font-weight-bold">Included</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="font-weight-bold mb-0">Total Payable:</h5>
                        <h4 class="font-weight-bold mb-0" style="color: var(--primary-emerald);">
                            ₹{{ number_format($course->selling_price, 2) }}
                        </h4>
                    </div>
                </div>

                <!-- Razorpay Checkout Trigger -->
                <button id="rzp-button" class="btn btn-gold btn-lg btn-block font-weight-bold shadow mb-3">
                    <i class="fas fa-lock mr-2"></i> Pay ₹{{ number_format($course->selling_price, 0) }} via Razorpay
                </button>

                <div class="text-center">
                    <small class="text-muted">
                        <i class="fab fa-google-pay mr-2 fa-lg"></i>
                        <i class="fab fa-amazon-pay mr-2 fa-lg"></i>
                        <i class="fas fa-credit-card mr-2 fa-lg"></i>
                        UPI / NetBanking / Cards
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Razorpay Checkout Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('rzp-button').onclick = function(e){
        e.preventDefault();

        var options = {
            "key": "{{ env('RAZORPAY_KEY', 'rzp_test_ALTAQWA') }}",
            "amount": "{{ $course->selling_price * 100 }}", // in paise
            "currency": "INR",
            "name": "AL-Taqwa Institute",
            "description": "{{ $course->name }}",
            "image": "https://images.unsplash.com/photo-1542816417-0983c9c9ad53?auto=format&fit=crop&w=200&q=80",
            "handler": function (response){
                // Send payment ID to backend capture endpoint
                fetch("{{ route('enrollments.capture_razorpay') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        course_id: "{{ $course->id }}",
                        razorpay_payment_id: response.razorpay_payment_id,
                        amount: "{{ $course->selling_price }}"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = data.redirect_url;
                    } else {
                        alert('Payment processed, but enrollment encountered an issue: ' + data.message);
                    }
                })
                .catch(err => {
                    console.error(err);
                    window.location.href = "{{ route('enrollments.my_courses') }}";
                });
            },
            "prefill": {
                "name": "{{ Auth::user()->name }}",
                "email": "{{ Auth::user()->email }}",
                "contact": "{{ Auth::user()->phone }}"
            },
            "theme": {
                "color": "#064E3B"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response){
            alert("Payment failed: " + response.error.description);
        });
        rzp1.open();
    }
</script>
@endsection
