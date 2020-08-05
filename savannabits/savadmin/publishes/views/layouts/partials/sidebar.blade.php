@php
    $adminPrefix = config('savadmin.app.prefix');
@endphp

{{--DO NOT REMOVE ME!--}}
<li class="dropdown-divider"></li>
<li class="nav-item">
    <a href="#manage-users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users & Roles</a>
    <ul class="collapse list-unstyled" id="manage-users">
        @can("roles.index")<li><a href='{{route("$adminPrefix.roles.index")}}'><i class="mdi mdi-menu"></i> Roles</a></li>@endcan
        @can("users.index")<li><a href='{{route("$adminPrefix.users.index")}}'><i class="mdi mdi-menu"></i> Users</a></li>@endcan
    </ul>
</li>
