<?php

if (!function_exists('updatePaymentStatus')) {
    function updatePaymentStatus($id)
    {
        try {
            $sql = "UPDATE don_hang SET trang_thai_thanh_toan = 1 WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
            return false;
        }
    }
}
