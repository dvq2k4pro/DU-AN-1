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

match ($act) {
    '/' => dashboard(),

    // CRUD User
    'users' => userListAll(),
    'user-detail' => userShowOne($_GET['id']),
    'user-create' => userCreate(),
    'user-update' => userUpdate($_GET['id']),
    'user-delete' => userDelete($_GET['id']),
};

require_once '../commons/disconnect-db.php';
