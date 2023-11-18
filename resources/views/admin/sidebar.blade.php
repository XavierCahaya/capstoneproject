
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
    <div class="navbar-container content">
        <div class="collapse navbar-collapse show" id="navbar-mobile">
        <a style="margin-top: 10px" class="navbar-brand mx-auto text-light" href="#">DASHBOARD ADMIN</a>
        <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
        </ul>
        <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             
            <span class="la la-user"><i></i></span></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span style="padding-top: 10px" class="la la-user"><span class="user-name fs-4 text-bold-400 ml-1">Username Admin</span></span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                </div>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </div>
</nav>

 <!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">       
        <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
            <h3 class="brand-text">N'Jajan Admin</h3></a></li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
    </ul>
    </div>
    <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item {{ request()->is('/admin/orderin') ? 'active' : '' }}"><a href="#"><i class="la la-arrow-circle-down "></i><span class="menu-title" data-i18n="">Pesanan Masuk</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-clock-o"></i><span class="menu-title" data-i18n="">Dalam Proses</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-check-circle"></i><span class="menu-title" data-i18n="">Pesanan Selesai</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Kelola Menu</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-box"></i><span class="menu-title" data-i18n="">Kelola Kategori</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-bullhorn"></i><span class="menu-title" data-i18n="">Promosi</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span class="menu-title" data-i18n="">Laporan Keuangan</span></a>
        </li>
    </ul>
    <div class="navigation-background"></div>
</div>
