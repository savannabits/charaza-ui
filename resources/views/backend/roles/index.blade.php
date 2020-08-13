@extends('layouts.backend')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <roles-component
            table-id="roles-dt"
            form-dialog-ref="roleFormDialog"
            details-dialog-ref="roleDetailsDialog"
            delete-dialog-ref="roleDeleteDialog"
            app-url="{{config('app.url')}}"
            api-route="{{route('api.roles.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Roles List">
                        <div class="text-right mb-2">
                            @can('roles.create')<b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Role</b-button>@endcan
                        </div>
                        <dt-component table-id="roles-dt"
                                      ajax-url="{{route('api.roles.dt')}}"
                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      table-classes="table table-hover"
                                      v-on:edit-role="showFormDialog"
                                      v-on:show-role="showDetailsDialog"
                                      v-on:delete-role="showDeleteDialog"
                        ></dt-component>
                    </b-card>
                    @canany(['roles.create', 'roles.delete'])
                    <b-modal size="lg" v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop scrollable v-cloak ref="roleFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Role @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Role</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.roles.form")
                        </template>
                    </b-modal>
                    @endcanany
                    @can('roles.show')
                    <b-modal size="lg" v-if="form" scrollable v-cloak ref="roleDetailsDialog">
                        @include('backend.roles.show')
                    </b-modal>
                    @endcan
                    @can('roles.delete')
                    <b-modal size="sm" v-on:ok.prevent="deleteItem" hide-footer hide-header body-bg-variant="danger" body-text-variant="light" centered v-if="form" scrollable v-cloak ref="roleDeleteDialog">
                        <template v-slot:default="{ok,hide}">
                            Are you sure you want to delete this Role?
                            <div class="text-right">
                                <b-button v-on:click="hide()" variant="light">No</b-button>
                                <b-button v-on:click="ok()" variant="primary">Yes</b-button>
                            </div>
                        </template>
                    </b-modal>
                    @endcan
                </b-col>
            </b-row>
        </roles-component>
    </div>
@endsection

@push('scripts')
@endpush
