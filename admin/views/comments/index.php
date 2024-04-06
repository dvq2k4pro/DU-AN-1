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
                            <th>Thể loại</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng bình luận</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Thể loại</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng bình luận</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($getBooksWithComments as $item) : ?>
                            <tr>
                                <td>
                                    <?= $item['s_id'] ?>
                                </td>
                                <td>
                                    <?= $item['tl_ten_the_loai'] ?>
                                </td>
                                <td>
                                    <?= $item['s_ten_sach'] ?>
                                </td>
                                <td>
                                    <img src="<?= BASE_URL . $item['s_hinh_nen'] ?>" alt="" width="100px">
                                </td>
                                <td>
                                    <?= getQuantityRowForCommentAdmin($item['s_id']) ?>
                                </td>

                                <td>
                                    <a class="btn btn-info mb-1" href="<?= BASE_URL_ADMIN ?>?act=comment-detail&id=<?= $item['s_id'] ?>">Show</a>
                                    <!-- <a class="btn btn-warning mb-1" href="<?= BASE_URL_ADMIN ?>?act=comment-update&id=<?= $comment['bl_id'] ?>">Update</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>