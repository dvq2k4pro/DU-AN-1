<?php

function categoryListAll()
{
    $title = 'Thể loại';
    $view = 'categories/index';
    $script = 'datatable';
    $script2 = 'categories/script';
    $style = 'datatable';

    $categories = listAll('categories');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryShowOne($id)
{
    $category = showOne('categories', $id);
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

        insert('categories', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=categories');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryCreate($data)
{
    // ten_the_loai - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // mat_khau - bắt buộc, độ dài nhỏ nhất là 8, lớn nhất là 20
    // vai_trò - bắt buộc, phải là 0 hoặc 1
    $errors = [];

    if (empty($data['ten_the_loai'])) {
        $errors[] = 'Trường ten_the_loai không được để trống!';
    } else if (strlen($data['ten_the_loai']) > 50) {
        $errors['ten_the_loai'] = 'Trường tài khoản độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueten_the_loai('categories', $data['ten_the_loai'])) {
        $errors['ten_the_loai'] = 'Trường ten_the_loai đã được sử dụng!';
    }

    return $errors;
}

function categoryUpdate($id)
{
    $category = showOne('categories', $id);

    if (empty($category)) {
        e404();
    }

    $title = 'Cập nhật thông tin thể loại: ' . $category['ten_the_loai'];
    $view = 'categories/update';

    if (!empty($_POST)) {
        $data = [
            "ten_the_loai" => $_POST['ten_the_loai'] ?? null,
            
        ];

        $errors = validateCategoryUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('categories', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateCategoryUpdate($id, $data)
{
    // ten_the_loai - bắt buộc, độ dài tối đa 50 ký tự
    // email - bắt buộc, phải là email, không được trùng
    // mat_khau - bắt buộc, độ dài nhỏ nhất là 8, lớn nhất là 20
    // vai_trò - bắt buộc, phải là 0 hoặc 1
    $errors = [];

    if (empty($data['ten_the_loai'])) {
        $errors[] = 'Trường ten_the_loai không được để trống!';
    } else if (strlen($data['ten_the_loai']) > 50) {
        $errors['ten_the_loai'] = 'Trường tài khoản độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueten_the_loai('categories', $data['ten_the_loai'])) {
        $errors['ten_the_loai'] = 'Trường ten_the_loai đã được sử dụng!';
    }

    return $errors;
}

function categoryDelete($id)
{
    delete('categories', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=categories');
    exit();
}
