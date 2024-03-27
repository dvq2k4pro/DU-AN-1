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
                    <td><?= $comment['bl_id'] ?></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><?= $comment['bl_noi_dung'] ?></td>
                </tr>
                <tr>
                    <td>Đánh giá</td>
                    <td><?= $comment['bl_danh_gia'] ?> sao</td>
                </tr>
                <tr>
                    <td>Xoá mềm</td>
                    <td><?= $comment['bl_xoa_mem'] ? '<span class="badge badge-success">Có</span>' : '<span class="badge badge-warning">Không</span>' ?></td>
                </tr>
                <tr>
                    <td>Ngày bình luận</td>
                    <td><?= getDateFromDatabase($comment['bl_ngay_binh_luan']) ?></td>
                </tr>
                <tr>
                    <td>Tên sách</td>
                    <td><?= $comment['s_ten_sach'] ?></td>
                </tr>
                <tr>
                    <td>Người bình luận</td>
                    <td><?= $comment['nd_tai_khoan'] ?></td>
                </tr>
            </table>

            <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=comments">Back to list</a>
        </div>
    </div>
</div>