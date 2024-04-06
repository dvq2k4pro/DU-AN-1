<?php

if (!function_exists('updatePaymentStatus')) {
    function updatePaymentStatus($id, $paymentStatus)
    {
        try {
            $sql = "UPDATE don_hang SET trang_thai_thanh_toan = :paymentStatus WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':paymentStatus', $paymentStatus);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
            return false;
        }
    }
}
