<template>
    <el-menu >
        <router-link to="/">
            <el-menu-item index="dashboard"><i class="el-icon-message"></i>
                Dashboard
            </el-menu-item>
        </router-link>
        <router-link to="/member">
            <el-menu-item index="member"><i class="el-icon-message"></i>
              Member Manager
            </el-menu-item>
        </router-link>
        <router-link to="/ministry">
            <el-menu-item index="ministry"><i class="el-icon-message"></i>
                Ministry Manager
            </el-menu-item>
        </router-link>

        <!--<a href="{{ route('logout') }}"-->
        <!--onclick="event.preventDefault();-->
        <!--document.getElementById('logout-form').submit();">-->
        <!--{{ __('Logout') }}-->

        <!--</a>-->
        <!--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
            <!--@csrf-->
        <!--</form>-->
    </el-menu>
    <!--<router-link to="/" exact>Home</router-link>-->
    <!--<router-link to="/member">Member</router-link>-->
    <!--<a href="{{ route('logout') }}"-->
       <!--onclick="event.preventDefault();-->
    <!--document.getElementById('logout-form').submit();">-->
        <!--{{ __('Logout') }}-->

    <!--</a>-->




</template>

<script>
    export default {
        name: "side-bar",

    }
</script>

<style scoped>

</style>

