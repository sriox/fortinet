@extends('layouts.app') @section('content')
<div class="content-header">
    <header>
        <h1>Departments - Activity Types</h1>
    </header>
</div>
<div class="content body">
@if(Session::has('msg'))
    <div class="alert alert-success">{{ Session::get('msg') }}</div>
@endif
<form action="{{ route('activityTypes.saveAssociation') }}" method="POST" class="form-horizontal">
{{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            Activity Types Association
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Activity Type</th>
                    <th colspan="{{ count($departments) }}"></th>
                </tr>
                @foreach($activityTypes as $activityType)
                <tr>
                    <td>{{ $activityType->name }}</td>
                    @foreach($departments as $department)
                        <td>
                            <input type="checkbox" {{ in_array($department->id, $activityType->departmentsId)? 'checked': '' }} name="association[]" id="option_{{ $activityType->id.'_'.$department->id }}" value="{{ $activityType->id.'-'.$department->id }}">
                            <label for="option_{{ $activityType->id.'_'.$department->id }}">{{ $department->name }}</label>                                    
                        </td>
                    @endforeach
                </tr>
                @endforeach
            </table>
            
        </div>
        <div class="panel-footer">
            <input class="btn btn-primary" type="submit" value="Save">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</form>
</div>
@endsection