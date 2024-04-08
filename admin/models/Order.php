<?php

if (!function_exists('showOneForOrder')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function showOneForOrder($idOrder)
    {
        try {
            $sql = "
            SELECT
            ctdh.so_luong as ctdh_so_luong,
            ctdh.id as ctdh_id,
            ctdh.gia as ctdh_gia,
            s.ten_sach as s_ten_sach,
            s.hinh_nen as s_hinh_nen
            FROM
            don_hang dh
            INNER JOIN
            chi_tiet_don_hang ctdh
            ON ctdh.id_don_hang = dh.id
            INNER JOIN
            sach s
            ON s.id = ctdh.id_sach
            WHERE dh.id = :idOrder
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);


            $stmt->bindParam(":idOrder", $idOrder);


            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
