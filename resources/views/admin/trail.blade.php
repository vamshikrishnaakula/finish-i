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
                '<a href="javascript:new_link()">Add feild</a>';
            // 'text: <input type="text" name="other" />';
            else if (name == "select")
                document.getElementById("div1").innerHTML =
                '<a href="javascript:new_link()">Add feild</a>';
            //else if (name == "other")
            //document.getElementById("div1").innerHTML =
            //'text: <input type="text" name="Race" class="form-control" placeholder="text"/> <a href="javascript:new_link()">Add</a>';
            else if (name == "other")
                document.getElementById("div1").innerHTML =
                'dropdown: <input type="text" name="Race" class="form-control" placeholder="Other"/>';
            else if (name == "dropdown")
                document.getElementById("div1").innerHTML =
                '<a href="javascript:new_link()">Add feild</a>';
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
        function delIt(eleId) {
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('div1');
            parentEle.removeChild(ele);
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
                                    <input type="text" name="fieldname" class="form-control" placeholder="section_name">
                                    @error('fieldname')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- end input -->
                            </div>

                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label>LABELNAME</label>
                                    <input type="text" name="labelname" class="form-control" placeholder="labelname">
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
                            <div class="select-position">
                                <select name="race" id="travel_arriveVia"
                                    onchange="showfield(this.options[this.selectedIndex].value)">
                                    <option selected="selected">Please select ...</option>
                                    <option value="text">text</option>
                                    <option value="file">file</option>
                                    <option value="dropdown">dropdown</option>
                                    <option value="select">select</option>
                                    <option value="Radio">radio</option>
                                    <option value="other">other</option>
                                </select>
                            </div>
                            <div class="input-style-1" id="div1">
                            </div>
                            <div class="input-style-1" id="newlinktpl" style="display:none">
                                <input type="text" name="opt[]" class="form-control" placeholder="Other"></input>
                            </div>
                        </div>
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
