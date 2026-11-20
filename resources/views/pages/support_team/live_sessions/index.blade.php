@extends('layouts.master')
@section('page_title', 'Live Sessions & Recordings Hub')

@section('content')

<div class="card">
    <div class="card-header header-elements-inline" style="background-color: #064E3B; color: #fff;">
        <h5 class="card-title text-white font-weight-bold">
            <i class="icon-video-camera mr-2 text-warning"></i> Unified Live Classroom & Recording Hub
        </h5>
        @if(in_array(Auth::user()->user_type, ['admin', 'super_admin', 'teacher']))
            <button class="btn btn-warning btn-sm font-weight-bold" data-toggle="modal" data-target="#scheduleSessionModal">
                <i class="icon-plus2 mr-1"></i> Schedule Live Class
            </button>
        @endif
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight mb-3">
            <li class="nav-item">
                <a href="#live-now" class="nav-link active" data-toggle="tab">
                    <i class="icon-live text-danger mr-2"></i> Upcoming & Live Classes ({{ count($sessions) }})
                </a>
            </li>
            <li class="nav-item">
                <a href="#recordings-tab" class="nav-link" data-toggle="tab">
                    <i class="icon-play-circle text-info mr-2"></i> Class Replays & Study Notes ({{ count($pastRecordings) }})
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Tab 1: Live & Upcoming Sessions -->
            <div class="tab-pane fade show active" id="live-now">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th>Class / Batch</th>
                                <th>Session Title</th>
                                <th>Date & Time</th>
                                <th>Room ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sessions as $s)
                                <tr>
                                    <td>
                                        <strong>{{ $s->batch ? $s->batch->name : 'General' }}</strong>
                                        @if($s->batch && $s->batch->my_class)
                                            <div class="small text-muted">{{ $s->batch->my_class->name }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="font-weight-semibold text-dark">{{ $s->title }}</span>
                                    </td>
                                    <td>
                                        <div><i class="icon-calendar text-warning mr-1"></i> {{ $s->session_date ? $s->session_date->format('d M, Y') : 'Scheduled' }}</div>
                                        <div class="small text-muted"><i class="icon-alarm mr-1"></i> {{ $s->start_time }} - {{ $s->end_time ?: 'TBD' }}</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary px-2 py-1 font-monospace">
                                            <i class="icon-hash mr-1"></i> {{ $s->effective_room_id }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('live_sessions.join', $s->id) }}" class="btn btn-sm btn-success font-weight-bold shadow-sm" target="_blank">
                                            <i class="icon-enter mr-1"></i> Join Room
                                        </a>
                                        @if(in_array(Auth::user()->user_type, ['admin', 'super_admin', 'teacher']))
                                            <button class="btn btn-sm btn-outline-info ml-1" data-toggle="modal" data-target="#attachRecordingModal{{ $s->id }}">
                                                <i class="icon-attachment mr-1"></i> Attach Recording
                                            </button>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Modal to attach recording -->
                                @if(in_array(Auth::user()->user_type, ['admin', 'super_admin', 'teacher']))
                                    <div class="modal fade" id="attachRecordingModal{{ $s->id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('live_sessions.update_recording', $s->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header bg-dark text-white">
                                                        <h6 class="modal-title font-weight-bold">Attach Session Replay & Study Notes</h6>
                                                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Recording URL (YouTube / Drive / Zoom):</label>
                                                            <input type="url" name="recording_url" class="form-control" placeholder="https://..." value="{{ $s->recording_url }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Study Notes PDF URL (optional):</label>
                                                            <input type="url" name="notes_pdf_url" class="form-control" placeholder="https://..." value="{{ $s->notes_pdf_url }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Save Recording</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="icon-camera-slash icon-2x mb-2 text-muted"></i>
                                        <div>No live classes currently scheduled for your batch.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab 2: Past Replays & Study Notes -->
            <div class="tab-pane fade" id="recordings-tab">
                <div class="row">
                    @forelse($pastRecordings as $rec)
                        <div class="col-md-4 mb-3">
                            <div class="card border shadow-sm h-100">
                                <div class="card-body">
                                    <div class="badge badge-info mb-2">{{ $rec->session_date ? $rec->session_date->format('d M Y') : 'Session' }}</div>
                                    <h6 class="font-weight-bold text-dark mb-1">{{ $rec->title }}</h6>
                                    <p class="small text-muted mb-3">{{ $rec->batch ? $rec->batch->name : 'Batch' }}</p>

                                    <div class="d-flex gap-2">
                                        <a href="{{ $rec->recording_url }}" target="_blank" class="btn btn-sm btn-outline-danger font-weight-bold mr-2">
                                            <i class="icon-play3 mr-1"></i> Watch Replay
                                        </a>
                                        @if($rec->notes_pdf_url)
                                            <a href="{{ $rec->notes_pdf_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="icon-file-pdf mr-1"></i> Notes
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <div>No recorded lectures available yet.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal to Schedule New Live Class (Ustadh / Admin) -->
@if(in_array(Auth::user()->user_type, ['admin', 'super_admin', 'teacher']))
    <div class="modal fade" id="scheduleSessionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('live_sessions.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-dark text-white">
                        <h6 class="modal-title font-weight-bold">Schedule Live Classroom Session</h6>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Select Cohort / Batch:</label>
                            <select name="section_id" class="form-control" required>
                                @foreach($sections as $sec)
                                    <option value="{{ $sec->id }}">
                                        {{ $sec->my_class ? $sec->my_class->name : 'Course' }} — {{ $sec->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Session Title / Topic:</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Surah Al-Baqarah Ayah 21-25 Explanation" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold">Date:</label>
                                <input type="date" name="session_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold">Start Time:</label>
                                <input type="time" name="start_time" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Single Room ID (Leave blank to use batch default):</label>
                            <input type="text" name="live_room_id" class="form-control font-monospace" placeholder="altaqwa-room-name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success font-weight-bold">Schedule Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

@endsection
