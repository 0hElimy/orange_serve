<template>
    <div class="content">
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>Home</el-breadcrumb-item>
        </el-breadcrumb>

        <div class="list">
            <div class="green">
                <div class="top">订单统计信息</div>
                <div class="bor"></div>
                <div class="info">今日待发货订单：50</div>
                <div class="info">今日已发货订单：100</div>
                <div class="info">今日已成交订单：230</div>
            </div>
            <div class="pink">
                <div class="top">最新留言</div>
                <div class="bor"></div>
                <div class="info">今日未回复留言：50</div>
                <div class="info">今日已回复留言：100</div>
                <div class="info">今日未审核评论：230</div>
            </div>
            <div class="bule">
                <div class="top">实体商品统计信息</div>
                <div class="bor"></div>
                <div class="info">商品总数：50</div>
                <div class="info">库存警告商品数：100</div>
                <div class="info">促销商品数：230</div>
            </div>
        </div>
        <div class="bottom">
            <div class="title">系统信息</div>
            <div class="bor"></div>
            <div class="info">
                <div class="list1">
                    <div><i class="el-icon-share"></i><span>服务器操作系统：Darwin(::1)</span></div>
                    <div><i class="el-icon-share"></i><span>MySQL 版本:5.7.19</span></div>
                    <div><i class="el-icon-share"></i><span>Socket 支持：是</span></div>
                    <div><i class="el-icon-share"></i><span>Web 服务器：Apache</span></div>
                    <div><i class="el-icon-share"></i><span>时间设置：Asia/shanghai</span></div>

                </div>
                <div class="list2">
                    <div><i class="el-icon-share"></i><span>编码：UTF-8</span></div>
                    <div><i class="el-icon-share"></i><span>Web 服务器：Apache</span></div>
                    <div><i class="el-icon-share"></i><span>PHP 版本：7.2.1</span></div>
                    <div><i class="el-icon-share"></i><span>GD版本：GD2（JPEG GIF PNG）</span></div>
                    <div><i class="el-icon-share"></i><span>文件上传的最大大小：32</span></div>
                </div>
                <div class="list3">
                    <div><i class="el-icon-share"></i><span>开发日期：2019-01-04</span></div>
                    <div><i class="el-icon-share"></i><span>Socket 支持：是</span></div>
                    <div><i class="el-icon-share"></i><span>Web 服务器：Apache</span></div>
                    <div><i class="el-icon-share"></i><span>时区设置：Asia/Shanghai</span></div>
                    <div><i class="el-icon-share"></i><span>IP库版本：20190102</span></div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped lang="scss">
    .list {
        width: 100%;
        height: 250px;
        color: white;
        display: flex;
    }

    .green {
        margin: 20px;
        border-radius: 5px;
        flex: 1;
        background: #2AA59C;
    }

    .pink {
        margin: 20px;
        flex: 1;
        background: #EC3F7B;
        border-radius: 5px;
    }

    .bule {
        margin: 20px;
        border-radius: 5px;
        flex: 1;
        background: #2CB5F7;
    }

    .top {
        font-size: 20px;
        margin: 20px 20px;
    }

    .list .bor {
        margin: 20px 20px;
        border-bottom: .5px solid #fff;

    }

    .list .info {
        margin: 0 20px;
    }
    .bottom{
        margin:22px;
        border: 1px solid gray;

    }
    .bottom .title{
        padding:20px;
        font-size:18px;
    }
    .bottom .bor{
        border-bottom: .5px solid gray;
    }

    .bottom .info {
        display: flex;
    }

    .bottom .info .list1 {
        font-size: 15px;
        margin:20px 30px;
        flex: 1;
        color: gray;
    }

    .bottom .info .list2 {
        font-size: 15px;
        margin:20px 30px;
        flex: 1;
        color: gray;
    }
    .bottom .info .list3 {
        font-size: 15px;
        margin:20px 30px;
        flex: 1;
        color: gray;
    }


</style>

