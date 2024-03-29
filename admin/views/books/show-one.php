<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Detail
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>

                <tr>
                    <td>Id</td>
                    <td><?= $book['s_id'] ?></td>
                </tr>
                <tr>
                    <td>Tên sách</td>
                    <td><?= $book['s_ten_sach'] ?></td>
                </tr>
                <tr>
                    <td>Hình nền</td>
                    <td><?= '<img src="' . BASE_URL . $book['s_hinh_nen'] . '" alt="" width="100px">' ?></td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><?= formatCurrencyToVND($book['s_gia']) ?></td>
                </tr>
                <tr>
                    <td>Loại bìa</td>
                    <td><?= $book['s_loai_bia'] ? 'Bìa cứng' : 'Bìa mềm' ?></td>
                </tr>
                <tr>
                    <td>Xoá mềm</td>
                    <td><?= $book['s_xoa_mem'] ? '<span class="badge badge-success">Có</span>' : '<span class="badge badge-warning">Không</span>' ?></td>
                </tr>
                <tr>
                    <td>Số trang</td>
                    <td><?= $book['s_so_trang'] ?></td>
                </tr>
                <tr>
                    <td>Số lượng tồn kho</td>
                    <td><?= $book['s_so_luong_ton_kho'] ?></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><?= $book['s_mo_ta'] ?></td>
                </tr>
                <tr>
                    <td>Lượt xem</td>
                    <td><?= $book['s_luot_xem'] ?></td>
                </tr>
                <tr>
                    <td>Sản phẩm đặc sắc</td>
                    <td><?= $book['s_san_pham_dac_sac'] ? '<span class="badge badge-success">Đúng</span>' : '<span class="badge badge-warning">Sai</span>' ?></td>
                </tr>
                <tr>
                    <td>Ngày ra mắt</td>
                    <td><?= getDateFromDatabase($book['s_ngay_ra_mat']) ?></td>
                </tr>
                <tr>
                    <td>Thể loại</td>
                    <td><?= $book['tl_ten_the_loai'] ?></td>
                </tr>
                <tr>
                    <td>Nhà xuất bản</td>
                    <td><?= $book['nxb_ten_nha_xuat_ban'] ?></td>
                </tr>

                <tr>
                    <td>Công ty phát hành</td>
                    <td><?= $book['ctph_ten_cong_ty_phat_hanh'] ?></td>
                </tr>

                <tr>
                    <td>Kích thước</td>
                    <td><?= $book['kt_ten_kich_thuoc'] ?> Cm</td>
                </tr>

                <tr>
                    <td>Tác giả</td>
                    <td>
                        <?php foreach ($authors as $author) : ?>
                            <span class="badge badge-info"><?= $author['tg_ten_tac_gia'] ?></span>
                        <?php endforeach; ?>
                    </td>
                </tr>

            </table>

            <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=books">Back to list</a>
        </div>
    </div>
</div>