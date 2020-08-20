@extends('layouts.backend')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <settings-component
            table-id="settings-dt"
            form-dialog-ref="settingFormDialog"
            details-dialog-ref="settingDetailsDialog"
            delete-dialog-ref="settingDeleteDialog"
            app-url="{{config('app.url')}}"
            api-route="{{route('api.settings.index')}}"
            tenant="{{tenant('id')}}"
            tenant-header-name="{{config('savadmin.tenancy.header_name')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Settings List">
                        <div class="text-right mb-2">
                            <b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Setting</b-button>
                        </div>
                        <dt-component table-id="settings-dt"
                                      ajax-url="{{route('api.settings.dt')}}"                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      table-classes="table table-hover"
                                      tenant="{{tenant('id')}}"
                                      tenant-header-name="{{config('savadmin.tenancy.header_name')}}"
                                      v-on:edit-setting="showFormDialog"
                                      v-on:show-setting="showDetailsDialog"
                                      v-on:delete-setting="showDeleteDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal size="lg" v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop scrollable v-cloak ref="settingFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Setting @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Setting</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.settings.form")
                        </template>
                    </b-modal>
                    <b-modal size="lg" v-if="form" scrollable v-cloak ref="settingDetailsDialog">
                        @include('backend.settings.show')
                    </b-modal>
                    <b-modal size="sm" v-on:ok.prevent="deleteItem" hide-footer hide-header body-bg-variant="danger" body-text-variant="light" centered v-if="form" scrollable v-cloak ref="settingDeleteDialog">
                        <template v-slot:default="{ok,hide}">
                            Are you sure you want to delete this Setting?
                            <div class="text-right">
                                <b-button v-on:click="hide()" variant="light">No</b-button>
                                <b-button v-on:click="ok()" variant="primary">Yes</b-button>
                            </div>
                        </template>
                    </b-modal>
                </b-col>
            </b-row>
        </settings-component>
    </div>
@endsection

@push('scripts')
@endpush
