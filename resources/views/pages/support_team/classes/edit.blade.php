@extends('layouts.master')
@section('page_title', 'Edit Course - '.$c->name)
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-bold">Edit Course: <span class="text-primary">{{ $c->name }}</span></h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form class="ajax-update" data-reload="#page-header" method="post" action="{{ route('classes.update', $c->id) }}">
                @csrf @method('PUT')
                <div class="row">
                    {{-- Left Column: Basics & Pricing --}}
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Course Title <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $c->name }}" required type="text" class="form-control" placeholder="Course Title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Category <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select required data-placeholder="Select Program Category" class="form-control select" name="class_type_id" id="class_type_id">
                                    @foreach($class_types as $ct)
                                        <option {{ $c->class_type_id == $ct->id ? 'selected' : '' }} value="{{ $ct->id }}">{{ $ct->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Subtitle</label>
                            <div class="col-lg-9">
                                <input name="subtitle" value="{{ $c->subtitle }}" type="text" class="form-control" placeholder="Short course summary">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Duration</label>
                            <div class="col-lg-9">
                                <input name="duration_label" value="{{ $c->duration_label }}" type="text" class="form-control" placeholder="e.g. 4 Years, 6 Months, 8 Weeks">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Fee Type</label>
                            <div class="col-lg-9">
                                <select class="form-control select" name="fee_type">
                                    <option {{ $c->fee_type == 'one_time' ? 'selected' : '' }} value="one_time">One-Time Course Fee</option>
                                    <option {{ $c->fee_type == 'monthly_subscription' ? 'selected' : '' }} value="monthly_subscription">Monthly Subscription</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Tuition Fee (₹)</label>
                            <div class="col-lg-4">
                                <input name="selling_price" value="{{ $c->selling_price }}" type="number" step="0.01" class="form-control" placeholder="Selling Price (₹)">
                            </div>
                            <label class="col-lg-2 col-form-label font-weight-semibold text-right">MRP (₹)</label>
                            <div class="col-lg-3">
                                <input name="mrp_price" value="{{ $c->mrp_price }}" type="number" step="0.01" class="form-control" placeholder="MRP (₹)">
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: Schedule & Visibility --}}
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Class Schedule</label>
                            <div class="col-lg-9">
                                <input name="class_days" value="{{ $c->class_days }}" type="text" class="form-control" placeholder="e.g. Saturday to Thursday · 05:30 AM IST">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Eligibility</label>
                            <div class="col-lg-9">
                                <select class="form-control select" name="gender_eligibility">
                                    <option {{ $c->gender_eligibility == 'brothers_and_sisters' ? 'selected' : '' }} value="brothers_and_sisters">Brothers & Sisters</option>
                                    <option {{ $c->gender_eligibility == 'sisters_only' ? 'selected' : '' }} value="sisters_only">Sisters Only</option>
                                    <option {{ $c->gender_eligibility == 'brothers_only' ? 'selected' : '' }} value="brothers_only">Brothers Only</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Thumbnail URL</label>
                            <div class="col-lg-9">
                                <input name="thumbnail_url" value="{{ $c->thumbnail_url }}" type="text" class="form-control" placeholder="/assets/images/courses/filename.jpg">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Overview</label>
                            <div class="col-lg-9">
                                <textarea name="overview" rows="3" class="form-control" placeholder="Detailed syllabus overview...">{{ $c->overview }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Publish Status</label>
                            <div class="col-lg-9">
                                <select class="form-control select" name="is_published">
                                    <option {{ $c->is_published ? 'selected' : '' }} value="1">Published (Visible on Website Catalog)</option>
                                    <option {{ !$c->is_published ? 'selected' : '' }} value="0">Draft / Internal Only</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                    <a href="{{ route('classes.index') }}" class="btn btn-outline-secondary font-weight-semibold">
                        <i class="icon-arrow-left52 mr-1"></i> Back to Courses
                    </a>
                    <button type="submit" class="btn btn-primary font-weight-bold px-4" style="background: #064E3B; border-color: #064E3B;">
                        Save Changes <i class="icon-paperplane ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{--Class Edit Ends--}}

@endsection
