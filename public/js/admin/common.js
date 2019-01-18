//全选，反选
$("#check_all").click(function () {
    $(':checkbox').prop("checked", this.checked);
});

//改变属性
$('.change_attr').click(function () {
    var info = {
        id: $(this).parents('tr').data('id'),
        attr: $(this).data('attr'),
        controllerName: $(this).parents('tr').data('attr'),
    };

    var _this = $(this);
    $.ajax({
        type: 'PATCH',
        url: "/admin/" + info.controllerName + "/change_attr",
        data: info,
        success: function () {
            _this.toggleClass('icon-checkmark3 icon-cross2');
        }
    })
});

//展开与折叠表格
$("#show_all").click(function () {
    $("tr.xParent").toggleClass();
    $("tr.xChildren").toggle('active');
});

//ajax删除
$('.del_one').click(function () {
    if (confirm('确定要删除么？')) {
        var id = $(this).parents('tr').data('id');
        var controllerName = $(this).parents('tr').data('attr');

        var that = $(this);
        $.ajax({
            type: 'DELETE',
            url: "/admin/" + controllerName + "/" + id,
            success: function (data) {
                if (data.status == 0) {
                    alert(data.msg);
                    return false;
                } else {
                    alert(data.msg);
                    that.parents('tr').remove();
                }
            }
        })
    }
});

//ajax排序
$("input[name='sort']").change(function () {
    var data = {
        sort: $(this).val(),
        id: $(this).parents("tr").data('id'),
        controllerName: $(this).parents('tr').data('attr'),
    };

    $.ajax({
        type: "PATCH",
        url: "/admin/" + data.controllerName + "/sort",
        data: data,
        success: function () {
            window.location.reload();
        }
    });
});

//删除多条
$('.del_all').click(function () {
    var length = $(".checked_id:checked").length;
    if (length == 0) {
        alert('您至少要选中一条记录~');
        return false;
    }

    if (confirm('删除后不可恢复，请谨慎此操作！')) {
        var controllerName = $(this).attr('data-controller');
        var checked_id = $(".checked_id:checked").serialize();

        $.ajax({
            type: 'DELETE',
            url: "/admin/" + controllerName + "/destroy_checked",
            data: checked_id,
            success: function (data) {
                if (data.status == 1) {
                    alert(data.msg);
                    $(".checked_id:checked").each(function () {
                        $(this).parents('tr').remove()
                    })
                }
            }
        })
    }
});
