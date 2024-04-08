<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đăng ký / Đăng nhập</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!--=============================================
    =            Login Register page content         =
    =============================================-->
<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                <!-- Login Form s-->
                <form action="?act=register" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Khách hàng mới</h4>
                        <p><span class="font-weight-bold">Tôi là một khách hàng mới</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="ho-ten">Họ và tên:*</label>
                                <input class="mb-0 form-control" type="text" name="ho-ten" id="ho-ten" placeholder="Vui lòng nhập họ và tên" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ho_ten'] : null ?>">
                                <?= isset($_SESSION['errors']['ho_ten']) ? "<span class='error-message'>{$_SESSION['errors']['ho_ten']}</span>" : null ?>
                            </div>
                            <div class="col-12 mb--20">
                                <label for="tai-khoan">Tài khoản:*</label>
                                <input class="mb-0 form-control" type="text" name="tai-khoan" id="tai-khoan" placeholder="Vui lòng nhập tài khoản" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['tai_khoan'] : null ?>">
                                <?= isset($_SESSION['errors']['tai_khoan']) ? "<span class='error-message'>{$_SESSION['errors']['tai_khoan']}</span>" : null ?>
                            </div>
                            <div class="col-12 mb--20">
                                <label for="email">Email:*</label>
                                <input class="mb-0 form-control" type="email" id="email" name="email" placeholder="Vui lòng nhập địa chỉ email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>">
                                <?= isset($_SESSION['errors']['email']) ? "<span class='error-message'>{$_SESSION['errors']['email']}</span>" : null ?>
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="mat-khau">Mật khẩu:*</label>
                                <input class="mb-0 form-control" type="text" name="mat-khau" id="mat-khau" placeholder="Vui lòng nhập mật khẩu" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['mat_khau'] : null ?>">
                                <?= isset($_SESSION['errors']['mat_khau']) ? "<span class='error-message'>{$_SESSION['errors']['mat_khau']}</span>" : null ?>
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="nhap-lai-mat-khau">Nhập lại mật khẩu:*</label>
                                <input class="mb-0 form-control" type="text" name="nhap-lai-mat-khau" id="nhap-lai-mat-khau" placeholder="Nhập lại mật khẩu" value="<?= isset($_SESSION['repeatPassword']) ? $_SESSION['repeatPassword'] : null ?>">
                                <?= isset($_SESSION['errors']['nhap_lai_mat_khau']) ? "<span class='error-message'>{$_SESSION['errors']['nhap_lai_mat_khau']}</span>" : null ?>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outlined">Đăng ký</button>
                            </div>
                            <div class='col-md-12'>
                                <span style="margin-top: 8px;" class='error-message'><?= isset($_SESSION['success']) ? $_SESSION['success'] : '' ?></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Khách hàng cũ</h4>
                        <p><span class="font-weight-bold">Tôi là một khách hàng cũ</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="tai-khoan-dang-nhap">Tài khoản</label>
                                <input class="mb-0 form-control" type="text" name="tai-khoan-dang-nhap" id="tai-khoan-dang-nhap" placeholder="Vui lòng nhập tài khoản của bạn">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="mat-khau-dang-nhap">Mật khẩu</label>
                                <input class="mb-0 form-control" type="password" name="mat-khau-dang-nhap" id="mat-khau-dang-nhap" placeholder="Vui lòng nhập mật khẩu của bạn">
                            </div>
                            <div class="col-md-12">
                                <a href="<?= BASE_URL . '?act=forgot-password' ?>">Quên mật khẩu?</a>
                            </div>
                            <div class='col-md-12'>
                                <span style="margin-bottom: 12px;" class='error-message'><?= isset($_SESSION['error-login']) ? $_SESSION['error-login'] : '' ?></span>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outlined">Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</div>
<?php
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}

if (isset($_SESSION['repeatPassword'])) {
    unset($_SESSION['repeatPassword']);
}

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if (isset($_SESSION['error-login'])) {
    unset($_SESSION['error-login']);
}
?>