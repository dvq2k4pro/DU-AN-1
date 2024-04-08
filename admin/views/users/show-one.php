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
                    <td>Họ tên</td>
                    <td><?= $user['ho_ten'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $user['email'] ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?= $user['so_dien_thoai'] ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?= $user['dia_chi'] ?></td>
                </tr>
                <tr>
                    <td>Tài khoản</td>
                    <td><?= $user['tai_khoan'] ?></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td>
                        <?php
                        for ($i = 0; $i < strlen($user['mat_khau']); $i++) {
                            echo '*';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Vai trò</td>
                    <td><?= $user['vai_tro'] ? '<span class="badge badge-success">Admin</span>' : '<span class="badge badge-warning">Member</span>' ?></td>
                </tr>

            </table>

            <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=users">Back to list</a>
        </div>
    </div>
</div>