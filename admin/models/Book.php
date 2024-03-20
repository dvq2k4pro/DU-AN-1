<?php

if (!function_exists('listAllForBook')) {
    function listAllForBook()
    {
        try {
            $sql = "
                SELECT
                s.id as s_id,
                s.ten_sach as s_ten_sach,
                s.hinh_nen as s_hinh_nen,
                s.gia as s_gia,
                s.mo_ta as s_mo_ta,
                s.luot_xem as s_luot_xem,
                s.san_pham_dac_sac as s_san_pham_dac_sac,
                s.ngay_ra_mat as s_ngay_ra_mat,
                tl.ten_the_loai as tl_ten_the_loai,
                tg.ten_tac_gia as tg_ten_tac_gia 
                FROM sach as s
                INNER JOIN the_loai as tl ON tl.id = s.id_the_loai
                INNER JOIN tac_gia as tg ON tg.id = s.id_tac_gia
                ORDER BY s_id DESC
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOneForBook')) {
    function showOneForBook($id)
    {
        try {
            $sql = "
                SELECT
                s.id as s_id,
                s.id_the_loai as s_id_the_loai,
                s.id_tac_gia as s_id_tac_gia,
                s.ten_sach as s_ten_sach,
                s.hinh_nen as s_hinh_nen,
                s.gia as s_gia,
                s.mo_ta as s_mo_ta,
                s.luot_xem as s_luot_xem,
                s.san_pham_dac_sac as s_san_pham_dac_sac,
                s.ngay_ra_mat as s_ngay_ra_mat,
                tl.ten_the_loai as tl_ten_the_loai,
                tg.ten_tac_gia as tg_ten_tac_gia 
                FROM sach as s
                INNER JOIN the_loai as tl ON tl.id = s.id_the_loai
                INNER JOIN tac_gia as tg ON tg.id = s.id_tac_gia
                WHERE
                s.id = :id
                LIMIT 1
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
