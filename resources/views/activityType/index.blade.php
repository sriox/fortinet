@extends('layouts.app') 
@section('scripts')
<script src="{{ asset('js/tables.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>Activity Types</h1>
    </header>
</div>
<div class="content body">
    <div class="row">
        <div class="col-md-3"><a href="{{ route('activityTypes.create') }}" class="btn btn-primary">Add Activity Type</a></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($activityTypes) }})</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activityTypes as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td>{{ is_null($type->deleted_at) ? 'Active': 'Inactive' }}</td>
                        <td><a href="#">Edit</a></td>
                        <td><a href="{{ route('activityTypes.delete', ['id' => $type->id]) }}">@if($type->trashed())Activate @else Delete @endif</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
