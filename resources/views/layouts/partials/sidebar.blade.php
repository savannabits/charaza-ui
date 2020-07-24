<li>
    <a href="#">About</a>
</li>
<li>
    <a href="#">Portfolio</a>
</li>
<li>
    <a href="#manage-users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User Management</a>
    <ul class="collapse list-unstyled" id="manage-users">
        <li>
            <a href="{{route('admin.roles.index')}}">Roles</a>
        </li>
        <li>
            <a href="{{route('admin.users.index')}}">Users</a>
        </li>
    </ul>
</li>
