<?php
if (!function_exists('updateWhyDeleteCompany')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function updateWhyDeleteCompany($idCongTyPhatHanh)
    {
        try {
            $sql = "UPDATE sach SET id_cong_ty_phat_hanh = 1 WHERE id_cong_ty_phat_hanh = :idCongTyPhatHanh";
            $stmt = $GLOBALS['conn']->prepare($sql);


            $stmt->bindParam(":idCongTyPhatHanh", $idCongTyPhatHanh);


            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
