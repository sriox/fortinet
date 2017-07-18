@extends('layouts.app') 
@section('scripts')
<link rel="stylesheet" href="{{ asset('plugins/perfectscrollbar/perfect-scrollbar.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/activity-index.css') }}">

<script src="{{ asset('plugins/perfectscrollbar/perfect-scrollbar.jquery.min.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
       <div class="row">
           <div class="col-md-6"><h1>My Activities <small>Week hours: ({{ $usedHours }}/{{ $weekHours }})</small></h1></div>
           <div class="col-md-6"><a href="{{ route('activities.create') }}" class="btn btn-primary pull-right">Add Activity</a></div>
       </div>
    </header>
</div>
<div class="content body">
   @if(Session::has('msg'))
   <div class="alert alert-success">{{ Session::get('msg') }}</div>
   @endif
    <div class="row">
        <div class="col-md-12">
           <div class="text-center" id="preloader"><img src="{{ asset('images/preloader.gif') }}" alt=""></div>
           <div id="table_canvas" class="table-canvas">
            <table class="table table-bordered stripe" id="table">
                <thead>
                    <tr>
                        <th><span style="white-space: nowrap">Member</span></th>
                        <th><span style="white-space: nowrap">Activity</span></th>
                        <th><span style="white-space: nowrap">Desc</span></th>
                        <th><span style="white-space: nowrap">Date</span></th>
                        <th><span style="white-space: nowrap">Quarter</span></th>
                        <th><span style="white-space: nowrap">Country</span></th>
                        <th><span style="white-space: nowrap">Territory</span></th>
                        <th><span style="white-space: nowrap">Technology</span></th>
                        <th><span style="white-space: nowrap">SE</span></th>
                        <th><span style="white-space: nowrap">Smart Ticket</span></th>
                        <th><span style="white-space: nowrap">Customer</span></th>
                        <th><span style="white-space: nowrap">Activity Executed</span></th>
                        <th><span style="white-space: nowrap">Time (H)</span></th>
                        <th><span style="white-space: nowrap">Actions</span></th>
                        <th><span style="white-space: nowrap">&nbsp;</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                        <td><span style="white-space: nowrap">{{ $activity->user->name }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->activityType->name }}</span></td>
                        <td><span style="white-space: nowrap"><a href="{{ route('activities.show', ['id' => $activity->id]) }}">{{ $activity->getBriefDescription()."..." }}</a></span></td>
                        <td><span style="white-space: nowrap">{{ $activity->date }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->quarter }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->country->name }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->country->territory }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->technology->name }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->se->name }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->smart_ticket }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->customer }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->getBriefActivityExecuted()."..." }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->time_used }}</span></td>
                        <td><span style="white-space: nowrap"><a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index']) }}">Edit</a></span></td>
                        <td><span style="white-space: nowrap"><a href="{{ route('activities.destroy', ['id' => $activity->id]) }}">Delete</a></span></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <br />
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/excel.util.js') }}"></script>
<script src="{{ asset('js/activity.index.js') }}"></script>

@endsection
