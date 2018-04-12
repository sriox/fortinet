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
                        <th><span style="white-space: nowrap">Actions</span></th>
                        <th><span style="white-space: nowrap">Desc</span></th>
                        <th><span style="white-space: nowrap">Date</span></th>
                        <th><span style="white-space: nowrap">Quarter</span></th>
                        <th><span style="white-space: nowrap">Country</span></th>
                        <th><span style="white-space: nowrap">Territory</span></th>
                        <th><span style="white-space: nowrap">Technology</span></th>
                        <th><span style="white-space: nowrap">SE / Inside Sales Rep</span></th>
                        <th><span style="white-space: nowrap">Smart Ticket</span></th>
                        <th><span style="white-space: nowrap">Customer</span></th>
                        <th><span style="white-space: nowrap">Time (H)</span></th>
                        <!--<th><span style="white-space: nowrap">Actions</span></th>
                        <th><span style="white-space: nowrap">&nbsp;</span></th>
                        <th><span style="white-space: nowrap">&nbsp;</span></th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    
                    <tr>
                        <td><span style="white-space: nowrap">{{ $activity->member }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->activity_type }}</span></td>
                        <td>
                            <span style="white-space: nowrap">
                                <a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index', 'copy' => true]) }}"><span title="Clone" class="glyphicon glyphicon-new-window"></span></a>
                                <a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index']) }}"><span title="Edit" class="glyphicon glyphicon-edit"></span></a>
                                <a href="{{ route('activities.destroy', ['id' => $activity->id]) }}"><span title="Edit" class="glyphicon glyphicon-trash"></span></a>
                            </span>
                        </td>
                        <td><span style="white-space: nowrap"><a href="{{ route('activities.show', ['id' => $activity->id]) }}" target="_blank">{{ implode(' ', array_slice(explode(' ', $activity->description), 0, 10)) }}</a></span></td>
                        <td><span style="white-space: nowrap">{{ $activity->date }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->quarter }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->country }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->territory }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->technology }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->se }}</span></td>
                        <td><span style="white-space: nowrap">
                        @php
                            if(null != $activity->smart_ticket && $activity->smart_ticket != ''){
                                $tickets = explode(',', $activity->smart_ticket);
                                foreach($tickets as $ticket){
                        @endphp
                                <a href="{{ $smartUrl->value.trim($ticket) }}" target="_blank">{{ $ticket }}</a>&nbsp;
                        @php
                                }
                            }
                        @endphp
                        </span></td>
                        <td><span style="white-space: nowrap">{{ $activity->customer }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->time_used }}</span></td>
                        <!--<td><span style="white-space: nowrap"><a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index']) }}">Edit</a></span></td>
                        <td><span style="white-space: nowrap"><a href="{{ route('activities.destroy', ['id' => $activity->id]) }}">Delete</a></span></td>
                        <td><span style="white-space: nowrap"><a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'index', 'copy' => true]) }}">Clone</a></span></td>-->
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
                        <!--<td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>-->
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
