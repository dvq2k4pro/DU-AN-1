<?php

function productDetails($id)
{
    $view = 'product-details';
    $title = 'Chi tiết sản phẩm';

    if (isset($id)) {
        increaseViewCount($id);
    }

    $categories = listAll('the_loai');
    $book = showOneBook($id);
    $authors = getAuthorsForBook($id);
    $listBookCungTheLoai = loadBookCungTheLoai($book['s_id'], $book['id_the_loai']);

    require_once PATH_VIEW . 'layouts/master.php';
}
