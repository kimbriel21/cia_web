<template>
    <div style="background-color: #fff; height: 100%;">
        <div class="logo_cia">
            <h2 style="color: #44423b;">Chirst Is the Answer</h2>
        </div>
        <div class="menus">
            <el-menu  mode="horizontal">
                <el-menu-item index="2">Logout</el-menu-item>
            </el-menu>
        </div>
    </div>

</template>

<script>
    export default {
        name: "nav-bar",
        data() {
            return {
                activeIndex: '1',
                activeIndex2: '1'
            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        },
    }
</script>

<style scoped>
    .logo_cia{
        display: inline-block;
        float: left;
        padding: 10px;
        margin-left: 20px;
    }
    .menus{
        display: inline-block;
        float: right;
        margin-right : 20px;
    }
</style>