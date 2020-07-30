<b-form @submit.prevent="ok()">
    <b-form-group label-cols="4" label="Display Name">
        <b-form-input type="text" :state="true" v-model="form.display_name"></b-form-input>
        <b-form-invalid-feedback>invalid</b-form-invalid-feedback>
    </b-form-group>
    <b-form-group label-cols="4" label="Guard Name">
        <b-form-input type="text" v-model="form.guard_name"></b-form-input>
    </b-form-group>
    <b-form-group label-cols="4" label="Enabled">
        <b-form-checkbox v-model="form.enabled"></b-form-checkbox>
    </b-form-group>

    <b-form-group>
        <date-picker :class="{'is-invalid': false}" :config="timeConfig" v-model="form.date"></date-picker>
        <b-form-invalid-feedback>invalid date</b-form-invalid-feedback>
    </b-form-group>
    <b-form-group label="User">
        <infinite-select label="name" class="is-invalid" v-model="form.user" api-url="{{route('api.users.index')}}" :per-page="10"></infinite-select>
        <b-form-invalid-feedback>Invalid user</b-form-invalid-feedback>
    </b-form-group>
    <b-button class="d-none" type="submit"></b-button>
</b-form>
