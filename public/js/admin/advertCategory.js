$('.submit').click(function () {
    var data = {
        name: $("#name").val(),
        sort: $("#sort").val(),
    };

    if(data.name == ""){
        alert('名称不能为空~');
        return false;
    }

    if(data.sort == ""){
        alert('排序不能为空~');
        return false;
    }

    var check_sort = /^[0-9]+.?[0-9]*$/;
    if (!check_sort.test(data.sort)) {
        alert("排序值为数字~");
        return false;
    }

    $.ajax({
        type: "POST",
        url: "/admin/advertCategories",
        data: data,
        success: function (data) {
            if (data.status == 1) {
                alert(data.msg);
                var html = '<tr data-id="' + data.info.id + '">' +
                    '<td>' + data.info.id + '</td>' +
                    '<td><a href="javascript:;">' + data.info.name + '</a></td>' +
                    '<td>' + data.info.sort + '</td>' +
                    '<td><span class="label label-success">' + data.info.created_at + '</span></td>' +
                    '<td class="text-center">' +
                    '<ul class="icons-list">' +
                    '<li class="dropdown">' +
                    '<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">' +
                    '<i class="icon-menu9"></i>' +
                    '</a>' +
                    '<ul class="dropdown-menu dropdown-menu-right">' +
                    '<li>' +
                    '<a data-toggle="modal" data-target="#edit_cate" class="edit"><i class="icon-pencil"></i>' +
                    '编辑</a></li>' +
                    '<li>' +
                    '<a href="javascript:;" class="del_one"><i class="icon-trash"></i>' +
                    '删除</a></li>\n' +
                    '</ul>' +
                    '</li>' +
                    '</ul>' +
                    '</td>' +
                    '</tr>';

                $(html).appendTo('tbody')
            }

            window.location.reload();
        }
    })
});

//删除
$(document).on('click', '.del_one', function () {
    if (confirm('确定要删除此记录么？')) {
        var id = $(this).parents('tr').data('id');
        var that = $(this);
        $.ajax({
            type: "DELETE",
            url: "/admin/advertCategories/" + id,
            success: function (data) {
                if (data.status == 1) {
                    alert(data.msg);
                    that.parents('tr').remove();
                }
            }
        })
    }
});

//编辑
$(document).on('click', '.edit', function () {
    var id = $(this).parents('tr').data('id');
    var name = $(this).parents('td').siblings('.name').text();
    var sort = $(this).parents('td').siblings('.sort').text();

    //设置值
    $("#edit_id").val(id);
    $("#edit_name").val(name);
    $("#edit_sort").val(sort);
});

//执行编辑
$('.save_cate').click(function () {
    var info = {
        id: $("#edit_id").val(),
        name: $("#edit_name").val(),
        sort: $("#edit_sort").val(),
    };

    $.ajax({
        type: "PUT",
        url: "/admin/advertCategories/" + info.id,
        data: info,
        success: function (data) {
            if (data.status == 1) {
                alert(data.msg);
                window.location.reload();
            }
        }
    })
});