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
<b-form-group label-class="font-weight-bolder" label="Default Value">
    <b-form-input
        type="text" name="default_value" id="default_value"
        v-validate="''"
        :state="validateState('default_value')" v-model="form.default_value"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('default_value')">
        @{{errors.first('default_value')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Data Type">
    <infinite-select
        label="name" v-model="form.data_type" name="data_type"
         api-url="{{route('api.data-types.index')}}"
         :per-page="10"
        v-validate="'required'"
        :class="{'is-invalid': validateState('data_type')===false, 'is-valid': validateState('data_type')===true}"
    >
    </infinite-select>
    <b-form-invalid-feedback v-if="errors.has('data_type')">
        @{{errors.first('data_type')}}    </b-form-invalid-feedback>
</b-form-group>
    <b-button class="d-none" type="submit"></b-button>
</b-form>

