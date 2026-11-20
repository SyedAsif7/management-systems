@extends('layouts.master')
@section('page_title', 'Refund Eligibility Review Queue')

@section('content')

<div class="card">
    <div class="card-header header-elements-inline" style="background-color: #064E3B; color: #fff;">
        <h5 class="card-title text-white font-weight-bold">
            <i class="icon-cash3 mr-2 text-warning"></i> Automated Refund Eligibility Queue
        </h5>
        <span class="badge badge-warning font-weight-bold">{{ count($pendingRefunds) }} Pending Actions</span>
    </div>

    <div class="card-body">
        <p class="text-muted">
            The students below enrolled in subsidized <strong>Refundable Deposit</strong> workshops (e.g. <em>Free Namaz Translation Workshop</em> or <em>Basic Islamic Beliefs</em>) and met the score threshold on their final evaluation.
        </p>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>Student Name & Contact</th>
                        <th>Course</th>
                        <th>Deposit Amount</th>
                        <th>Original Order ID</th>
                        <th>Eligibility Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingRefunds as $ref)
                        <tr>
                            <td>
                                <strong>{{ $ref->student ? $ref->student->name : 'N/A' }}</strong>
                                <div class="small text-muted">{{ $ref->student ? $ref->student->email : '' }} &middot; {{ $ref->student ? $ref->student->phone : '' }}</div>
                            </td>
                            <td>
                                <span class="font-weight-semibold text-dark">{{ $ref->course ? $ref->course->name : 'N/A' }}</span>
                            </td>
                            <td>
                                <strong class="text-success">₹{{ number_format($ref->amount_paid, 2) }}</strong>
                            </td>
                            <td>
                                <span class="badge badge-secondary font-monospace">{{ $ref->order_id ?: 'MANUAL' }}</span>
                            </td>
                            <td>
                                <span class="badge badge-success px-2 py-1">
                                    <i class="icon-checkmark3 mr-1"></i> Score &ge; Threshold
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('enrollments.process_refund', $ref->id) }}" method="POST" onsubmit="return confirm('Confirm that ₹{{ $ref->amount_paid }} has been refunded to the student?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success font-weight-bold">
                                        <i class="icon-cash mr-1"></i> Mark Refunded
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="icon-checkmark-circle2 icon-2x text-success mb-2"></i>
                                <div>No pending refund requests in the queue. All eligible students have been processed!</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
