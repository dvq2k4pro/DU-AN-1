<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="trang-thai-van-chuyen" class="form-label">Trạng thái vận chuyển:*</label>
                            <select style="width: 30%;" name="trang-thai-van-chuyen" id="trang-thai-van-chuyen" class="form-control">
                                <option <?= $order['trang_thai_van_chuyen'] == 0 ? 'selected' : null ?> value="0">Chờ xác nhận</option>
                                <option <?= $order['trang_thai_van_chuyen'] == 1 ? 'selected' : null ?> value="1">Chờ lấy hàng</option>
                                <option <?= $order['trang_thai_van_chuyen'] == 2 ? 'selected' : null ?> value="2">Chờ giao hàng</option>
                                <option <?= $order['trang_thai_van_chuyen'] == 3 ? 'selected' : null ?> value="3">Đã giao</option>
                                <option <?= $order['trang_thai_van_chuyen'] == -1 ? 'selected' : null ?> value="-1">Đã huỷ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="trang-thai-thanh-toan" class="form-label">Trạng thái thanh toán:*</label>
                            <select style="width: 30%;" name="trang-thai-thanh-toan" id="trang-thai-thanh-toan" class="form-control">
                                <option <?= $order['trang_thai_thanh_toan'] == 0 ? 'selected' : null ?> value="0">Chưa thanh toán</option>
                                <option <?= $order['trang_thai_thanh_toan'] == 1 ? 'selected' : null ?> value="1">Đã thanh toán</option>
                                <option <?= $order['trang_thai_thanh_toan'] == -1 ? 'selected' : null ?> value="-1">Đã huỷ</option>
                            </select>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['success'] ?>
                        <?php unset($_SESSION['success']) ?>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=order-detail&id=<?= $order['id'] ?>">Back</a>
            </form>
        </div>
    </div>
</div>