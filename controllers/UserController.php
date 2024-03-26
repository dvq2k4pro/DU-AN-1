<?php

function userRegister()
{
    if (!empty([$_POST])) {
        $data = [
            "ho_ten" => $_POST['ho-ten'] ?? null,
            "tai_khoan" => $_POST['tai-khoan'] ?? null,
            "email" => $_POST['email'] ?? null,
            "mat_khau" => $_POST['mat-khau'] ?? null,
        ];


        $errors = validateUserRegister($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            $_SESSION['repeatPassword'] = $_POST['nhap-lai-mat-khau'];

            header('location: ' . BASE_URL . '?act=login');
            exit();
        }

        insert('nguoi_dung', $data);
        $_SESSION['success'] = 'Đăng ký thành công, vui lòng đăng nhập!';

        header('location: ' . BASE_URL . '?act=login');
        exit();
    }
}

function validateUserRegister($data)
{
    $errors = [];

    if (empty($data['tai_khoan'])) {
        $errors['tai_khoan'] = 'Trường tài khoản không được để trống!';
    } else if (strlen($data['tai_khoan']) > 50) {
        $errors['tai_khoan'] = 'Trường tài khoản độ dài tối đa 50 ký tự!';
    }

    if (empty($data['ho_ten'])) {
        $errors['ho_ten'] = 'Trường họ tên không được để trống!';
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

    if (empty($_POST['nhap-lai-mat-khau'])) {
        $errors['nhap_lai_mat_khau'] = 'Trường nhập lại mật khẩu không được để trống!';
    } else if (!empty($data['mat_khau']) && ($_POST['nhap-lai-mat-khau'] != $data['mat_khau'])) {
        $errors['nhap_lai_mat_khau'] = 'Mật khẩu không trùng khớp!';
    }

    return $errors;
}

function forgotPassword()
{
    $view = 'users/forgot-password';
    $title = 'Quên mật khẩu';

    if (!empty($_POST)) {
        $taiKhoan = $_POST['tai-khoan'];
        $email = $_POST['email'];

        $errors = validateForgotPassword($taiKhoan, $email);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['forgot-password']['tai-khoan'] = $taiKhoan;
            $_SESSION['forgot-password']['email'] = $email;

            header('location: ' . BASE_URL . '?act=forgot-password');
            exit();
        }

        $userInfo = getPasswordByAccountAndEmail($taiKhoan, $email);
        if (!empty($userInfo)) {
            $_SESSION['success'] = 'Mật khẩu của bạn là: ' . $userInfo['mat_khau'];
        } else {
            $_SESSION['success'] = 'Tài khoản hoặc email không chính xác, vui lòng kiểm tra lại!';
        }
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function validateForgotPassword($taiKhoan, $email)
{
    $errors = [];

    if (empty($taiKhoan)) {
        $errors['tai_khoan'] = 'Trường tài khoản không được để trống!';
    }

    if (empty($email)) {
        $errors['email'] = 'Trường email không được để trống!';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Trường email không hợp lệ!';
    }

    return $errors;
}

function userDetail($id)
{
    $userInfo = showOne('nguoi_dung', $id);

    if (empty($userInfo)) {
        e404();
    }

    $view = 'users/user-detail';
    $title = $userInfo['tai_khoan'];
    $categories = listAll('the_loai');

    if (!empty($_POST)) {
        $data = [
            "ho_ten" => $_POST['ho-ten'] ?? $userInfo['ho_ten'],
            "email" => $_POST['email'] ?? $userInfo['email'],
            "dia_chi" => $_POST['dia-chi'] ?? $userInfo['dia_chi'],
            "so_dien_thoai" => $_POST['so-dien-thoai'] ?? $userInfo['so_dien_thoai']
        ];

        $errors = validateUserUpdateClient($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('nguoi_dung', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }

        header('location: ' . BASE_URL . '?act=user-detail&id=' . $id);
        exit();
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function validateUserUpdateClient($id, $data)
{
    $errors = [];

    if (empty($data['ho_ten'])) {
        $errors['ho_ten'] = 'Trường họ tên không được để trống!';
    }

    if (empty($data['email'])) {
        $errors['email'] = 'Trường email không được để trống!';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Trường email không hợp lệ!';
    } else if (!checkUniqueEmailForUpdate('nguoi_dung', $id, $data['email'])) {
        $errors['email'] = 'Trường email đã được sử dụng!';
    }

    return $errors;
}

function changePassword($id)
{
    $userInfo = showOne('nguoi_dung', $id);

    if (empty($userInfo)) {
        e404();
    }

    $view = 'users/change-password';
    $title = 'Đổi mật khẩu';
    $categories = listAll('the_loai');

    if (!empty($_POST)) {
        $data = [
            "mat_khau" => $_POST['mat-khau-moi'] ?? $userInfo['mat_khau']
        ];

        $errors = validateChangePasswordClient($userInfo['mat_khau']);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            changePasswordForClient($id, $data['mat_khau']);
            $_SESSION['success'] = "Cập nhật thành công! <b><a href=" . BASE_URL . '?act=user-detail&id=' . $id . ">Quay lại</a></b>";
        }
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function validateChangePasswordClient($oldPassword)
{
    $errors = [];

    if (empty($_POST['mat-khau-hien-tai'])) {
        $errors['mat_khau_hien_tai'] = 'Vui lòng nhập mật khẩu hiện tại!';
    } else if ($_POST['mat-khau-hien-tai'] != $oldPassword) {
        $errors['mat_khau_hien_tai'] = 'Mật khẩu hiện tại không chính xác!';
    }

    if (empty($_POST['mat-khau-moi'])) {
        $errors['mat_khau_moi'] = 'Vui lòng nhập mật khẩu mới!';
    } else if (strlen($_POST['mat-khau-moi']) < 8 || strlen($_POST['mat-khau-moi']) > 20) {
        $errors['mat_khau_moi'] = 'Mật khẩu phải có độ dài nhỏ nhất là 8, lớn nhất là 20!';
    } else if ($_POST['mat-khau-moi'] == $_POST['mat-khau-hien-tai']) {
        $errors['mat_khau_moi'] = 'Mật khẩu mới không được trùng với mật khẩu hiện tại!';
    }

    if (empty($_POST['xac-nhan-mat-khau'])) {
        $errors['xac_nhan_mat_khau'] = 'Vui lòng nhập xác nhận mật khẩu!';
    } else if (empty($errors['mat_khau_moi']) && ($_POST['xac-nhan-mat-khau'] != $_POST['mat-khau-moi'])) {
        $errors['xac_nhan_mat_khau'] = 'Mật khẩu không trùng khớp!';
    }

    return $errors;
}
