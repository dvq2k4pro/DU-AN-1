<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nội dung</th>
                            <th>Đánh giá</th>
                            <th>Xoá mềm</th>
                            <th>Ngày bình luận</th>
                            <th>Tên sách</th>
                            <th>Người bình luận</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nội dung</th>
                            <th>Đánh giá</th>
                            <th>Xoá mềm</th>
                            <th>Ngày bình luận</th>
                            <th>Tên sách</th>
                            <th>Người bình luận</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($comments as $comment) : ?>
                            <tr>
                                <td><?= $comment['bl_id'] ?></td>
                                <td><?= $comment['bl_noi_dung'] ?></td>
                                <td><?= $comment['bl_danh_gia'] ?> sao</td>
                                <td><?= $comment['bl_xoa_mem'] ? '<span class="badge badge-success">Có</span>' : '<span class="badge badge-warning">Không</span>' ?></td>
                                <td><?= getDateFromDatabase($comment['bl_ngay_binh_luan']) ?></td>
                                <td><?= $comment['s_ten_sach'] ?></td>
                                <td><?= $comment['nd_tai_khoan'] ?></td>


                                <td>
                                    <a class="btn btn-info mb-1" href="<?= BASE_URL_ADMIN ?>?act=comment-detail&id=<?= $comment['bl_id'] ?>">Show</a>
                                    <a class="btn btn-warning mb-1" href="<?= BASE_URL_ADMIN ?>?act=comment-update&id=<?= $comment['bl_id'] ?>">Update</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>