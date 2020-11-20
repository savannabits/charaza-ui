<b-card v-if="form.title" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Title</b-card-title>
    <span class="p-1 m-1">
        @{{ form.title}}    </span>
</b-card>
<b-card v-if="form.description" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Description</b-card-title>
    <span class="p-1 m-1">
        @{{ form.description}}    </span>
</b-card>
<b-card v-if="form.body" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Body</b-card-title>
    <span class="p-1 m-1">
        @{{ form.body}}    </span>
</b-card>
<b-card v-if="form.author" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Author</b-card-title>
    <span class="p-1 m-1">
    @{{ form.author.name}}    </span>
</b-card>
