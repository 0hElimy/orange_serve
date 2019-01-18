<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>商城中心</el-breadcrumb-item>
            <el-breadcrumb-item>商品分类</el-breadcrumb-item>
        </el-breadcrumb>
        <template>
            <router-link :to="{ path: '/categories/New'}">
                <div class="new"><span class="new1">+</span><span class="new2">新增</span></div>
            </router-link>

                <span @click='showChildren' class="delete"><span class="delete1">-</span><span class="delete2">{{expand_word}}</span></span>

            <el-table
                :data="categories"
                v-loading="loading"
                style="width: 100%"
                row-key="id" :expand-row-keys="expands">
                <!--展开行-->
                <el-table-column type="expand">
                    <template slot-scope="props">
                        <el-table
                            :data="props.row.children"
                            style="width: 100%" :show-header="false">
                            <el-table-column
                                prop="id"
                                width="120">
                            </el-table-column>
                            <el-table-column
                                prop="name"
                                width="240">
                            </el-table-column>
                            <el-table-column
                                width="150">
                            </el-table-column>
                            <el-table-column
                                prop="code"
                                label="是否显示"
                                width="180">
                                <template slot-scope="scope">
                                    <i :class="scope.row.is_show ?  'el-icon-check' : 'el-icon-close' "
                                       @click="change_attr(scope.row,'is_show')"></i>
                                </template>
                            </el-table-column>
                            <el-table-column
                                label="排序"
                                width="180">
                                <template slot-scope="scope">
                                    <el-input v-model="scope.row.sort"
                                              @change="sort_order(scope.row.id,scope.row.sort)"></el-input>
                                </template>
                            </el-table-column>
                            <el-table-column width="320" label="操作">
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
                </el-table-column>


                <el-table-column
                    prop="id"
                    label="id"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="name"
                    label="分类名称"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="shipping_free"
                    label="所有品牌"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="code"
                    label="是否显示"
                    width="180">
                    <template slot-scope="scope">
                        <i :class="scope.row.is_show ?  'el-icon-check' : 'el-icon-close' "
                           @click="change_attr(scope.row,'is_show')"></i>
                    </template>
                </el-table-column>
                <el-table-column
                    label="排序"
                    width="180">
                    <template slot-scope="scope">
                        <el-input v-model="scope.row.sort" @change="sort_order(scope.row.id,scope.row.sort)"></el-input>
                    </template>
                </el-table-column>
                <el-table-column width="320" label="操作">
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
        <router-view/>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                loading: false,
                categories: [],
                expands:[],
            }
        },
        created() {
            this.init();
            this.loading = true;
        },
        computed:{
            expand_word:function () {
                return this.expands.length==0 ?'展开':'关闭'
            }
        },

        methods: {
            init() {
                axios.get(`http://127.0.0.1:8000/admin/categories`).then(res => {
                    console.log(res)
                    let datas = res.data
                    this.categories = datas
                    this.loading = false;
                })

            },
            showChildren(){
                console.log(this.expands.length)
                if(this.expands.length !=0){
                    this.expands=[]
                }else{
                    this.expands=this.categories.map(category=>{
                        return category.id
                    })
                }
            },



            change_attr(row, attr) {
                axios.patch(`http://127.0.0.1:8000/admin/categories/change_attr`, {
                    id: row.id,
                    attr: attr
                }).then(res => {
                    row.is_show = !row.is_show
                    this.init()
                })
            },

            handleCurrentChange(val) {
                this.page.current_page = val
                this.init()
            },
            handleEdit(index,row){
                console.log(index,row)
                this.$router.push({ name: 'Categories_Edit',params:{id:row.id}})
            },
            handleDelete(index, row) {
                this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    axios.delete(`http://127.0.0.1:8000/admin/categories/${row.id}`).then(() => {
                        this.categories.splice(index, 1)
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
            sort_order(id,sort_order_value){
                console.log(sort_order_value)
                axios.patch(`http://127.0.0.1:8000/admin/categories/sort`,{id:id,sort:sort_order_value}).then(response=>{
                    console.log(response)
                }).catch((error)=>{
                    console.log(error)

                        this.$message.error("填写的排序不正确，必须是1-99的数字")
                })
            },
        }
    }
</script>

<style>
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

    .el-table td, .el-table th {
        text-align: center;
    }

</style>
