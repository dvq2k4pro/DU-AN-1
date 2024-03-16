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
                            <input type="text" class="form-control" id="ho_ten" placeholder="VD: Trần Văn A" name="ho_ten">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="tai_khoan" class="form-label">Tài khoản:</label>
                            <input type="text" class="form-control" id="tai_khoan" placeholder="Vui lòng nhập tài khoản" name="tai_khoan">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="dia_chi" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="dia_chi" placeholder="Vui lòng nhập địa chỉ" name="dia_chi">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="so_dien_thoai" placeholder="Vui lòng nhập số điện thoại" name="so_dien_thoai">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="VD: example@gmail.com" name="email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" placeholder="Vui lòng nhập mật khẩu" name="mat_khau">
                        </div>
                        <div style="width: 30%;" class="mb-3 mt-3">
                            <label for="vai_tro" class="form-label">Vai trò:</label>
                            <select name="vai_tro" id="vai_tro" class="form-control">
                                <option value="1">Admin</option>
                                <option value="0">Member</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=users">Back to list</a>
            </form>
        </div>
    </div>
</div>