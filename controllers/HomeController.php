<?php

function homeIndex()
{
    $view = 'home';
    $title = 'T8 Book';

    $categories = listAll('the_loai');
    $listAllSanPhamDacSac = loadAllBookBySanPhamDacSac();
    $listAllSachMoi = loadAllBookByNgayRaMat();
    $listAllSachNhieuLuotXem = loadAllBookByLuotXem();

    require_once PATH_VIEW . 'layouts/master.php';
}

function loadBookByCategory($id)
{
    $view = 'list-product-by-category';

    $categories = listAll('the_loai');
    $listAllSachCungTheLoai = loadAllBookByCategory($id);

    require_once PATH_VIEW . 'layouts/master.php';
}
