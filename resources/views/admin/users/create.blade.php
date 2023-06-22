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
            <h1 class="h3 mb-0 text-gray-800">Create New User</h1>
            <!-- <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Back</a> -->
        </div>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="input-style-1 col-md-4 col-sm-12 col-xs-12">
                    <label>Company Name</label>
                    <input type="text" placeholder="Company Name" name="company_name" required/>
                </div>
                <div class="input-style-1 col-md-4 col-sm-12 col-xs-12">
                    <label>Name</label>
                    <input type="text" placeholder="Name" name="name" required/>
                </div>
                <div class="input-style-1 col-md-4 col-sm-12 col-xs-12">
                    <label>Mobile</label>
                    <input type="te" placeholder="Mobile Number" name="mobile_number" pattern="[0-9]{10}" required/>
                </div>
            </div>
            
            <div class="row">
                <div class="input-style-1 col-md-4 col-sm-12 col-xs-12">
                    <label>Email</label>
                    <input type="email" placeholder="Email" name="email" required/>
                </div>
                <div class="input-style-1 col-md-4 col-sm-12 col-xs-12">
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password" required/>
                </div>
                <div class="input-style-1 col-md-4 col-sm-12 col-xs-12">
                    <label>Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="confirm_password" required/>
                </div>
            </div>
            <div class="row">
                <div class="select-style-1 col-md-4 col-sm-12 col-xs-12">
                <label>Select Role</label>
                <div class="select-position">
                    <select name="role" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $r)
                    <option value="{{$r->id}}">{{$r->role_name}}</option>
                    @endforeach
                    </select>
                </div>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="main-btn primary-btn rounded-md btn-hover">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection