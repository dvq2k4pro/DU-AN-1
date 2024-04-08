<?php

function dashboard()
{
    $view = 'dashboard';
    $script = 'dashboard';

    $accounts = countField('nguoi_dung');
    $books = countField('sach');
    $orders = countField('don_hang');
    $comments = countField('binh_luan');
    $booksOutOfStock = booksOutOfStock();
    $chartDashboard = chartLoad();
    // debug($chartDashboard);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
