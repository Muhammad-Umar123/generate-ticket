<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">Grexsan</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown active" style="display: block;">
                <div class="sidebar-profile">
                    <div class="siderbar-profile-pic">
                        <img src="{{ asset('assets/img/default_image.png') }}" class="profile-img-circle box-center" alt="User Image" style="background-color: darkslategrey;">
                    </div>
                    <div class="siderbar-profile-details">
                        <div class="siderbar-profile-name"> {{ auth()->user()->name }} </div>
                    </div>
                    <div class="sidebar-profile-buttons">

                </div>
            </li>
            <li class="menu-header">Main</li>
            <li class="{{  Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-desktop"></i><span>Dashboard</span></a></li>
            <li class="dropdown {{ Request::is('tickets*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown toggle"><i class="fas fa-ticket-alt"></i><span>Tickets</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('tickets/create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tickets.create') }}">Add Ticket</a></li>
                    <li class="{{ Request::is('tickets') ? 'active' : '' }}"><a class="nav-link" href="{{ route('tickets.index') }}">All Tickets</a></li>
                </ul>
            </li>
           
        </ul>
    </aside>
</div>