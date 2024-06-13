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

function filterBookByCategory($id, $searchKeyword)
{
    $_SESSION['search-keyword'] = $searchKeyword;
    $view = 'search-book';
    $title = 'T8 Book';

    $categories = listAll('the_loai');

    if (!empty($id) && !empty($searchKeyword)) {
        $books = filterBookByCategoryAndSearchKeyword($id, $searchKeyword);
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function filterBookByPrice($searchKeyword)
{
    $_SESSION['search-keyword'] = $searchKeyword;
    $view = 'search-book';
    $title = 'T8 Book';

    $categories = listAll('the_loai');

    if (!empty($_POST)) {
        $minPrice = $_POST['min-price'] ?? null;
        $maxPrice = $_POST['max-price'] ?? null;

        $errors = validatePrice($minPrice, $maxPrice);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            if (!empty($searchKeyword)) {
                $books = filterBookByPriceAndSearchKeyword($searchKeyword, $minPrice, $maxPrice);
            }
        }
    }


    require_once PATH_VIEW . 'layouts/master.php';
}

function validatePrice($minPrice, $maxPrice)
{
    $errors = [];
    if ($minPrice == '') {
        $errors['min_price'] = 'Vui lòng nhập giá';
    } else if ($minPrice < 0 || ($minPrice > $maxPrice) || !is_numeric($minPrice)) {
        $errors['min_price'] = 'Giá không hợp lệ!';
    }

    if ($maxPrice == '') {
        $errors['max_price'] = 'Vui lòng nhập giá';
    } else if ($maxPrice < 0 || ($maxPrice < $minPrice) || !is_numeric($maxPrice)) {
        $errors['max_price'] = 'Giá không hợp lệ!';
    }

    return $errors;
}

function introduce()
{
    $view = 'introduce';
    $title = 'Giới thiệu';

    require_once PATH_VIEW . 'layouts/master.php';
}

function contact()
{
    $view = 'contact';
    $title = 'Giới thiệu';

    require_once PATH_VIEW . 'layouts/master.php';
}
