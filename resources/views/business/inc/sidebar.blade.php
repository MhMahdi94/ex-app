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
            <a href="{{ route('business.user.user_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    User Managment

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('business.categories.category_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    Categories Managment

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('business.products.products_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    Products Managment

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.packages.packages_index') }}" class="nav-link {{ request()->is('thrs/admin/packages') ? 'active' : '' }}">

                <p>
                    Clients Managment

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
       
    </ul>
    <!--end navigation-->
</div>
