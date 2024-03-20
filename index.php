<?php

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

match ($act) {
    '/' => homeIndex(),
    'chi-tiet-san-pham' => productDetails($_GET['id']),
    'danh-sach-san-pham' => loadBookByCategory($_GET['id']),
};

require_once './commons/disconnect-db.php';
