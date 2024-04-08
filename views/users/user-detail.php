<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Tài khoản của tôi</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<div class="page-section inner-page-sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#chi-tiet-tai-khoan" class='active' data-bs-toggle="tab"><i class="fa fa-user"></i> Chi tiết tài khoản</a>
                            <a href="<?= BASE_URL . '?act=change-password&id=' . $userInfo['id'] ?>"><i class="fa fa-key"></i>
                                Đổi mật khẩu</a>
                            <a href="#don-hang" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Đơn hàng</a>
                            <a href="<?= BASE_URL . '?act=logout' ?>"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                        <div class="tab-content" id="myaccountContent">
                            <div class="tab-pane fade show active" id="chi-tiet-tai-khoan" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Chi tiết tài khoản</h3>
                                    <div class="account-details-form">
                                        <form action="" method='post'>
                                            <div class="row">
                                                <div class="col-12 mb--30">
                                                    <label class="mb-1" for="ho-ten">Họ và tên</label>
                                                    <input id="ho-ten" name="ho-ten" placeholder="Họ và tên" type="text" value="<?= $userInfo['ho_ten'] ?>">
                                                    <?= isset($_SESSION['errors']['ho_ten']) ? "<span class='error-message'>" . $_SESSION['errors']['ho_ten'] . "</span>" : null ?>
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <label class="mb-1" for="email">Email</label>
                                                    <input name="email" id="email" placeholder="Địa chỉ email" type="email" value="<?= $userInfo['email'] ?>" />
                                                    <?= isset($_SESSION['errors']['email']) ? "<span class='error-message'>" . $_SESSION['errors']['email'] . "</span>" : null ?>
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <label class="mb-1" for="dia-chi">Địa chỉ</label>
                                                    <input name="dia-chi" id="dia-chi" placeholder="Địa chỉ" type="text" value="<?= $userInfo['dia_chi'] ?>" />
                                                </div>
                                                <div class="col-12  mb--30">
                                                    <label class="mb-1" for="so-dien-thoai">Số điện thoại</label>
                                                    <input name="so-dien-thoai" id="so-dien-thoai" placeholder="Số điện thoại" type="text" value="<?= $userInfo['so_dien_thoai'] ?>" />
                                                </div>
                                                <?php if (isset($_SESSION['success'])) : ?>
                                                    <?= "<span class='mb-4'>" . $_SESSION['success'] . "</span>" ?>
                                                <?php endif; ?>
                                                <button type='submit' class="btn btn--primary">Lưu thanh đổi</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="don-hang" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Đơn hàng</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên sách</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($orderInfo); $i++) : ?>
                                                    <tr>
                                                        <td><?= $i + 1 ?></td>
                                                        <td><?= $orderInfo[$i]['s_ten_sach'] ?></td>
                                                        <td><?= getDateFromDatabase($orderInfo[$i]['dh_ngay_cap_nhat_cuoi_cung']) ?></td>
                                                        <td>
                                                            <?php
                                                            switch ($orderInfo[$i]['dh_trang_thai_thanh_toan']) {
                                                                case '0':
                                                                    echo 'Chưa thanh toán';
                                                                    break;
                                                                case '1':
                                                                    echo 'Đã thanh toán';
                                                                    break;
                                                                case '-1':
                                                                    echo 'Đã huỷ';
                                                                    break;
                                                                default:
                                                                    echo 'Chưa thanh toán';
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $orderInfo[$i]['ctdh_so_luong'] ?></td>
                                                        <td><?= formatCurrencyToVND($orderInfo[$i]['ctdh_gia']) ?></td>
                                                        <td>
                                                            <?php if ($orderInfo[$i]['dh_trang_thai_van_chuyen'] == 0) : ?>
                                                                <a href="<?= BASE_URL . '?act=destroy-order&id=' . $orderInfo[$i]['dh_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn huỷ đơn hàng này không không?')">
                                                                    Huỷ đơn
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                    </div>
                </div>
                <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>