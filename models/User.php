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

if (!function_exists('getPasswordByAccountAndEmail')) {
    function getPasswordByAccountAndEmail($taiKhoan, $email)
    {
        try {
            $sql = "SELECT * FROM nguoi_dung WHERE tai_khoan = :taiKhoan AND email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":taiKhoan", $taiKhoan);
            $stmt->bindParam(":email", $email);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('changePasswordForClient')) {
    function changePasswordForClient($id, $newPassword)
    {
        try {
            $sql = "UPDATE nguoi_dung SET mat_khau = $newPassword WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
