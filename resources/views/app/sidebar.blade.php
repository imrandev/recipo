<aside class="main-sidebar bg-yellow elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <span class="brand-text font-weight-light">Recipo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/avatar-default.png')}}" class="img-circle elevation-2" alt="UserAvatar">
            </div>
            <div class="info">
                <a href="#" class="d-block text-sm">Welcome, {{$activeUserName ?? 'User'}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                {{--Recipe--}}
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link left-menu-recipe">
                        <i class="nav-icon fas fa-drum-steelpan"></i>
                        <p>
                            My Recipe
                            {{--<span class="badge badge-info right">2</span>--}}
                        </p>
                    </a>
                </li>

                {{--Ingredients--}}
                <li class="nav-item">
                    <a href="{{ url('/ingredients') }}" class="nav-link left-menu-ingredients">
                        <i class="nav-icon fas fa-drumstick-bite"></i>
                        <p>
                            Ingredients
                            {{--<span class="badge badge-info right">2</span>--}}
                        </p>
                    </a>
                </li>

                {{--Logout--}}
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
