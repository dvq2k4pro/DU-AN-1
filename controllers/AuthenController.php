<?php

function authenShowFormLoginClient()
{
    if ($_POST) {
        authenLoginClient();
    }

    require_once PATH_VIEW . 'authen/login.php';
}

function authenLoginClient()
{
    $user = getUserClientByEmailAndPassword($_POST['account'], $_POST['password']);

    if (empty($user)) {
        $_SESSION['error'] = 'Tài khoản hoặc mật khẩu chưa đúng!';

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
