<?php

function userListAll()
{
    $title = 'Danh sách User';
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';

    $users = listAll('nguoi_dung');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userShowOne($id)
{
    $user = showOne('nguoi_dung', $id);
    if (empty($user)) {
        e404();
    }

    $title = 'Chi tiết User: ' . $user['tai_khoan'];
    $view = 'users/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
    $title = 'Thêm mới User';
    $view = 'users/create';

    if (!empty($_POST)) {
        $data = [
            "ho_ten" => $_POST['ho_ten'],
            "tai_khoan" => $_POST['tai_khoan'],
            "dia_chi" => $_POST['dia_chi'],
            "so_dien_thoai" => $_POST['so_dien_thoai'],
            "email" => $_POST['email'],
            "mat_khau" => $_POST['mat_khau'],
            "vai_tro" => $_POST['vai_tro'],
        ];

        insert('nguoi_dung', $data);

        header('location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userUpdate($id)
{
    $user = showOne('nguoi_dung', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Cập nhật thông tin User: ' . $user['name'];
    $view = 'users/update';

    if (!empty($_POST)) {
        $data = [
            "ho_ten" => $_POST['ho_ten'],
            "tai_khoan" => $_POST['tai_khoan'],
            "dia_chi" => $_POST['dia_chi'],
            "so_dien_thoai" => $_POST['so_dien_thoai'],
            "email" => $_POST['email'],
            "mat_khau" => $_POST['mat_khau'],
            "vai_tro" => $_POST['vai_tro'],
        ];

        update('users', $id, $data);

        header('location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userDelete($id)
{
}
