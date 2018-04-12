@extends('layouts.app')
@section('content')
<div class="content-header">
    <header>
        <h1>Activity</h1>
    </header>
</div>
<div class="content body">
    
    <div class="panel panel-default">
        <div class="panel-heading">
           <div class="row">
               <div class="col-md-10">
                   <h3>Activity Details</h3>
               </div>
               <div class="col-md-2">
                   <a href="{{ redirect()->back()->getTargetUrl() }}" class="pull-right">Back</a>
               </div>
           </div>
        </div>
        <div class="panel-body">
           <table class="table table-bordered">
              <tr>
                   <td><strong>User</strong></td>
                   <td>{{ $activity->user->name }}</td>
               </tr>
               <tr>
                   <td><strong>Activity Type</strong></td>
                   <td>{{ $activity->activityType->name }}</td>
               </tr>
               <tr>
                   <td><strong>Start Date</strong></td>
                   <td>{{ $activity->date }}</td>
               </tr>
               <tr>
                   <td><strong>Country</strong></td>
                   <td>{{ $activity->country->name }}</td>
               </tr>
               <tr>
                   <td><strong>Territory</strong></td>
                   <td>{{ $activity->country->territory }}</td>
               </tr>
               <tr>
                   <td><strong>Technology</strong></td>
                   <td>{{ $activity->technology->name }}</td>
               </tr>
               <tr>
                   <td><strong>Smart Ticket</strong></td>
                   <td>{{ $activity->smart_ticket }}</td>
               </tr>
               <tr>
                   <td><strong>SE</strong></td>
                   <td>{{ $activity->se->name }}</td>
               </tr>
               <tr>
                   <td><strong>Carrier</strong></td>
                   <td>{{ $activity->carrier->name }}</td>
               </tr>
               <tr>
                   <td><strong>Customer</strong></td>
                   <td>{{ $activity->customer }}</td>
               </tr>
               <tr>
                   <td><strong>Description</strong></td>
                   <td>{{ $activity->description }}</td>
               </tr>
               <!--<tr>
                   <td><strong>Activity Executed</strong></td>
                   <td>{{ $activity->activity_executed }}</td>
               </tr>
               <tr>
                   <td><strong>Time Used (h)</strong></td>
                   <td>{{ $activity->time_used }}</td>
               </tr>-->
           </table>
           <div class="bg-info"><strong>Add Task</strong></div>
           <div class="row">
                <br />
                <div class="col-md-12">
                    <div class="container">
                        <form action="{{ route('activities.savework') }}" method="POST" class="form form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $activity->id }}" name="activityId">
                            <input type="hidden" value="0" id="hdnwork" name="workId">
                            <div class="row">
                                <div class="col-md-2"><input type="text" placeholder="Date" id="txtdate" required name="date" class="col-md-12 datepicker form-control"></div>
                                <div class="col-md-6"><textarea name="description" id="txtdescription" required cols="30" rows="2" class="form-control col-md-12"></textarea></div>
                                <div class="col-md-2"><input type="number" name="time" id="txttime" required class="col-md-12 form-control" step="0.1"></div>
                                <div class="col-md-2"><input type="submit" id="btnsubmit" value="Add Task" class="btn btn-primary" /></div>
                            </div>
                        </form>
                    </div>
               </div>
               
           </div>
           <br/>
           <div class="bg-info"><strong>Activity Tasks</strong> <span class="badge">{{ count($activity->works) }}</span></div>
           <div>
            <br/>
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Time</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                @foreach($activity->works->sortByDesc('date') as $work)
                <tr>
                    <td style="white-space: nowrap">{{ $work->date }}</td>
                    <td>{{ $work->description }}</td>
                    <td>{{ $work->time }}</td>
                    <td><a href="{{ route('activities.deletework', ['id' => $work->id]) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
                    <td><a href="#" class="btnedit" data-id="{{ $work->id }}" data-date="{{ $work->date }}" data-description="{{ $work->description }}" data-time="{{ $work->time }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                </tr>
                @endforeach
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong>{{ $activity->getTotalTime() }}</strong></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
           </div>
        </div>
        <div class="panel-footer">
           <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index', 'copy' => true]) }}" class="btn btn-primary col-md-12"><span class="glyphicon glyphicon-new-window"></span> Clone</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index']) }}" class="btn btn-info col-md-12"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                </div>
               <div class="col-md-2">
                   <!--<a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-success col-md-12"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>-->
                   <a href="#" class="btn btn-success col-md-12" onclick="window.close();"><span class="glyphicon glyphicon-remove"></span> Close</a>
               </div>
           </div>
            
        </div>
    </div>
    
</div>
<script src="{{ asset('js/activity.show.js') }}"></script>
@endsection
   

