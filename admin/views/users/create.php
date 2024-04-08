<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Create
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="ho_ten" class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" id="ho_ten" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ho_ten'] : null ?>" placeholder="VD: Trần Văn A" name="ho_ten">
                            <span class='error-message'><?= isset($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="tai_khoan" class="form-label">Tài khoản:*</label>
                            <input type="text" class="form-control" id="tai_khoan" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['tai_khoan'] : null ?>" placeholder="Vui lòng nhập tài khoản" name="tai_khoan">
                            <span class='error-message'><?= isset($_SESSION['errors']['tai_khoan']) ? $_SESSION['errors']['tai_khoan'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="dia_chi" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="dia_chi" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['dia_chi'] : null ?>" placeholder="Vui lòng nhập địa chỉ" name="dia_chi">
                            <span class='error-message'></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="so_dien_thoai" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['so_dien_thoai'] : null ?>" placeholder="Vui lòng nhập số điện thoại" name="so_dien_thoai">
                            <span class='error-message'></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:*</label>
                            <input type="email" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" placeholder="VD: example@gmail.com" name="email">
                            <span class='error-message'><?= isset($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Mật khẩu:*</label>
                            <input type="password" class="form-control" id="password" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['mat_khau'] : null ?>" placeholder="Vui lòng nhập mật khẩu" name="mat_khau">
                            <span class='error-message'><?= isset($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="vai_tro" class="form-label">Vai trò:*</label>
                            <select style="width: 30%;" name="vai_tro" id="vai_tro" class="form-control">
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['vai_tro'] == 1 ? 'selected' : null ?> value="1">Admin</option>
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['vai_tro'] == 0 ? 'selected' : null ?> value="0">Member</option>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['vai_tro']) ? $_SESSION['errors']['vai_tro'] : '' ?></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=users">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>