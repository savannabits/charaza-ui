<b-form @submit.prevent="ok()">
    <b-form-group label="Name">
        <b-form-input type="text" v-model="form.name"></b-form-input>
    </b-form-group>
    <b-form-group label="Email">
        <b-form-input type="email" v-model="form.email"></b-form-input>
    </b-form-group>
    <b-form-group label="Password">
        <b-form-input type="password" v-model="form.password"></b-form-input>
    </b-form-group>

    <b-button class="d-none" type="submit"></b-button>
</b-form>
