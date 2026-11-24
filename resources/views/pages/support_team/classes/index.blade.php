@extends('layouts.master')
@section('page_title', 'Manage Courses & Programs')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-bold">Manage Courses & Programs</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab"><i class="icon-books mr-1"></i> All Courses ({{ $my_classes->count() }})</a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2 mr-1"></i> Add New Course</a></li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-classes">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course Title</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Tuition Fee</th>
                                <th>Batches</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($my_classes as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="font-weight-bold text-primary">{{ $c->name }}</div>
                                        @if($c->subtitle)
                                            <small class="text-muted d-block">{{ \Illuminate\Support\Str::limit($c->subtitle, 45) }}</small>
                                        @endif
                                    </td>
                                    <td><span class="badge badge-light border">{{ $c->class_type->name }}</span></td>
                                    <td>{{ $c->duration_label ?: '—' }}</td>
                                    <td>
                                        @if($c->selling_price && $c->selling_price > 0)
                                            <span class="font-weight-semibold text-success">₹{{ number_format($c->selling_price, 0) }}</span>
                                            <small class="text-muted d-block">{{ $c->fee_type == 'monthly_subscription' ? '/ month' : 'one-time' }}</small>
                                        @else
                                            <span class="badge badge-success">Free</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $c->sections->count() }} Batches</span>
                                    </td>
                                    <td>
                                        @if($c->is_published)
                                            <span class="badge badge-success"><i class="icon-checkmark2 mr-1"></i> Published</span>
                                        @else
                                            <span class="badge badge-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('classes.edit', $c->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit Course</a>
                                                    @endif
                                                    @if(Qs::userIsSuperAdmin())
                                                    {{--Delete--}}
                                                    <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item text-danger"><i class="icon-trash"></i> Delete Course</a>
                                                    <form method="post" id="item-delete-{{ $c->id }}" action="{{ route('classes.destroy', $c->id) }}" class="hidden">@csrf @method('delete')</form>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="alert alert-info border-0 alert-dismissible mb-3">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span><i class="icon-info22 mr-1"></i> When a course is created, a default batch (Cohort 1) is automatically initialized. You can manage additional cohorts and assign instructors at <a target="_blank" href="{{ route('sections.index') }}" class="font-weight-bold text-dark">Cohorts & Batches</a>.</span>
                    </div>

                    <form class="ajax-store" method="post" action="{{ route('classes.store') }}">
                        @csrf
                        <div class="row">
                            {{-- Left Column: Basics & Pricing --}}
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Course Title <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="e.g. Diploma in Tajweed-ul-Qur'an">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Category <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Program Category" class="form-control select" name="class_type_id" id="class_type_id">
                                            @foreach($class_types as $ct)
                                                <option {{ old('class_type_id') == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Subtitle</label>
                                    <div class="col-lg-9">
                                        <input name="subtitle" value="{{ old('subtitle') }}" type="text" class="form-control" placeholder="One-line summary of learning outcomes">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Duration</label>
                                    <div class="col-lg-9">
                                        <input name="duration_label" value="{{ old('duration_label') }}" type="text" class="form-control" placeholder="e.g. 4 Years, 6 Months, 8 Weeks">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Fee Type</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="fee_type">
                                            <option value="one_time">One-Time Course Fee</option>
                                            <option value="monthly_subscription">Monthly Subscription</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Tuition Fee (₹)</label>
                                    <div class="col-lg-4">
                                        <input name="selling_price" value="{{ old('selling_price', '0') }}" type="number" step="0.01" class="form-control" placeholder="Selling Price (₹)">
                                    </div>
                                    <label class="col-lg-2 col-form-label font-weight-semibold text-right">MRP (₹)</label>
                                    <div class="col-lg-3">
                                        <input name="mrp_price" value="{{ old('mrp_price', '0') }}" type="number" step="0.01" class="form-control" placeholder="MRP (₹)">
                                    </div>
                                </div>
                            </div>

                            {{-- Right Column: Schedule & Details --}}
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Class Schedule</label>
                                    <div class="col-lg-9">
                                        <input name="class_days" value="{{ old('class_days') }}" type="text" class="form-control" placeholder="e.g. Saturday & Sunday · 07:00 PM IST">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Eligibility</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="gender_eligibility">
                                            <option value="brothers_and_sisters">Brothers & Sisters</option>
                                            <option value="sisters_only">Sisters Only</option>
                                            <option value="brothers_only">Brothers Only</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Thumbnail URL</label>
                                    <div class="col-lg-9">
                                        <input name="thumbnail_url" value="{{ old('thumbnail_url', '/assets/images/courses/tafseer-ul-quran.jpg') }}" type="text" class="form-control" placeholder="/assets/images/courses/filename.jpg">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Overview</label>
                                    <div class="col-lg-9">
                                        <textarea name="overview" rows="3" class="form-control" placeholder="Detailed syllabus overview and study requirements...">{{ old('overview') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Publish Status</label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" name="is_published">
                                            <option value="1">Published (Visible on Website Catalog)</option>
                                            <option value="0">Draft / Internal Only</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right border-top pt-3 mt-2">
                            <button id="ajax-btn" type="submit" class="btn btn-primary font-weight-bold px-4" style="background: #064E3B; border-color: #064E3B;">
                                Create Course <i class="icon-paperplane ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Class List Ends--}}

@endsection
