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
                s.loai_bia as s_loai_bia,
                s.so_trang as s_so_trang,
                s.mo_ta as s_mo_ta,
                s.luot_xem as s_luot_xem,
                s.san_pham_dac_sac as s_san_pham_dac_sac,
                s.ngay_ra_mat as s_ngay_ra_mat,
                tl.ten_the_loai as tl_ten_the_loai,
                nxb.ten_nha_xuat_ban as nxb_ten_nha_xuat_ban 
                FROM sach as s
                INNER JOIN the_loai as tl ON tl.id = s.id_the_loai
                INNER JOIN nha_xuat_ban as nxb ON nxb.id = s.id_nha_xuat_ban
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
                s.ten_sach as s_ten_sach,
                s.hinh_nen as s_hinh_nen,
                s.id_nha_xuat_ban as s_id_nha_xuat_ban,
                s.id_the_loai as s_id_the_loai,
                s.gia as s_gia,
                s.loai_bia as s_loai_bia,
                s.so_trang as s_so_trang,
                s.mo_ta as s_mo_ta,
                s.luot_xem as s_luot_xem,
                s.san_pham_dac_sac as s_san_pham_dac_sac,
                s.ngay_ra_mat as s_ngay_ra_mat,
                tl.ten_the_loai as tl_ten_the_loai,
                nxb.ten_nha_xuat_ban as nxb_ten_nha_xuat_ban 
                FROM sach as s
                INNER JOIN the_loai as tl ON tl.id = s.id_the_loai
                INNER JOIN nha_xuat_ban as nxb ON nxb.id = s.id_nha_xuat_ban
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

if (!function_exists('deleteAuthorsByBookId')) {
    function deleteAuthorsByBookId($bookId)
    {
        try {
            $sql = "DELETE FROM sach_tac_gia WHERE id_sach = :id_sach;";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id_sach', $bookId);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueNameBookByCategory')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueNameBookByCategory($name, $idTheLoai)
    {
        try {
            $sql = "SELECT * FROM sach WHERE ten_sach = :name AND id_the_loai = :id_the_loai LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id_the_loai", $idTheLoai);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueNameBookByCategoryForUpdate')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueNameBookByCategoryForUpdate($name, $idTheLoai, $id)
    {
        try {
            $sql = "SELECT * FROM sach WHERE ten_sach = :name AND id_the_loai = :id_the_loai AND id <> :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id_the_loai", $idTheLoai);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
