<?php

// CRUD - > Create, Read, Update, Delete

if (!function_exists('getStrKeys')) {
    function getStrKeys($data)
    {
        return implode(',', array_keys($data));
    }
}

if (!function_exists('getVirtualParams')) {
    function getVirtualParams($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('getSetParams')) {
    function getSetParams($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "$key = :$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        try {
            $strKeys = getStrKeys($data);
            $virtualPrams = getVirtualParams($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES($virtualPrams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('listAll')) {
    function listAll($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        try {
            $setParams = getSetParams($data);

            $sql = "UPDATE $tableName SET $setParams WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete')) {
    function delete($tableName, $id)
    {
        try {
            $sql = "DELETE FROM $tableName WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueName')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueName($tableName, $rowName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE $rowName = :name LIMIT 1";
            // debug($sql);
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueNameForUpdate')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueNameForUpdate($tableName, $id, $rowName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE $rowName = :name AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('insertGetLastId')) {
    function insertGetLastId($tableName, $data = [])
    {
        try {
            $strKeys = getStrKeys($data);
            $virtualParams = getVirtualParams($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();

            return $GLOBALS['conn']->lastInsertId();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getAuthorsForBook')) {
    function getAuthorsForBook($bookId)
    {
        try {
            $sql = "
                SELECT 
                    tg.id    tg_id,
                    tg.ten_tac_gia  tg_ten_tac_gia
                FROM tac_gia as tg
                INNER JOIN sach_tac_gia as stg ON tg.id = stg.id_tac_gia
                WHERE stg.id_sach = :id_sach;
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id_sach', $bookId);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('increaseViewCount')) {
    function increaseViewCount($bookId)
    {
        try {
            $sql = "
                UPDATE sach
                SET luot_xem = luot_xem + 1 WHERE id = :id
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $bookId);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('middlewareAuthCheckClient')) {
    function middlewareAuthCheckClient($act, $arrRouteNeedAuth)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location: ' . BASE_URL);
                exit();
            }
        } elseif (empty($_SESSION['user']) && in_array($act, $arrRouteNeedAuth)) {
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}

if (!function_exists('checkUniqueEmail')) {
    // Nếu không trùng trả về true
    // Trùng trả về false
    function checkUniqueEmail($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmailForUpdate')) {
    // Nếu không trùng trả về true
    // Trùng trả về false
    function checkUniqueEmailForUpdate($tableName, $id, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getUserByAccountAndPassword')) {
    function getUserByAccountAndPassword($account, $password)
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

if (!function_exists('getUserByAccountAndPasswordClient')) {
    function getUserByAccountAndPasswordClient($account, $password)
    {
        try {
            $sql = "SELECT * FROM nguoi_dung WHERE tai_khoan = :account AND mat_khau = :password LIMIT 1";

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

if (!function_exists('decreaseQuantity')) {
    function decreaseQuantity($bookId, $quantity)
    {
        try {
            $sql = "
                UPDATE sach
                SET so_luong_ton_kho = so_luong_ton_kho - :quantity WHERE id = :id
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $bookId);
            $stmt->bindParam(':quantity', $quantity);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadOrdersByUserId')) {
    function loadOrdersByUserId($userId)
    {
        try {
            $sql = "
                SELECT
                s.ten_sach as s_ten_sach,
                dh.ngay_cap_nhat_cuoi_cung as dh_ngay_cap_nhat_cuoi_cung,
                dh.trang_thai_thanh_toan as dh_trang_thai_thanh_toan,
                ctdh.so_luong as ctdh_so_luong,
                ctdh.gia as ctdh_gia
                FROM
                don_hang dh
                INNER JOIN
                chi_tiet_don_hang ctdh
                ON ctdh.id_don_hang = dh.id
                INNER JOIN
                sach s
                ON s.id = ctdh.id_sach
                WHERE dh.id_nguoi_dung = :userId
                ORDER BY dh.ngay_cap_nhat_cuoi_cung DESC
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':userId', $userId);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
