@extends('layouts.app')
@push('styles')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <b-container>
        <b-row>
            <b-col>
                <b-card title="Users Table">
                    <dt-component table-id="users-dt"
                                  ajax-url="{{route('api.users.dt')}}"
                                  v-cloak
                                  :columns="{{json_encode($columns)}}"
                                  :action-buttons="{{json_encode($actions)}}"
                    ></dt-component>
                </b-card>
                <b-button class="d-none" v-b-modal:users-edit-modal></b-button>
                <b-modal v-cloak id="users-edit-modal">
                    Sample modal
                </b-modal>
            </b-col>
        </b-row>
    </b-container>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        /*Vue.prototype.$userColumns = [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {
                data: "Actions",
                render: function(data, type, row) {
                    return `<button data-id="${row.id}" data-url="{{route('api.users.dt')}}"
                     data-row="${JSON.stringify(row)}" class="btn btn-primary edit-button">Hello there</button>`;
                },
            }
        ]*/
    </script>
@endpush
