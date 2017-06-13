@extends('layouts.app')
@section('content')
<header>
    <h1>SE</h1>
</header>
<div class="row">
    <div class="col-md-3"><a href="{{ route('se.create') }}" class="btn btn-primary">Add SE</a></div>
</div>
<br>
<div class="row">
<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name ({{ count($ses) }})</th>
                <th>Status</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach($ses as $se)
            <tr>
                <td>{{ $se->name }}</td>
                <td>{{ is_null($se->deleted_at) ? 'Active': 'Inactive' }}</td>
                <td><a href="#">Edit</a></td>
                <td><a href="{{ route('se.delete', ['id' => $se->id]) }}">@if($se->trashed()) Activate @else Delete @endif</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection