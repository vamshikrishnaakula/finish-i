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
    {{-- javascript for input type --}}
    <script type="text/javascript">
        function showfield(name) {
            if (name == "Radio")
                document.getElementById("div1").innerHTML =
                //'<input type="text" name="opt[]" class="form-control" placeholder="Other"/><a href="javascript:new_link()">Add feild</a>';
                '<br><input class="input-style-1" type="text" name="options[]"/><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
            else if (name == "select")
                document.getElementById("div1").innerHTML =
                //'<a href="javascript:new_link()">Add feild</a>';
                '<br><input class="input-style-1" type="text" name="options[]"/><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
            else if (name == "other")
                document.getElementById("div1").innerHTML =
                //'<input type="text" name="opt[]" class="form-control" placeholder="Other"/>';
                '<br><input class="input-style-1" type="text" name="options[]"/><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
            else if (name == "dropdown")
                document.getElementById("div1").innerHTML =
                //'<br><a href="javascript:new_link()">Add feild</a><input type="text" name="opt[]" class="form-control" placeholder="Other"/><br>';
                '<br><input class="input-style-1" type="text" name="options[]" required /><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
            //"<br><div class='input-style-1' ><input class='input-style-1' type='text' class='form-control' name='opt[]' /><button type='button' class='btn btn-primary' onclick='adddata()'' id='add_text'>Add</button><button type='button' class='btn btn-danger' onclick='delete()'id='add_text'>delete</button></div>"

            else document.getElementById("div1").innerHTML = "";
        }
    </script>
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
    {{-- // --}}
    <script>
        function adddata() {
            $(".subdata").append(
                "<div class='input-style-2' ><input type='text' class='form-control' name='options[]'  required/><button type='button' class='btn btn-danger' onclick='deletedata(event)'id='add_text'>delete</button></div>"
            );
        }

        function deletedata(event) {
            //$(document).on('click', '.input-style-2', function(e) {
            //   e.preventDefault();
            //    $(this).remove();
            //});
            event.target.parentElement.remove();
        }
    </script>

    <div class="card shadow mt-2">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Create New Registration Section</h1>
                <!-- <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Back</a> -->
            </div>
            <div class="card-style mb-30">

                <form name="customfeildsForm" id="customfeildsForm" class="customfeildsForm" method="post"
                    action="{{ route('customfeilds.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                {{-- <div class="input-style-1"> --}}
                                {{-- <form> --}}

                                {{-- <div class="col-lg-6"> --}}
                                <div class="input-style-1">
                                    <label>FIELD NAME</label>
                                    <input type="text" name="fieldname" class="form-control"
                                        value="{{ old('fieldname') }}" placeholder="section_name" required>
                                    @error('fieldname')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- end input -->
                            </div>

                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label>LABELNAME</label>
                                    <input type="text" name="labelname" class="form-control"
                                        value="{{ old('labelname') }}" placeholder="labelname" required>
                                    @error('labelname')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- end input -->
                            </div>
                            <div class="col-lg-6">
                                <div class="select-style-1">
                                    <label>SECTION ID</label>
                                    <div class="select-position">
                                        <select name="role">
                                            @foreach ($data as $da)
                                                <option value="{{ $da->id }}">{{ $da->section_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="select-style-1">
                            <label>INPUT TYPE</label>
                            <div class="select-position ">
                                <select name="Input" id="travel_arriveVia"
                                    onchange="showfield(this.options[this.selectedIndex].value)">
                                    <option value="0">Please select ...</option>
                                    <option value="text">text</option>
                                    <option value="file">file</option>
                                    <option value="dropdown">dropdown</option>
                                    <option value="select">select</option>
                                    <option value="Radio">radio</option>
                                </select>
                                @error('Input')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                                {{-- @if (value == 'dropdown')
                                    @error('options')
                                            <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                @endif --}}
                            </div>
                            <div class="input-style-1" id="div1"><br>
                                {{-- hii --}}

                            </div><br>
                            {{-- <div class="input-style-1" id="newlink" style="display:none">
                                <input type="text" name="opt[]" class="form-control"  placeholder="Other"></input>
                            </div> --}}

                        </div>
                        <div class="div2">
                            <div class="subdata"></div>
                        </div>


                    </div>
            </div>
            <div class="input-style-1" id="div1"><br>
            </div>
            <div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="submit" class="main-btn primary-btn rounded-md btn-hover" name="submit"
                            value="Create">
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>
    </div>
@endsection
