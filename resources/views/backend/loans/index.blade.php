@extends('layouts.app')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid">
        <loans-component
            table-id="loans-dt"
            form-dialog-ref="loanFormDialog"
            details-dialog-ref="loanDetailsDialog"
            app-url="{{config('app.url')}}"
            api-route="{{route('api.loans.index')}}"
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Users Table">
                        <div class="text-right mb-2">
                            <b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New Loan</b-button>
                        </div>
                        <dt-component table-id="loans-dt"
                                      ajax-url="{{route('api.loans.dt')}}"                                      v-cloak
                                      :columns="{{json_encode($columns)}}"
                                      :action-buttons="{{json_encode($actions)}}"
                                      table-classes="table table-hover"
                                      v-on:edit-loan="showFormDialog"
                                      v-on:show-loan="showDetailsDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="loanFormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit Loan @{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New Loan</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            @include("backend.loans.form")
                        </template>
                    </b-modal>
                    <b-modal v-if="form" scrollable v-cloak ref="loanDetailsDialog">
                        @include('backend.loans.show')
                    </b-modal>
                </b-col>
            </b-row>
        </loans-component>
    </div>
@endsection

@push('scripts')
@endpush
