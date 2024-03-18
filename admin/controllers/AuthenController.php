<?php

function authenShowFormLogin()
{
    if (!empty($_POST)) {
        authenLogin();
    }

    require_once PATH_VIEW_ADMIN . 'authen/login.php';
}

function authenLogin()
{
    $user = getUserByAccountAndPassword($_POST['tai_khoan'], $_POST['mat_khau']);

    if (empty($user)) {
        $_SESSION['error'] = 'Tài khoản hoặc mật khẩu không chính xác!';

        header('location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    }

    $_SESSION['user'] = $user;

    header('location: ' . BASE_URL_ADMIN);
    exit();
}

function authenLogout()
{
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }

    header('location: ' . BASE_URL);
    exit();
}
