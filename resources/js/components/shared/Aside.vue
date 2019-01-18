<template>
    <!--<el-menu-->
            <!--default-active="/"-->
            <!--class="el-menu-vertical-demo"-->
            <!--:router="true"-->
            <!--background-color="#545c64"-->
            <!--text-color="#fff"-->
            <!--active-text-color="#ffd04b">-->

        <!--<el-menu-item index="/">-->
            <!--<span slot="title">-->
                <!--<i class="el-icon-menu"></i>首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页-->
            <!--</span>-->
        <!--</el-menu-item>-->

        <!--<el-submenu index="1">-->
            <!--<template slot="title">-->
                <!--<i class="el-icon-edit"></i>-->
                <!--<span>商城中心</span>-->
            <!--</template>-->
            <!--<el-menu-item-group>-->
                <!--<el-menu-item index="/Freight"><i class="el-icon-view"></i>物流运费</el-menu-item>-->
            <!--</el-menu-item-group>-->
        <!--</el-submenu>-->
    <!--</el-menu>-->

    <div>

        <img src="../assets/img/777.jpeg" style="width: 40px;height:40px;margin-left: 10px">
        <div class="item" style="display: inline-block;line-height:1px;font-size: 12px;margin-left: 10px;">
            <div class="name" style="color:#fff;position: relative;top:20px;">yiting</div>
            <div class="address"><img src="../assets/img/888.png" style="width: 13px;height:13px;"><span>china</span>
            </div>
        </div>
        <el-col>

            <el-menu
                default-active="2"
                class="el-menu-vertical-demo"
                @open="handleOpen"
                @close="handleClose"
                background-color="#26303A"
                :router="true"
                text-color="#fff"
                :unique-opened="true"
                active-text-color="#ffd04b">
                <el-menu-item index="/">
                    <i class="el-icon-menu"></i>
                    <span slot="title">首页</span>
                </el-menu-item>
                <el-menu-item index="3" disabled>
                    <span slot="title">商城中心</span>
                </el-menu-item>
                <el-submenu index="1">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>商城管理</span>
                    </template>
                    <el-menu-item-group>
                        <el-menu-item index=""><i class="el-icon-view"></i>商品管理</el-menu-item>
                    </el-menu-item-group>
                    <el-menu-item-group>
                        <el-menu-item index=""><i class="el-icon-view"></i>促销管理</el-menu-item>
                        <el-menu-item index="1-3">库存警告商品</el-menu-item>
                        <el-menu-item index="1-3">促销商品</el-menu-item>
                    </el-menu-item-group>
                    <el-submenu index="1-4">
                        <template slot="title">促销管理</template>
                        <el-menu-item index="1-3">库存警告商品</el-menu-item>
                        <el-menu-item index="1-3">促销商品</el-menu-item>
                    </el-submenu>
                </el-submenu>
                    <el-menu-item-group>
                        <el-menu-item index="/brands">商品品牌</el-menu-item>
                    </el-menu-item-group>
                    <el-menu-item-group>
                        <el-menu-item index="/categories">商品分类</el-menu-item>
                    </el-menu-item-group>
                    <el-menu-item-group>
                        <el-menu-item index="/logistics">物流运费</el-menu-item>
                    </el-menu-item-group>
                    <el-menu-item-group>
                        <el-menu-item index="">会员管理</el-menu-item>
                    </el-menu-item-group>
                    <el-menu-item-group>
                        <el-menu-item index="">订单管理</el-menu-item>
                    </el-menu-item-group>

                <el-menu-item index="3" disabled>
                    <span slot="title">广告中心</span>
                </el-menu-item>

                <el-submenu index="2">

                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>广告管理</span>
                    </template>
                    <el-menu-item-group>
                        <el-menu-item index="">广告列表</el-menu-item>
                    </el-menu-item-group>
                    <el-menu-item-group>
                        <el-menu-item index="">广告分类</el-menu-item>
                    </el-menu-item-group>
                </el-submenu>
            </el-menu>
        </el-col>


    </div>

</template>
<script>
    export default {

        methods:{
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>

