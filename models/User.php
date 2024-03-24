<?php

if (!function_exists('getUserClientByEmailAndPassword')) {
    function getUserClientByEmailAndPassword($account, $password)
    {
        try {
            $sql = "SELECT * FROM nguoi_dung WHERE tai_khoan = :account AND mat_khau = :password AND vai_tro = 1 LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":account", $account);
            $stmt->bindParam(":password", $password);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
