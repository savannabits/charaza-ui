@extends('layouts.backend')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <data-types-component
            table-id="data-types-dt"
            form-dialog-ref="dataTypeFormDialog"
            details-dialog-ref="dataTypeDetailsDialog"
            delete-dialog-ref="dataTypeDeleteDialog"
            app-url="{{config('app.url')}}"
            tenant="{{tenant('id')}}"
            tenant-header-name="{{env('TENANT_HEADER_NAME')}}"
            api-route="{{route('api.data-types.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Data Types List">
                        <div class="text-right mb-2">
                            @can('data-types.create')<b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Data Type</b-button>
                            @endcan
                        </div>
                        @can('data-types.index')
                        <dt-component table-id="data-types-dt"
                                      ajax-url="{{route('api.data-types.dt')}}"
                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      tenant="{{tenant('id')}}"
                                      tenant-header-name="{{env('TENANT_HEADER_NAME')}}"
                                      table-classes="table table-hover"
                                      v-on:edit-data-type="showFormDialog"
                                      v-on:show-data-type="showDetailsDialog"
                                      v-on:delete-data-type="showDeleteDialog"
                        ></dt-component>
                        @endcan
                    </b-card>
                    @canany(['data-types.create','data-types.edit'])
                    <b-modal size="lg" v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="dataTypeFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Data Type @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Data Type</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.data-types.form")
                        </template>
                    </b-modal>
                    @endcanany
                    @can('data-types.show')
                    <b-modal size="lg" v-if="form" scrollable v-cloak ref="dataTypeDetailsDialog">
                        @include('backend.data-types.show')
                    </b-modal>
                    @endcan
                    @can('data-types.delete')
                    <b-modal size="sm" v-on:ok.prevent="deleteItem" hide-footer hide-header body-bg-variant="danger" body-text-variant="light" centered v-if="form" scrollable v-cloak ref="dataTypeDeleteDialog">
                        <template v-slot:default="{ok,hide}">
                            Are you sure you want to delete this Data Type?
                            <div class="text-right">
                                <b-button v-on:click="hide()" variant="light">No</b-button>
                                <b-button v-on:click="ok()" variant="primary">Yes</b-button>
                            </div>
                        </template>
                    </b-modal>
                    @endcan
                </b-col>
            </b-row>
        </data-types-component>
    </div>
@endsection

@push('scripts')
@endpush
