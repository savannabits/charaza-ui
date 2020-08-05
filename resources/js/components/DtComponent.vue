<template>
    <div  v-cloak class="table-responsive">
        <table :id="tableId" class="table table-hover" :class="tableClasses" style="width:100%">
            <thead>
            <tr>
                <th v-for="column of columns" :key="column.data">{{column.title || column.data}}</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</template>
<script>
    export default {
        name: "DtComponent",
        props: {
            "tableId": {
                required: true,
                type: String
            },
            "tableClasses": {
                required: false,
                default: "",
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
                table: null
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
                vm.table = $(`#${vm.tableId}`).DataTable({
                    processing: true,
                    serverSide: true,
                    stateSave: true,
                    ajax: vm.ajaxUrl,
                    columns: columns,
                    columnDefs: vm.columnDefs
                });
                vm.table.on('click', '.action-button', function (e) {
                    var ev = $(this)
                    if (ev.data('tag') ==='button') {
                        vm.$emit(`${ev.data('action')}`,{
                            id: ev.data('id'),
                        });
                        vm.$root.$emit(`${ev.data('action')}`,{
                            id: ev.data('id'),
                        });
                    }
                });

            })
            vm.$root.$on("refresh-dt", function(e) {
                if (e.tableId === vm.tableId) {
                    //Refresh Table here
                    if (vm.table) {
                        vm.table.ajax.reload(null,false);
                    }
                }
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
                    ><i v-if="${actionButton.icon}" class="${actionButton.icon}"></i> ${actionButton.title}
                    </${actionButton.tag}>
                    `
                });
                return actions;
            }
        }
    }
</script>
<style lang="scss">
</style>
