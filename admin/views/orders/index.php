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
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Trạng thái vận chuyển</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>Trạng thái vận chuyển</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['ten_nguoi_dung'] ?></td>
                                <td><?= $order['email'] ?></td>
                                <td><?= $order['so_dien_thoai'] ?></td>
                                <td><?= $order['dia_chi'] ?></td>
                                <td><?= formatCurrencyToVND($order['tong_tien']) ?></td>
                                <td><?= getDateFromDatabase($order['ngay_tao']) ?></td>
                                <td><?= getDateFromDatabase($order['ngay_cap_nhat_cuoi_cung']) ?></td>
                                <td>
                                    <?php
                                    switch ($order['trang_thai_van_chuyen']) {
                                        case '0':
                                            echo '<span class="badge badge-primary">Chờ xác nhận</span>';
                                            break;
                                        case '1':
                                            echo '<span class="badge badge-secondary">Chờ lấy hàng</span>';
                                            break;
                                        case '2':
                                            echo '<span class="badge badge-warning">Chờ giao hàng</span>';
                                            break;
                                        case '3':
                                            echo '<span class="badge badge-success">Đã giao</span>';
                                            break;
                                        case '-1':
                                            echo '<span class="badge badge-danger">Đã huỷ</span>';
                                            break;
                                        default:
                                            echo '<span class="badge badge-primary">Chờ xác nhận</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    switch ($order['trang_thai_thanh_toan']) {
                                        case '0':
                                            echo '<span class="badge badge-warning">Chưa thanh toán</span>';
                                            break;
                                        case '1':
                                            echo '<span class="badge badge-success">Đã thanh toán</span>';
                                            break;
                                        case '-1':
                                            echo '<span class="badge badge-danger">Đã huỷ</span>';
                                            break;
                                        default:
                                            echo '<span class="badge badge-warning">Chưa thanh toán</span>';
                                            break;
                                    }
                                    ?>
                                </td>

                                <td>
                                    <a class="btn btn-info mb-2" href="<?= BASE_URL_ADMIN ?>?act=order-detail&id=<?= $order['id'] ?>">Show</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>