<template>
    <div>
        <el-breadcrumb separator="/">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>商城中心</el-breadcrumb-item>
            <el-breadcrumb-item>新增物流</el-breadcrumb-item>
        </el-breadcrumb>

        <el-form :model="logistics" :rules="rules" ref="logistics" label-width="150px" class="demo-ruleForm">
            <el-form-item label="快递名称：" prop="name">
                <el-input v-model="logistics.name" placeholder="请输入名称"></el-input>
            </el-form-item>
            <el-form-item label="快递公司代码：" prop="code">
                <el-input v-model="logistics.code" placeholder="请输入公司代码"></el-input>
            </el-form-item>
            <div class="check">查看代码</div>
            <el-form-item label="网址：" prop="url">
                <el-input v-model="logistics.url" placeholder="请输入网址"></el-input>
            </el-form-item>
            <el-form-item label="运费：" prop="shipping_money">
                <template>
                    <el-input-number v-model="logistics.shipping_money" placeholder="请输入运费" :precision="2"></el-input-number>
                </template>
            </el-form-item>
            <el-form-item label="满额包邮：" prop="shipping_free">
                <!--<el-input v-model.number="logistics.shipping_free" placeholder="满额包邮"></el-input>-->
                <template>
                    <el-input-number v-model="logistics.shipping_free" placeholder="请输入运费" :precision="2"></el-input-number>
                </template>
            </el-form-item>
            <el-form-item label="是否可用：" prop="is_enable">
                <el-radio-group v-model="logistics.is_enable">
                    <el-radio :label="1">是</el-radio>
                    <el-radio :label="0">否</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="配送方式描述：" prop="desc">
                <el-input style="width: 100%" rows="6"  type="textarea" v-model="logistics.desc" placeholder=" 简单描述一下吧..."></el-input>
            </el-form-item>
            <el-form-item label="排序：" prop="sort">
                <el-input v-model.number="logistics.sort" placeholder="请输入0~99排序值"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm('logistics')">立即创建</el-button>
                <el-button @click="resetForm('form')">重置</el-button>
            </el-form-item>
        </el-form>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                logistics: {
                    name: '',
                    sort:99,
                    is_enable:1,
                    shipping_money:'',
                    shipping_free:''
                },
                rules: {
                    name: [
                        { required: true, message: '请输入快递名称', trigger: 'blur' },
                        { min: 3, max: 8, message: '长度在 3 到 5 个字符', trigger: 'blur' }
                    ],
                    url: [
                        { required: true, message: '请输入网址', trigger: 'blur' }
                    ],
                    shipping_money: [
                        { required: true, type: 'number', message: '运费必须是数字', trigger: 'blur' },
                    ],
                    shipping_free: [
                        { required: true, type: 'number', message: '满额必须是数字', trigger: 'change' },
                    ],
                    sort: [
                        { type: 'number', required: true, message: '请输入0~99的数字', trigger: 'blur' }
                    ],
                    desc: [
                        {min: 0, max: 255, message: '不能超过255个字符', trigger: 'blur'}
                    ],
                }
            }

        },
        methods: {
            submitForm(logistics) {
                this.$refs[logistics].validate((valid) => {
                    if (valid) {
                        axios.post("http://127.0.0.1:8000/admin/logistics",this.logistics).then(res=>{
                            this.$message({
                                showClose: true,
                                message: '恭喜你，新增成功',
                                type: 'success'
                            });
                            this.$router.push({path: '/logistics'})
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
    .check{
        color: #5B91DA;
        position: relative;
        bottom: 20px;
        left: 150px;
    }
    .el-form {
        padding: 30px;
        position: relative;
        top:30px;

    }
    .el-form-item__label{
        text-align: left!important;
    }
    /*.el-input-number__decrease, .el-input-number__increase{*/
    /*z-index: -99;*/

    /*}*/

</style>
