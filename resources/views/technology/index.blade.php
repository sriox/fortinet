@extends('layouts.app') 
@section('scripts')
<script src="{{ asset('js/tables.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>Technologies</h1>
    </header>
</div>
<div class="content body">
   @if(Session::has('msg'))
   <div class="alert alert-success">{{ Session::get('msg') }}</div>
   @endif
    <div class="row">
        <div class="col-md-3"><a href="{{ route('technologies.create') }}" class="btn btn-primary">Add Technology</a></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($technologies) }})</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($technologies as $technology)
                    <tr>
                        <td>{{ $technology->name }}</td>
                        <td>{{ is_null($technology->deleted_at) ? 'Active': 'Inactive' }}</td>
                        <td><a href="{{ route('technologies.edit', ['id' => $technology->id]) }}">Edit</a></td>
                        <td><a href="{{ route('technologies.delete', ['id' => $technology->id]) }}">@if($technology->trashed()) Activate @else Delete @endif</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
