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
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Mostarizing Oil</td>
                                                    <td>Aug 22, 2018</td>
                                                    <td>Pending</td>
                                                    <td>$45</td>
                                                    <td><a href="cart.html" class="btn">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Katopeno Altuni</td>
                                                    <td>July 22, 2018</td>
                                                    <td>Approved</td>
                                                    <td>$100</td>
                                                    <td><a href="cart.html" class="btn">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Murikhete Paris</td>
                                                    <td>June 12, 2017</td>
                                                    <td>On Hold</td>
                                                    <td>$99</td>
                                                    <td><a href="cart.html" class="btn">View</a></td>
                                                </tr>
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