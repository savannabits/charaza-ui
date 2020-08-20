<b-card v-if="form.name" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Name</b-card-title>
    <span class="p-1 m-1">
        @{{ form.name}}    </span>
</b-card>
<b-card v-if="form.default_value" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Default Value</b-card-title>
    <span class="p-1 m-1">
        @{{ form.default_value}}    </span>
</b-card>
<b-card v-if="form.data_type" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Data Type</b-card-title>
    <span class="p-1 m-1">
    @{{ form.data_type.name}}    </span>
</b-card>
