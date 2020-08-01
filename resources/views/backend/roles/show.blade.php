<b-card v-if="form.display_name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Display Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.display_name}}    </span>
</b-card>
<b-card v-if="form.guard_name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Guard Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.guard_name}}    </span>
</b-card>
<b-card v-if="form.enabled" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Enabled</b-card-title>
    <span class="p-1 m-1">
        @{{ form.enabled}}    </span>
</b-card>
