<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
        <a class="btn btn-primary" href="<?= BASE_URL_ADMIN ?>?act=book-create">Create</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Loại bìa</th>
                            <th>Số trang</th>
                            <th>Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Sản phẩm đặc sắc</th>
                            <th>Ngày ra mắt</th>
                            <th>Tên thể loại</th>
                            <th>Tên nhà xuất bản</th>
                            <th>Tên công ty phát hành</th>
                            <th>Kích thước</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Loại bìa</th>
                            <th>Số trang</th>
                            <th>Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Sản phẩm đặc sắc</th>
                            <th>Ngày ra mắt</th>
                            <th>Tên thể loại</th>
                            <th>Tên nhà xuất bản</th>
                            <th>Tên công ty phát hành</th>
                            <th>Kích thước</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($books as $book) : ?>
                            <tr>
                                <td><?= $book['s_id'] ?></td>
                                <td><?= $book['s_ten_sach'] ?></td>
                                <td>
                                    <img src="<?= BASE_URL . $book['s_hinh_nen'] ?>" alt="" width="100px">
                                </td>
                                <td><?= $book['s_gia'] ?></td>
                                <td><?= $book['s_loai_bia'] ? '<span class="badge badge-success">Bìa cứng</span>' : '<span class="badge badge-warning">Bìa mềm</span>' ?></td>
                                <td><?= $book['s_so_trang'] ?></td>
                                <td><?= $book['s_mo_ta'] ?></td>
                                <td><?= $book['s_luot_xem'] ?></td>
                                <td><?= $book['s_san_pham_dac_sac'] ? '<span class="badge badge-success">Đúng</span>' : '<span class="badge badge-warning">Sai</span>' ?></td>
                                <td><?= getDateFromDatabase($book['s_ngay_ra_mat']) ?></td>
                                <td><?= $book['tl_ten_the_loai'] ?></td>
                                <td><?= $book['nxb_ten_nha_xuat_ban'] ?></td>
                                <td><?= $book['ctph_ten_cong_ty_phat_hanh'] ?></td>
                                <td><?= $book['kt_ten_kich_thuoc'] ?> Cm</td>

                                <td>
                                    <a class="btn btn-info mb-1" href="<?= BASE_URL_ADMIN ?>?act=book-detail&id=<?= $book['s_id'] ?>">Show</a>
                                    <a class="btn btn-warning mb-1" href="<?= BASE_URL_ADMIN ?>?act=book-update&id=<?= $book['s_id'] ?>">Update</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=book-delete&id=<?= $book['s_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>