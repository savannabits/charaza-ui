<b-form v-on:submit.prevent="ok()">
<b-form-group label-class="font-weight-bolder" label="Name">
    <b-form-input
        type="text" name="name" id="name"
        v-validate="'required'"
        :state="validateState('name')" v-model="form.name"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('name')">
        @{{errors.first('name')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label="Description" label-class="font-weight-bolder">
    <b-form-textarea
        name="description" id="description"
        v-validate="''"
        :state="validateState('description')" v-model="form.description"
    ></b-form-textarea>
    <b-form-invalid-feedback v-if="errors.has('description')">
        @{{errors.first('description')}}    </b-form-invalid-feedback>
</b-form-group>
    <b-form-group label-cols="4" label-class="font-weight-bolder" label="Active">
    <b-form-checkbox
        size="lg"
        name="active" id="active"
        v-validate="''"
        :state="validateState('active')" v-model="form.active"
    ></b-form-checkbox>
    <b-form-invalid-feedback v-if="errors.has('active')">
        @{{errors.first('active')}}    </b-form-invalid-feedback>
</b-form-group>
        <b-button class="d-none" type="submit"></b-button>
</b-form>

