<?php

function authenShowFormLoginClient()
{
    $view = 'authen/login';
    $title = 'Đăng ký / Đăng nhập';

    if ($_POST) {
        authenLoginClient();
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function authenLoginClient()
{
    $user = getUserByAccountAndPasswordClient($_POST['tai-khoan-dang-nhap'], $_POST['mat-khau-dang-nhap']);

    if (empty($user)) {
        $_SESSION['error-login'] = 'Tài khoản hoặc mật khẩu chưa đúng!';

        header('Location: ' . BASE_URL . '?act=login');
        exit();
    }

    $_SESSION['user'] = $user;

    header('Location: ' . BASE_URL);
    exit();
}

function authenLogoutClient()
{
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }

    header('Location: ' . BASE_URL);
    exit();
}
