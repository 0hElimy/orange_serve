<template>
    <el-container>
        <el-header>
            <AdminHeader></AdminHeader>
        </el-header>
        <el-container>

            <el-aside width="200px">
                <Aside></Aside>
            </el-aside>
            <el-main class="animate_fix">        <!--添加动画效果-->
                <transition name="fade">
                    <router-view/>
                </transition>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
    import Aside from './shared/Aside.vue'
    import AdminHeader from './shared/Header.vue'

    export default {
        name: 'App',
        components: {
            Aside,
            AdminHeader
        },
    }
</script>
<style lang="scss">
    * {
        padding: 0;
        margin: 0;
    }

    body {
        height: 100%;
    }

    html {
        height: 100%;
    }

    #app {
        height: 100%;
    }

    .el-container {
        height: 100%;
    }

    .el-header {
        background-color: #0797A8;

    }

    .el-aside {
        background-color: #27303A;
        height: 100%;
        display: block;
    }

    .el-main {
        background-color: #F6F4F6;
        padding: 0 !important;
        width: 100%;
    }

    img {
        height: 20px;
        width: 20px;
        position: relative;
        top: 20px;
    }

    .el-header span {
        color: #fff;
        position: relative;
        top: 20px;
        left: 10px;
    }

    .el-col {
        position: relative;
        top: 60px;
    }
    .address{
        position: relative;
        top:10px;
    }

    .address span {
        color: #fff;
        position: relative;
        top: 20px;
        left: 10px;
    }

    .el-main img {
        width: 30px;
        height: 30px;
        position: relative;
        top:-34px;
        left:15px;
        background-color: white;
    }
    .el-main .el-breadcrumb {
        float: left;
        display: inline-block;
        padding: 12px;
        width: 100%;
        padding-left: 50px;
        background-color: white;
        border-bottom:2px solid #ddd;

    }
    .el-table{
        margin-left: 30px;

    }


    .ddd {
        width: 200px;
        float: right;

    }

    .el-submenu__title {
        background-color: #0797A7;
        color: #fff !important;
        text-align: center;

    }
    .el-menu-item{
        text-align: center;
    }
    .total{
        font-size: 13px;
        letter-spacing: 2px;
        margin-left: 20px;
        margin-top:20px;

    }
    .el-pagination{
        margin-top:20px;
    }

</style>

<!--<style>-->
    <!--.el-header {-->
        <!--text-align: center;-->
        <!--line-height: 60px;-->
        <!--padding: 0;-->
    <!--}-->

    <!--.el-aside {-->
        <!--background-color: #D3DCE6;-->
        <!--color: #333;-->
        <!--text-align: center;-->
        <!--background-color: #fff;-->
    <!--}-->

    <!--.el-menu {-->
        <!--border: none;-->
    <!--}-->

    <!--.el-main {-->
        <!--background-color: #fff;-->
        <!--color: #333;-->
        <!--padding: 0;-->
    <!--}-->

    <!--html, body {-->
        <!--height: 100%;-->
    <!--}-->

    <!--body > .el-container {-->
        <!--height: 100%;-->
    <!--}-->

    <!--.el-container {-->
        <!--height: 100%;-->
    <!--}-->

    <!--.el-aside {-->
        <!--height: 100%;-->
        <!--background-color: rgb(84, 92, 100)-->
    <!--}-->

    <!--.el-container:nth-child(5) .el-aside,-->
    <!--.el-container:nth-child(6) .el-aside {-->
        <!--line-height: 260px;-->
    <!--}-->

    <!--.el-container:nth-child(7) .el-aside {-->
        <!--line-height: 320px;-->
    <!--}-->

    <!--.el-aside::-webkit-scrollbar {-->
        <!--display: none;-->
    <!--}-->

    <!--.has-gutter th div.cell {-->
        <!--text-align: center;-->
    <!--}-->

    <!--.animate_fix {-->
        <!--position: relative;-->
        <!--/*width: 100%;*/-->
    <!--}-->

    <!--.animate_fix > div {-->
        <!--position: absolute;-->
        <!--top: 0;-->
        <!--left: 0;-->
        <!--width: 100%;-->
        <!--padding: 20px;-->
    <!--}-->

    <!--.el-card__body {-->
        <!--padding: 5px;-->
    <!--}-->

    <!--.el-collapse-item:last-child {-->
        <!--margin: 0;-->
    <!--}-->

    <!--.el-collapse-item__header {-->
        <!--height: 38px;-->
        <!--line-height: 38px;-->
    <!--}-->

    <!--.el-collapse-item__arrow {-->
        <!--line-height: 38px;-->
        <!--height: 38px;-->
    <!--}-->

    <!--.el-footer {-->
        <!--margin-top: 30px;-->
        <!--text-align: center;-->
    <!--}-->

<!--</style>-->
