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

function bookShowOne($id)
{
    $book = showOneForBook($id);

    if (empty($book)) {
        e404();
    }

    $title = 'Chi tiết sách: ' . $book['s_ten_sach'];
    $view = 'books/show-one';

    $authors = getAuthorsForBook($id);

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function bookCreate()
{
    $title = 'Thêm mới sách';
    $view = 'books/create';
    $script     = 'datatable';
    $script2    = 'books/script';

    $categories = listAll('the_loai');
    $publishers = listAll('nha_xuat_ban');
    $authors = listAll('tac_gia');
    $companies = listAll('cong_ty_phat_hanh');
    $sizes = listAll('kich_thuoc');

    if (!empty($_POST)) {
        $data = [
            "ten_sach" => $_POST['ten-sach'] ?? null,
            "id_nha_xuat_ban" => $_POST['id-nha-xuat-ban'] ?? null,
            "id_the_loai" => $_POST['id-the-loai'] ?? null,
            "id_cong_ty_phat_hanh" => $_POST['id-cong-ty-phat-hanh'] ?? null,
            "id_kich_thuoc" => $_POST['id-kich-thuoc'] ?? null,
            "hinh_nen" => getFileUpload('hinh-nen'),
            "so_trang" => $_POST['so-trang'] ?? null,
            "so_luong_ton_kho" => $_POST['so-luong-ton-kho'] ?? null,
            "loai_bia" => $_POST['loai-bia'] ?? null,
            "gia" => $_POST['gia'] ?? null,
            "mo_ta" => $_POST['mo-ta'] ?? null,
            "san_pham_dac_sac" => $_POST['san-pham-dac-sac'] ?? 0,
        ];

        $errors = validateBookCreate($data);

        $hinhNen = $data['hinh_nen'] ?? null;
        if (is_array($hinhNen) && $hinhNen['size'] > 0) {
            $data['hinh_nen'] = uploadFile($hinhNen, 'uploads/books/');
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('location: ' . BASE_URL_ADMIN . '?act=book-create');
            exit();
        }

        try {
            $GLOBALS['conn']->beginTransaction();

            $bookId = insertGetLastId('sach', $data);

            // Xử lý Sach - Tac gia
            if (!empty($_POST['id-tac-gia'])) {
                foreach ($_POST['id-tac-gia'] as $idTacGia) {
                    insert('sach_tac_gia', [
                        'id_sach' => $bookId,
                        'id_tac_gia' => $idTacGia,
                    ]);
                }
            }

            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();

            if (
                is_array($hinhNen)
                && !empty($data['hinh_nen'])
                && file_exists(PATH_UPLOAD . $data['hinh_nen'])
            ) {
                unlink(PATH_UPLOAD . $data['hinh_nen']);
            }

            debug($e);
        }

        $_SESSION['success'] = 'Thêm mới thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=books');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function validateBookCreate($data)
{
    $errors = [];

    if (isset($data['so_luong_ton_kho']) && $data['so_luong_ton_kho'] == '') {
        $errors['so_luong_ton_kho'] = 'Số lượng tồn kho không được để trống!';
    } else if ($data['so_luong_ton_kho'] < 0) {
        $errors['so_luong_ton_kho'] = 'Số lượng tồn kho không hợp lệ!';
    }

    if (empty($data['ten_sach'])) {
        $errors['ten_sach'] = 'Tên sách không được để trống!';
    } else if (strlen($data['ten_sach']) > 50) {
        $errors['ten_sach'] = 'Tên sách độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameBookByCategory($data['ten_sach'], $data['id_the_loai'])) {
        $errors['ten_sach'] = 'Tên sách đã được sử dụng trong thể loại';
    }

    if ($data['id_nha_xuat_ban'] === null) {
        $errors['id_nha_xuat_ban'] = 'Vui lòng chọn nhà xuất bản!';
    }

    if ($data['id_kich_thuoc'] === null) {
        $errors['id_kich_thuoc'] = 'Vui lòng chọn kích thước!';
    }

    if ($data['id_cong_ty_phat_hanh'] === null) {
        $errors['id_cong_ty_phat_hanh'] = 'Vui lòng chọn công ty phát hành!';
    }

    if (empty($_POST['id-tac-gia'])) {
        $errors['id_tac_gia'] = 'Vui lòng chọn tác giả!';
    }

    if ($data['id_the_loai'] === null) {
        $errors['id_the_loai'] = 'Vui lòng chọn thể loại!';
    }

    if ($data['san_pham_dac_sac'] === null) {
        $errors['san_pham_dac_sac'] = 'Vui lòng chọn trạng thái sản phẩm đặc sắc!';
    }

    if ($data['loai_bia'] === null) {
        $errors['loai_bia'] = 'Vui lòng chọn loại bìa!';
    }

    if (empty($data['gia'])) {
        $errors['gia'] = 'Giá không được để trống!';
    } else if ($data['gia'] < 0) {
        $errors['gia'] = 'Giá không hợp lệ!';
    }

    if (empty($data['so_trang'])) {
        $errors['so_trang'] = 'Số trang không được để trống!';
    } else if ($data['so_trang'] < 0) {
        $errors['so_trang'] = 'Số trang không hợp lệ!';
    }

    if (empty($data['hinh_nen']) && $data['hinh_nen']['size'] <= 0) {
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
    $book = showOneForBook($id);

    if (empty($book)) {
        e404();
    }

    $title = 'Cập nhật thông tin sách: ' . $book['s_ten_sach'];
    $view = 'books/update';
    $script     = 'datatable';
    $script2    = 'books/script';

    $categories = listAll('the_loai');
    $publishers = listAll('nha_xuat_ban');
    $authors = listAll('tac_gia');
    $companies = listAll('cong_ty_phat_hanh');
    $sizes = listAll('kich_thuoc');

    $authorsForBook = getAuthorsForBook($id);
    $authorIdsForBook = array_column($authorsForBook, 'tg_id');

    if (!empty($_POST)) {
        $data = [
            "ten_sach" => $_POST['ten-sach'] ?? $book['s_ten_sach'],
            "id_nha_xuat_ban" => $_POST['id-nha-xuat-ban'] ?? $book['s_id_nha_xuat_ban'],
            "id_the_loai" => $_POST['id-the-loai'] ?? $book['s_id_the_loai'],
            "id_cong_ty_phat_hanh" => $_POST['id-cong-ty-phat-hanh'] ?? $book['s_id_cong_ty_phat_hanh'],
            "id_kich_thuoc" => $_POST['id-kich-thuoc'] ?? $book['s_id_kich_thuoc'],
            "hinh_nen" => getFileUpload('hinh-nen', $book['s_hinh_nen']),
            "so_trang" => $_POST['so-trang'] ?? $book['so_trang'],
            "so_luong_ton_kho" => $_POST['so-luong-ton-kho'] ?? $book['so_luong_ton_kho'],
            "xoa_mem" => $_POST['xoa-mem'] ?? $book['xoa_mem'],
            "loai_bia" => $_POST['loai-bia'] ?? $book['loai_bia'],
            "gia" => $_POST['gia'] ?? $book['s_gia'],
            "mo_ta" => $_POST['mo-ta'] ?? $book['s_mo_ta'],
            "san_pham_dac_sac" => $_POST['san-pham-dac-sac'] ?? $book['s_san_pham_dac_sac'],
        ];

        $errors = validateBookUpdate($id, $data);

        $hinhNen = $data['hinh_nen'] ?? null;
        if (is_array($hinhNen) && is_array($hinhNen) && $hinhNen['size'] > 0) {
            $data['hinh_nen'] = uploadFile($hinhNen, 'uploads/books/');
        }

        try {
            $GLOBALS['conn']->beginTransaction();

            update('sach', $id, $data);

            // Xử lý Sách - Tác giả

            deleteAuthorsByBookId($id);

            if (!empty($_POST['id-tac-gia'])) {
                foreach ($_POST['id-tac-gia'] as $idTacGia) {
                    insert('sach_tac_gia', [
                        'id_sach' => $id,
                        'id_tac_gia' => $idTacGia,
                    ]);
                }
            }

            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();

            // Kiểm tra nếu người dùng tải lên ảnh mới
            if (isset($hinhNen) && is_array($hinhNen) && $hinhNen['size'] > 0) {
                // Nếu có ảnh mới được tải lên, thực hiện việc xóa ảnh cũ nếu tồn tại
                if (!empty($book['s_hinh_nen']) && file_exists(PATH_UPLOAD . $book['s_hinh_nen'])) {
                    unlink(PATH_UPLOAD . $book['s_hinh_nen']);
                }
            }

            debug($e);
        }

        // Kiểm tra nếu người dùng tải lên ảnh mới
        if (isset($hinhNen) && is_array($hinhNen) && $hinhNen['size'] > 0) {
            // Nếu có ảnh mới được tải lên, thực hiện việc xóa ảnh cũ nếu tồn tại
            if (!empty($book['s_hinh_nen']) && file_exists(PATH_UPLOAD . $book['s_hinh_nen'])) {
                unlink(PATH_UPLOAD . $book['s_hinh_nen']);
            }
        }

        $_SESSION['success'] = 'Cập nhật thành công!';


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
        $errors['ten_sach'] = 'Tên sách không được để trống!';
    } else if (strlen($data['ten_sach']) > 50) {
        $errors['ten_sach'] = 'Tên sách có độ dài tối đa 50 ký tự!';
    } else if (!checkUniqueNameBookByCategoryForUpdate($data['ten_sach'], $data['id_the_loai'], $id)) {
        $errors['ten_sach'] = 'Tên sách đã được sử dụng trong thể loại';
    }

    if (empty($_POST['id-tac-gia'])) {
        $errors['id_tac_gia'] = 'Vui lòng chọn tác giả!';
    }

    if ($data['id_kich_thuoc'] === null) {
        $errors['id_kich_thuoc'] = 'Vui lòng chọn kích thước!';
    }

    if ($data['id_cong_ty_phat_hanh'] === null) {
        $errors['id_cong_ty_phat_hanh'] = 'Vui lòng chọn công ty phát hành!';
    }

    if ($data['id_the_loai'] === null) {
        $errors['id_the_loai'] = 'Vui lòng chọn thể loại!';
    }

    if ($data['loai_bia'] === null) {
        $errors['loai_bia'] = 'Vui lòng chọn loại bìa!';
    }

    if (empty($data['so_trang'])) {
        $errors['so_trang'] = 'Số trang không được để trống!';
    } else if ($data['so_trang'] < 0) {
        $errors['so_trang'] = 'Số trang không hợp lệ!';
    }

    if (isset($data['so_luong_ton_kho']) && $data['so_luong_ton_kho'] == '') {
        $errors['so_luong_ton_kho'] = 'Số lượng tồn kho không được để trống!';
    } else if ($data['so_luong_ton_kho'] < 0) {
        $errors['so_luong_ton_kho'] = 'Số lượng tồn kho không hợp lệ!';
    }

    if ($data['san_pham_dac_sac'] === null) {
        $errors['san_pham_dac_sac'] = 'Vui lòng chọn trạng thái sản phẩm đặc sắc!';
    }

    if (empty($data['gia'])) {
        $errors['gia'] = 'Giá không được để trống!';
    } else if ($data['gia'] < 0) {
        $errors['gia'] = 'Giá không hợp lệ!';
    }

    if (empty($data['hinh_nen']) && !is_array($data['hinh_nen']) && $data['hinh_nen']['size'] <= 0) {
        $errors['hinh_nen'] = 'Hình nền là bắt buộc';
    } elseif (is_array($data['hinh_nen'])) {
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];

        if ($data['hinh_nen']['size'] > 2 * 1024 * 1024) {
            $errors['hinh_nen'] = 'Hình nền phải có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['hinh_nen']['type'], $typeImage)) {
            $errors['hinh_nen'] = 'Hình nền chỉ chấp nhận định dạng file: png, jpg, jpeg';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

        header('Location: ' . BASE_URL_ADMIN . '?act=book-update&id=' . $id);
        exit();
    }
}

function bookDelete($id)
{
    $book = showOne('sach', $id);

    try {
        $GLOBALS['conn']->beginTransaction();

        deleteAuthorsByBookId($id);

        delete('sach', $id);
        $GLOBALS['conn']->commit();
    } catch (Exception $e) {
        $GLOBALS['conn']->rollBack();

        debug($e);
    }

    if (
        !empty($book['hinh_nen'])                       // có giá trị
        && file_exists(PATH_UPLOAD . $book['hinh_nen']) // Phải còn file tồn tại trên hệ thống
    ) {
        unlink(PATH_UPLOAD . $book['hinh_nen']);
    }

    $_SESSION['success'] = 'Xoá thành công!';

    header('location: ' . BASE_URL_ADMIN . '?act=books');
    exit();
}
