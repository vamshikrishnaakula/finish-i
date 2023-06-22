@extends('layouts.admin')

@section('title', 'Roles List')
@section('content')



    <div class="card shadow mt-2">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Event Categories</h1>
                @can('role-create')
                    <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Create New Role</a>
                @endcan
            </div>


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-wrapper table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6>Name</h6>
                            </th>
                            <th>
                                <h6>field_name</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>

                    @foreach ($customdata as $datavariable)
                        <tr>
                            <td>{{ $datavariable->id }}</td>
                            <td>{{ $datavariable->field_name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="main-btn primary-btn-outline rounded-md btn-hover me-2"
                                        href="{{ route('customfeilds.edit', $datavariable->id) }}"><i
                                            class="lni lni-pencil"></i></a>
                                    {{-- @if ($datavariable->status == 'D') --}}
                                    {{-- <form action="{{ route('registrationsection.activate',$datavariable->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="main-btn danger-btn-outline rounded-md btn-hover" href=""><i class="lni lni-checkmark-circle"></i></button>
                                </form>
                            @else --}}
                                    <form action="{{ route('customfeilds.destroy', $datavariable->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="main-btn danger-btn-outline rounded-md btn-hover"
                                            href=""><i class="lni lni-trash-can"></i></button>
                                    </form>
                                    {{-- @endif --}}

                                </div>


                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection


