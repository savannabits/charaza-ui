@extends('layouts.backend')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <users-component
            table-id="users-dt"
            form-dialog-ref="userFormDialog"
            details-dialog-ref="userDetailsDialog"
            delete-dialog-ref="userDeleteDialog"
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
                                      table-classes="table table-hover"
                                      v-on:edit-user="showFormDialog"
                                      v-on:show-user="showDetailsDialog"
                                      v-on:delete-user="showDeleteDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal size="lg" v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="userFormDialog">
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
                    <b-modal size="sm" v-on:ok.prevent="deleteItem" hide-footer hide-header body-bg-variant="danger" body-text-variant="light" centered v-if="form" scrollable v-cloak ref="userDeleteDialog">
                        <template v-slot:default="{ok,hide}">
                            Are you sure you want to delete this User?
                            <div class="text-right">
                                <b-button v-on:click="hide()" variant="light">No</b-button>
                                <b-button v-on:click="ok()" variant="primary">Yes</b-button>
                            </div>
                        </template>
                    </b-modal>
                </b-col>
            </b-row>
        </users-component>
    </div>
@endsection

@push('scripts')
@endpush
