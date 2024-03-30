<div class="{{ app()->getLocale() == 'en' ? 'sidebar-wrapper' : 'sidebar-wrapper-rtl' }}" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div> --}}
        <div>
            <h4 class="logo-text">tHRS Admin</h4>
        </div>
        {{-- <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div> --}}
    </div>
    <!--navigation-->
    {{-- <span>Admin</span> --}}
    <ul class="metismenu" id="menu">
        <!-- Add icons to the links using the .nav-icon class
  with font-awesome or any other icon font library -->

        <li class="nav-item {{ request()->is('*/company/home') ? 'mm-active' : '' }}">
            <a href="{{ route('company.home.home') }}" class="nav-link">

                <p>
                    {{ __('routes.Dashboard') }}

                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('*/company/calendar') ? 'mm-active' : '' }} ">
            <a href="{{ route('company.calendar.calendar_index') }}" class="nav-link">

                <p>
                    {{ __('routes.Calendar') }}

                </p>
            </a>
        </li>
        <li class="menu-label">{{ __('routes.Users Managment') }}</li>
        <li class="nav-item  {{ request()->is('*/company/roles') ? 'mm-active' : '' }}">
            <a href="{{ route('company.roles.roles_index') }}" class="nav-link">

                <p>
                    {{ __('routes.Roles Managment') }}

                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('*/company/employees') ? 'mm-active' : '' }}">
            <a href="{{ route('company.employees.employees_index') }}"
                class="nav-link  ">

                <p>
                    {{ __('routes.Employees Managment') }}

                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('*/company/attendence') ? 'mm-active' : '' }}">
            <a href="{{ route('company.attendence.attendence_index') }}"
                class="nav-link  ">

                <p>
                    {{ __('routes.Attendence Managment') }}

                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('*/company/department') ? 'mm-active' : '' }}">
            <a href="{{ route('company.department.department_index') }}"
                class="nav-link  ">
                <p>
                    {{ __('routes.Department Managment') }}
                </p>
            </a>
        </li>
        <li class="nav-item {{ request()->is('*/company/stock') ? 'mm-active' : '' }}">
            <a href="{{ route('company.stock.stock_index') }}"
                class="nav-link  ">
                <p>
                    {{ __('routes.Stock Managment') }}
                </p>
            </a>
        </li>
        <li class="menu-label">{{ __('routes.Leave Managment') }}</li>
        <li class="nav-item has-treeview">

            <ul class="nav-treeview">
                <li class="nav-item {{ request()->is('*/company/leave-settings/create') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.leave-settings.leave_settings_create') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Leave Settings') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/leave-requests') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.leave-requests.leave_requests_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Leave Request') }}</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-label">{{ __('routes.Accounting Managment') }}</li>
        <li class="nav-item has-treeview">

            <ul class=" nav-treeview">
                <li class="nav-item {{ request()->is('*/company/accounts') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.coa.coa_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Chart of Accounts') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/journals') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.journals.journals_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Journals') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/documents') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.documents.document_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Documents') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/revenues') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.revenues.revenue_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Revenue') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/expenses') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.expenses.expenses_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Expenses') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/account-statement') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.account-statement.account_statement_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Account Statement') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/balance-sheet') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.balance-sheet.balance_sheet_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Balance Sheet') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('*/company/profit-loss') ? 'mm-active' : '' }}">
                    <a href="{{ route('company.profit-loss.profit_loss_index') }}" class="nav-link">
                        {{-- <i class="far fa-circle nav-icon"></i> --}}
                        <p>{{ __('routes.Profit and Loss') }}</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
           <a href="{{ route('company.financial_calendar.financial_year_index') }}" class="nav-link">
             
             <p>Financial Calendar</p>
           </a>
         </li> --}}
                {{-- <li class="nav-item">
           <a href="{{ route('company.coa.coa_expenses') }}" class="nav-link">
             <p>{{__('routes.Expenses')}}</p>
           </a>
         </li> --}}

            </ul>
        </li>

        <li class="menu-label">{{ __('routes.Payroll Managment') }}</li>
        <li class="nav-item {{ request()->is('*/company/payroll') ? 'mm-active' : '' }}">
            <a href="{{ route('company.payroll.payroll_index') }}" class="nav-link">

                <p>
                    {{ __('routes.Payroll Managment') }}

                </p>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
