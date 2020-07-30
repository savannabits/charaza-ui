@extends('layouts.app')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <product-types-component
            table-id="product-types-dt"
            form-dialog-ref="productTypeFormDialog"
            details-dialog-ref="productTypeDetailsDialog"
            app-url="{{config('app.url')}}"
            api-route="{{route('api.product-types.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Users Table">
                        <div class="text-right mb-2">
                            <b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Product Type</b-button>
                        </div>
                        <dt-component table-id="product-types-dt"
                                      ajax-url="{{route('api.product-types.dt')}}"                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      :action-buttons="{{json_encode($actions)}}"
                                      table-classes="table table-hover"
                                      v-on:edit-product-type="showFormDialog"
                                      v-on:show-product-type="showDetailsDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="productTypeFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Product Type @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Product Type</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.product-types.form")
                        </template>
                    </b-modal>
                    <b-modal v-if="form" scrollable v-cloak ref="productTypeDetailsDialog">
                        @include('backend.product-types.show')
                    </b-modal>
                </b-col>
            </b-row>
        </product-types-component>
    </div>
@endsection

@push('scripts')
@endpush
