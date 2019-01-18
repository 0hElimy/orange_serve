layui.use('laydate', function () {
    var laydate = layui.laydate;
    //执行一个laydate实例
    laydate.render({
        elem: '#test1' //指定元素
    });
});

layui.use(['form', 'layedit', 'laydate'], function () {
    var form = layui.form
        , layer = layui.layer

    //自定义验证规则
    form.verify({
        name: function (value) {
            if (value == "") {
                return '请填写名称！';
            }
        },
    });

    //监听提交
    form.on('submit(demo1)', function (data) {
        layer.alert(JSON.stringify(data.field), {})
        return false;
    });
});