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
                                <div class="form-group col-md-11">
                                    <label for="activity_type_id" class="control-label">Activity Type <i class="fa fa-filter"></i></label>
                                    <select name="activity_type_id" id="activityType" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($activityTypes as $at)
                                        <option value="{{ $at->id }}">{{ $at->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="country_id" class="control-label">Country <i class="fa fa-filter"></i></label>
                                    <select name="country_id" id="country" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="territory" class="control-label">Territory <i class="fa fa-filter"></i></label>
                                    <select name="territory" id="territory" class="form-control">
                                        <option value="">-- Select --</option>
                                        @foreach($territories as $territory)
                                        <option value="{{ $territory->name }}">{{ $territory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="department_id" class="control-label">Department <i class="fa fa-filter"></i></label>
                                    <select name="department_id" id="department" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="carrier_id" class="control-label">Carrier <i class="fa fa-filter"></i></label>
                                    <select name="carrier_id" id="carrier" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($carriers as $carrier)
                                        <option value="{{ $carrier->id }}">{{ $carrier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="ses_id" class="control-label">SES <i class="fa fa-filter"></i></label>
                                    <select name="ases_id" id="ses" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($ses as $se)
                                        <option value="{{ $se->id }}">{{ $se->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="technology_id" class="control-label">Technology <i class="fa fa-filter"></i></label>
                                    <select name="technology_id" id="technology" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($technologies as $technology)
                                        <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="user_id" class="control-label">User <i class="fa fa-filter"></i></label>
                                    <select name="user_id" id="user" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="year" class="control-label">Year <i class="fa fa-filter"></i></label>
                                    <select name="year" id="year" class="form-control">
                                        <option value="0">-- Select --</option>
                                        @foreach($years as $year)
                                        <option value="{{ $year->year }}">{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="quarter" class="control-label">Quarter <i class="fa fa-filter"></i></label>
                                    <select name="quarter" id="quarter" class="form-control">
                                        <option value="0">-- Select --</option>
                                        <option value="1">Q1</option>
                                        <option value="2">Q2</option>
                                        <option value="3">Q3</option>
                                        <option value="4">Q4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="dateIni" class="control-label">From <i class="fa fa-filter"></i></label>
                                    <input type="text" name="dateIni" id="dateIni" class="datepicker form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group col-md-11">
                                    <label for="dateEnd" class="control-label">To <i class="fa fa-filter"></i></label>
                                    <input type="text" name="dateEnd" id="dateEnd" class="datepicker form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-10">
                                <button type="submit" class="btn btn-primary">Download</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/reports.export.js') }}"></script>
@endsection