<?php

function userListAll()
{
    $title = 'Danh sách User';
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';

    $users = listAll('users');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userShowOne($id)
{
    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }

    $title = 'Chi tiết User: ' . $user['name'];
    $view = 'users/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
    $title = 'Thêm mới User';
    $view = 'users/create';

    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "type" => $_POST['type'],
        ];

        insert('users', $data);

        header('location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userUpdate($id)
{
    $title = 'Cập nhật thông tin User: ';
    $view = 'users/update';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userDelete($id)
{
}
