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
$arrRouteNeedAuth = [
    'cart-add',
    'cart-list',
    'cart-inc',
    'cart-desc',
    'cart-delete',
    'order-checkout',
    'order-purchase',
    'order-complete'
];

// Kiểm tra xem user đã đăng nhập chưa
middlewareAuthCheckClient($act, $arrRouteNeedAuth);

match ($act) {
    '/' => homeIndex(),

    // Authen
    'login' => authenShowFormLoginClient(),
    'logout' => authenLogoutClient(),

    'register' => userRegister(),
    'forgot-password' => forgotPassword(),
    'change-password' => changePassword($_GET['id']),
    'user-detail' => userDetail($_GET['id']),
    'book-detail' => productDetails($_GET['id']),
    'book-list-by-category' => loadBookByCategory($_GET['id']),
    'book-search' => searchBook(),
    'filter-book-by-category' => filterBookByCategory($_GET['id'], $_GET['search-keyword']),
    'filter-book-by-price' => filterBookByPrice($_GET['search-keyword']),

    // Cart
    'cart-add' => cartAdd($_GET['bookId'], $_GET['quantity']),
    'cart-list' => cartList(),
    'cart-inc' => cartInc($_GET['bookId']),
    'cart-desc' => cartDesc($_GET['bookId']),
    'cart-delete' => cartDelete($_GET['bookId']),

    'order-checkout' => orderCheckout(),
    'order-purchase' => orderPurchase(),
    'order-complete' => orderComplete(),
    'destroy-order' => destroyOrder($_GET['id']),
};

require_once './commons/disconnect-db.php';
