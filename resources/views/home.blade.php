@extends('layouts.app')
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ asset('js/home_index.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>Dashboard ({{ $year.' - Q'.$quarter }})</h1>
    </header>
</div>
<div class="content body canvas">
   <input type="hidden" name="user_data" id="user_data" value="{{ json_encode($userData) }}">
   <input type="hidden" name="technology_data" id="technology_data" value="{{ json_encode($technologyData) }}">
   <input type="hidden" name="country_data" id="country_data" value="{{ json_encode($countryData) }}">
   <input type="hidden" name="territory_data" id="territory_data" value="{{ json_encode($territoryData) }}">
   <input type="hidden" name="activity_type_data" id="activity_type_data" value="{{ json_encode($activityTypeData) }}">
    
    <form action="{{ route('home') }}" method="get" class="form-horizontal">
       <div class="row">
           <div class="col-md-2">
               <select name="y" id="" class="form-control col-md-12">
                   @foreach($years as $y)
                    <option value="{{ $y->year }}" {{ $year == $y->year? 'selected': '' }}>{{ $y->year }}</option>
                    @endforeach
                </select>
           </div>
           <div class="col-md-2">
               <select name="q" id="" class="form-control col-md-12">
                   @for($i = 1; $i < 5; $i++)
                    <option value="{{ $i }}" {{ $i == $quarter? 'selected': '' }}>Q{{ $i }}</option>
                    @endfor
                </select>
           </div>
           <div class="col-md-2">
                 <select name="d" id="department" class="form-control col-md-12">
                     <option value="">All Departments</option>
                     @foreach($departments as $department)
                     <option value="{{ $department->id }}" {{ $department->id == $departmentId? 'selected': '' }}>{{ $department->name }}</option>
                     @endforeach
                 </select>
           </div>
           <div class="col-md-2">
                 <select name="u" id="user" class="form-control col-md-12">
                     <option value="">All Users</option>
                     @foreach($users as $user)
                     <option value="{{ $user->id }}" {{ $user->id == $userId? 'selected': '' }}>{{ $user->name }}</option>
                     @endforeach
                 </select>
           </div>
           <div class="col-md-2">
               <button class="btn btn-primary">Filter</button>
           </div>
       </div>
        
        
        
    </form>
    
    <div class="row">
        <div class="col-md-4 text-center">
            <div id="user_chart"></div>
        </div>
        <div class="col-md-4">
            <div id="technology_chart"></div>
        </div>
        <div class="col-md-4">
            <div id="activity_type_chart"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 text-center">
            <div id="country_chart"></div>
        </div>
        <div class="col-md-4">
            <div id="territory_chart"></div>
        </div>
    </div>
</div>
@endsection
