<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
        <a class="btn btn-primary" href="<?= BASE_URL_ADMIN ?>?act=user-create">Create</a>
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
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tài khoản</th>
                            <th>Vai trò</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tài khoản</th>
                            <th>Vai trò</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['ho_ten'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['so_dien_thoai'] ?></td>
                                <td><?= $user['dia_chi'] ?></td>
                                <td><?= $user['tai_khoan'] ?></td>
                                <td><?= $user['vai_tro'] ? '<span class="badge badge-success">Admin</span>' : '<span class="badge badge-warning">Member</span>' ?></td>
                                <td>
                                    <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=user-detail&id=<?= $user['id'] ?>">Show</a>
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=user-update&id=<?= $user['id'] ?>">Update</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=user-delete&id=<?= $user['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>