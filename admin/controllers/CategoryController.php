<?php

function categoryListAll()
{
    $title = 'Thể loại';
    $view = 'categories/index';
    $script = 'datatable';
    $script2 = 'categories/script';
    $style = 'datatable';

    $categories = listAll('the_loai');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryShowOne($id)
{
    $category = showOne('the_loai', $id);
    if (empty($category)) {
        e404();
    }

    $title = 'Chi tiết thể loại: ' . $category['ten_the_loai'];
    $view = 'categories/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryCreate()
{
    $title = 'Thêm mới thể loại';
    $view = 'categories/create';

    if (!empty($_POST)) {
        $data = [
            "ten_the_loai" => $_POST['ten_the_loai'] ?? null,
        ];

        $errors = validateCategoryCreate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=category-create');
            exit();
        }

        insert('the_loai', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=categories');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryCreate($data)
{
    // ten_the_loai - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_the_loai'])) {
        $errors['ten_the_loai'] = 'Tên thể loại không được để trống!';
    } else if (strlen($data['ten_the_loai']) > 50) {
        $errors['ten_the_loai'] = 'Tên thể loại độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueName('the_loai', 'ten_the_loai', $data['ten_the_loai'])) {
        $errors['ten_the_loai'] = 'Tên thể loại đã được sử dụng!';
    }

    return $errors;
}

function categoryUpdate($id)
{
    $category = showOne('the_loai', $id);

    if (empty($category)) {
        e404();
    }

    $title = 'Cập nhật thông tin thể loại: ' . $category['ten_the_loai'];
    $view = 'categories/update';

    if (!empty($_POST)) {
        $data = [
            "ten_the_loai" => $_POST['ten_the_loai'] ?? $category['ten_the_loai'],

        ];

        $errors = validateCategoryUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('the_loai', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryUpdate($id, $data)
{
    // ten_the_loai - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_the_loai'])) {
        $errors['ten_the_loai'] = 'Tên thể loại không được để trống!';
    } else if (strlen($data['ten_the_loai']) > 50) {
        $errors['ten_the_loai'] = 'Tên thể loại độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameForUpdate('the_loai', $id, 'ten_the_loai', $data['ten_the_loai'])) {
        $errors['ten_the_loai'] = 'Tên thể loại đã được sử dụng!';
    }

    return $errors;
}

function categoryDelete($id)
{
    delete('the_loai', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=categories');
    exit();
}
