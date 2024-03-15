<?php

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
};

require_once '../commons/disconnect-db.php';
