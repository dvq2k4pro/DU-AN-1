<?php

if (!function_exists('checkUniqueten_the_loai')) {
    // Nếu không trùng trả về true
    // Trùng trả về false
    function checkUniqueten_the_loai($tableten_the_loai, $ten_the_loai)
    {
        try {
            $sql = "SELECT * FROM $tableten_the_loai WHERE ten_the_loai = :ten_the_loai LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":ten_the_loai", $ten_the_loai);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueten_the_loaiForUpdate')) {
    // Nếu không trùng trả về true
    // Trùng trả về false
    function checkUniqueten_the_loaiForUpdate($tableten_the_loai, $id, $ten_the_loai)
    {
        try {
            $sql = "SELECT * FROM $tableten_the_loai WHERE ten_the_loai = :ten_the_loai AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":ten_the_loai", $ten_the_loai);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
