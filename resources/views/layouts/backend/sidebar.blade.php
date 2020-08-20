@php
    $adminPrefix = config('savadmin.app.prefix');
@endphp

<a href="{{route('welcome')}}" class="c-sidebar-brand">
    <img class="c-sidebar-brand-full" src="{{asset('/assets/brand/banner-white.png')}}" height="50" alt="Banner">
    <img class="c-sidebar-brand-minimized" src="{{asset('assets/brand/logo-white.png')}}" height="50" alt="Signet">
</a>
<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('home', tenant('id'))}}">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{url('/assets/icons/coreui/free-symbol-defs.svg#cui-speedometer')}}"></use>
            </svg> Dashboard</a></li>
@can("data-types")<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href='{{route("$adminPrefix.data-types.index",tenant('id'))}}'><i class="c-sidebar-nav-icon fa fa-sticky-note-o"></i> Data Types</a></li>@endcan
{{--DO NOT REMOVE ME!--}}
    @canany(['roles.index','users.index'])
    <li class="c-sidebar-nav-dropdown">
        <a class="c-sidebar-nav-dropdown-toggle" href="#">
            <span class="">
                <i class="cil-user mr-4"></i>
                Users and Roles
            </span>
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{url('vendors/@coreui/icons/svg/free.svg#cil-cursor')}}"></use>
            </svg>
        </a>
        <ul class="c-sidebar-nav-dropdown-items">
            @can("users")<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href='{{route("$adminPrefix.users.index",tenant('id'))}}'><i class="c-sidebar-nav-icon fa fa-sticky-note-o"></i> Users</a></li>@endcan
            @can("roles")<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href='{{route("$adminPrefix.roles.index",tenant('id'))}}'><i class="c-sidebar-nav-icon fa fa-sticky-note-o"></i> Roles</a></li>@endcan
            @can("roles.edit")<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href='{{route("$adminPrefix.roles.manage-permissions",tenant('id'))}}'><i class="c-sidebar-nav-icon cil-lock-locked"></i> Manage Permissions</a></li>@endcan
        </ul>
    </li>
    @endcanany
    <li class="c-sidebar-nav-divider"></li>
    @can("settings")<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href='{{route("$adminPrefix.settings.index",tenant('id'))}}'><i class="c-sidebar-nav-icon cil-settings"></i> Settings</a></li>@endcan

</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
