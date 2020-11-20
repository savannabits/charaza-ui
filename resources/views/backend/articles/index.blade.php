@extends('layouts.backend')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <articles-component
            table-id="articles-dt"
            form-dialog-ref="articleFormDialog"
            details-dialog-ref="articleDetailsDialog"
            delete-dialog-ref="articleDeleteDialog"
            app-url="{{config('app.url')}}"
api-route="{{route('api.articles.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Articles List">
                        <div class="text-right mb-2">
                            @can('articles.create')<b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Article</b-button>
                            @endcan
                        </div>
                        @can('articles.index')
                        <dt-component table-id="articles-dt"
                                      ajax-url="{{route('api.articles.dt')}}"
                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      table-classes="table table-hover"
                                      v-on:edit-article="showFormDialog"
                                      v-on:show-article="showDetailsDialog"
                                      v-on:delete-article="showDeleteDialog"
                        ></dt-component>
                        @endcan
                    </b-card>
                    @canany(['articles.create','articles.edit'])
                    <b-modal size="lg" v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="articleFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Article @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Article</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.articles.form")
                        </template>
                    </b-modal>
                    @endcanany
                    @can('articles.show')
                    <b-modal size="lg" v-if="form" scrollable v-cloak ref="articleDetailsDialog">
                        @include('backend.articles.show')
                    </b-modal>
                    @endcan
                    @can('articles.delete')
                    <b-modal size="sm" v-on:ok.prevent="deleteItem" hide-footer hide-header body-bg-variant="danger" body-text-variant="light" centered v-if="form" scrollable v-cloak ref="articleDeleteDialog">
                        <template v-slot:default="{ok,hide}">
                            Are you sure you want to delete this Article?
                            <div class="text-right">
                                <b-button v-on:click="hide()" variant="light">No</b-button>
                                <b-button v-on:click="ok()" variant="primary">Yes</b-button>
                            </div>
                        </template>
                    </b-modal>
                    @endcan
                </b-col>
            </b-row>
        </articles-component>
    </div>
@endsection

@push('scripts')
@endpush
