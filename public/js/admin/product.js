//商品属性js
$("#add_file").click(function () {
    var length = $("#files").children().length;
    if (length >= 5) {
        alert('您最多只能添加5个属性~');
        return false;
    }

    var i = length + 1;

    var html = '<div class="form-group">' +
        '<label class="control-label col-lg-2"></label>' +
        '<div class="row">' +
        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<input type="text" class="form-control file' + i + '" name="name[]" placeholder="属性名">' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="form-group">' +
        '<input type="text" class="form-control file' + i + '" name="value[]" placeholder="属性值">' +
        '</div>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<div class="form-group">' +
        '<a href="javascript:;" class="empty_file1" style="color: red;"><i class="icon-cross3"></i></a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    $("#files").append(html);

    return false;
})

//js删除表单
$(document).on('click', '.empty_file1', function () {
    $(this).parents('.form-group').remove();
});

//编辑时真正删除
$(document).on('click', '.remove_attr', function () {
    if (confirm('此记录删除后不可恢复，请慎重！')) {
        var id = $(this).data('id');
        var that = $(this);
        $.ajax({
            type: 'DELETE',
            url: "/admin/products/destroy_attr",
            data: {id: id},
            success: function () {
                that.parents('.form-group').remove();
            }
        })
    }
});

//鼠标放上去，显示删除按钮，否则移除按钮
$(".am-gallery-item").hover(function () {
    $(this).children('.file-panel').fadeIn(300);
}, function () {
    $(this).children('.file-panel').fadeOut(300);
});

//ajax删除图片
$('.cancel').click(function () {
    if (confirm('此相册删除后不可恢复，请慎重！')) {
        var _this = $(this);
        $.ajax({
            type: "DELETE",
            url: "/admin/products/destroy_gallery",
            data: {id: _this.data('id')},
            success: function () {
                _this.parents('li').fadeOut(400);
            }
        });
    }
});
