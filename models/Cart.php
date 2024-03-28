<?php

if (!function_exists('getCartId')) {
    function getCartId($userId)
    {
        $cart = getCartByUserId($userId);

        if (empty($cart)) {
            return insertGetLastId('gio_hang', [
                'id_nguoi_dung' => $userId
            ]);
        }

        return $cart['id'];
    }
}

if (!function_exists('getCartByUserId')) {
    function getCartByUserId($userId)
    {
        try {
            $sql = "SELECT * FROM gio_hang WHERE id_nguoi_dung = :userId LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":userId", $userId);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
