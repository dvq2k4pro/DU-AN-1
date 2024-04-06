<?php
if (!function_exists('getBooksWithComments')) {
    function getBooksWithComments()
    {
        try {
            $sql = "
                SELECT
                s.id as s_id,
                s.ten_sach as s_ten_sach,
                s.hinh_nen as s_hinh_nen,
                tl.ten_the_loai as tl_ten_the_loai
                FROM binh_luan bl
                INNER JOIN sach s
                ON s.id = bl.id_sach
                INNER JOIN the_loai tl
                ON tl.id = s.id_the_loai
                GROUP BY bl.id_sach
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getQuantityRowForCommentAdmin')) {
    function getQuantityRowForCommentAdmin($idSach)
    {
        try {
            $sql = "SELECT COUNT(*) AS count FROM binh_luan WHERE id_sach = :idSach";
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

if (!function_exists('listCommentsForAdmin')) {
    function listCommentsForAdmin($id)
    {
        try {
            $sql = "SELECT bl.id as bl_id, bl.noi_dung as bl_noi_dung, bl.ngay_binh_luan as bl_ngay_binh_luan, bl.danh_gia as bl_danh_gia, bl.xoa_mem as bl_xoa_mem, nd.tai_khoan as nd_tai_khoan FROM binh_luan bl INNER JOIN nguoi_dung nd ON nd.id = bl.id_nguoi_dung INNER JOIN sach s ON s.id = bl.id_sach WHERE bl.id_sach = :id ORDER BY bl.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showCommentById')) {
    function showCommentById($id)
    {
        try {
            $sql = "SELECT bl.id as bl_id, bl.noi_dung as bl_noi_dung, bl.ngay_binh_luan as bl_ngay_binh_luan, bl.danh_gia as bl_danh_gia, bl.xoa_mem as bl_xoa_mem, nd.tai_khoan as nd_tai_khoan, s.ten_sach as s_ten_sach, bl.id_sach as bl_id_sach FROM binh_luan bl INNER JOIN nguoi_dung nd ON nd.id = bl.id_nguoi_dung INNER JOIN sach s ON s.id = bl.id_sach WHERE bl.id = :id ORDER BY bl.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
