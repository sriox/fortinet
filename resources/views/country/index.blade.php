@extends('layouts.app')
@section('content')
<header>
    <h1>Countries</h1>
</header>
<div class="row">
    <div class="col-md-3"><a href="{{ route('countries.create') }}" class="btn btn-primary">Add Country</a></div>
</div>
<br>
<div class="row">
<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name ({{ count($countries) }})</th>
                <th>Territory</th>
                <th>Status</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach($countries as $country)
            <tr>
                <td>{{ $country->name }}</td>
                <td>{{ $country->territory }}</td>
                <td>{{ is_null($country->deleted_at) ? 'Active': 'Inactive' }}</td>
                <td><a href="#">Edit</a></td>
                <td><a href="{{ route('countries.delete', ['id' => $country->id]) }}">@if($country->trashed()) Activate @else Delete @endif</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection