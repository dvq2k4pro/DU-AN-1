<?php

if (!function_exists('checkUniqueNameTheLoai')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueNameTheLoai($name)
    {
        try {
            $sql = "SELECT * FROM the_loai WHERE ten_the_loai = :name LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueNameForUpdate')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueNameTheLoaiForUpdate($id, $name)
    {
        try {
            $sql = "SELECT * FROM the_loai WHERE ten_the_loai = :name AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
