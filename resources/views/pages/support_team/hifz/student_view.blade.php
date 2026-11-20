@extends('layouts.master')
@section('page_title', 'My Hifz-ul-Qur\'an Progress')

@section('content')

<div class="card">
    <div class="card-header header-elements-inline" style="background-color: #064E3B; color: #fff;">
        <h5 class="card-title text-white font-weight-bold">
            <i class="icon-book mr-2 text-warning"></i> My Memorization Daily Log & Ustadh Remarks
        </h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>Date</th>
                        <th>Sabaq (Daily Lesson)</th>
                        <th>Sabqi Evaluation</th>
                        <th>Manzil Revision</th>
                        <th>Ustadh Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>
                                <strong>{{ $log->date ? $log->date->format('d M, Y') : '' }}</strong>
                            </td>
                            <td>
                                <span class="font-weight-semibold text-dark">{{ $log->sabaq_surah_ayah }}</span>
                            </td>
                            <td>
                                <span class="badge badge-{{ $log->sabqi_status === 'Excellent' ? 'success' : 'warning' }}">
                                    {{ $log->sabqi_status }}
                                </span>
                            </td>
                            <td>
                                {{ $log->manzil_juz ?: '-' }}
                            </td>
                            <td>
                                <span class="text-muted small">{{ $log->ustadh_remarks ?: 'No remarks' }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No Hifz logs found for your profile. Once your Ustadh enters your daily recitation, it will appear here.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
