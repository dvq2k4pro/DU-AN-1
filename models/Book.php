<?php

if (!function_exists('loadAllBookBySanPhamDacSac')) {
    function loadAllBookBySanPhamDacSac()
    {
        try {
            $sql = "SELECT * FROM sach WHERE san_pham_dac_sac = 1 AND xoa_mem = 0 ORDER BY id DESC";

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
            $sql = "SELECT * FROM sach WHERE xoa_mem = 0 ORDER BY ngay_ra_mat DESC LIMIT 12";

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
            $sql = "SELECT * FROM sach WHERE luot_xem > 0 AND xoa_mem = 0 ORDER BY luot_xem DESC LIMIT 12";

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
            $sql = "SELECT *, s.id as s_id, s.so_trang as s_so_trang, s.loai_bia as s_loai_bia, s.ngay_ra_mat as s_ngay_ra_mat, s.luot_xem as s_luot_xem, 
            nxb.ten_nha_xuat_ban as nxb_ten_nha_xuat_ban, tl.ten_the_loai as tl_ten_the_loai , ctph.ten_cong_ty_phat_hanh as ctph_ten_cong_ty_phat_hanh,
            kt.ten_kich_thuoc as kt_ten_kich_thuoc
            
            FROM sach s 
            INNER JOIN nha_xuat_ban nxb ON nxb.id = s.id_nha_xuat_ban 
            INNER JOIN the_loai tl ON tl.id = s.id_the_loai 
            INNER JOIN cong_ty_phat_hanh ctph ON ctph.id = s.id_cong_ty_phat_hanh 
            INNER JOIN kich_thuoc kt ON kt.id = s.id_kich_thuoc

            WHERE s.id = :id";

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
            $sql = "SELECT * FROM sach WHERE id <> :id AND id_the_loai = :idTheLoai AND xoa_mem = 0 ORDER BY id DESC LIMIT 5";

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
            $sql = "SELECT s.id as s_id, s.ten_sach as s_ten_sach, s.hinh_nen as s_hinh_nen, s.gia as s_gia, tl.ten_the_loai as tl_ten_the_loai FROM sach s INNER JOIN the_loai tl ON tl.id = s.id_the_loai WHERE s.id_the_loai = :id AND s.xoa_mem = 0  ORDER BY s.id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('searchBooksByName')) {
    function searchBooksByName($name)
    {
        try {
            $sql = "SELECT * FROM sach WHERE ten_sach LIKE :name AND xoa_mem = 0";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $name = "%" . $name . "%";
            $stmt->bindParam(":name", $name);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('filterBookByCategoryAndSearchKeyword')) {
    function filterBookByCategoryAndSearchKeyword($idTheLoai, $searchKeyword)
    {
        try {
            $sql = "SELECT * FROM sach WHERE ten_sach LIKE :searchKeyword AND id_the_loai = :idTheLoai AND xoa_mem = 0";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $searchKeyword = "%" . $searchKeyword . "%";
            $stmt->bindParam(":searchKeyword", $searchKeyword);
            $stmt->bindParam(":idTheLoai", $idTheLoai);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('filterBookByPriceAndSearchKeyword')) {
    function filterBookByPriceAndSearchKeyword($searchKeyword, $minPrice = null, $maxPrice = null)
    {
        try {
            $sql = "SELECT * FROM sach WHERE ten_sach LIKE :searchKeyword AND xoa_mem = 0";

            // Thêm điều kiện lọc theo giá cao nhất và giá thấp nhất (nếu được chỉ định)
            if (!empty($minPrice)) {
                $sql .= " AND gia >= :minPrice";
            }
            if (!empty($maxPrice)) {
                $sql .= " AND gia <= :maxPrice";
            }

            $stmt = $GLOBALS['conn']->prepare($sql);

            $searchKeyword = "%" . $searchKeyword . "%";
            $stmt->bindParam(":searchKeyword", $searchKeyword);
            if (!empty($minPrice)) {
                $stmt->bindParam(":minPrice", $minPrice);
            }
            if (!empty($maxPrice)) {
                $stmt->bindParam(":maxPrice", $maxPrice);
            }

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getQuantityRow')) {
    function getQuantityRow($categoryId, $searchKeyword)
    {
        try {
            $sql = "SELECT COUNT(*) AS count FROM sach WHERE id_the_loai = :categoryId AND xoa_mem = 0 AND ten_sach LIKE :searchKeyword";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $searchKeyword = '%' . $searchKeyword . '%';
            $stmt->bindParam(':searchKeyword', $searchKeyword);
            $stmt->bindParam(':categoryId', $categoryId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (\Exception $e) {
            debug($e);
            return false;
        }
    }
}
