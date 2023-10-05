<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">

        <h4 class="brand-text font-weight-light"><i>Admin Pannel</i></h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info mx-auto">
                <span  class="text-capitalize text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->




                <li class="nav-header">Order Section</li>
                <li class="nav-item">
                    <a href="{{ route('docs.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Create Document
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="{{ route('docs.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Document List
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('department.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Department Create
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="{{ route('department.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Department List
                        </p>
                    </a>

                </li>


                <li class="nav-item">
                    <a href="{{ route('permission.list') }}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Permission
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('role.create') }}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Roles
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>

                    </ul>
                </li>








            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
