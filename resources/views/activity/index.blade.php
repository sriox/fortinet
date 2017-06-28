@extends('layouts.app') 
@section('scripts')
<link rel="stylesheet" href="{{ asset('plugins/perfectscrollbar/perfect-scrollbar.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/activity-index.css') }}">

<script src="{{ asset('plugins/perfectscrollbar/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('js/activity-index.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>My Activities</h1>
    </header>
</div>
<div class="content body">
   @if(Session::has('msg'))
   <div class="alert alert-success">{{ Session::get('msg') }}</div>
   @endif
    <div class="row">
        <div class="col-md-3"><a href="{{ route('activities.create') }}" class="btn btn-primary">Add Activity</a></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
           <div id="table_canvas">
            <table class="table table-bordered stripe" id="table">
                <thead>
                    <tr>
                        <th>Set Member</th>
                        <th>Activity</th>
                        <th>Date</th>
                        <th>Quarter</th>
                        <th>Country</th>
                        <th>Territory</th>
                        <th>Technology</th>
                        <th>Smart Ticket</th>
                        <th>Customer</th>
                        <th>Brief Description</th>
                        <th>Activity Executed</th>
                        <th>Time Used (Hours)</th>
                        <th>Actions</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                        <td>{{ $activity->user->name }}</td>
                        <td>{{ $activity->activityType->name }}</td>
                        <td>{{ $activity->date }}</td>
                        <td>{{ $activity->quarter }}</td>
                        <td>{{ $activity->country->name }}</td>
                        <td>{{ $activity->country->territory }}</td>
                        <td>{{ $activity->technology->name }}</td>
                        <td>{{ $activity->smart_ticket }}</td>
                        <td>{{ $activity->customer }}</td>
                        <td><a href="{{ route('activities.show', ['id' => $activity->id]) }}">{{ $activity->getBriefDescription() }}</a></td>
                        <td>{{ $activity->activity_executed }}</td>
                        <td>{{ $activity->time_used }}</td>
                        <td><a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index']) }}">Edit</a></td>
                        <td><a href="{{ route('activities.destroy', ['id' => $activity->id]) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br />
            </div>
        </div>
    </div>
</div>

@endsection
