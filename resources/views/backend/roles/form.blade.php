<b-form v-on:submit.prevent="ok()">
<b-form-group label-class="font-weight-bolder" label="Display Name">
    <b-form-input
        type="text" name="display_name" id="display_name"
        v-validate="'required'"
        :state="validateState('display_name')" v-model="form.display_name"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('display_name')">
        @{{errors.first('display_name')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Guard Name">
    <b-form-input
        type="text" name="guard_name" id="guard_name"
        v-validate="'required'"
        :state="validateState('guard_name')" v-model="form.guard_name"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('guard_name')">
        @{{errors.first('guard_name')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-cols="4" label-class="font-weight-bolder" label="Enabled">
    <b-form-checkbox
        size="lg"
        name="enabled" id="enabled"
        v-validate="''"
        :state="validateState('enabled')" v-model="form.enabled"
    ></b-form-checkbox>
    <b-form-invalid-feedback v-if="errors.has('enabled')">
        @{{errors.first('enabled')}}    </b-form-invalid-feedback>
</b-form-group>
        <b-button class="d-none" type="submit"></b-button>
</b-form>

