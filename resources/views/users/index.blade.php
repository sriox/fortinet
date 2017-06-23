@extends('layouts.app') 
@section('scripts')
<script src="{{ asset('js/tables.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>Users</h1>
    </header>
</div>
<div class="content body">
   @if(Session::has('msg'))
   <div class="alert alert-success">{{ Session::get('msg') }}</div>
   @endif
   @if(Auth::user()->profile->key == 'ADMIN')
    <div class="row">
        <div class="col-md-3"><a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a></div>
    </div>
    @endif
    <br>
    <div class="row">
        <div class="col-md-12">
           @if(Auth::user()->profile->key == 'ADMIN')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($users) }})</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->profile->name }}</td>
                        <td>{{ is_null($user->deleted_at) ? 'Active': 'Inactive' }}</td>
                        <td><a href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a></td>
                        <td><a href="{{ route('users.delete', ['id' => $user->id]) }}">@if($user->trashed()) Activate @else Delete @endif</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($users) }})</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->profile->name }}</td>
                        <td>{{ is_null($user->deleted_at) ? 'Active': 'Inactive' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
