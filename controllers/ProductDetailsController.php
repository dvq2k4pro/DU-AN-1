<?php

function productDetails($id)
{
    $view = 'product-details';
    $title = 'Chi tiết sản phẩm';

    $categories = listAll('the_loai');
    $book = showOneBook($id);
    $listBookCungTheLoai = loadBookCungTheLoai($book['s_id'], $book['id_the_loai']);

    require_once PATH_VIEW . 'layouts/master.php';
}
