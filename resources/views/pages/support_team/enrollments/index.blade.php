@extends('layouts.master')
@section('page_title', 'All Student Enrollments')

@section('content')

<div class="card">
    <div class="card-header header-elements-inline" style="background-color: #064E3B; color: #fff;">
        <h5 class="card-title text-white font-weight-bold">
            <i class="icon-users mr-2 text-warning"></i> Master Student Enrollment Registry
        </h5>
        @if(in_array(Auth::user()->user_type, ['admin', 'super_admin', 'accountant']))
            <a href="{{ route('enrollments.refund_queue') }}" class="btn btn-warning btn-sm font-weight-bold">
                <i class="icon-cash mr-1"></i> Refund Queue
            </a>
        @endif
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Batch</th>
                        <th>Fee Type</th>
                        <th>Amount Paid</th>
                        <th>Status</th>
                        <th>Valid Until</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enr)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $enr->student ? $enr->student->name : 'N/A' }}</strong>
                                <div class="small text-muted">{{ $enr->student ? $enr->student->email : '' }}</div>
                            </td>
                            <td>{{ $enr->course ? $enr->course->name : 'N/A' }}</td>
                            <td>{{ $enr->batch ? $enr->batch->name : 'N/A' }}</td>
                            <td><span class="badge badge-info">{{ $enr->fee_type }}</span></td>
                            <td><strong>₹{{ number_format($enr->amount_paid, 2) }}</strong></td>
                            <td>
                                <span class="badge badge-{{ $enr->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($enr->status) }}
                                </span>
                            </td>
                            <td>{{ $enr->valid_until ? $enr->valid_until->format('d M Y') : 'Lifetime / Full' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                No active enrollments recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $enrollments->links() }}
        </div>
    </div>
</div>

@endsection
