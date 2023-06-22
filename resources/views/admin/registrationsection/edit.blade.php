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

    {{-- @foreach ($category as $cat) --}}
    {{-- {{$cat->id}} --}}

    {{-- @endforeach --}}
    <div class="card shadow mt-2">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Registration Section</h1>
                <!-- <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Back</a> -->
            </div>
            <form name="registrationsectionForm" id="registrationsectionForm" class="registrationsectionForm" method="post"
                action="{{ route('registrationsection.update', $data->id) }}">
                @csrf
                @method('PATCH')
                <div class="card-style mb-30">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="input-style-1">
                                    <label>ID</label>
                                    <input type="hidden" name="name" id="name" class="form-control"
                                        placeholder="Event Categoy Name" />
                                </div> <br>

                                <div class="input-style-1">
                                    <label>SECTION_Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value={{ $data->section_name }}>
                                    @error('name')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div> </br>
                            </div>
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
@endsection
