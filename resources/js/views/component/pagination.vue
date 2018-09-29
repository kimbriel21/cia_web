<template>
    <div>
        <el-pagination
                @size-change="handleSizeChange"
                @current-change="handleCurrentChange"
                :page-sizes="[30, 60, 90, 120, 150]"
                :page-size="30"
                layout="total, sizes, prev, pager, next, jumper"
                :total="tableData.total">
        </el-pagination>
    </div>

</template>

<script>
    export default {
        name: "pagination",
        props : {
            tableData : {} ,
            setPageAndLimitPagination : Function,

        },
        data: function(){
            return{
                limit : 30,
                page : 1,
            };
        },
        methods : {
            handleSizeChange(limit) {
                this.limit = limit;
                this.setPageAndLimitPagination(this.page, this.limit);
            },
            handleCurrentChange(page) {
                this.page = page;
                this.setPageAndLimitPagination(this.page, this.limit);
            },
        },
        created(){

        },
        mounted(){
            this.limit = 30;
            this.page = 1;
        },
        destroyed(){

        },
    }
</script>

<style scoped>

</style>