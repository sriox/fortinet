@extends('layouts.app') @section('content')
<div class="content body">

    <form action="{{ route('technologies.update', ['id' => $technology->id]) }}" method="post" class="form-horizontal">
        <input type="hidden" name="id" value="{{ $technology->id }}"> {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Technology</div>
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
                            <label for="name" class="control-label col-md-4">Technology</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $technology->name }}" required></div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-10">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
