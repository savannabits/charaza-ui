<b-form v-on:submit.prevent="ok()">
<b-form-group label-class="font-weight-bolder" label="Title">
    <b-form-input
        type="text" name="title" id="title"
        v-validate="'required'"
        :state="validateState('title')" v-model="form.title"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('title')">
        @{{errors.first('title')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label-class="font-weight-bolder" label="Description">
    <b-form-input
        type="text" name="description" id="description"
        v-validate="'required'"
        :state="validateState('description')" v-model="form.description"
    ></b-form-input>
    <b-form-invalid-feedback v-if="errors.has('description')">
        @{{errors.first('description')}}    </b-form-invalid-feedback>
</b-form-group>
<b-form-group label="Body" label-class="font-weight-bolder">
    <b-form-textarea
        name="body" id="body"
        v-validate="'required'"
        :state="validateState('body')" v-model="form.body"
    ></b-form-textarea>
    <b-form-invalid-feedback v-if="errors.has('body')">
        @{{errors.first('body')}}    </b-form-invalid-feedback>
</b-form-group>

        <b-form-group label-class="font-weight-bolder" label="Author">
    <infinite-select
        label="name" v-model="form.author" name="author"
         api-url="{{route('api.users.index')}}"
         :per-page="10"
        v-validate="'required'"
        :class="{'is-invalid': validateState('author')===false, 'is-valid': validateState('author')===true}"
    >
    </infinite-select>
    <b-form-invalid-feedback v-if="errors.has('author')">
        @{{errors.first('author')}}    </b-form-invalid-feedback>
</b-form-group>
    <b-button class="d-none" type="submit"></b-button>
</b-form>

