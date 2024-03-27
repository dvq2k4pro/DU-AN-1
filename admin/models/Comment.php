<?php
if (!function_exists('listCommentsForAdmin')) {
    function listCommentsForAdmin()
    {
        try {
            $sql = "SELECT bl.id as bl_id, bl.noi_dung as bl_noi_dung, bl.ngay_binh_luan as bl_ngay_binh_luan, bl.danh_gia as bl_danh_gia, bl.xoa_mem as bl_xoa_mem, nd.tai_khoan as nd_tai_khoan, s.ten_sach as s_ten_sach FROM binh_luan bl INNER JOIN nguoi_dung nd ON nd.id = bl.id_nguoi_dung INNER JOIN sach s ON s.id = bl.id_sach ORDER BY bl.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

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
            $sql = "SELECT bl.id as bl_id, bl.noi_dung as bl_noi_dung, bl.ngay_binh_luan as bl_ngay_binh_luan, bl.danh_gia as bl_danh_gia, bl.xoa_mem as bl_xoa_mem, nd.tai_khoan as nd_tai_khoan, s.ten_sach as s_ten_sach FROM binh_luan bl INNER JOIN nguoi_dung nd ON nd.id = bl.id_nguoi_dung INNER JOIN sach s ON s.id = bl.id_sach WHERE bl.id = :id ORDER BY bl.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
