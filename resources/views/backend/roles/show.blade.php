<b-card no-body v-for="(item, key) of form">
    <b-card-title class="font-weight-bolder card-title p-1 m-1">@{{ key }}</b-card-title>
    <span class="p-1 m-1">@{{ item }}</span>
</b-card>
