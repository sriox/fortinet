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
           <div class="col-md-4"><h1>All Activities</h1></div>
           <div class="col-md-8"><a href="{{ route('activities.create') }}" class="btn btn-primary pull-right">Add Activity</a></div>
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
           <div id="table_canvas" class="table-canvas" style="display: none">
            <table class="table table-bordered stripe" id="table" style="white-space: nowrap">
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Activity</th>
                        <th>Actions</th>
                        <th>Description<br />&nbsp;</th>
                        <th>Date<br />&nbsp;</th>
                        <th>Quarter</th>
                        <th>Country</th>
                        <th>Territory</th>
                        <th>Technology</th>
                        <th>SE / Inside Sales Rep</th>
                        <th>Smart Ticket<br />&nbsp;</th>
                        <th>Customer<br />&nbsp;</th>
                        <th>Time (H)<br />&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                        <td><span style="white-space: nowrap">{{ $activity->member }}</span></td>
                        <td><span style="white-space: nowrap">{{ $activity->activity_type }}</span></td>
                        <td>
                            <span style="white-space: nowrap">
                                @if($activity->user_id == Auth::id() || Auth::user()->profile->key == 'ADMIN')<a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'all', 'copy' => true]) }}"><span title="Clone" class="glyphicon glyphicon-new-window"></span></a>@endif
                                @if($activity->user_id == Auth::id() || Auth::user()->profile->key == 'ADMIN')<a href="{{ route('activities.edit', ['id' => $activity->id, 'page' => 'all']) }}"><span title="Edit" class="glyphicon glyphicon-edit"></span></a>@endif
                                @if($activity->user_id == Auth::id() || Auth::user()->profile->key == 'ADMIN')<a href="{{ route('activities.destroy', ['id' => $activity->id]) }}"><span title="Delete" class="glyphicon glyphicon-trash"></span></a>@endif
                            </span>
                        </td>
                        <td><a href="{{ route('activities.show', ['id' => $activity->id]) }}" target="_blank">{{ implode(' ', array_slice(explode(' ', $activity->description), 0, 10)) }}</a></td>
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
                    </tr>
                </tfoot>
            </table>
            <br />
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/activity.all.js') }}"></script>
@endsection
