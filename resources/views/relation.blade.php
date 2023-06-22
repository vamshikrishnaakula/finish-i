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

    <div class="container-fluid">
        @foreach ($data as $d)
            <div class=row>
                {{-- <h1>{{ $d->section_id }}</h1> --}}
                <h1>{{ $d->registration->section_name}}</h1>
                {{-- <ul>
                    @foreach ($d->registration as $f)
                      {{-- {{$f->id}} --}}
                        {{-- <li>{{ $d->section_name }}</li> --}}
                    {{-- @endforeach  --}}

                    {{-- @foreach ($d->getcustom_table as $f)
                        {{-- <li>{{ $f->field_name }}</li> --}}
                    {{-- @endforeach --}}
                </ul>
            </div>
        @endforeach




    </div>

    </div>

@endsection
