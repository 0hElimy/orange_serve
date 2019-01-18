//设置事件绑定按钮
$(".upload_img").click(function () {
    $("#image_upload").click();
});

//文件上传
var opts = {
    url: "/photos",
    type: "POST",
    success: function (result) {
        if (result.status == 0) {
            alert(result.msg);
            return false;
        }

        $("input[name='image']").val(result.msg);
        $("#img_show").attr("src", result.msg);
    },
    error: function () {
        alert('文件上传失败');
    }
};

$('#image_upload').fileUpload(opts);