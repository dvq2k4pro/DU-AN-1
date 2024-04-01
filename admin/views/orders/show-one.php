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
            <p><b class="h5" style="color: #333;">Tên khách hàng:</b> <span><?= $order['ten_nguoi_dung'] ?></span></p>
            <p><b class="h5" style="color: #333;">Email:</b> <span><?= $order['email'] ?></span></p>
            <p><b class="h5" style="color: #333;">Số điện thoại:</b> <span><?= $order['so_dien_thoai'] ?></span></p>
            <p><b class="h5" style="color: #333;">Địa chỉ:</b> <span><?= $order['dia_chi'] ?></span></p>
            <p><b class="h5" style="color: #333;">Trạng thái vận chuyển:</b> <span><?php
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
                                                                                    ?></span></p>
            <p><b class="h5" style="color: #333;">Trạng thái thanh toán:</b> <span><?php
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
                                                                                    ?></span></p>
            <p><b class="h5" style="color: #333;">Tổng tiền đơn hàng:</b> <span><?= formatCurrencyToVND($order['tong_tien']) ?></span></p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($orderDetail as $item) : ?>
                            <tr>
                                <td><?= $item['ctdh_id'] ?></td>
                                <td><?= $item['s_ten_sach'] ?></td>
                                <td>
                                    <img src="<?= BASE_URL . $item['s_hinh_nen'] ?>" alt="" width="100px">
                                </td>
                                <td><?= formatCurrencyToVND($item['ctdh_gia']) ?></td>
                                <td><?= $item['ctdh_so_luong'] ?></td>
                                <td><?= formatCurrencyToVND($item['ctdh_gia'] * $item['ctdh_so_luong']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=orders">Back to list</a>
                <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=order-update&id=<?= $order['id'] ?>">Update</a>
            </div>
        </div>
    </div>
</div>