{{"@"}}extends('layouts.app')
{{"@"}}push('styles')
{{"@"}}endpush

{{"@"}}section('content')
    <div class="container-fluid">
        <{{$modelJSName}}-component
            table-id="{{$modelJSName}}-dt"
            form-dialog-ref="{{$modelVariableName}}FormDialog"
            details-dialog-ref="{{$modelVariableName}}DetailsDialog"
            app-url="@{{config('app.url')}}"
            @php
            echo 'api-route="{{route(\'api.'.$modelRouteAndViewName.'.index\')}}"'.PHP_EOL;
            @endphp
            v-cloak inline-template
        >
            <b-row>
                <b-col>
                    <b-card title="Users Table">
                        <div class="text-right mb-2">
                            <b-button v-on:click="showFormDialog()" variant="primary"><i class="mdi mdi-plus"></i> New {{$modelTitle}}</b-button>
                        </div>
                        <dt-component table-id="{{$modelRouteAndViewName}}-dt"
                                      @php
                                      echo 'ajax-url="{{route(\'api.'.$modelRouteAndViewName.'.dt\')}}"'
                                      @endphp
                                      v-cloak
                                      @php
                                      echo ':columns="{{json_encode($columns)}}"
                                      :action-buttons="{{json_encode($actions)}}"'.PHP_EOL;
                                      @endphp
                                      table-classes="table table-hover"
                                      v-on:edit-{{str_singular($modelRouteAndViewName)}}="showFormDialog"
                                      v-on:show-{{str_singular($modelRouteAndViewName)}}="showDetailsDialog"
                        ></dt-component>
                    </b-card>
                    <b-modal v-if="form" v-on:ok.prevent="onFormSubmit" no-close-on-backdrop v-cloak ref="{{$modelVariableName}}FormDialog">
                        <template v-slot:modal-title>
                            <h4 v-if="form.id" class="font-weight-bolder">Edit {{$modelTitle}} @@{{ form.id }}</h4>
                            <h4 v-else class="font-weight-bolder">Create New {{$modelTitle}}</h4>
                        </template>
                        <template v-slot:default="{ ok, cancel }">
                            {{"@"}}include("backend.{{$modelJSName}}.form")
                        </template>
                    </b-modal>
                    <b-modal v-if="form" scrollable v-cloak ref="{{$modelVariableName}}DetailsDialog">
                        {{"@"}}include('backend.{{$modelJSName}}.show')
                    </b-modal>
                </b-col>
            </b-row>
        </{{$modelJSName}}-component>
    </div>
{{"@"}}endsection

{{"@"}}push('scripts')
{{"@"}}endpush
