@extends('layouts.admin')

@section('title', 'Roles List')
@section('content')



<div class="card shadow mt-2">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Role Management</h1>
            @can('role-create')
            <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New Role</a>
            @endcan
        </div>


        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="table-wrapper table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                   
                </tr>
                @endforeach
            </table>

        </div>

    </div>
</div>
@endsection