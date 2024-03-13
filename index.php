<?php

// Require tất cả các trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';
require_once './commons/crud-db.php';

// Require file trong controllers và views
requireFile(PATH_CONTROLLER);
requireFile(PATH_MODEL);

insert('users', [
    'name' => 'Hoppv04',
    'email' => 'hoppv04@gmail.com',
    'password' => 'hoppv04',
    'type' => 1,
]);

delete('users', 2);

// Điều hướng
$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => homeIndex(),
};

// require_once './commons/disconnect-db.php';
