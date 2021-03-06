@extends('layouts.app') 
@section('scripts')
<script src="{{ asset('js/tables.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>Countries</h1>
    </header>
</div>

<div class="content body">
   @if(Session::has('msg'))
   <div class="alert alert-success">{{ Session::get('msg') }}</div>
   @endif
   @if(Auth::user()->profile->key == 'ADMIN')
    <div class="row">
        <div class="col-md-3"><a href="{{ route('countries.create') }}" class="btn btn-primary">Add Country</a></div>
    </div>
    @endif
    <br>
    <div class="row">
        <div class="col-md-12">
           @if(Auth::user()->profile->key == 'ADMIN')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($countries) }})</th>
                        <th>Territory</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->territory }}</td>
                        <td>{{ is_null($country->deleted_at) ? 'Active': 'Inactive' }}</td>
                        <td><a href="{{ route('countries.edit', ['id' => $country->id]) }}">Edit</a></td>
                        <td><a href="{{ route('countries.delete', ['id' => $country->id]) }}">@if($country->trashed()) Activate @else Delete @endif</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($countries) }})</th>
                        <th>Territory</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->territory }}</td>
                        <td>{{ is_null($country->deleted_at) ? 'Active': 'Inactive' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
