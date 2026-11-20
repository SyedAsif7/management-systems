@extends('layouts.master')
@section('page_title', 'My Enrolled Courses')

@section('content')

<div class="card">
    <div class="card-header header-elements-inline" style="background-color: #064E3B; color: #fff;">
        <h5 class="card-title text-white font-weight-bold">
            <i class="icon-graduation2 mr-2 text-warning"></i> My Enrolled Programs & Active Batches
        </h5>
        <a href="{{ route('storefront.courses') }}" class="btn btn-warning btn-sm font-weight-bold">
            <i class="icon-plus2 mr-1"></i> Browse More Courses
        </a>
    </div>

    <div class="card-body">
        <div class="row">
            @forelse($enrollments as $enr)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card border shadow-sm h-100">
                        <img src="{{ $enr->course && $enr->course->thumbnail_url ? $enr->course->thumbnail_url : 'https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&w=600&q=80' }}" 
                             class="card-img-top" 
                             style="height: 150px; object-fit: cover;" 
                             alt="Course">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge badge-success text-uppercase">{{ $enr->status }}</span>
                                    <span class="small text-muted">{{ $enr->course ? $enr->course->duration_label : '' }}</span>
                                </div>
                                <h6 class="font-weight-bold text-dark mb-1">
                                    {{ $enr->course ? $enr->course->name : 'Program' }}
                                </h6>
                                <p class="small text-muted mb-3">
                                    Batch: <strong>{{ $enr->batch ? $enr->batch->name : 'Active Cohort' }}</strong>
                                </p>
                                @if($enr->valid_until)
                                    <div class="small text-info mb-2">
                                        <i class="icon-alarm mr-1"></i> Valid Until: {{ $enr->valid_until->format('d M, Y') }}
                                    </div>
                                @endif
                                @if($enr->eligible_for_refund)
                                    <div class="badge badge-info p-2 mb-2 d-block text-left">
                                        <i class="icon-checkmark-circle mr-1"></i> <strong>Refund Eligible!</strong> Status: {{ ucfirst($enr->refund_status) }}
                                    </div>
                                @endif
                            </div>

                            <div class="pt-3 border-top mt-2">
                                <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-success btn-block font-weight-bold shadow-sm mb-1">
                                    <i class="icon-video-camera mr-1"></i> Enter Live Class
                                </a>
                                @if($enr->order_id)
                                    <a href="{{ route('storefront.verify_certificate', $enr->order_id) }}" class="btn btn-sm btn-outline-dark btn-block" target="_blank">
                                        <i class="icon-certificate mr-1"></i> View Certificate
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="icon-books icon-3x text-muted mb-3"></i>
                    <h5 class="font-weight-bold text-muted">You are not currently enrolled in any courses.</h5>
                    <p class="text-muted small">Explore our 12 certified Islamic courses and enroll today.</p>
                    <a href="{{ route('storefront.courses') }}" class="btn btn-warning font-weight-bold">
                        Browse Course Catalog
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
