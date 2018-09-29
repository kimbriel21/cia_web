<template>
    <div>
    <el-table
            :data="tableData.data"
            style="width: 100%"
            max-height="700"
            highlight-current-row
            @selection-change="handleSelectionChange"
    >
        <el-table-column
                fixed
                type="selection"
                width="55">
        </el-table-column>

        <div v-for="column in columns">
            <el-table-column
                    :prop="column.value"
                    :label="column.label">
            </el-table-column>
        </div>

        <el-table-column
                fixed="right"
                label="Operations"
                width="100">
            <template slot-scope="scope">
                <div>
                    <el-button
                            v-if="typeof detailHandler !== 'undefined'"
                            size="mini"
                            style="width: 100%;"
                            icon="el-icon-info"
                            type="default"
                            @click="handleDetail(scope.$index, scope.row.id)">Detail
                    </el-button>
                </div>
                <div>
                    <el-button
                            v-if="typeof editHandler !== 'undefined'"
                            size="mini"
                            style="width: 100%;"
                            icon="el-icon-edit"
                            type="primary"
                            @click="handleEdit(scope.$index, scope.row.id)">Edit
                    </el-button>
                </div>
                <div>
                    <el-button
                            v-if="typeof deleteHandler !== 'undefined'"
                            size="mini"
                            style="width: 100%;"
                            icon="el-icon-delete"
                            type="danger"
                            @click="handleDelete(scope.$index, scope.row.id)">Delete
                    </el-button>
                </div>
                <div>

                </div>
            </template>
        </el-table-column>

    </el-table>

    </div>
</template>

<script>
    export default {
        name: "table-paginate",
        props : {
            tableData : {} ,
            sampleProps : '',
            deleteHandler : Function,
            detailHandler : Function,
            editHandler : Function,
            columns : {},
        },
        data: function(){
            return{

            };
        },
        methods: {
            handleSelectionChange(val) {
                this.multipleSelection = val;
                console.log(val, 'Box Selection');
            },
            handleDetail(index, id){
                this.detailHandler(id);
            },
            handleDelete(index, id){
                this.deleteHandler(id);
            },
            handleEdit(index, id){
                this.editHandler(id);
            },
        },
        created(){

        },
        mounted(){

        },
        destroyed(){

        },

    }
</script>

<style scoped>

</style>