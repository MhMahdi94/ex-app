

<div class="{{ app()->getLocale() == 'en'?'sidebar-wrapper':'sidebar-wrapper-rtl' }}" data-simplebar="true">
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
   {{-- <span>Admin</span> --}}
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
   <li class="menu-label">Users Managment</li>
   <li class="nav-item">
        <a href="{{ route('company.roles.roles_index') }}" class="nav-link">

            <p>
                Roles Managment

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
    <a href="{{ route('company.attendence.attendence_index') }}"
        class="nav-link {{ request()->is('thrs/admin/admins') ? 'active' : '' }}">

        <p>
            Attendence Managment

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
   <li class="menu-label">Leave Managment</li>
   <li class="nav-item has-treeview">
       
       <ul class="nav-treeview">
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
   <li class="menu-label">Accounting Managment</li>
   <li class="nav-item has-treeview">
      
       <ul class=" nav-treeview">
         <li class="nav-item">
           <a href="{{ route('company.coa.coa_index') }}" class="nav-link">
             {{-- <i class="far fa-circle nav-icon"></i> --}}
             <p>Chart of Accounts</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{ route('company.journals.journals_index') }}" class="nav-link">
             {{-- <i class="far fa-circle nav-icon"></i> --}}
             <p>Journals</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{ route('company.documents.document_index') }}" class="nav-link">
             {{-- <i class="far fa-circle nav-icon"></i> --}}
             <p>Documents</p>
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
   
     <li class="menu-label">Payroll Managment</li>
   <li class="nav-item">
       <a href="{{ route('company.payroll.payroll_index') }}" class="nav-link">

           <p>
               Payroll Managment

           </p>
       </a>
   </li>
   
</ul>
    <!--end navigation-->
</div>