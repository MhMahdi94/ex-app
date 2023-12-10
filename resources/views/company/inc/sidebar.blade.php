<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            {{-- <span>Admin</span> --}}
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item ">
                    <a href="#" class="nav-link">

                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.employees.employees_index') }}"
                        class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                        <p>
                            Employees Managment

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.department.department_index') }}"
                        class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">
                        <p>
                            Department Managment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.stock.stock_index') }}"
                        class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">
                        <p>
                            Stock Managment
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                        <p>
                            Leave Managment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('company.leave-settings.leave_settings_create') }}" class="nav-link">
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <p>Leave Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company.leave-requests.leave_requests_index') }}" class="nav-link">
                                {{-- <i class="far fa-circle nav-icon"></i> --}}
                                <p>Leave Request</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                      <p>
                        Accountant Managment
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('company.coa.coa_index') }}" class="nav-link">
                          {{-- <i class="far fa-circle nav-icon"></i> --}}
                          <p>Chart of Accounts</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('company.coa.coa_index') }}" class="nav-link">
                          {{-- <i class="far fa-circle nav-icon"></i> --}}
                          <p>Expenses</p>
                        </a>
                      </li>
                      
                    </ul>
                  </li>
                <li class="nav-item">
                    <a href="{{ route('admin.companies.companies_index') }}"
                        class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                        <p>
                            Accountant Managment

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.requests.requests_index') }}" class="nav-link">

                        <p>
                            Payroll Managment

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.roles.roles_index') }}" class="nav-link">

                        <p>
                            Roles Managment

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
