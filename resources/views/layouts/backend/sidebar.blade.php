@php
    $adminPrefix = config('savadmin.app.prefix');
@endphp

<div class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{asset('/assets/brand/coreui-base-white.svg')}}" width="118" height="46" alt="CoreUI Logo">
    <img class="c-sidebar-brand-minimized" src="{{asset('assets/brand/coreui-signet-white.svg')}}" width="118" height="46" alt="CoreUI Logo">
</div>
<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('home')}}">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{url('/assets/icons/coreui/free-symbol-defs.svg#cui-speedometer')}}"></use>
            </svg> Dashboard</a></li>
{{--DO NOT REMOVE ME!--}}
    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="fa fa-user"></i>
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-cursor')}}"></use>
            </svg> Users and Roles
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            @can("roles.index")<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href='{{route("$adminPrefix.roles.index")}}'><i class="c-sidebar-nav-icon fa fa-sticky-note-o"></i> Roles</a></li>@endcan
                @can("users.index")<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href='{{route("$adminPrefix.users.index")}}'><i class="c-sidebar-nav-icon fa fa-sticky-note-o"></i> Users</a></li>@endcan
        </ul>
    </li>
    <li class="c-sidebar-nav-divider"></li>
    <li class="c-sidebar-nav-item nav-item">
        <a class="c-sidebar-nav-link" href="" target="_top">
            <i class="c-sidebar-nav-icon fa fa-cogs"></i>Settings</a>
    </li>
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
