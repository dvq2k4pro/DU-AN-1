<?php

function userListAll()
{
    $title = 'Danh sách người dùng';
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

    $title = 'Chi tiết người dùng: ' . $user['tai_khoan'];
    $view = 'users/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreate()
{
    $title = 'Thêm mới người dùng';
    $view = 'users/create';

    if (!empty($_POST)) {
        $data = [
            "ho_ten" => $_POST['ho_ten'] ?? null,
            "tai_khoan" => $_POST['tai_khoan'] ?? null,
            "dia_chi" => $_POST['dia_chi'] ?? null,
            "so_dien_thoai" => $_POST['so_dien_thoai'] ?? null,
            "email" => $_POST['email'] ?? null,
            "mat_khau" => $_POST['mat_khau'] ?? null,
            "vai_tro" => $_POST['vai_tro'] ?? null,
        ];

        $errors = validateUserCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=user-create');
            exit();
        }

        insert('nguoi_dung', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUserCreate($data)
{
    // tai_khoan - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // mat_khau - bắt buộc, độ dài nhỏ nhất là 8, lớn nhất là 20
    // vai_trò - bắt buộc, phải là 0 hoặc 1
    $errors = [];

    if (empty($data['tai_khoan'])) {
        $errors['tai_khoan'] = 'Trường tài khoản không được để trống!';
    } else if (strlen($data['tai_khoan']) > 50) {
        $errors['tai_khoan'] = 'Trường tài khoản độ dài tối đa 50 ký tự!';
    }

    if (empty($data['email'])) {
        $errors['email'] = 'Trường email không được để trống!';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Trường email không hợp lệ!';
    } else if (!checkUniqueEmail('nguoi_dung', $data['email'])) {
        $errors['email'] = 'Trường email đã được sử dụng!';
    }

    if (empty($data['mat_khau'])) {
        $errors['mat_khau'] = 'Trường mật khẩu không được để trống!';
    } else if (strlen($data['mat_khau']) < 8 || strlen($data['mat_khau']) > 20) {
        $errors['mat_khau'] = 'Trường mật khẩu độ dài nhỏ nhất là 8, lớn nhất là 20!';
    }

    if ($data['vai_tro'] === null) {
        $errors['vai_tro'] = 'Trường vai trò không được để trống!';
    } else if (!in_array($data['vai_tro'], [0, 1])) {
        $errors['vai_tro'] = 'Trường vai trò phải là 0 hoặc 1!';
    }

    return $errors;
}

function userUpdate($id)
{
    $user = showOne('nguoi_dung', $id);

    if (empty($user)) {
        e404();
    }

    $title = 'Cập nhật thông tin người dùng: ' . $user['tai_khoan'];
    $view = 'users/update';

    if (!empty($_POST)) {
        $data = [
            "vai_tro" => $_POST['vai_tro'] ?? null
        ];

        $errors = validateUserUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('nguoi_dung', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateUserUpdate($id, $data)
{
    // vai_trò - bắt buộc, phải là 0 hoặc 1
    $errors = [];

    if ($data['vai_tro'] === null) {
        $errors['vai_tro'] = 'Trường vai trò không được để trống!';
    } else if (!in_array($data['vai_tro'], [0, 1])) {
        $errors['vai_tro'] = 'Trường vai trò phải là 0 hoặc 1!';
    }

    return $errors;
}

function userDelete($id)
{
    delete('nguoi_dung', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=users');
    exit();
}
