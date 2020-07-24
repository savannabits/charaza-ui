<b-form @submit.prevent="ok()">
    <b-form-group label-cols="4" label="Display Name">
        <b-form-input type="text" v-model="form.display_name"></b-form-input>
    </b-form-group>
    <b-form-group label-cols="4" label="Guard Name">
        <b-form-input type="text" v-model="form.guard_name"></b-form-input>
    </b-form-group>
    <b-form-group label-cols="4" label="Enabled">
        <b-form-checkbox v-model="form.enabled"></b-form-checkbox>
    </b-form-group>

    <b-button class="d-none" type="submit"></b-button>
</b-form>
