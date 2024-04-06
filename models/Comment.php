<?php
if (!function_exists('listComments')) {
    function listComments($idSach)
    {
        try {
            $sql = "SELECT bl.noi_dung as bl_noi_dung, bl.ngay_binh_luan as bl_ngay_binh_luan, bl.danh_gia as bl_danh_gia, bl.xoa_mem as bl_xoa_mem, nd.ho_ten as nd_ho_ten FROM binh_luan bl INNER JOIN nguoi_dung nd ON nd.id = bl.id_nguoi_dung INNER JOIN sach s ON s.id = bl.id_sach WHERE bl.xoa_mem = 0 AND bl.id_sach = :idSach ORDER BY bl.id DESC LIMIT 10";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':idSach', $idSach);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getQuantityRowForComment')) {
    function getQuantityRowForComment($idSach)
    {
        try {
            $sql = "SELECT COUNT(*) AS count FROM binh_luan WHERE id_sach = :idSach AND xoa_mem = 0";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':idSach', $idSach);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (\Exception $e) {
            debug($e);
            return false;
        }
    }
}
