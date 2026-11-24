@extends('layouts.storefront')

@section('title', 'Secure Checkout — ' . $course->name)

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg p-4" style="border-radius: 16px; border: 1.5px solid var(--border);">
                <div class="text-center pb-3 border-bottom mb-4">
                    <span class="badge badge-warning text-dark font-weight-bold px-3 py-1 mb-2">SECURE PAYMENT</span>
                    <h3 class="font-weight-bold" style="color: var(--primary);">Confirm Your Enrollment</h3>
                    <p class="text-muted small mb-0">AL-TAQWA Institute &middot; Razorpay Encrypted Gateway</p>
                </div>

                <!-- Order Details Card -->
                <div class="bg-light p-3 rounded mb-4" style="border: 1px solid var(--border);">
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
                    <div class="alert alert-info py-2 px-3 small mb-4" style="background: #EAF4F0; border-color: var(--primary-light); color: var(--primary-dark);">
                        <i class="fas fa-undo-alt mr-1"></i> <strong>100% Refundable:</strong> Score &ge;{{ $course->refund_threshold_percentage }}% on the final workshop assessment to receive a full refund.
                    </div>
                @endif

                <!-- Taqwa Coin Redemption -->
                @if(isset($coinsBalance) && $coinsBalance > 0 && isset($coinDiscount) && $coinDiscount['discount_amount'] > 0)
                <div class="card p-3 mb-4" style="background: linear-gradient(135deg, #FAF9F5 0%, #F3EFE6 100%); border: 1.5px solid var(--gold); border-radius: 12px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span style="font-size: 1.5rem; margin-right: 10px;">🪙</span>
                            <div>
                                <strong class="d-block text-dark" style="font-size: 0.92rem;">Redeem Taqwa Coins</strong>
                                <small class="text-muted">You have <strong>{{ $coinsBalance }} Coins</strong>. (10 Coins = ₹1, up to 20% off)</small>
                            </div>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="redeemCoinsSwitch" checked>
                            <label class="custom-control-label font-weight-bold text-success" for="redeemCoinsSwitch" style="cursor: pointer;">
                                -₹{{ number_format($coinDiscount['discount_amount'], 2) }}
                            </label>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Payment Breakdown -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Course Tuition:</span>
                        <span>₹{{ number_format($course->selling_price, 2) }}</span>
                    </div>

                    @if(isset($coinDiscount) && $coinDiscount['discount_amount'] > 0)
                    <div class="d-flex justify-content-between mb-2" id="coinDiscountRow">
                        <span class="text-success font-weight-bold">
                            <span style="font-size: 0.9rem;">🪙</span> Taqwa Coin Discount ({{ $coinDiscount['coins_used'] }} Coins):
                        </span>
                        <span class="text-success font-weight-bold">-₹{{ number_format($coinDiscount['discount_amount'], 2) }}</span>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">GST & Taxes:</span>
                        <span class="text-success font-weight-bold">Included</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="font-weight-bold mb-0">Total Payable:</h5>
                        <h4 class="font-weight-bold mb-0" id="totalPayableDisplay" style="color: var(--primary);">
                            ₹{{ number_format(isset($coinDiscount) && $coinDiscount['discount_amount'] > 0 ? $coinDiscount['final_price'] : $course->selling_price, 2) }}
                        </h4>
                    </div>
                </div>

                <!-- Razorpay Checkout Trigger -->
                <button id="rzp-button" class="btn btn-gold btn-lg btn-block font-weight-bold shadow mb-3">
                    <i class="fas fa-lock mr-2"></i> <span id="payButtonText">Pay ₹{{ number_format(isset($coinDiscount) && $coinDiscount['discount_amount'] > 0 ? $coinDiscount['final_price'] : $course->selling_price, 2) }} via Razorpay</span>
                </button>

                <div class="text-center">
                    <small class="text-muted">
                        <i class="fab fa-google-pay mr-2 fa-lg"></i>
                        <i class="fab fa-amazon-pay mr-2 fa-lg"></i>
                        <i class="fas fa-credit-card mr-2 fa-lg"></i>
                        UPI / NetBanking / Cards Encrypted
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
    const basePrice = {{ (float) $course->selling_price }};
    const discountAmount = {{ isset($coinDiscount) ? (float) $coinDiscount['discount_amount'] : 0 }};
    const coinsUsedTotal = {{ isset($coinDiscount) ? (int) $coinDiscount['coins_used'] : 0 }};

    let isCoinRedeemed = {{ (isset($coinDiscount) && $coinDiscount['discount_amount'] > 0) ? 'true' : 'false' }};
    let currentPayable = isCoinRedeemed ? (basePrice - discountAmount) : basePrice;
    let coinsApplied = isCoinRedeemed ? coinsUsedTotal : 0;

    const coinSwitch = document.getElementById('redeemCoinsSwitch');
    if (coinSwitch) {
        coinSwitch.addEventListener('change', function() {
            isCoinRedeemed = this.checked;
            const discountRow = document.getElementById('coinDiscountRow');
            if (isCoinRedeemed) {
                currentPayable = Math.max(0, basePrice - discountAmount);
                coinsApplied = coinsUsedTotal;
                if (discountRow) discountRow.style.display = 'flex';
            } else {
                currentPayable = basePrice;
                coinsApplied = 0;
                if (discountRow) discountRow.style.display = 'none';
            }
            document.getElementById('totalPayableDisplay').textContent = '₹' + currentPayable.toFixed(2);
            document.getElementById('payButtonText').textContent = 'Pay ₹' + currentPayable.toFixed(2) + ' via Razorpay';
        });
    }

    document.getElementById('rzp-button').onclick = function(e){
        e.preventDefault();

        // If discounted to 0
        if (currentPayable <= 0) {
            fetch("{{ route('enrollments.capture_razorpay') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    course_id: "{{ $course->id }}",
                    razorpay_payment_id: 'COIN-FREE-' + Math.random().toString(36).substring(7).toUpperCase(),
                    amount: 0,
                    coins_used: coinsApplied
                })
            })
            .then(res => res.json())
            .then(data => {
                window.location.href = data.redirect_url;
            });
            return;
        }

        var options = {
            "key": "{{ env('RAZORPAY_KEY', 'rzp_test_ALTAQWA') }}",
            "amount": Math.round(currentPayable * 100), // in paise
            "currency": "INR",
            "name": "AL-TAQWA Institute",
            "description": "{{ $course->name }}",
            "image": "{{ asset('assets/images/altaqwa-logo.png') }}",
            "handler": function (response){
                fetch("{{ route('enrollments.capture_razorpay') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        course_id: "{{ $course->id }}",
                        razorpay_payment_id: response.razorpay_payment_id,
                        amount: currentPayable,
                        coins_used: coinsApplied
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
                "color": "#063D2E"
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
