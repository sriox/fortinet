@extends('layouts.app') 
@section('scripts')
<script src="{{ asset('js/tables.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>Departments</h1>
    </header>
</div>

<div class="content body">
   @if(Session::has('msg'))
   <div class="alert alert-success">{{ Session::get('msg') }}</div>
   @endif
   @if(Auth::user()->profile->key == 'ADMIN')
    <div class="row">
        <div class="col-md-2"><a href="{{ route('departments.create') }}" class="btn btn-primary col-md-12">Add Department</a></div>
        <div class="col-md-3"><a href="{{ route('activityTypes.associate') }}" class="btn btn-primary col-md-12">Associate activity types</a></div>
    </div>
    @endif
    <br>
    <div class="row">
        <div class="col-md-12">
           @if(Auth::user()->profile->key == 'ADMIN')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($departments) }})</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ is_null($department->deleted_at) ? 'Active': 'Inactive' }}</td>
                        <td><a href="{{ route('departments.edit', ['id' => $department->id]) }}">Edit</a></td>
                        <td><a href="{{ route('departments.delete', ['id' => $department->id]) }}">@if($department->trashed()) Activate @else Delete @endif</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($departments) }})</th>
                        <th>Territory</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ is_null($department->deleted_at) ? 'Active': 'Inactive' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
