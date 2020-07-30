@php
    $adminPrefix = config('savadmin.app.prefix');
@endphp
@can("product-types.index")<li><a href='{{route("$adminPrefix.product-types.index")}}'><i class="mdi mdi-menu"></i> Product Types</a></li>@endcan
@can("products.index")<li><a href='{{route("$adminPrefix.products.index")}}'><i class="mdi mdi-menu"></i> Products</a></li>@endcan
@can("loans.index")<li><a href='{{route("$adminPrefix.loans.index")}}'><i class="mdi mdi-menu"></i> Loans</a></li>@endcan
{{--DO NOT REMOVE ME!--}}
<li class="nav-item">
    <a href="#manage-users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users & Roles</a>
    <ul class="collapse list-unstyled" id="manage-users">
        <li>
            <a href="{{route("$adminPrefix.roles.index")}}">Roles</a>
        </li>
        <li>
            <a href="{{route("$adminPrefix.users.index")}}">Users</a>
        </li>

    </ul>
</li>
