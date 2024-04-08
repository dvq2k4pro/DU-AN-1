<?php

if (!function_exists('countField')) {
    function countField($tableName)
    {
        try {
            $sql = "SELECT COUNT(*) AS count FROM $tableName";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            $row = $stmt->fetch();
            return $row['count'];
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('booksOutOfStock')) {
    function booksOutOfStock()
    {
        try {
            $sql = "SELECT COUNT(*) AS count FROM sach WHERE so_luong_ton_kho = 0";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            $row = $stmt->fetch();
            return $row['count'];
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('chartLoad')) {
    function chartLoad()
    {
        try {
            $sql = "
            SELECT
            tl.*,
            COUNT(s.id_the_loai) as 'so_luong'
            FROM sach s
            INNER JOIN the_loai tl
            ON tl.id = s.id_the_loai
            GROUP BY s.id_the_loai
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            $data = [];
            $row = $stmt->fetchAll();
            return $data[] = $row;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
