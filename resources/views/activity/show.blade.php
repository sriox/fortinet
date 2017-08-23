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
               <tr>
                   <td><strong>Activity Executed</strong></td>
                   <td>{{ $activity->activity_executed }}</td>
               </tr>
               <tr>
                   <td><strong>Time Used (h)</strong></td>
                   <td>{{ $activity->time_used }}</td>
               </tr>
           </table>
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
@endsection
   

