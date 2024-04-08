<?php
if (!function_exists('updateWhyDeletePublisher')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function updateWhyDeletePublisher($idNhaXuatBan)
    {
        try {
            $sql = "UPDATE sach SET id_nha_xuat_ban = 1 WHERE id_nha_xuat_ban = :idNhaXuatBan";
            $stmt = $GLOBALS['conn']->prepare($sql);


            $stmt->bindParam(":idNhaXuatBan", $idNhaXuatBan);


            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
