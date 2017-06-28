@extends('layouts.app')
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ asset('js/home_index.js') }}"></script>
@endsection
@section('content')
<div class="content-header">
    <header>
        <h1>Dashboard</h1>
    </header>
</div>
<div class="content body canvas">
   <input type="hidden" name="data" id="data" value="{{ json_encode($data) }}">
   <input type="hidden" name="technologies" id="technologies" value="{{ json_encode($technologies) }}">
    <div class="row">
        <div class="col-md-6 text-center">
            <div id="chart1"></div>
        </div>
        <div class="col-md-6">
            <div id="chart2"></div>
        </div>
    </div>
</div>
@endsection
