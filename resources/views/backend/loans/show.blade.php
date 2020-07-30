<b-card v-if="form.borrowed_at" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Borrowed At</b-card-title>
    <span class="p-1 m-1">
        @{{ form.borrowed_at}}    </span>
</b-card>
<b-card v-if="form.amount" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Amount</b-card-title>
    <span class="p-1 m-1">
        @{{ form.amount}}    </span>
</b-card>
<b-card v-if="form.borrower" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Borrower</b-card-title>
    <span class="p-1 m-1">
    @{{ form.borrower.name}}    </span>
</b-card>
<b-card v-if="form.lender" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Lender</b-card-title>
    <span class="p-1 m-1">
    @{{ form.lender.name}}    </span>
</b-card>
<b-card v-if="form.product" no-body>
    <b-card-title class="font-weight-bolder card-title p-1 m-1">Product</b-card-title>
    <span class="p-1 m-1">
    @{{ form.product.name}}    </span>
</b-card>
