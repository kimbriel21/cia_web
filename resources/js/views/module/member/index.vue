<template>
    <div>
        <el-card shadow="always" >
                <span class="d-inline-block float-left" >
                    <div style="display: inline-block;">
                        <h2><b>Member Management</b></h2>
                    </div>
                </span>
                <span>
                    <add-member-dialog
                            style="display: inline-block; float: right; margin-bottom: 20px;">
                    </add-member-dialog>
                </span>
        </el-card >
        <el-card shadow="always" style="margin-top: 10px;">

            <search-field
                    :search-select-data="searchSelectData"
                    :set-search="setSearch"
                    :set-search-date="setSearchDate"
                    :set-search-date-month="setSearchDateMonth">

            </search-field>

            <table-paginate
                    :table-data="tableData"
                    :detail-handler="detailHandler"
                    :edit-handler="editHandler"
                    :delete-handler="deleteHandler"
                    :columns="columns"
                    v-loading="loading">

            </table-paginate>

            <pagination class="d-block float-right p-4"
                    :table-data="tableData"
                    :set-page-and-limit-pagination="setPageAndLimitPagination">
            </pagination>

        </el-card>
    </div>

</template>

<script>
    import Pagination from "../../component/pagination";
    export default {
        components: {Pagination},
        data() {
            return {
                tableData: [],
                loading : true,
                columns : [
                    {label : 'ID', value : 'id'},
                    {label : 'First Name', value : 'first_name'},
                    {label : 'Last Name', value : 'last_name'},
                    {label : 'Birth Day', value : 'birthday'},
                    {label : 'Number', value : 'number'},
                    {label : 'Address', value : 'address'},
                    ],
                searchSelectData : [
                    {label : 'First Name', value : 'first_name'},
                    {label : 'Last Name', value : 'last_name'},
                    {label : 'Address', value : 'address'},
                    {label : 'Birthday', value : 'birthday'},
                ],
                queryString : {},
            }
        },
        methods : {
            getList(){
                this.loading = true;
                axios
                    .get('/member?'+$.param(this.queryString))
                    .then(response =>
                    {
                        this.tableData = response.data.data;

                    })
                    .catch(error => {
                        console.log(error);
                    })
                    .finally(() => this.loading = false);
            },
            deleteHandler(id){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this member info!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            axios
                                .delete(`/member/${id}`)
                                .then(response =>
                                {
                                    this.getList();
                                    swal("Member has been deleted!", {
                                        icon: "success",
                                    });
                                })
                                .catch(error => {
                                    console.log(error);
                                })
                                .finally(() => this.loading = false);

                        } else {
                            swal("Member is safe!");
                        }
                    });
            },
            detailHandler(id){
                router.push({path: `/member/${id}/show`});
            },
            editHandler(id){
                router.push({path: `/member/${id}/edit`});
            },
            setSearchDate(field, dateFrom, dateTo){
                this.queryString.page = 1;
                this.queryString.searchBy = field;
                this.queryString.dateFrom = dateFrom;
                this.queryString.dateTo = dateTo;
                this.getList();
            },
            setSearchDateMonth(field, search){
                this.queryString.page = 1;
                this.queryString.searchBy = field;
                this.queryString.search = search;
                this.getList();
            },
            setSearch(field, search)
            {
                this.queryString.page = 1;
                this.queryString.searchBy = field;
                this.queryString.search = search;
                this.getList();
            },
            setPageAndLimitPagination(page, limit){
                this.queryString.page = page;
                this.queryString.limit = limit;
                this.getList();
            }
        },
        created() {
            this.setPageAndLimitPagination(1,30);
        },
        mounted(){
            EventBus.$on('reloadTableData', () => {
                this.setPageAndLimitPagination(1, 30);
            });
        },
        destroyed(){
            EventBus.$destroy('reloadTableData');
        },
    }
</script>




<style scoped>

</style>