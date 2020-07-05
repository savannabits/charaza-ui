<template>
    <table :id="tableId" class="table table-hover table-bordered table-striped datatable" style="width:100%">
        <thead>
        <tr>
            <th v-for="column of columns" :key="column.data">{{column.title || column.data}}</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table>
</template>
<script>
    export default {
        name: "DtComponent",
        props: {
            "tableId": {
                required: true,
                type: String
            },
            "processing": {
                type: Boolean,
                required: false,
                default: true
            },
            "serverSide": {
                type: Boolean,
                required: false,
                default: true
            },
            "columns": {
                required: true,
                type: Array,
            },
            "columnDefs": {
                required: false,
                type: Array,
                default: () => {
                    return []
                },
            },
            "actionButtons": {
                required: false,
                type: Array,
                default: () => {
                    return []
                }
            },
            "ajaxUrl": {
                required: true,
                type: String,
            }
        },
        data() {
            return {
                item_id: null,
            }
        },
        mounted() {
            let vm = this;
            let columns = [
                ...vm.columns,
                {
                    data: "Actions",
                    searchable: false,
                    className: 'text-right',
                    render: function(data, type, row) {
                        return vm.makeActionColumn(row)
                    }
                },
            ]
            $(document).ready(function() {
                $(`#${vm.tableId}`).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: vm.ajaxUrl,
                    columns: columns,
                    columnDefs: vm.columnDefs
                });
                $(`#${vm.tableId}`).on('click', '.action-button', function (e) {
                    var ev = $(this)
                    if (ev.data('tag') ==='button') {
                        vm.$root.$emit(`${ev.data('action')}`,{
                            id: ev.data('id'),
                        });
                    }
                });
                console.log(`Datatable ${vm.tableId } has been mounted`);
            })
        },
        methods: {
            emitActionEvent(e) {
                console.log("We are emitting an event now");
            },
            makeActionColumn(payload) {
                let vm = this;
                let actions = ``;
                vm.actionButtons.forEach((actionButton, key) => {
                    actions = `
                    ${actions}
                    <${actionButton.tag} class="action-button ${actionButton.classes}"
                        href="${actionButton.href}"
                        @click="emitActionEvent"
                        data-action="${actionButton.event}"
                        data-url="${actionButton.url}"
                        data-id="${payload.id}"
                        data-tag="${actionButton.tag}"
                    >${actionButton.title}</${actionButton.tag}>
                    `
                });
                return actions;
            }
        }
    }
</script>
<style lang="scss">
</style>
