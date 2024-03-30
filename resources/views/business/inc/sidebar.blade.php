<div class="{{ app()->getLocale() == 'en'?'sidebar-wrapper':'sidebar-wrapper-rtl' }}" data-simplebar="true">
    <div class="sidebar-header">
        
        <div>
            <h4 class="logo-text">tHRS Admin</h4>
        </div>
        {{-- <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i> --}}
        {{-- </div> --}}
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

        <li class="nav-item {{ request()->is('*/business/home') ? 'mm-active' : '' }}">
            <a href="{{ route('business.home.home') }}" class="nav-link">

                <p>
                    {{ __('routes.Dashboard') }}

                </p>
            </a>
        </li>
      
        <li class="nav-item {{ request()->is('*/business/user') ? 'mm-active' : '' }}">
            <a href="{{ route('business.user.user_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    {{ __('routes.Users Managment') }}

                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('*/business/categories') ? 'mm-active' : '' }}">
            <a href="{{ route('business.categories.category_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                <p>
                    {{ __('routes.Categories Managment') }}

                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('*/business/clients') ? 'mm-active' : '' }}">
            <a href="{{ route('business.clients.clients_index') }}" class="nav-link {{ request()->is('thrs/admin/packages') ? 'active' : '' }}">

                <p>
                    {{ __('routes.Clients Managment') }}

                </p>
            </a>
        </li>
        @if (Auth::guard('business')->user()->company->business_type == 1 || Auth::guard('business')->user()->company->business_type == 3)
            <li class="nav-item {{ request()->is('*/business/products') ? 'mm-active' : '' }}">
                <a href="{{ route('business.products.products_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                    <p>
                        {{ __('routes.Products Managment') }}

                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('*/business/orders') ? 'mm-active' : '' }}">
                <a href="{{ route('business.orders.orders_index') }}" class="nav-link">
    
                    <p>
                        {{ __('routes.Orders Managment') }}
    
                    </p>
                </a>
            </li>
        @endif
        @if (Auth::guard('business')->user()->company->business_type == 2 || Auth::guard('business')->user()->company->business_type == 3)
            <li class="nav-item {{ request()->is('*/business/services') ? 'mm-active' : '' }}">
                <a href="{{ route('business.services.services_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                    <p>
                        {{ __('routes.Services Managment') }}

                    </p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/business/invoices') ? 'mm-active' : '' }}">
                <a href="{{ route('business.invoices.invoices_index') }}" class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

                    <p>
                        {{ __('routes.Invoice Management') }}

                    </p>
                </a>
            </li>
        @endif
        
       
        
       
    </ul>
    <!--end navigation-->
</div>
