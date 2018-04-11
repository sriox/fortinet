@extends('layouts.app') @section('content')
<div class="content body">
  
   <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" class="form-horizontal">
   {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>
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
                        <label for="name" class="control-label col-md-4">Name</label>
                        <div class="col-md-6"><input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-4">Email</label>
                        <div class="col-md-6"><input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}" required></div>
                    </div>
                    <div class="form-group">
                        <label for="profile" class="control-label col-md-4">Profile</label>
                        <div class="col-md-6">
                            <select name="profile" id="profile" class="form-control" required {{ !$profileChangeable ? 'disabled': '' }}>
                                @foreach($profiles as $profile)
                                <option value="{{ $profile->id }}" {{ $user->profile->id == $profile->id ? 'selected': '' }}>{{ $profile->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department" class="control-label col-md-4">Department</label>
                        <div class="col-md-6">
                            <select name="department" id="department" class="form-control" required>
                                <option value="">-- Select --</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ ($user->department && $user->department->id == $department->id)? 'selected': '' }} >{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
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
