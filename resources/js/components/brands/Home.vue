<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>商城中心</el-breadcrumb-item>
            <el-breadcrumb-item>商品品牌</el-breadcrumb-item>
        </el-breadcrumb>
        <template>
            <router-link :to="{ path: '/brands/New'}">
                <div class="new"><span class="new1">+</span><span class="new2">新增</span></div>
            </router-link>
            <span class="delete"><span class="delete1">-</span><span class="delete2">删除</span></span>

            <el-table
                :data="brands"
                v-loading="loading"
                style="width: 100%">

                <el-table-column
                    type="selection"
                    width="55">
                </el-table-column>
                <el-table-column
                    prop="id"
                    label="#"
                    width="100">
                </el-table-column>
                <el-table-column
                    prop="name"
                    label="物流名称"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="category.name"
                    label="所属分类"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="code"
                    label="是否可用"
                    width="100">
                    <template slot-scope="scope">
                        <i :class="scope.row.is_enable ?  'el-icon-check' : 'el-icon-close' "
                           @click="change_attr(scope.row,'is_enable')"></i>
                    </template>
                </el-table-column>
                <el-table-column
                    label="排序"
                    width="100">
                    <template slot-scope="scope">
                        <el-input v-model="scope.row.sort" @change="sort_order(scope.row.id,scope.row.sort)"></el-input>
                    </template>
                </el-table-column>
                <el-table-column
                    prop="created_at"
                    label="创建日期"
                    width="180">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                            size="mini"
                            @click="handleEdit(scope.$index, scope.row)">编辑
                        </el-button>
                        <el-button
                            size="mini"
                            type="danger"
                            @click="handleDelete(scope.$index, scope.row)">删除
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>
        </template>
        <div class="total"> 第{{this.page.current_page}}页 共{{brands.length}}条记录</div>
        <el-pagination
            @current-change="handleCurrentChange"
            background
            layout="prev, pager, next"
            :total="page.total"
        >
        </el-pagination>
        <router-view/>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                loading: false,
                brands: [],
                page: {
                    total: 0,
                    // pageSize: 10,
                    current_page: 1
                },
            }
        },
        created() {
            this.init();
            this.loading = true;
        },

        methods: {
            init() {
                axios.get(`http://127.0.0.1:8000/admin/brands?page=${this.page.current_page}`).then(res => {
                    console.log(res)
                    let datas = res.data
                    this.brands = datas.data
                    this.page = {
                        total: datas.total,
                        // pageSize: datas.per_page,
                        current_page: datas.current_page,
                    };
                    this.loading = false;
                })

            },
            change_attr(row, attr) {
                axios.patch(`http://127.0.0.1:8000/admin/brands/change_attr`, {id: row.id, attr: attr}).then(res => {
                    row.is_enable = !row.is_enable
                    this.init()
                })
            },
            handleCurrentChange(val) {
                this.page.current_page = val
                this.init()
            },
            handleEdit(index, row) {
                axios.get(`http://127.0.0.1:8000/admin/brands/${row.id}/edit`).then(res => {
                    // console.log(res)
                    this.$router.push({name: 'brands_Edit', params: {id: row.id}})
                })

            },
            handleDelete(index, row) {
                this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    axios.delete(`http://127.0.0.1:8000/admin/brands/${row.id}`).then(() => {
                        this.brands.splice(index, 1)
                        this.$message({
                            type: 'success',
                            message: '删除成功!'
                        });
                    })
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: '已取消删除'
                    });
                });

            },
            sort_order(id) {

            }
        }
    }
</script>

<style scoped>
    .total {
        margin: 30px 30px 10px 30px;
    }

    .new {
        display: inline-block;
        padding: 30px;
    }

    .new1 {
        background: #429546;
        color: #fff;
        padding: 10px;
    }

    .new2 {
        background: #67C13A;
        color: #fff;
        padding: 10px 20px;
    }

    .new {
        display: inline-block;
    }

    .delete1 {
        background: #D13A2F;
        color: #fff;
        padding: 10px;
    }

    .delete2 {
        background: #F24133;
        color: #fff;
        padding: 10px 20px;
    }

    .el-icon-check {
        color: green;
    }

    .el-icon-close {
        color: red;
    }
</style>
