<b-card v-if="form.name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.name}}    </span>
</b-card>
<b-card v-if="form.description" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Description</b-card-title>
    <span class="p-1 m-1">
        @{{ form.description}}    </span>
</b-card>
<b-card v-if="form.active" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Active</b-card-title>
    <span class="p-1 m-1">
        @{{ form.active}}    </span>
</b-card>
