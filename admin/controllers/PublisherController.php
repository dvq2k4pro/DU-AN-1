<?php

function publisherListAll()
{
    $title = 'Danh sách nhà xuất bản';
    $view = 'publishers/index';
    $script = 'datatable';
    $script2 = 'publishers/script';
    $style = 'datatable';

    $publishers = listAll('nha_xuat_ban');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function publisherShowOne($id)
{
    $publisher = showOne('nha_xuat_ban', $id);
    if (empty($publisher)) {
        e404();
    }

    $title = 'Chi tiết nhà xuất bản: ' . $publisher['ten_nha_xuat_ban'];
    $view = 'publishers/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function publisherCreate()
{
    $title = 'Thêm mới nhà xuất bản';
    $view = 'publishers/create';

    if (!empty($_POST)) {
        $data = [
            "ten_nha_xuat_ban" => $_POST['ten_nha_xuat_ban'] ?? null,
        ];

        $errors = validatePublisherCreate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=publisher-create');
            exit();
        }

        insert('nha_xuat_ban', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=publishers');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatePublisherCreate($data)
{
    // ten_tac_gia - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_nha_xuat_ban'])) {
        $errors['ten_nha_xuat_ban'] = 'Tên nhà xuất bản không được để trống!';
    } else if (strlen($data['ten_nha_xuat_ban']) > 50) {
        $errors['ten_nha_xuat_ban'] = 'Tên nhà xuất bản có độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueName('nha_xuat_ban', 'ten_nha_xuat_ban', $data['ten_nha_xuat_ban'])) {
        $errors['ten_nha_xuat_ban'] = 'Tên nhà xuất bản đã được sử dụng!';
    }

    return $errors;
}

function publisherUpdate($id)
{
    $publisher = showOne('nha_xuat_ban', $id);

    if (empty($publisher)) {
        e404();
    }

    $title = 'Cập nhật thông tin nhà xuất bản: ' . $publisher['ten_nha_xuat_ban'];
    $view = 'publishers/update';

    if (!empty($_POST)) {
        $data = [
            "ten_nha_xuat_ban" => $_POST['ten_nha_xuat_ban'] ?? null,

        ];

        $errors = validatePublisherUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('nha_xuat_ban', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=publisher-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validatePublisherUpdate($id, $data)
{
    // ten_nha_xuat-ban - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_nha_xuat_ban'])) {
        $errors['ten_nha_xuat_ban'] = 'Tên nhà xuất bản không được để trống!';
    } else if (strlen($data['ten_nha_xuat_ban']) > 50) {
        $errors['ten_nha_xuat_ban'] = 'Tên nhà xuất bản có độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameForUpdate('nha_xuat_ban', $id, 'ten_nha_xuat_ban', $data['ten_nha_xuat_ban'])) {
        $errors['ten_nha_xuat_ban'] = 'Tên nhà xuất bản đã được sử dụng!';
    }

    return $errors;
}

function publisherDelete($id)
{
    updateWhyDeletePublisher($id);
    delete('nha_xuat_ban', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=publishers');
    exit();
}
