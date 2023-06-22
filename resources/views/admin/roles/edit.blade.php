@extends('layouts.admin')


@section('content')



<div class="card shadow">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Role</h1>
            <a href="{{ route('roles.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Back</a>
        </div>

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

        <form action="{{route('roles.update',$role->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="input-style-1">
                <label>Role Name</label>
                <input type="text" placeholder="Role Name" name="role_name" value="{{$role->role_name}}" />
            </div>
            <h6 class="mb-25">Permissions</h6>
            <div class="row">
                @foreach($permission as $p)
                <div class="form-check checkbox-style mb-10 col-3">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="{{$p->id}}" id="checkbox-{{$p->id}}" {{in_array($p->id, $rolePermissions) ? 'checked' : '' }} />
                    <label class="form-check-label" for="checkbox-{{$p->id}}">{{$p->permission_name}}</label>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <button type="submit" class="main-btn primary-btn rounded-md btn-hover">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection