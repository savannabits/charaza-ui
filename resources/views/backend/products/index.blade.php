@extends('layouts.app')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <products-component
            table-id="products-dt"
            form-dialog-ref="productFormDialog"
            details-dialog-ref="productDetailsDialog"
            app-url="{{config('app.url')}}"
            api-route="{{route('api.products.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Users Table">
                        <div class="text-right mb-2">
                            <b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Product</b-button>
                        </div>
                        <dt-component table-id="products-dt"
                                      ajax-url="{{route('api.products.dt')}}"                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      :action-buttons="{{json_encode($actions)}}"
                                      table-classes="table table-hover"
                                      v-on:edit-product="showFormDialog"
                                      v-on:show-product="showDetailsDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="productFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Product @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Product</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.products.form")
                        </template>
                    </b-modal>
                    <b-modal v-if="form" scrollable v-cloak ref="productDetailsDialog">
                        @include('backend.products.show')
                    </b-modal>
                </b-col>
            </b-row>
        </products-component>
    </div>
@endsection

@push('scripts')
@endpush
