<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>商城中心</el-breadcrumb-item>
            <el-breadcrumb-item>新增分类</el-breadcrumb-item>
        </el-breadcrumb>

        <el-form :model="category" :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">

            <el-form-item label="商品分类" prop="parent_id">
                <el-select v-model="category.parent_id" placeholder="请选择分类">

                    <el-option :label="item.name" :value="item.value" v-for="item in categories"
                               :key="item.id"></el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="分类名称：" prop="name">
                <el-input v-model="category.name" placeholder="请输入名称"></el-input>
            </el-form-item>
            <el-form-item label="是否显示：" prop="is_show">
                <el-radio-group v-model="category.is_show">
                    <el-radio :label="1">是</el-radio>
                    <el-radio :label="0">否</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="排序：" prop="sort">
                <el-input v-model.number="category.sort" placeholder="请输入0~99排序值"></el-input>
            </el-form-item>
            <el-form-item label="描述：" prop="desc">
                <el-input style="width: 100%" rows="6" type="textarea" v-model="category.desc"
                          placeholder=" 简单描述一下吧..."></el-input>
            </el-form-item>

            <el-form-item>
                <el-button type="primary" @click="submitForm('ruleForm')">立即创建</el-button>
                <el-button @click="resetForm('ruleForm')">重置</el-button>
            </el-form-item>
        </el-form>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                category: {
                    parent_id: '',
                    name: '',
                    sort: 99,
                    is_show: 1,


                },
                rules: {
                    name: [
                        {required: true, message: '请输入快递名称', trigger: 'blur'},
                        {min: 3, max: 8, message: '长度在 3 到 5 个字符', trigger: 'blur'}
                    ],
                    sort: [
                        {type: 'number', required: true, message: '请输入0~99的数字', trigger: 'blur'}
                    ],
                    desc: [
                        {min: 0, max: 255, message: '不能超过255个字符', trigger: 'blur'}
                    ],
                }
            }

        },
        created() {
            axios.get("http://127.0.0.1:8000/admin/categories").then(res => {
                console.log(res)
                this.categories = res.data
            })
        },
        methods: {
            submitForm(ruleForm) {
                this.$refs[ruleForm].validate((valid) => {
                    if (valid) {
                        axios.post(`http://127.0.0.1:8000/admin/categories`, this.category).then(res => {
                            this.$message({
                                showClose: true,
                                message: '恭喜你，新增成功',
                                type: 'success'
                            });
                            this.$router.push({path: '/categories'})
                        })
                    }
                });
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
            }
        }
    }

</script>

<style>
    .check {
        color: #5B91DA;
        position: relative;
        bottom: 20px;
        left: 150px;
    }

    .el-form {
        padding: 30px;
        position: relative;
        top: 30px;

    }

    .el-form-item__label {
        text-align: left !important;
    }

    /*.el-input-number__decrease, .el-input-number__increase{*/
    /*z-index: -99;*/

    /*}*/

</style>
