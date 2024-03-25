<?php
if (!function_exists('deleteBookByAuthorId')) {
    function deleteBookByAuthorId($authorId)
    {
        try {
            $sql = "DELETE FROM sach_tac_gia WHERE id_tac_gia = :id_tac_gia";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id_tac_gia', $authorId);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
