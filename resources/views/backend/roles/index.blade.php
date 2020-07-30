@extends('layouts.app')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <roles-component
            table-id="roles-dt"
            form-dialog-ref="rolesFormDialog"
            details-dialog-ref="roleDetailsDialog"
            app-url="{{config('app.url')}}"
            api-route="{{route('api.roles.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Roles Table">
                        <div class="text-right mb-2">
                            <b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Role</b-button>
                        </div>
                        <dt-component table-id="roles-dt"
                                      ajax-url="{{route('api.roles.dt')}}"
                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      :action-buttons="{{json_encode($actions)}}"
                                      table-classes=""
                                      v-on:edit-role="showFormDialog"
                                      v-on:show-role="showDetailsDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="rolesFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Role @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Role</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.roles.form")
                        </template>
                    </b-modal>
                    <b-modal v-if="form" scrollable v-cloak ref="roleDetailsDialog">
                        @include('backend.roles.show')
                    </b-modal>
                </b-col>
            </b-row>
        </roles-component>
    </div>
@endsection

@push('scripts')
@endpush
