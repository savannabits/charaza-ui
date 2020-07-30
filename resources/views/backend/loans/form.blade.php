<b-form v-on:submit.prevent="ok()">
<b-form-group
    label-class="font-weight-bold" label="borrowed_at"
    :invalid-feedback="errors.first('borrowed_at')"
>
    <date-picker
        name="borrowed_at" id="borrowed_at"
        :config="dateTimeConfig" v-model="form.borrowed_at"
        v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'"
        :class="{'is-invalid': validateState('borrowed_at')===false, 'is-valid': validateState('borrowed_at')===true}"
    ></date-picker>
</b-form-group>
    <b-form-group label-class="font-weight-bolder" label="Amount">
    <b-form-input
        type="text" name="amount" id="amount"
        v-validate="'required|decimal'"
        :state="validateState('amount')" v-model="form.amount"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('amount')">
        @{{errors.first('amount')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Borrower">
    <infinite-select
        label="name" v-model="form.borrower" name="borrower"
         api-url="{{route('api.users.index')}}"
         :per-page="10"
        v-validate="'required'"
        :class="{'is-invalid': validateState('borrower')===false, 'is-valid': validateState('borrower')===true}"
    >
    </infinite-select>
    <b-form-invalid-feedback v-if="errors.has('borrower')">
        @{{errors.first('borrower')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Lender">
    <infinite-select
        label="name" v-model="form.lender" name="lender"
         api-url="{{route('api.users.index')}}"
         :per-page="10"
        v-validate="'required'"
        :class="{'is-invalid': validateState('lender')===false, 'is-valid': validateState('lender')===true}"
    >
    </infinite-select>
    <b-form-invalid-feedback v-if="errors.has('lender')">
        @{{errors.first('lender')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Product">
    <infinite-select
        label="name" v-model="form.product" name="product"
         api-url="{{route('api.products.index')}}"
         :per-page="10"
        v-validate="'required'"
        :class="{'is-invalid': validateState('product')===false, 'is-valid': validateState('product')===true}"
    >
    </infinite-select>
    <b-form-invalid-feedback v-if="errors.has('product')">
        @{{errors.first('product')}}    </b-form-invalid-feedback>
</b-form-group>
    <b-button class="d-none" type="submit"></b-button>
</b-form>

