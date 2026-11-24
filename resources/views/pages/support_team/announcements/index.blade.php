@extends('layouts.master')
@section('page_title', 'Manage Announcement Banners')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline" style="background: linear-gradient(135deg, #063D2E 0%, #0B5742 100%); color: #FFFFFF;">
        <h5 class="card-title text-white font-weight-bold">
            <i class="icon-megaphone mr-2 text-warning"></i> Dynamic Announcement Banners & Sliders
        </h5>
        <div class="header-elements">
            <button type="button" class="btn btn-gold btn-sm" data-toggle="modal" data-target="#createBannerModal">
                <i class="icon-plus3 mr-1"></i> Add Announcement Banner
            </button>
        </div>
    </div>

    <div class="card-body">
        <p class="text-muted font-size-sm mb-3">
            Announcement banners display right below the main navbar on both the public storefront and the cross-platform mobile apps. Active banners auto-rotate every 5 seconds.
        </p>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="background: #F3EFE6;">
                        <th>Order</th>
                        <th>Badge Text</th>
                        <th>Banner Title & Subtitle</th>
                        <th>Action CTA</th>
                        <th>Status</th>
                        <th class="text-center">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $a)
                    <tr>
                        <td class="font-weight-bold text-center" style="width: 60px;">{{ $a->sort_order }}</td>
                        <td>
                            @if($a->badge_text)
                                <span class="badge px-2 py-1 text-dark" style="background: #C9A35A; font-weight: 700;">
                                    {{ $a->badge_text }}
                                </span>
                            @else
                                <span class="text-muted small">None</span>
                            @endif
                        </td>
                        <td>
                            <strong class="d-block font-size-md text-dark">{{ $a->title }}</strong>
                            <small class="text-muted">{{ $a->subtitle ?: 'No subtitle' }}</small>
                        </td>
                        <td>
                            @if($a->cta_text && $a->cta_link)
                                <a href="{{ $a->cta_link }}" target="_blank" class="badge badge-light border">
                                    {{ $a->cta_text }} <i class="icon-arrow-up-right2 ml-1"></i>
                                </a>
                            @else
                                <span class="text-muted small">None</span>
                            @endif
                        </td>
                        <td>
                            @if($a->is_active)
                                <span class="badge badge-success px-2 py-1">Active</span>
                            @else
                                <span class="badge badge-secondary px-2 py-1">Disabled</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <form action="{{ route('announcements.toggle', $a->id) }}" method="POST" class="mr-1">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-{{ $a->is_active ? 'warning' : 'success' }}" title="Toggle Status">
                                        <i class="icon-switch"></i>
                                    </button>
                                </form>

                                <button type="button" class="btn btn-sm btn-outline-primary mr-1" data-toggle="modal" data-target="#editModal{{ $a->id }}">
                                    <i class="icon-pencil7"></i>
                                </button>

                                <form action="{{ route('announcements.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="icon-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Banner Modal -->
                    <div id="editModal{{ $a->id }}" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                    <h6 class="modal-title"><i class="icon-pencil7 mr-2"></i> Edit Announcement Banner</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{ route('announcements.update', $a->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Banner Title *</label>
                                            <input type="text" name="title" class="form-control" value="{{ $a->title }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Subtitle</label>
                                            <input type="text" name="subtitle" class="form-control" value="{{ $a->subtitle }}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Badge Text</label>
                                                <input type="text" name="badge_text" class="form-control" value="{{ $a->badge_text }}" placeholder="e.g. NEW BATCH">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">Sort Order</label>
                                                <input type="number" name="sort_order" class="form-control" value="{{ $a->sort_order }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">CTA Button Text</label>
                                                <input type="text" name="cta_text" class="form-control" value="{{ $a->cta_text }}" placeholder="e.g. Enroll Now ↗">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="font-weight-bold">CTA Link URL</label>
                                                <input type="text" name="cta_link" class="form-control" value="{{ $a->cta_link }}" placeholder="e.g. /courses or /#admissions">
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ $a->is_active ? 'checked' : '' }}>
                                                Display this banner publicly
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-gold">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            No announcements found. Click "Add Announcement Banner" above to publish your first banner!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Banner Modal -->
<div id="createBannerModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h6 class="modal-title"><i class="icon-plus3 mr-2"></i> Create Announcement Banner</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('announcements.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Banner Headline / Title *</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. 2026-2027 Admissions Open" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" placeholder="e.g. Live classes with verified scholars worldwide">
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Badge Text</label>
                            <input type="text" name="badge_text" class="form-control" placeholder="e.g. SCHOLARSHIP or NEW BATCH">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">CTA Button Text</label>
                            <input type="text" name="cta_text" class="form-control" placeholder="e.g. Explore Courses ↗">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">CTA Link URL</label>
                            <input type="text" name="cta_link" class="form-control" placeholder="e.g. /courses or /#admissions">
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
                            Make this banner active immediately
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gold">Publish Banner</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
