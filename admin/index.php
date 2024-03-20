<?php
session_start();

// Require tất cả các trong commons
require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// Require file trong controllers và views
requireFile(PATH_CONTROLLER_ADMIN);
requireFile(PATH_MODEL_ADMIN);

// Điều hướng
$act = $_GET['act'] ?? '/';

middlewareAuthCheck($act);

match ($act) {
    '/' => dashboard(),

    // Authen
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),

    // CRUD User
    'users' => userListAll(),
    'user-detail' => userShowOne($_GET['id']),
    'user-create' => userCreate(),
    'user-update' => userUpdate($_GET['id']),
    'user-delete' => userDelete($_GET['id']),

    // CRUD Category
    'categories' => categoryListAll(),
    'category-detail' => categoryShowOne($_GET['id']),
    'category-create' => categoryCreate(),
    'category-update' => categoryUpdate($_GET['id']),
    'category-delete' => categoryDelete($_GET['id']),

    // CRUD Author
    'authors' => authorListAll(),
    'author-detail' => authorShowOne($_GET['id']),
    'author-create' => authorCreate(),
    'author-update' => authorUpdate($_GET['id']),
    'author-delete' => authorDelete($_GET['id']),

    // CRUD Book
    'books' => bookListAll(),
    'book-detail' => bookShowOne($_GET['id']),
    'book-create' => bookCreate(),
    'book-update' => bookUpdate($_GET['id']),
    'book-delete' => bookDelete($_GET['id']),
};

require_once '../commons/disconnect-db.php';
