@extends('layouts.backend')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <users-component
            table-id="users-dt"
            form-dialog-ref="userFormDialog"
            details-dialog-ref="userDetailsDialog"
            app-url="{{config('app.url')}}"
            api-route="{{route('api.users.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Users List">
                        <div class="text-right mb-2">
                            <b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New User</b-button>
                        </div>
                        <dt-component table-id="users-dt"
                                      ajax-url="{{route('api.users.dt')}}"                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      :action-buttons="{{json_encode($actions)}}"
                                      table-classes="table table-hover"
                                      v-on:edit-user="showFormDialog"
                                      v-on:show-user="showDetailsDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal size="lg" v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop scrollable v-cloak ref="userFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit User @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New User</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.users.form")
                        </template>
                    </b-modal>
                    <b-modal size="lg" v-if="form" scrollable v-cloak ref="userDetailsDialog">
                        @include('backend.users.show')
                    </b-modal>
                </b-col>
            </b-row>
        </users-component>
    </div>
@endsection

@push('scripts')
@endpush
