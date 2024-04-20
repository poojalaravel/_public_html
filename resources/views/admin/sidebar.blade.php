        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                @if(Auth::User()->admin_type == 1)
                <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
                @else
                <div class="sidebar-brand-text mx-3">{{Auth::User()->name}} <sup></sup></div>
                @endif
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li  @if(Request::is('dashboard')) class="nav-item active" @else class="nav-item"  @endif>
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li  @if(Request::is('accountlist') || Request::is('addaccount')) class="nav-item active" @else class="nav-item"  @endif>
                <a class="nav-link" href="{{url('accountlist')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Account List</span></a>
            </li>
            <li  @if(Request::is('transaction') || Request::is('transaction')) class="nav-item active" @else class="nav-item"  @endif>
                <a class="nav-link" href="{{url('transaction')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Total earnings</span></a>
            </li>
            
            @if(Auth::User()->admin_type == 1)
            <li  @if(Request::is('productlist') || Request::is('addproduct')) class="nav-item active" @else class="nav-item"  @endif>
                <a class="nav-link" href="{{url('productlist')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Game List</span></a>
            </li>
            <li  @if(Request::is('userslist') || Request::is('userslist')) class="nav-item active" @else class="nav-item"  @endif>
                <a class="nav-link" href="{{url('userslist')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User List</span></a>
            </li>
            @endif
          

        </ul>
        <!-- End of Sidebar -->
