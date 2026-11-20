@extends('layouts.master')
@section('page_title', 'Hifz-ul-Qur\'an Daily Progress Tracker')

@section('content')

<div class="row">
    <!-- Daily Entry Form (Ustadh / Teacher) -->
    <div class="col-md-5">
        <div class="card">
            <div class="card-header" style="background-color: #064E3B; color: #fff;">
                <h6 class="card-title text-white font-weight-bold mb-0">
                    <i class="icon-book mr-2 text-warning"></i> Log Daily Sabaq / Sabqi / Manzil
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('hifz.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Select Student:</label>
                        <select name="student_id" class="form-control select" required>
                            @foreach($students as $st)
                                @if($st->user)
                                    <option value="{{ $st->user_id }}">{{ $st->user->name }} ({{ $st->adm_no ?: 'ID: '.$st->user_id }})</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6 form-group">
                            <label class="font-weight-bold">Date:</label>
                            <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-6 form-group">
                            <label class="font-weight-bold">Attendance:</label>
                            <select name="attendance_status" class="form-control">
                                <option value="present">Present</option>
                                <option value="absent">Absent</option>
                                <option value="excused">Excused</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Sabaq (New Lesson):</label>
                        <input type="text" name="sabaq_surah_ayah" class="form-control" placeholder="e.g. Surah Al-Baqarah Ayah 1-15" required>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Sabqi Status (Recent Revision):</label>
                        <select name="sabqi_status" class="form-control" required>
                            <option value="Excellent">Mumtaz (Excellent - 0 Mistakes)</option>
                            <option value="Good">Jayyid Jiddan (Very Good - 1-2 Stumbles)</option>
                            <option value="Fair">Jayyid (Fair - Needs revision)</option>
                            <option value="Needs Work">Da'eef (Repeated mistakes)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Manzil (Back Revision Juz Range):</label>
                        <input type="text" name="manzil_juz" class="form-control" placeholder="e.g. Juz 29, Quarter 1 to 3">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Ustadh Remarks & Advice:</label>
                        <textarea name="ustadh_remarks" class="form-control" rows="2" placeholder="e.g. Good Tarteel. Focus on Ghunnah of Meem Mushaddadah."></textarea>
                    </div>

                    <button type="submit" class="btn btn-block btn-success font-weight-bold shadow-sm">
                        <i class="icon-floppy-disk mr-1"></i> Save Hifz Record
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Hifz Logs History Table -->
    <div class="col-md-7">
        <div class="card">
            <div class="card-header header-elements-inline" style="background-color: #064E3B; color: #fff;">
                <h6 class="card-title text-white font-weight-bold mb-0">
                    <i class="icon-history mr-2 text-warning"></i> Recent Memorization Entries
                </h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Date / Student</th>
                                <th>Sabaq & Sabqi</th>
                                <th>Manzil</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                                <tr>
                                    <td>
                                        <strong>{{ $log->student ? $log->student->name : 'Student' }}</strong>
                                        <div class="small text-muted">{{ $log->date ? $log->date->format('d M, Y') : '' }}</div>
                                    </td>
                                    <td>
                                        <div class="font-weight-semibold text-dark">{{ $log->sabaq_surah_ayah }}</div>
                                        <span class="badge badge-{{ $log->sabqi_status === 'Excellent' ? 'success' : 'warning' }}">
                                            {{ $log->sabqi_status }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="small text-muted">{{ $log->manzil_juz ?: '-' }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $log->ustadh_remarks ?: '-' }}</small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        No Hifz records logged yet today.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
