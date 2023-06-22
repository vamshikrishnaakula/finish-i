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

    @php
        $mydata = json_decode($data->options);
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
    <script>
        function showfield(name) {
            //var val = document.getElementById('travel_arriveVia').value;
                if (name == "text"||"file")
                    document.getElementById("div1").innerHTML =" ";
                else if (name == "select")
                    document.getElementById("div1").innerHTML =
                    '<br><input class="input-style-1" type="text" name="opt[]"/><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
                else if (name == "other")
                    document.getElementById("div1").innerHTML =
                    '<br><input class="input-style-1" type="text" name="opt[]"/><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
                else if (name == "dropdown")
                    document.getElementById("div1").innerHTML =
                    '<br><input class="input-style-1" type="text" name="opt[]"  /><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
                else document.getElementById("div1").innerHTML = "";
           
        }

        function adddata() {
            $("#parent_option").append(
                "<div class='input-style-2' ><input type='text' class='form-control' name='opt[]' /><br><button type='button' class='btn btn-danger' onclick='deletedata(event)'id='add_text'>delete</button></div>"
            );
        }

        function deletedata(event) {
            //$(document).on('click', '.input-style-2', function(e) {
                //.preventDefault();
                //$(this).remove();
            //});
            event.target.parentElement.remove();
        }
    </script>

    {{-- <body onload=getdata()> --}}
        <div class="card shadow mt-2">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Registration Section</h1>
                    <!-- <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Back</a> -->
                </div>
                <form name="customfeildsForm" id="customfeildsForm" class="customfeildsForm" method="post"
                    action="{{ route('customfeilds.update', $data->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="card-style mb-30">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="input-style-1">
                                        <label>FIELD NAME</label>
                                        <input type="text" name="fieldname" class="form-control"
                                            value={{ $data->field_name }}>
                                        @error('fieldname')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <div class="input-style-1">
                                        <label>LABELNAME</label>
                                        <input type="text" name="labelname" class="form-control"
                                            value={{ $data->label_name }}>
                                        @error('labelname')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- //// --}}
                                <div class="col-lg-6">
                                    <div class="select-style-1">
                                        <label>SECTION ID</label>
                                        <div class="select-position">
                                            <select name="role" required="required">
                                                @foreach ($relation as $rel)
                                                    {{-- <option >{{$rel->sec}}</option> --}}
                                                @endforeach
                                                    {{-- <option>{{ $rel->registration->section_name }}</option> --}}
                                                @foreach ($cat as $da)
                                                    <option value="{{ $da->id }}"
                                                        @if ($da->id == $rel->section_id) selected @endif>
                                                        {{ $da->section_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="select-style-1">
                                        <label>INPUT TYPE</label>
                                        <div class="select-position ">
                                            <select name="Input" id="travel_arriveVia"
                                                onchange="showfield(this.options[this.selectedIndex].value)">
                                                <option name="0">Please select ...</option>
                                                <option name="text"{{ $data->InputType == 'text' ? 'selected' : '' }}>text</option>
                                                <option name="file"{{ $data->InputType == 'file' ? 'selected' : '' }}>file</option>
                                                <option
                                                    name="dropdown"{{ $data->InputType == 'dropdown' ? 'selected' : '' }}>
                                                    dropdown</option>
                                                <option name="select"{{ $data->InputType == 'select' ? 'selected' : '' }}>
                                                    select</option>
                                                <option name="radio" {{ $data->InputType == 'radio' ? 'selected' : '' }}>
                                                    radio</option>
                                            </select>
                                            @error('Input')
                                                <span class='text-danger'>{{ $message }}</span>
                                            @enderror
                                        </div><br><br>
                                         @if($data->InputType == "dropdown"  or $data->InputType == "select" or $data->InputType == "radio" or $data->InputType == "other"  )
                                            
                                                <div id="parent_option">
                                                    @foreach($mydata as $options)
                                                    
                                                        <div class='input-style-2' >
                                                             <input class='form-control' type='text' name='opt[]' value= {{ $options }} /><br><button type='button' class='btn btn-danger' onclick='deletedata(event)' id='add_text'>delete</button>
                                                        </div>
                                                                                                           
                                                    @endforeach
                                                </div>
                                            <button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                           
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="submit" class="main-btn primary-btn rounded-md btn-hover"
                                            name="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>

    </body>

@endsection
