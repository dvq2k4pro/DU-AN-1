<?php

function authorListAll()
{
    $title = 'Danh sách tác giả';
    $view = 'authors/index';
    $script = 'datatable';
    $script2 = 'authors/script';
    $style = 'datatable';

    $authors = listAll('tac_gia');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function authorShowOne($id)
{
    $author = showOne('tac_gia', $id);
    if (empty($author)) {
        e404();
    }

    $title = 'Chi tiết tác giả: ' . $author['ten_tac_gia'];
    $view = 'authors/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function authorCreate()
{
    $title = 'Thêm mới tác giả';
    $view = 'authors/create';

    if (!empty($_POST)) {
        $data = [
            "ten_tac_gia" => $_POST['ten_tac_gia'] ?? null,
        ];

        $errors = validateAuthorCreate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=author-create');
            exit();
        }

        insert('tac_gia', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=authors');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateAuthorCreate($data)
{
    // ten_tac_gia - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_tac_gia'])) {
        $errors['ten_tac_gia'] = 'Tên tác giả không được để trống!';
    } else if (strlen($data['ten_tac_gia']) > 50) {
        $errors['ten_tac_gia'] = 'Tên tác giả độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueName('tac_gia', 'ten_tac_gia', $data['ten_tac_gia'])) {
        $errors['ten_tac_gia'] = 'Tên tác giả đã được sử dụng!';
    }

    return $errors;
}

function authorUpdate($id)
{
    $author = showOne('tac_gia', $id);

    if (empty($author)) {
        e404();
    }

    $title = 'Cập nhật thông tin tác giả: ' . $author['ten_tac_gia'];
    $view = 'authors/update';

    if (!empty($_POST)) {
        $data = [
            "ten_tac_gia" => $_POST['ten_tac_gia'] ?? $author['ten_tac_gia'],

        ];

        $errors = validateAuthorUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('tac_gia', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=author-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateAuthorUpdate($id, $data)
{
    // ten_tac_gia - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_tac_gia'])) {
        $errors['ten_tac_gia'] = 'Tên tác giả không được để trống!';
    } else if (strlen($data['ten_tac_gia']) > 50) {
        $errors['ten_tac_gia'] = 'Tên tác giả độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameForUpdate('tac_gia', $id, 'ten_tac_gia', $data['ten_tac_gia'])) {
        $errors['ten_tac_gia'] = 'Tên tác giả đã được sử dụng!';
    }

    return $errors;
}

function authorDelete($id)
{
    delete('tac_gia', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=authors');
    exit();
}
