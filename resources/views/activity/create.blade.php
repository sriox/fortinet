@extends('layouts.app') @section('content')
<div class="content body">
  
   <form action="{{ route('activities.store') }}" method="post" class="form-horizontal">
   {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Activity</div>
                <div class="panel-body">
                   @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" class="control-label col-md-4">Activity Type <span class="required-field">*</span></label>
                        <div class="col-md-6">
                            <select name="activityType" id="activityType" class="form-control" required>
                                <option value="">-- Select --</option>
                                @foreach($activityTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="control-label col-md-4">Start Date <span class="required-field">*</span></label>
                        <div class="col-md-6">
                            <input type="text" name="date" id="date" class="form-control" required>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="quarter" class="control-label col-md-4">Quarter</label>
                        <div class="col-md-6">
                            <input type="text" name="quarter" id="quarter" class="form-control">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="country" class="control-label col-md-4">Country <span class="required-field">*</span></label>
                        <div class="col-md-6">
                            <select name="country" id="country" class="form-control" required>
                                <option value="">-- Select --</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="technology" class="control-label col-md-4">Technology <span class="required-field">*</span></label>
                        <div class="col-md-6">
                            <select name="technology" id="technology" class="form-control" required>
                                <option value="">-- Select --</option>
                                 @foreach($technologies as $technology)
                                <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="smartTicket" class="control-label col-md-4">Smart Ticket</label>
                        <div class="col-md-6">
                            <input type="text" name="smartTicket" id="smartTicket" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="se" class="control-label col-md-4">SE <span class="required-field">*</span></label>
                        <div class="col-md-6">
                            <select name="se" id="se" class="form-control" required>
                                <option value="">-- Select --</option>
                                @foreach($ses as $se)
                                <option value="{{ $se->id }}">{{ $se->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="carrier" class="control-label col-md-4">Carrier</label>
                        <div class="col-md-6">
                            <select name="carrier" id="carrier" class="form-control" required>                                
                                @foreach($carriers as $carrier)
                                <option value="{{ $carrier->id }}" {{ $carrier->name == 'None'? 'selected': '' }}>{{ $carrier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="customer" class="control-label col-md-4">Customer</label>
                        <div class="col-md-6">
                            <input type="text" name="customer" id="customer" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label col-md-4">Description <span class="required-field">*</span></label>
                        <div class="col-md-6">
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="activityExecuted" class="control-label col-md-4">Activity Executed <span class="required-field">*</span></label>
                        <div class="col-md-6">
                            <textarea name="activityExecuted" id="activityExecuted" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="timeUsed" class="control-label col-md-4">Time Used (hours)</label>
                        <div class="col-md-6">
                            <input type="number" step="0.01" name="timeUsed" id="timeUsed" class="form-control" ><small><strong>(.) for decimals</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                       <div class="col-md-2 col-md-offset-10">
                           <button class="btn btn-primary" type="submit">Save</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<script src="{{ asset('js/activity.create.js') }}"></script>
@endsection
