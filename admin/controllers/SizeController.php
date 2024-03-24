<?php

// xong
function sizeListAll()
{
    $title = 'Danh sách kích thước';
    $view = 'size/index';
    $script = 'datatable';
    $script2 = 'size/script';
    $style = 'datatable';

    $sizes = listAll('kich_thuoc');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


// xong
function sizeShowOne($id)
{
    $size = showOne('kich_thuoc', $id);
    if (empty($size)) {
        e404();
    }

    $title = 'Chi tiết kích thước: ' . $size['ten_kich_thuoc'] . ' Cm';
    $view = 'size/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


// xong
function sizeCreate()
{
    $title = 'Thêm mới kích thước';
    $view = 'size/create';

    if (!empty($_POST)) {
        $data = [
            "ten_kich_thuoc" => $_POST['ten_kich_thuoc'] ?? null,
        ];

        $errors = validateSizeCreate($data);
        // 

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=size-create');
            exit();
        }

        insert('kich_thuoc', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=sizes');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


// xong
function validateSizeCreate($data)
{
    // ten_tac_gia - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_kich_thuoc'])) {
        $errors['ten_kich_thuoc'] = 'Tên kích thước không được để trống!';
    } else if (strlen($data['ten_kich_thuoc']) > 50) {
        $errors['ten_kich_thuoc'] = 'Tên kích thước có độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueName('kich_thuoc', 'ten_kich_thuoc', $data['ten_kich_thuoc'])) {
        $errors['ten_kich_thuoc'] = 'Tên kích thước đã được sử dụng!';
    }

    return $errors;
}



function sizeUpdate($id)
{
    $size = showOne('kich_thuoc', $id);

    if (empty($size)) {
        e404();
    }

    $title = 'Cập nhật thông tin kích thước: ' . $size['ten_kich_thuoc'];
    $view = 'size/update';

    if (!empty($_POST)) {
        $data = [
            "ten_kich_thuoc" => $_POST['ten_kich_thuoc'] ?? null,

        ];

        $errors = validateSizeUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('kich_thuoc', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=size-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function validateSizeUpdate($id, $data)
{
    // ten_nha_xuat-ban - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_kich_thuoc'])) {
        $errors['ten_kich_thuoc'] = 'Tên kích thước không được để trống!';
    } else if (strlen($data['ten_kich_thuoc']) > 50) {
        $errors['ten_kich_thuoc'] = 'Tên kích thước có độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameForUpdate('kich_thuoc', $id, 'ten_kich_thuoc', $data['ten_kich_thuoc'])) {
        $errors['ten_kich_thuoc'] = 'Tên kích thước đã được sử dụng!';
    }

    return $errors;
}


function sizeDelete($id)
{
    delete('kich_thuoc', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=sizes');
    exit();
}
