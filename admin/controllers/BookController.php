<?php

function bookListAll()
{
    $title = 'Danh sách sách';
    $view = 'books/index';
    $script = 'datatable';
    $script2 = 'books/script';
    $style = 'datatable';

    $books = listAllForBook();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function bookshowOne($id)
{
    $book = showOneForBook($id);

    if (empty($book)) {
        e404();
    }

    $title = 'Chi tiết sách: ' . $book['s_ten_sach'];
    $view = 'books/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function bookCreate()
{
    $title = 'Thêm mới sách';
    $view = 'books/create';
    $script     = 'datatable';
    $script2    = 'books/script';

    $categories = listAll('the_loai');
    $authors = listAll('tac_gia');

    if (!empty($_POST)) {
        $data = [
            "ten_sach" => $_POST['ten-sach'] ?? null,
            "id_tac_gia" => $_POST['id-tac-gia'] ?? null,
            "id_the_loai" => $_POST['id-the-loai'] ?? null,
            "hinh_nen" => getFileUpload('hinh-nen'),
            "gia" => $_POST['gia'] ?? null,
            "mo_ta" => $_POST['mo-ta'] ?? null,
            "san_pham_dac_sac" => $_POST['san-pham-dac-sac'] ?? 0,
        ];

        $errors = validateBookCreate($data);

        $hinhNen = $data['hinh_nen'];
        if (is_array($hinhNen)) {
            $data['hinh_nen'] = uploadFile($hinhNen, 'uploads/books/');
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=book-create');
            exit();
        }

        insert('sach', $data);
        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=books');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateBookCreate($data)
{
    $errors = [];

    if (empty($data['ten_sach'])) {
        $errors['ten_sach'] = 'Tên tác giả không được để trống!';
    } else if (strlen($data['ten_sach']) > 50) {
        $errors['ten_sach'] = 'Tên tác giả độ dài tối đa 50 ký tự!';
    }

    if ($data['id_tac_gia'] === null) {
        $errors['id_tac_gia'] = 'Vui lòng chọn tác giả!';
    }

    if ($data['id_the_loai'] === null) {
        $errors['id_the_loai'] = 'Vui lòng chọn thể loại!';
    }

    if ($data['san_pham_dac_sac'] === null) {
        $errors['san_pham_dac_sac'] = 'Vui lòng chọn trạng thái sản phẩm đặc sắc!';
    }

    if (empty($data['gia'])) {
        $errors['gia'] = 'Giá không được để trống!';
    } else if ($data['gia'] < 0) {
        $errors['gia'] = 'Giá không hợp lệ!';
    }

    if (empty($data['hinh_nen'])) {
        $errors['hinh_nen'] = 'Hình nền là bắt buộc';
    } elseif (is_array($data['hinh_nen'])) {
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['hinh_nen']['size'] > 2 * 1024 * 1024) {
            $errors['hinh_nen'] = 'Hình nền phải có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['hinh_nen']['type'], $typeImage)) {
            $errors['hinh_nen'] = 'Hình nền chỉ chấp nhận định dạng file: png, jpg, jpeg';
        }
    }

    return $errors;
}

function bookUpdate($id)
{
    $book = showOne('sach', $id);

    if (empty($book)) {
        e404();
    }

    $title = 'Cập nhật thông tin tác giả: ' . $book['ten_sach'];
    $view = 'books/update';

    if (!empty($_POST)) {
        $data = [
            "ten_sach" => $_POST['ten_sach'] ?? null,

        ];

        $errors = validateBookUpdate($id, $data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        } else {
            update('sach', $id, $data);
            $_SESSION['success'] = 'Cập nhật thành công!';
        }


        header('location: ' . BASE_URL_ADMIN . '?act=book-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateBookUpdate($id, $data)
{
    // ten_sach - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty($data['ten_sach'])) {
        $errors['ten_sach'] = 'Tên tác giả không được để trống!';
    } else if (strlen($data['ten_sach']) > 50) {
        $errors['ten_sach'] = 'Tên tác giả độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameBookForUpdate($id, $data['ten_sach'])) {
        $errors['ten_sach'] = 'Tên tác giả đã được sử dụng!';
    }

    return $errors;
}

function bookDelete($id)
{
    delete('sach', $id);

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=books');
    exit();
}
