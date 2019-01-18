<template>
    <!--<el-menu index="0" class="el-menu-demo" mode="horizontal" background-color="#545c64" text-color="#fff" active-text-color="#ffd04b">-->
        <!--<div class="menu_icon">-->
            <!--<i class="el-icon-loading"></i> ITFun.tv-->
        <!--</div>-->
        <!--<el-submenu index="1">-->
            <!--<template slot="title">{{admin.name}} 管理员</template>-->
            <!--<el-menu-item index="1" @click="logout(admin)">退出</el-menu-item>-->
        <!--</el-submenu>-->
    <!--</el-menu>-->
<div>

    <img src="../assets/img/22.png"><span>橘子后台</span>
    <img src="../assets/img/11.png" style="position:relative;left: 100px">
    <img src="../assets/img/555.png" style="position:absolute;right:300px;">
    <img src="../assets/img/777.jpeg" style="position:absolute;right:240px;width:50px;border-radius:90%">
    <div class="ddd">
        <el-menu index="0">
            <el-submenu index="1">
                <template slot="title">{{admin.name}}</template>
                <el-menu-item index="1" @click="logout(admin)">退出</el-menu-item>
            </el-submenu>
        </el-menu>
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                admin: admin
            };
        },
        methods: {
            logout(admin) {
                axios.post(`/admin/logout`, admin)
                    .then((res) => {
                        this.$notify({
                            title: '成功',
                            message: '您已成功退出',
                            type: 'success',
                        });
                        reload();
                    })
            }
        }
    }

    var reload = function () {
        window.location.reload();
    }
</script>

<style scoped>
    .el-menu--horizontal > .el-submenu {
        float: right;
    }

    .menu_icon {
        float: left;
        width: 200px;
        color: #D3DCE6;
        text-align: center;
        font-size: 30px
    }

</style>
