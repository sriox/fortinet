@extends('layouts.app') @section('content')
<div class="container">
  
   <form action="{{ route('countries.store') }}" method="post" class="form-horizontal">
   {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Country</div>
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
                        <label for="name" class="control-label col-md-4">Country</label>
                        <div class="col-md-6"><input type="text" class="form-control" name="name" id="name"></div>
                    </div>
                    <div class="form-group">
                        <label for="territory" class="control-label col-md-4">Territory</label>
                        <div class="col-md-6"><input type="text" class="form-control" name="territory" id="territory"></div>
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

@endsection
