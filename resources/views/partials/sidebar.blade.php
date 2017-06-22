<div class="main-sidebar">
    <!-- Inner sidebar -->
    <div class="sidebar">
        <!-- user panel (Optional) -->
        <div class="user-panel">
            <div class="pull-left image">
               @if(Session::has('avatar'))
                <img src="{{ Session::get('avatar') }}" class="img-circle" alt="User Image">
                @else
                <img src="{{ asset('vendor/adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.user-panel -->

        <!-- Search Form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.sidebar-form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">TRACKING OPTIONS</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('activities.index') }}">Activities</a></li>
            <li><a href="{{ route('activities.all') }}">All Activities</a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="header">REPORTING OPTIONS</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="#">Export Data</a></li>
        </ul>
        <ul class="sidebar-menu">
            <li class="header">ADMIN OPTIONS</li>            
            <li><a href="{{ route('users.index') }}">Admin Users</a></li>
            <li><a href="{{ route('countries.index') }}">Admin Countries</a></li>
            <li><a href="{{ route('activityTypes.index') }}">Admin Activity Types</a></li>
            <li><a href="{{ route('technologies.index') }}">Admin Technologies</a></li>
            <li><a href="{{ route('se.index') }}">Admin Se</a></li>
        </ul>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</div>
<!-- /.main-sidebar -->
