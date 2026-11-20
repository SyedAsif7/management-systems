<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $session->title }} — Live Classroom | AL-Taqwa Institute</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #022c22;
            color: #ffffff;
            font-family: 'Outfit', sans-serif, system-ui;
        }
        .header-bar {
            background-color: #064E3B;
            border-bottom: 2px solid #D4AF37;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .classroom-frame {
            width: 100%;
            height: calc(100vh - 65px);
            border: none;
        }
    </style>
</head>
<body>

    <div class="header-bar">
        <div class="d-flex align-items-center">
            <span class="badge badge-warning text-dark font-weight-bold mr-3">
                <i class="fas fa-video mr-1"></i> LIVE
            </span>
            <div>
                <h5 class="mb-0 font-weight-bold text-white">{{ $session->title }}</h5>
                <small class="text-white-50">
                    {{ $session->batch ? $session->batch->name : 'AL-Taqwa Cohort' }} &middot; Room: 
                    <span class="text-warning font-monospace">{{ $session->effective_room_id }}</span>
                </small>
            </div>
        </div>
        <div>
            <a href="{{ $session->effective_meeting_url }}" target="_blank" class="btn btn-sm btn-outline-warning mr-2">
                <i class="fas fa-external-link-alt mr-1"></i> Open in New Window
            </a>
            <a href="{{ route('live_sessions.index') }}" class="btn btn-sm btn-danger">
                <i class="fas fa-times mr-1"></i> Exit Class
            </a>
        </div>
    </div>

    <iframe 
        src="{{ $session->effective_meeting_url }}" 
        class="classroom-frame" 
        allow="camera; microphone; fullscreen; display-capture; autoplay"
        title="AL-Taqwa Live Classroom">
    </iframe>

</body>
</html>
