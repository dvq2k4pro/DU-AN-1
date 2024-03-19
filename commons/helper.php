<?php

// Khai báo các hàm dùng Global
if (!function_exists('requireFile')) {
    function requireFile($pathFolder)
    {
        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";

        print_r($data);

        die;
    }
}

if (!function_exists('e404')) {
    function e404()
    {
        echo "404 - Not found";
        die;
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $pathFolderUpload)
    {
        $imagePath = $pathFolderUpload . time() . '-' . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imagePath)) {
            return $imagePath;
        }

        return null;
    }
}

if (!function_exists('middlewareAuthCheck')) {
    function middlewareAuthCheck($act)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('location: ' . BASE_URL_ADMIN);
                exit();
            }
        } else if (empty($_SESSION['user'])) {
            header('location: ' . BASE_URL_ADMIN . '?act=login');
            exit();
        }
    }
}

if (!function_exists('getFileUpload')) {
    function getFileUpload($field, $default = null)
    {
        if (isset($_FILES[$field]) && $_FILES[$field]['size'] > 0) {
            return $_FILES[$field];
        }

        return $default ?? null;
    }
}
