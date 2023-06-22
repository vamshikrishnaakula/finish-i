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
        //$mydata = json_decode($data->options);
        
        if(!is_null($data->options))         
           $mydata = json_decode($data->options);
        else
            pass;        
        //endif
    @endphp
    <script type="text/javascript">
        function showfield(name) {
            if (name == "radio")
                document.getElementById("div1").innerHTML =
                '<br><input class="input-style-1" type="text" name="opt[]"/><br><button type="button" class="btn btn-primary" onclick="adddata()" id="add_text">Add</button>';
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
        //
        var ct = 1;

        function new_link() {
            ct++;
            var div1 = document.createElement('div1');
            div1.id = ct;
            //div1.style.display = "block";
            // link to delete extended form elements
            var delLink = '<span style="text-align:right;margin-right:95%"></span><a href="javascript:delIt(' + ct +
                ')">Del</a>';
            div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            document.getElementById('div1').appendChild(div1);
        }
        // function to delete the newly added set of elements
        function delIt(eleId) {debugger
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('div1');
            parentEle.removeChild(ele);
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
    <script>
        function getdata() {debugger;
            var val = document.getElementById('travel_arriveVia').value; 
            @foreach ($mydata as $value)
                if (val == "dropdown")
                    document.getElementById("div1").innerHTML =
                    "<br>@foreach ($mydata as $value)<div class='input-style-3' ><input type='text' name='opt[]' value= {{ $value }} /><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button></div>@endforeach <br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
                else if (val == "other")
                    document.getElementById("div1").innerHTML =
                    "<br>@foreach ($mydata as $value)<div class='input-style-3' ><input  type='text' name='opt[]' value= {{ $value }} /><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button></div>@endforeach<br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
                else if (val == "radio")
                    document.getElementById("div1").innerHTML =
                    "<br>@foreach ($mydata as $value)<div class='input-style-3' ><input  type='text' name='opt[]' value= {{ $value }} /><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div>@endforeach<br><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
                else if (val == "select")
                    document.getElementById("div1").innerHTML =
                    "<br>@foreach ($mydata as $value)<div class='input-style-3' ><input type='text'name='opt[]' value='{{ $value }}'><button type='button' class='btn btn-danger' onclick='deletedata()'id='add_text'>delete</button><br></div>@endforeach <br><br><button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>"
            @endforeach
           
        }

        function adddata() {debugger;
            $("#parent_option").append(
                "<div class='input-style-1' ><input type='text' class='form-control' name='opt[]' /><button type='button' class='btn btn-danger' onclick='deletedata()' id='add_text'>delete</button></div>"
            );
        }

        function deletedata() {debugger
            $(document).on('click', '.input-style-1', function(e) {
                e.preventDefault();
                $(this).remove();
            });
        }
    </script>;
{{-- 
    <body onload=getdata()> --}}
    <body>
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

                                    <!-- end input -->
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
                                                <option name="text">text</option>
                                                <option name="file">file</option>
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
                                        </div>
                                        {{-- <div class="input-style-1" id="div1"><br>
                                            hii 

                                        </div>
                                        <br>  --}}

                                    </div>
                                    <div class="div2">
                                                                   
                                        @if($data->InputType == "dropdown")
                                            
                                                <div id="parent_option">
                                                    @foreach($mydata as $options)
                                                    
                                                        <div class='input-style-1' >
                                                        <input type='text' name='opt[]' value= {{ $options }} /><button type='button' class='btn btn-danger' onclick='deletedata();'id='add_text'>delete</button>
                                                        </div>
                                                                                                           
                                                    @endforeach
                                                </div>
                                            <button type='button' class='btn btn-primary' onclick='adddata()' id='add_text'>Add</button>
                                        @endif
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
