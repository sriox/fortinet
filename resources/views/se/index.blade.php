@extends('layouts.app') 
@section('scripts')
<script src="{{ asset('js/tables.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>SE</h1>
    </header>
</div>
<div class="content body">
   @if(Session::has('msg'))
   <div class="alert alert-success">{{ Session::get('msg') }}</div>
   @endif
   @if(Auth::user()->profile->key == 'ADMIN')
    <div class="row">
        <div class="col-md-3"><a href="{{ route('se.create') }}" class="btn btn-primary">Add SE</a></div>
    </div>
    @endif
    <br>
    <div class="row">
        <div class="col-md-12">
           @if(Auth::user()->profile->key == 'ADMIN')
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($ses) }})</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ses as $se)
                    <tr>
                        <td>{{ $se->name }}</td>
                        <td>{{ is_null($se->deleted_at) ? 'Active': 'Inactive' }}</td>
                        <td><a href="{{ route('se.edit', ['id' => $se->id]) }}">Edit</a></td>
                        <td><a href="{{ route('se.delete', ['id' => $se->id]) }}">@if($se->trashed()) Activate @else Delete @endif</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name ({{ count($ses) }})</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ses as $se)
                    <tr>
                        <td>{{ $se->name }}</td>
                        <td>{{ is_null($se->deleted_at) ? 'Active': 'Inactive' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
