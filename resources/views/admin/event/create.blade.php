@extends('layouts.admin')
@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card shadow mt-2">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Event</h1>
            <!-- <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Back</a> -->
        </div>
        <form name="eventDetailsForm" id="eventDetailsForm" class="eventDetailsForm" method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf    
        <div class="card-style mb-30">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h6 class="mb-25">Basic Details</h6>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>Full Name</label>
                                <input type="text"  name="event_name" id="event_name" class="form-control" placeholder="Event name" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="select-style-1">
                                <div class="select-position">
                                    <label>Event Category</label>
                                    <select name="event_category" id="event_category" class="form-control">
                                        <option value="">Select category</option>
                                        <option value="">Category one</option>
                                        <option value="">Category two</option>
                                        <option value="">Category three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="select-style-1">
                                <div class="select-position">
                                    <label>Event Type</label>
                                    <select name="event_type" id="event_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="">Category one</option>
                                        <option value="">Category two</option>
                                        <option value="">Category three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>Event Start Date</label>
                                <input type="date"  name="event_start_date" id="event_start_date" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>Event End Date</label>
                                <input type="date"  name="event_end_date" id="event_end_date" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>Ticket Category Change Date</label>
                                <input type="text"  name="ticket_category_change" id="ticket_category_change" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>Registration Start Date</label>
                                <input type="text"  name="registration_start" id="registration_start" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>Registration End Date</label>
                                <input type="text"  name="registration_close" id="registration_close" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                            <label>GST on Race Amount ?</label>
                            </div>
                            <div class=" ">
                                <label>Yes</label>
                                <input name="is_gst_on_race_applicable" class="mr-60 is_gst_on_race_applicable" type="radio" value="Yes" id="is_gst_on_race_applicable" />
                                <label>No</label>
                                <input name="is_gst_on_race_applicable" class="is_gst_on_race_applicable" type="radio" value="No" id="is_gst_on_race_applicable" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="gstAmount" style="display:none">
                            <div class="input-style-1">
                                <label>GST On Race Amount</label>
                                <input type="text"  name="gst_race_amount" id="gst_race_amount" class="form-control" placeholder="Eg:18%">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>Processing Fee</label>
                                <input type="text"  name="processing_fee" id="processing_fee" class="form-control" placeholder="Eg:4%">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                                <label>GST On Processing Fee</label>
                                <input type="text"  name="gst_on_processing_fee" id="gst_on_processing_fee" class="form-control" placeholder="Eg:18%">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-style-1">
                                <label>Display Text Before Registration</label>
                                <input type="text"  name="display_text_bef_reg" id="display_text_bef_reg" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-style-1">
                                <label>Display Text After Registration</label>
                                <input type="text"  name="display_text_after_reg" id="display_text_after_reg" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-30">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                            <label>Allow Full Coupon Registrations</label>
                            </div>
                            <div class=" ">
                                <label>Yes</label>
                                <input name="is_full_coupon_reg" class="mr-60 is_full_coupon_reg" type="radio" value="Yes" id="is_full_coupon_reg" />
                                <label>No</label>
                                <input name="is_full_coupon_reg" class="is_full_coupon_reg" type="radio" value="No" id="is_full_coupon_reg" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                            <label>Allow International Payment</label>
                            </div>
                            <div class=" ">
                                <label>Yes</label>
                                <input name="allow_international_payment" class="mr-60 allow_international_payment" type="radio" value="Yes" id="allow_international_payment" />
                                <label>No</label>
                                <input name="allow_international_payment" class="allow_international_payment" type="radio" value="No" id="allow_international_payment" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="input-style-1">
                            <label>Does Event Has Results?</label>
                            </div>
                            <div class=" ">
                                <label>Yes</label>
                                <input name="has_results" class="mr-60 has_results" type="radio" value="Yes" id="has_results" />
                                <label>No</label>
                                <input name="has_results" class="has_results" type="radio" value="No" id="has_results" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 resultsSub" style="display:none">
                            <div class="input-style-1">
                                <label>Result Submission Start Date</label>
                                <input type="date"  name="results_submission_start" id="results_submission_start" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 resultsSub" style="display:none">
                            <div class="input-style-1">
                                <label>Result Submission End Date</label>
                                <input type="date"  name="results_submission_end" id="results_submission_end" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-style-1">
                                <label>Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" class="main-btn primary-btn rounded-md btn-hover" name="basicDetailsSubmit" value="Create">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection