<?php
if (!function_exists('updateWhyDeleteCategory')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function updateWhyDeleteCategory($idTheLoai)
    {
        try {
            $sql = "UPDATE sach SET id_the_loai = 1 WHERE id_the_loai = :idTheLoai";
            $stmt = $GLOBALS['conn']->prepare($sql);


            $stmt->bindParam(":idTheLoai", $idTheLoai);


            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
