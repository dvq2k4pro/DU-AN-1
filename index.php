<?php

session_start();

// Require tất cả các trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/model.php';

// Require file trong controllers và views
requireFile(PATH_CONTROLLER);
requireFile(PATH_MODEL);

// Điều hướng
$act = $_GET['act'] ?? '/';

// Biến này cần khai báo được link cần đăng nhập mới vào được
$arrRouteNeedAuth = [];

// Kiểm tra xem user đã đăng nhập chưa
middlewareAuthCheckClient($act, $arrRouteNeedAuth);

match ($act) {
    '/' => homeIndex(),
    'book-detail' => productDetails($_GET['id']),
    'book-list-by-category' => loadBookByCategory($_GET['id']),
    'book-search' => searchBook(),
};

require_once './commons/disconnect-db.php';
