@extends('layouts.admin')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    {{-- <li>{{ $error }}</li> --}}
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mt-2">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Event Registration Section</h1>
                <!-- <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Back</a> -->
            </div>
            <form name="eventregistrationForm" id="eventregistrationForm" class="eventregistrationForm" method="post"
                action="{{ route('eventregistration.update', $data->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-style mb-30">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-4">
                                <div class="input-style-1">
                                    {{-- <label>ID</label> --}}
                                    <input type="hidden" name="name" id="name" class="form-control"
                                        value={{ $data->id }} />
                                </div> <br>

                                <div class="select-style-1">
                                    <label>Event_ID</label>
                                    <div class="select-position">
                                        {{-- <input type="text" name="name" id="name" class="form-control"
                                        value={{ $data->custom_field_id }} /> --}}
                                        <select name="Event_ID" value={{ $data->event_id }}>
                                            {{-- <option>{{ $data->event_id }}</option> --}}
                                            @foreach ($cand as $da)
                                                <option value="{{ $da->id }}" @if ($da->id == $data->event_id ) selected @endif>{{ $da->id }}</option>
                                            @endforeach
                                        </select>   
                                    </div>
                                </div>
                                {{-- //// --}}
                                <div class="select-style-1">
                                    <label>custom Fields id</label> 
                                    <div class="select-position">

                                        <select name="customFields" value={{ $data->custom_field_id }}>
                                            {{-- <option>{{ $data->custom_field_id }}</option> --}}
                                            @foreach ($dat as $da)
                                                <option value="{{ $da->id }}"@if ($da->id == $data->custom_field_id) selected @endif>{{ $da->id }}</option>
                                            @endforeach
                                        </select>
                                       


                                    </div>
                                </div>
                            </div> </br>

                            <div class="input-style-1">
                                <label>Order</label>
                                <input type="text" name="Order" class="form-control" value={{ $data->order }}>
                                @error('Order')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div> </br>

                            <div class="input-style-1">
                                <label>Feild_status</label>
                                <input type="text" name="Feildstatus" class="form-control"
                                    value={{ $data->field_status }}>
                                @error('Feildstatus')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div> </br>

                            <div class="input-style-1">
                                <label>Help Content</label>
                                <input type="text" name="HelpContent" class="form-control"
                                    value={{ $data->help_content }}>

                            </div> </br>

                            <div class="input-style-1">
                                <label>Race_ID</label>
                                <input type="text" name="RaceID" class="form-control" value={{ $data->race_id }}>
                                @error('RaceID')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div> </br>

                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" class="main-btn primary-btn rounded-md btn-hover" name="submit">
                            </div>
                        </div>
                    </div>
                </div>
        </div>


        </form>
    </div>


    </div>
    </div>
@endsection
