<?php


function companyListAll()
{
    $title = 'Danh sách công ty phát hành';
    $view = 'company/index';
    $script = 'datatable';
    $script2 = 'company/script';
    $style = 'datatable';

    $companies = listAll('cong_ty_phat_hanh');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function companyShowOne($id)
{
    $company = showOne('cong_ty_phat_hanh', $id);
    if (empty($company)) {
        e404();
    }

    $title = 'Chi tiết công ty phát hành: ' . $company['ten_cong_ty_phat_hanh'];
    $view = 'company/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function companyCreate()
{
    $title = 'Thêm mới công ty phát hành';
    $view = 'company/create';

    if (!empty($_POST)) {
        $data = [
            "ten_cong_ty_phat_hanh" => $_POST['ten_cong_ty_phat_hanh'] ?? null,
        ];

        $errors = validateCompanyCreate($data);
        // 

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=company-create');
            exit();
        }

        insert('cong_ty_phat_hanh', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=companies');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function validateCompanyCreate($data)
{
    // ten_tac_gia - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_cong_ty_phat_hanh'])) {
        $errors['ten_cong_ty_phat_hanh'] = 'Tên công ty phát hành không được để trống!';
    } else if (strlen($data['ten_cong_ty_phat_hanh']) > 50) {
        $errors['ten_cong_ty_phat_hanh'] = 'Tên công ty phát hành có độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueName('cong_ty_phat_hanh', 'ten_cong_ty_phat_hanh', $data['ten_cong_ty_phat_hanh'])) {
        $errors['ten_cong_ty_phat_hanh'] = 'Tên công ty phát hành đã được sử dụng!';
    }

    return $errors;
}



function companyUpdate($id)
{
    $company = showOne('cong_ty_phat_hanh', $id);

    if (empty($company)) {
        e404();
    }

    $title = 'Cập nhật thông tin nhà xuất bản: ' . $company['ten_cong_ty_phat_hanh'];
    $view = 'company/update';

    if (!empty($_POST)) {
        $data = [
            "ten_cong_ty_phat_hanh" => $_POST['ten_cong_ty_phat_hanh'] ?? null,

        ];

        $errors = validateCompanyUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('cong_ty_phat_hanh', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=company-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}



function validateCompanyUpdate($id, $data)
{
    // ten_nha_xuat-ban - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_cong_ty_phat_hanh'])) {
        $errors['ten_cong_ty_phat_hanh'] = 'Tên nhà xuất bản không được để trống!';
    } else if (strlen($data['ten_cong_ty_phat_hanh']) > 50) {
        $errors['ten_cong_ty_phat_hanh'] = 'Tên nhà xuất bản có độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameForUpdate('cong_ty_phat_hanh', $id, 'ten_cong_ty_phat_hanh', $data['ten_cong_ty_phat_hanh'])) {
        $errors['ten_cong_ty_phat_hanh'] = 'Tên nhà xuất bản đã được sử dụng!';
    }

    return $errors;
}


function companyDelete($id)
{
    delete('cong_ty_phat_hanh', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=companies');
    exit();
}
