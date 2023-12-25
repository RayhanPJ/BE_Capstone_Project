@extends('admin.template');

@section('sidebarAdmin')
<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('/template/assets/img/branding/e-letter-logo.png') }}" alt="E-Letter" width="180" height="85">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }} open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
                    <a href="{{ route('home.admin') }}" class="menu-link">
                        <div data-i18n="Home">Home</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/listdata') ? 'active' : '' }}">
                    <a href="{{ route('listdata') }}" class="menu-link">
                        <div data-i18n="List Data">List Data</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
@endsection
