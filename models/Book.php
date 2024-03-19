<?php

if (!function_exists('loadAllBookBySanPhamDacSac')) {
    function loadAllBookBySanPhamDacSac()
    {
        try {
            $sql = "SELECT *, s.id as s_id, tg.ten_tac_gia as tg_ten_tac_gia FROM sach s INNER JOIN tac_gia tg ON tg.id = s.id_tac_gia WHERE san_pham_dac_sac = 1 ORDER BY s.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadAllBookByNgayRaMat')) {
    function loadAllBookByNgayRaMat()
    {
        try {
            $sql = "SELECT *, s.id as s_id, tg.ten_tac_gia as tg_ten_tac_gia FROM sach s INNER JOIN tac_gia tg ON tg.id = s.id_tac_gia ORDER BY s.ngay_ra_mat DESC LIMIT 12";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadAllBookByLuotXem')) {
    function loadAllBookByLuotXem()
    {
        try {
            $sql = "SELECT *, s.id as s_id, tg.ten_tac_gia as tg_ten_tac_gia FROM sach s INNER JOIN tac_gia tg ON tg.id = s.id_tac_gia ORDER BY s.luot_xem DESC LIMIT 12";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOneBook')) {
    function showOneBook($id)
    {
        try {
            $sql = "SELECT *, s.id as s_id, tg.ten_tac_gia as tg_ten_tac_gia, tl.ten_the_loai as tl_ten_the_loai FROM sach s INNER JOIN tac_gia tg ON tg.id = s.id_tac_gia INNER JOIN the_loai tl ON tl.id = s.id_the_loai WHERE s.id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadBookCungTheLoai')) {
    function loadBookCungTheLoai($id, $idTheLoai)
    {
        try {
            $sql = "SELECT s.id as s_id, s.ten_sach as s_ten_sach, s.hinh_nen as s_hinh_nen, s.gia as s_gia, tg.ten_tac_gia as tg_ten_tac_gia FROM sach s INNER JOIN tac_gia tg ON tg.id = s.id_tac_gia WHERE s.id <> :id AND s.id_the_loai = :idTheLoai ORDER BY s.id DESC LIMIT 5";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":idTheLoai", $idTheLoai);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('loadAllBookByCategory')) {
    function loadAllBookByCategory($id)
    {
        try {
            $sql = "SELECT s.id as s_id, s.ten_sach as s_ten_sach, s.hinh_nen as s_hinh_nen, s.gia as s_gia, tg.ten_tac_gia as tg_ten_tac_gia, tl.ten_the_loai as tl_ten_the_loai FROM sach s INNER JOIN tac_gia tg ON tg.id = s.id_tac_gia INNER JOIN the_loai tl ON tl.id = s.id_the_loai WHERE s.id_the_loai = :id  ORDER BY s.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
