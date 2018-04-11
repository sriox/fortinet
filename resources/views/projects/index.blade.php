@extends('layouts.master')
@include('partials.header')
@section('content')
<div>
   <table  class="table table-striped table-bordered">
       <tr>
           <th>Project</th>
           <th>Owner</th>
       </tr>
       @foreach($projects as $project)
       <tr>
           <td>{{ $project['name'] }}</td>
           <td>{{ $project['owner'] }}</td>
       </tr>
       @endforeach
   </table>    
   <a href="{{ route('projects.create') }}">Create Project</a>
</div>
@endsection