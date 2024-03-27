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
    $listComments = listComments($id);

    if (!empty($_POST)) {
        $data = [
            "noi_dung" => $_POST['message'] ?? null,
            "danh_gia" => $_POST['star'] ?? 0,
            "id_sach" => $id ?? null,
            "id_nguoi_dung" => $_SESSION['user']['id'] ?? null
        ];

        $errors = validateCommentCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL . '?act=book-detail&id=' . $id);
            exit();
        }

        insert('binh_luan', $data);

        header('location: ' . BASE_URL . '?act=book-detail&id=' . $id);
        exit();
    }

    require_once PATH_VIEW . 'layouts/master.php';
}

function validateCommentCreate($data)
{
    $errors = [];

    if (empty($data['noi_dung'])) {
        $errors['noi_dung'] = 'Nội dung bình luận không được bỏ trống!';
    }

    return $errors;
}
