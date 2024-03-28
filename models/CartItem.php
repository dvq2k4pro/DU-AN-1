<?php

if (!function_exists('updateQuantityByCartIdAndBookId')) {
    function updateQuantityByCartIdAndBookId($cartId, $bookId, $quantity)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hang SET so_luong = :quantity WHERE id_gio_hang = :cartId AND id_sach = :bookId";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":cartId", $cartId);
            $stmt->bindParam(":bookId", $bookId);
            $stmt->bindParam(":quantity", $quantity);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteCartItemByCartIdAndBookId')) {
    function deleteCartItemByCartIdAndBookId($cartId, $bookId)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hang WHERE id_gio_hang = :cartId AND id_sach = :bookId";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":cartId", $cartId);
            $stmt->bindParam(":bookId", $bookId);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteCartItemByCartId')) {
    function deleteCartItemByCartId($cartId)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hang WHERE id_gio_hang = :cartId";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":cartId", $cartId);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
