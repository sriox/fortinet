@extends('layouts.master')
@include('partials.header')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form action="{{ route('projects.store') }}">
                <div class="row">
                    <div class="col-md-2">Project Name</div>
                    <div class="col-md-3"><input type="text" name="name" /></div>
                    <div class="col-md-2">Project Owner</div>
                    <div class="col-md-3"><input type="text" name="owner" /></div>
                    <div><button type="submit">Save</button></div>
                </div>
            </form>
        </div>
    </div>
</div>