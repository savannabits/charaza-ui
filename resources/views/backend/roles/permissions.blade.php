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
            tenant="{{tenant('id')}}"
            tenant-header-name="{{config('savadmin.tenancy.header_name')}}"
            v-cloak inline-template
        >
            <b-row class="justify-content-center">
                <b-col md="10" lg="8" xl="6">
                    <b-card title="Manage Role Permissions">
                        <div class="text-right mb-2">
                            <form v-on:submit.prevent="">
                                <b-form-group label-class="font-weight-bolder" label="Select a Role">
                                    <infinite-select
                                        label="display_name" v-model="form" name="role"
                                        api-url="{{route('api.roles.index')}}"
                                        :per-page="10"
                                        v-validate="'required'"
                                        :class="{'is-invalid': validateState('role')===false, 'is-valid': validateState('role')===true}"
                                        @input="fetchRoleWithPermissions"
                                    >
                                    </infinite-select>
                                    <b-form-invalid-feedback v-if="errors.has('role')">
                                        @{{errors.first('role')}}    </b-form-invalid-feedback>
                                </b-form-group>
                            </form>
                        </div>
                        <div role="tablist" v-if="form && form.id && form.permissions_matrix">
                            <b-card v-for="group of form.permissions_matrix" no-body class="mb-1">
                                <b-card-header header-tag="header" class="p-1" role="tab">
                                    <b-button block v-b-toggle="group.slug" variant="primary">@{{ group.name }}</b-button>
                                </b-card-header>
                                <b-collapse :id="group.slug" visible accordion="perms-accordion" role="tabpanel">
                                    <b-card-body>
                                        <b-list-group>
                                            <b-list-group-item v-for="perm of group.perms">
                                                <b-form-checkbox @change="togglePermission($event, perm, form.id)" size="lg" v-model="perm.assigned" switch>
                                                    <strong>@{{ perm.title }}</strong>
                                                </b-form-checkbox>
                                            </b-list-group-item>
                                        </b-list-group>
                                    </b-card-body>
                                </b-collapse>
                            </b-card>
                        </div>
                    </b-card>
                </b-col>
            </b-row>
        </roles-component>
    </div>
@endsection

@push('scripts')
@endpush
