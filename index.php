<?php

// Require tất cả các trong commons
require_once './commons/env.php';
require_once './commons/helper.php';
require_once './commons/connect-db.php';

// Require file trong controllers và views
requireFile(PATH_CONTROLLER);
requireFile(PATH_MODEL);

// Điều hướng

require_once './commons/disconnect-db.php';
