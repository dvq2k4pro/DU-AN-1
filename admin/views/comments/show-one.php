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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>Đánh giá</th>
                        <th>Ngày bình luận</th>
                        <th>Người bình luận</th>
                        <th>Xoá mềm</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>Đánh giá</th>
                        <th>Ngày bình luận</th>
                        <th>Người bình luận</th>
                        <th>Xoá mềm</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php for ($i = 0; $i < count($comments); $i++) : ?>
                        <tr>
                            <td>
                                <?= $i + 1 ?>
                            </td>
                            <td>
                                <?= $comments[$i]['bl_noi_dung'] ?>
                            </td>
                            <td>
                                <?= $comments[$i]['bl_danh_gia'] ?> sao
                            </td>
                            <td>
                                <?= $comments[$i]['bl_ngay_binh_luan'] ?>
                            </td>
                            <td>
                                <?= $comments[$i]['nd_tai_khoan'] ?>
                            </td>
                            <td><?= $comments[$i]['bl_xoa_mem'] ? '<span class="badge badge-success">Có</span>' : '<span class="badge badge-warning">Không</span>' ?></td>
                            <td>
                                <a class="btn btn-warning mb-1" href="<?= BASE_URL_ADMIN ?>?act=comment-update&id=<?= $comments[$i]['bl_id'] ?>">Update</a>
                            </td>
                        </tr>
                    <?php endfor; ?>

                </tbody>
            </table>

            <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=comments">Back to list</a>
        </div>
    </div>
</div>