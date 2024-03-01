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
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }} open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
                    <a href="{{ route('home.admin') }}" class="menu-link">
                        <div data-i18n="Home">Home</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/upload-ttd') ? 'active' : '' }}">
                    <a href="{{ route('form.change.ttd') }}" class="menu-link">
                        <div data-i18n="Change TTD">Change TTD</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="List Data">List Data</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('admin/listdata/surattugas') ? 'active' : '' }}">
                            <a href="{{ route('listdata.surattugas') }}" class="menu-link">
                                <div data-i18n="Surat Tugas">Surat Tugas</div>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('admin/listdata/suratizinpenelitian') ? 'active' : '' }}">
                            <a href="{{ route('listdata.suratizinpenelitian') }}" class="menu-link">
                                <div data-i18n="Surat Izin Penelitian">Surat Izin Penelitian</div>
                            </a>
                        </li>
                        <!-- Add more sub-items as needed -->
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->
@endsection
