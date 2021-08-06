<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if($profile)
                <img src="{{ asset('images/company_profile/'.$profile->fav_icon) }}" class="
                img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            <li class="{{ Request::is('backend/dashboard')?'active':'' }}"><a href="{{route('backend.dashboard')}}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>


            {{-- company profile  --}}
            <li class="treeview {{ Request::is('backend/company-profile')?'active':'' }}">
                <a href="{{ route('backend.company_profile.create') }}">
                    <i class="fa fa-building"></i> <span>Company Profile</span>
                </a>
            </li>

            {{--User menu--}}
            <li class="treeview {{ Request::is('backend/users*')?'active':'' }}">
                <a href="{{ route('backend.users.index') }}">
                    <i class="fa fa-user"></i> <span>USER</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/users/create')?'active':'' }}"><a href="{{ route('backend.users.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/users')?'active':'' }}"><a href="{{ route('backend.users.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>

            {{-- projects  --}}

            <li class="treeview {{ Request::is('backend/projects*')?'active':'' }}">
                <a href="{{ route('backend.projects.index') }}">
                    <i class="fa fa-tasks"></i> <span>Project</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/projects/create')?'active':'' }}"><a href="{{ route('backend.projects.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/projects')?'active':'' }}"><a href="{{ route('backend.projects.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>

            {{-- services  --}}

            <li class="treeview {{ Request::is('backend/services*')?'active':'' }}">
                <a href="{{ route('backend.services.index') }}">
                    <i class="fa fa-wrench"></i> <span>Service</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/services/create')?'active':'' }}"><a href="{{ route('backend.services.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/services')?'active':'' }}"><a href="{{ route('backend.services.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>

            
            {{-- course type  --}}

            <li class="treeview {{ Request::is('backend/course-type*')?'active':'' }}">
                <a href="{{ route('backend.course_type.index') }}">
                    <i class="fa fa-certificate"></i> <span>Course Type</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/course-type/create')?'active':'' }}"><a href="{{ route('backend.course_type.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/course-type')?'active':'' }}"><a href="{{ route('backend.course_type.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>

            {{-- courses  --}}

            <li class="treeview {{ Request::is('backend/courses*')?'active':'' }}">
                <a href="{{ route('backend.courses.index') }}">
                    <i class="fa fa-university"></i> <span>Course</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/courses/create')?'active':'' }}"><a href="{{ route('backend.courses.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/courses')?'active':'' }}"><a href="{{ route('backend.courses.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>

            {{-- videos  --}}

            <li class="treeview {{ Request::is('backend/videos*')?'active':'' }}">
                <a href="{{ route('backend.videos.index') }}">
                    <i class="fa fa-youtube"></i> <span>Video</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/videos/create')?'active':'' }}"><a href="{{ route('backend.videos.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/videos')?'active':'' }}"><a href="{{ route('backend.videos.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>

            {{-- notice  --}}

            <li class="treeview {{ Request::is('backend/notices*')?'active':'' }}">
                <a href="{{ route('backend.notices.index') }}">
                    <i class="fa fa-bell"></i> <span>Notice</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/notices/create')?'active':'' }}"><a href="{{ route('backend.notices.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/notices')?'active':'' }}"><a href="{{ route('backend.notices.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>

            
            {{-- teams  --}}

            <li class="treeview {{ Request::is('backend/teams*')?'active':'' }}">
                <a href="{{ route('backend.teams.index') }}">
                    <i class="fa fa-users"></i> <span>Team</span>
                    <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('backend/teams/create')?'active':'' }}"><a href="{{ route('backend.teams.create') }}"><i class="fa fa-pencil-square-o"></i>create</a></li>
                    <li class="{{ Request::is('backend/teams')?'active':'' }}"><a href="{{ route('backend.teams.index') }}"><i class="fa fa-th-list"></i>list</a></li>
                </ul>
            </li>


            {{-- message --}}
            <li class="treeview {{ Request::is('backend/messages')?'active':'' }}">
                <a href="/backend/messages">
                    <i class="fa fa-envelope"></i> <span>Messages</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>