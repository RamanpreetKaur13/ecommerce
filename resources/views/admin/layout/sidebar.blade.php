<nav class="sidebar sidebar-offcanvas" id="sidebar" style="width: 270px">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin/dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @if (Auth::guard('admin')->user()->type == 'vendors')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Vendor Setting</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a @if(Session::get('page') == ('update_personal_details')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/update-details/personal') }}">Personal Details</a></li>
            <li class="nav-item"> <a @if(Session::get('page') == ('update_business_details')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/update-details/business') }}">Business Details</a></li>
            <li class="nav-item"> <a  @if(Session::get('page') == ('update_bank_details')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/update-details/bank') }}">Bank Details</a></li>

          </ul>
        </div>
      </li>
    
      @else
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#admin_mngt" aria-expanded="false" aria-controls="admin_mngt">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Admin Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="admin_mngt">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a @if(Session::get('page') == ('view_admins')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif  class="nav-link" href="{{ url('admin/admins/admins') }}">Admins</a></li>
            <li class="nav-item"> <a @if(Session::get('page') == ('view_subadmins')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/admins/subadmins') }}">Sub Admins</a></li>
            <li class="nav-item"> <a  @if(Session::get('page') == ('view_vendors')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/admins/vendors') }}">Vendors</a></li>
            <li class="nav-item"> <a @if(Session::get('page') == ('view_all')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/admins/') }}">All</a></li>

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ctlg_mngmt" aria-expanded="false" aria-controls="ctlg_mngmt">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Catalogue Management</span>&nbsp;&nbsp;
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ctlg_mngmt">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a @if(Session::get('page') == ('sections')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif  class="nav-link" href="{{ route('admin/sections') }}">Sections</a></li>
            <li class="nav-item"> <a @if(Session::get('page') == ('categories')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/categories') }}">Categories</a></li>
            <li class="nav-item"> <a  @if(Session::get('page') == ('')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ url('admin/admins/vendors') }}">Products</a></li>
            

          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#user_mngt" aria-expanded="false" aria-controls="user_mngt">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">User Management </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user_mngt">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/admin/details') }}">Users</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/admin/subscribers') }}">Subscribers</a></li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-setting">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a @if(Session::get('page') == ('update_admin_password')) style="background: #fff !important; color:#4B49AC; !important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif class="nav-link" href="{{ route('admin/update-admin-password') }}">Update password</a></li>
            <li class="nav-item"> <a @if(Session::get('page') == ('update_admin_details')) style="background: #fff; color:#4B49AC;!important; margin-right:8px;"
              @else style="background: #4B49AC; color:#fff;!important; margin-right:8px;" @endif  class="nav-link" href="{{ route('admin/update-admin-details') }}">Update details</a></li>

          </ul>
        </div>
      </li>
      @endif
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Form elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="icon-bar-graph menu-icon"></i>
          <span class="menu-title">Charts</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="icon-contract menu-icon"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>