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

function searchBook()
{
    $view = 'search-book';
    $title = 'T8 Book';

    $categories = listAll('the_loai');

    if (!empty($_POST['keyword'])) {
        $keyword = $_POST['keyword'];

        $_SESSION['search-keyword'] = $keyword;

        $books = searchBooksByName($keyword);
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function loadBookByCategory($id)
{
    $view = 'list-product-by-category';

    $categories = listAll('the_loai');
    $categoryInfo = showOne('the_loai', $id);

    $title = $categoryInfo['ten_the_loai'];

    $listAllSachCungTheLoai = loadAllBookByCategory($id);

    require_once PATH_VIEW . 'layouts/master.php';
}
