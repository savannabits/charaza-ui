<b-card v-if="form.username" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Username</b-card-title>
    <span class="p-1 m-1">
        @{{ form.username}}    </span>
</b-card>
<b-card v-if="form.email" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Email</b-card-title>
    <span class="p-1 m-1">
        @{{ form.email}}    </span>
</b-card>
<b-card v-if="form.name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.name}}    </span>
</b-card>
<b-card v-if="form.first_name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">First Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.first_name}}    </span>
</b-card>
<b-card v-if="form.middle_name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Middle Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.middle_name}}    </span>
</b-card>
<b-card v-if="form.last_name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Last Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.last_name}}    </span>
</b-card>
<b-card v-if="form.email_verified_at" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Email Verified At</b-card-title>
    <span class="p-1 m-1">
        @{{ form.email_verified_at}}    </span>
</b-card>
<b-card v-if="form.password" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Password</b-card-title>
    <span class="p-1 m-1">
        @{{ form.password}}    </span>
</b-card>
