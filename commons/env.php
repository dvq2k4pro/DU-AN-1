<?php

// Khai báo các biến môi trường, dùng Global
define('PATH_CONTROLLER', __DIR__ . '/../controllers/');
define('PATH_MODEL', __DIR__ . '/../models/');
define('PATH_VIEW', __DIR__ . '/../views/');

define('PATH_UPLOAD', __DIR__ . '/../');


define('PATH_CONTROLLER_ADMIN', __DIR__ . '/../admin/controllers/');
define('PATH_MODEL_ADMIN', __DIR__ . '/../admin/models/');
define('PATH_VIEW_ADMIN', __DIR__ . '/../admin/views/');

define('BASE_URL', 'http://localhost:81/website_ban_hang_nhom_8/');
define('BASE_URL_ADMIN', 'http://localhost:81/website_ban_hang_nhom_8/admin/');

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'du_an_1');

define('STATUS_DELIVERY_WFC', 0); // WAITING FOR CONFIRMATION - chờ xác nhận
define('STATUS_DELIVERY_WFP', 1); // WAITING FOR PICKUP - chờ lấy hàng
define('STATUS_DELIVERY_WFD', 2); // WAITING FOR DELIVERY - chờ giao hàng
define('STATUS_DELIVERY_ED', 3); // DELIVERED - đã giao
define('STATUS_DELIVERY_CED', -1); // CANCELED - đã huỷ

define('STATUS_PAYMENT_UNPAID', 0); // chưa thanh toán
define('STATUS_PAYMENT_PAID', 1); // đã thanh toán
define('STATUS_PAYMENT_CANCELED', -1); // đơn hàng đã huỷ
