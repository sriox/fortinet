@extends('layouts.app')
@section('content')
<header>
    <h1>My Activities</h1>
</header>
<div class="row">
    <div class="col-md-3"><a href="{{ route('activities.create') }}" class="btn btn-primary">Add Activity</a></div>
</div>
<br>
<div class="row">
<div class="col-md-12">
    <table class="table table-bordered">
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
                <th>Bried Description</th>
                <th>Activity Executed</th>
                <th>Time Used (Minutes)</th>
                <th>Time Used (Hours)</th>
                <th colspan="2">Actions</th>
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
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->activity_executed }}</td>
                <td>{{ $activity->time_used }}</td>
                <td>{{ $activity->time_used / 60 }}</td>
                <td><a href="#">Edit</a></td>
                <td><a href="#">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection