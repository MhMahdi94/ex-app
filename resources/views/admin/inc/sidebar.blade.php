<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div> --}}
        <div>
            <h4 class="logo-text">tHRS Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
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
            <a href="{{ route('admin.admins.admins_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    Admin Managment

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.owners.owners_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    Owner Managment

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.companies.companies_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    Company Managment

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.packages.packages_index') }}" class="nav-link {{ request()->is('thrs/admin/packages') ? 'active' : '' }}">

                <p>
                    Service Managment

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.requests.requests_index') }}" class="nav-link">

                <p>
                    Requests Managment

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

        <li class="menu-label">Bussiness Section</li>
        <li class="nav-item">
            <a href="{{ route('admin.business.business_index') }}" class="nav-link">

                <p>
                    Business Company

                </p>
            </a>
           
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.business_owner.business_owner_index') }}" class="nav-link">

                <p>
                    Business Owner

                </p>
            </a>
           
        </li>
    </ul>
    <!--end navigation-->
</div>
