<?php
/***
 * 改变属性
 * @param $model
 * @param $attr
 * @return string
 */
function is_something($model, $attr)
{
    if ($model->$attr) {
        return '<span class="icon-checkmark3 change_attr" data-attr="' . $attr . '"></span>';
    }

    return '<span class="icon-cross2 change_attr" data-attr="' . $attr . '"></span>';
}

/***
 * 查看品牌
 * @param $brand
 * @return string
 */
function show_category_brands($category)
{
    if (!$category->brands->isEmpty()) {
        return '<a class="label label-info" href="' . route('admin.brands.index', ['category_id' => $category->id]) . '">查看品牌</a>';
    }
}

function get_real_ip()
{
    $ip = false;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = FALSE;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi('^(10│172.16│192.168).', $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

