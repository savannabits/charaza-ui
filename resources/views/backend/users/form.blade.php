<b-form v-on:submit.prevent="ok()">
<b-form-group label-class="font-weight-bolder" label="Username">
    <b-form-input
        type="text" name="username" id="username"
        v-validate="'required'"
        :state="validateState('username')" v-model="form.username"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('username')">
        @{{errors.first('username')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Email">
    <b-form-input
        type="text" name="email" id="email"
        v-validate="'required|email'"
        :state="validateState('email')" v-model="form.email"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('email')">
        @{{errors.first('email')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Name">
    <b-form-input
        type="text" name="name" id="name"
        v-validate="'required'"
        :state="validateState('name')" v-model="form.name"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('name')">
        @{{errors.first('name')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="First Name">
    <b-form-input
        type="text" name="first_name" id="first_name"
        v-validate="'required'"
        :state="validateState('first_name')" v-model="form.first_name"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('first_name')">
        @{{errors.first('first_name')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Middle Name">
    <b-form-input
        type="text" name="middle_name" id="middle_name"
        v-validate="''"
        :state="validateState('middle_name')" v-model="form.middle_name"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('middle_name')">
        @{{errors.first('middle_name')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Last Name">
    <b-form-input
        type="text" name="last_name" id="last_name"
        v-validate="'required'"
        :state="validateState('last_name')" v-model="form.last_name"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('last_name')">
        @{{errors.first('last_name')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group
    label-class="font-weight-bold" label="email_verified_at"
    :invalid-feedback="errors.first('email_verified_at')"
>
    <date-picker
        name="email_verified_at" id="email_verified_at"
        :config="dateTimeConfig" v-model="form.email_verified_at"
        v-validate="'date_format:yyyy-MM-dd HH:mm:ss'"
        :class="{'is-invalid': validateState('email_verified_at')===false, 'is-valid': validateState('email_verified_at')===true}"
    ></date-picker>
</b-form-group>
    <b-form-group label="Password" label-class="font-weight-bolder">
    <b-form-input
        type="password" name="password" ref="password" id="password"
        v-validate="'confirmed:password|min:7'"
        :state="validateState('password')" v-model="form.password"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('password')">
        @{{errors.first('password')}}    </b-form-invalid-feedback>
</b-form-group>

<b-form-group label="Confirm Password" label-class="font-weight-bolder">
    <b-form-input
        type="password" name="password_confirmation" id="password_confirmation"
        data-vv-as="password"
        v-validate="'confirmed:password|confirmed:password|min:7'"
        :state="validateState('password_confirmation')" v-model="form.password_confirmation"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('password_confirmation')">
        @{{errors.first('password_confirmation')}}    </b-form-invalid-feedback>
</b-form-group>

        <b-button class="d-none" type="submit"></b-button>
</b-form>

