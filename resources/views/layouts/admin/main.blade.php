@extends('layouts.main')
@section('content')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Low disk space. Let's clean it!
                                        <div class="time">17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Admin</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">Ad</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/dashboard">
                                <i class="fas fa-home"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/class') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/class">
                                <i class="fas fa-book-open"></i> <span>Class</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown {{ Request::is('admin/verif/*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-dollar-sign"></i> <span>Payment</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('admin/verif/belum') ? 'active' : '' }}"><a
                                        class="nav-link" href="/admin/verif/belum">Belum Verifikasi</a></li>
                                <li class="{{ Request::is('admin/verif/sudah') ? 'active' : '' }}"><a
                                        class="nav-link" href="/admin/verif/sudah">Sudah Verifikasi</a></li>
                            </ul>
                        </li>
                        <li
                            class="nav-item dropdown {{ Request::is('admin/prices') || Request::is('admin/videos') || Request::is('admin/mentor') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-globe"></i>
                                <span>Management Page</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('admin/prices') ? 'active' : '' }}"><a class="nav-link"
                                        href="/admin/prices">Prices</a></li>
                                <li class="{{ Request::is('admin/videos') ? 'active' : '' }}"><a class="nav-link"
                                        href="/admin/videos">Videos</a></li>
                                <li class="{{ Request::is('admin/mentor') ? 'active' : '' }}"><a class="nav-link"
                                        href="/admin/mentor">Mentor</a></li>
                            </ul>
                        </li>
                        <li
                            class="nav-item dropdown {{ Request::is('admin/admin') || Request::is('admin/users') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i>
                                <span>Management Akun</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ Request::is('admin/admin') ? 'active' : '' }}"><a class="nav-link"
                                        href="/admin/admin">Admin</a></li>
                                <li class="{{ Request::is('admin/users') ? 'active' : '' }}"><a class="nav-link"
                                        href="/admin/users">Users</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Data</li>
                        <li class="{{ Request::is('admin/dokumen') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/dokumen">
                                <i class="fas fa-folder-open"></i> <span>Data Dokumen</span>
                            </a>
                        </li>
                </aside>
            </div>
            @yield('admin')
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Design By <a
                        href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                    <div class="bullet"></div> Edited By Nuril
                </div>
            </footer>
        </div>
    </div>
@endsection
