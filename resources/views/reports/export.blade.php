@extends('layouts.app')
@section('content')

<div class="content body">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Export</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        
                    <form action="{{ route('export.download') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="activity_type_id" class="control-label">Activity Type</label>
                                    <select name="activity_type_id" id="activityType" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($activityTypes as $at)
                                        <option value="{{ $at->id }}">{{ $at->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="country_id" class="control-label">Country</label>
                                    <select name="country_id" id="country" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="department_id" class="control-label">Department</label>
                                    <select name="department_id" id="department" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="carrier_id" class="control-label">Carrier</label>
                                    <select name="carrier_id" id="carrier" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($carriers as $carrier)
                                        <option value="{{ $carrier->id }}">{{ $carrier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ses_id" class="control-label">SES</label>
                                    <select name="ases_id" id="ses" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($ses as $se)
                                        <option value="{{ $se->id }}">{{ $se->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="technology_id" class="control-label">Technology</label>
                                    <select name="technology_id" id="technology" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($technologies as $technology)
                                        <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="user_id" class="control-label">User</label>
                                    <select name="user_id" id="user" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Download</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection