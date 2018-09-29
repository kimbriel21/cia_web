<template>
    <div>

        <div class="">
            <div >
                <el-button type="info" icon="el-icon-search" @click="showSearch = !showSearch">Show Search </el-button>
            </div>

        </div>
        <div v-show="showSearch">
            <div class="mt-1">
                <div>
                    <el-select v-model="field" placeholder="Select" style="width: 120px;">
                        <el-option
                                v-for="item in searchSelectData"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                        </el-option>


                    </el-select>
                    <div class="d-inline-block" v-if="field != 'birthday'">
                        <el-input  placeholder="Please input" v-model="search" style="width: 500px;"/>
                        <el-button slot="append" icon="el-icon-search" @click="setSearch(field, search)"></el-button>
                    </div>

                    <div class="d-inline-block"  v-if="field == 'birthday'">
                        <el-date-picker
                                v-model="dateMonth"
                                type="month"
                                placeholder="pick a month"
                                value-format="MM">
                        </el-date-picker>

                        <el-button slot="append" icon="el-icon-search" @click="setSearchDateMonth(field, dateMonth)"></el-button>
                    </div>

                    <div class="d-inline-block"  v-if="field == 'date'">
                        <el-date-picker
                                v-model="dateFrom"
                                type="date"
                                placeholder="date from"
                                value-format="yyyy-MM-dd">
                        </el-date-picker>

                        <el-date-picker
                                v-model="dateTo"
                                type="date"
                                placeholder="date to"
                                value-format="yyyy-MM-dd">
                        </el-date-picker>
                        <el-button slot="append" icon="el-icon-search" @click="setSearchDate(field, dateFrom, dateTo)"></el-button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "search-field",
        props : {
            searchSelectData : {},
            setSearch : Function,
            setSearchDate : Function,
            setSearchDateMonth : Function,
        },
        data() {
            return {
                showSearch : false,
                field : '',
                search : '',
                dateMonth : '',
                dateFrom : '',
                dateTo : '',
            }
        },
        methods : {

        }
    }
</script>

<style scoped>

</style>