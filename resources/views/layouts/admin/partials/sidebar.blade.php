<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav collapse  navbar-collapse ">
        <ul class="nav" id="side-menu">



            @if (auth()->check() && auth()->user()->role->name == \App\User::ROLE_ADMINISTRATOR)
            <li>
                <a href="#"><i class="fa fa-address-book-o "></i> Users <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('users-list') }}">Preview all</a>
                    </li>
                    <li>
                        <a href="{{ route('users-create') }}">New user</a>
                    </li>

                </ul>


                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User Roles<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('roles-list') }}">Preview all</a>
                    </li>
                    <li>
                        <a href="{{ route('roles-create') }}">New Roles</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
            <li>
                <a href="#"><i class="fa fa-book fa-fw"></i> Documents <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                     @if (auth()->check() && auth()->user()->role->name == \App\User::ROLE_ADMINISTRATOR)
                    <li>
                        <a href="{{ route('documents-list') }}">Preview all</a>
                    </li>
                    <li>
                        <a href="{{ route('documents-create') }}">New Documents</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('homepage') }}">View all documents</a>
                    </li>
                    @endif
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
           
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
