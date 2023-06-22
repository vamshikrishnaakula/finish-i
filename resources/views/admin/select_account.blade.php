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

<div class="card-style mb-30 mt-2">
    <h5 class="text-medium mb-20">Select Your Account</h5>
    <ul class="buttons-group">
    @foreach($accounts as $account)
        <li>
            <a href="{{url('/admin/account/'.$account->id)}}" class="main-btn info-btn btn-hover text-uppercase">{{$account->company_name}}</a>
        </li>
    @endforeach()
    </ul>
</div>

@endsection