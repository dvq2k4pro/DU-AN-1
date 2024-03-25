<?php
if (!function_exists('updateWhyDeleteSize')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function updateWhyDeleteSize($idKichThuoc)
    {
        try {
            $sql = "UPDATE sach SET id_kich_thuoc = 1 WHERE id_kich_thuoc = :idKichThuoc";
            $stmt = $GLOBALS['conn']->prepare($sql);


            $stmt->bindParam(":idKichThuoc", $idKichThuoc);


            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
