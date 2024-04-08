<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quên mật khẩu</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row" style="align-items: center; justify-content: center;">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="" method="post">
                    <div class="login-form">
                        <h4 class="login-title">Tìm lại mật khẩu</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="tai-khoan">Tài khoản</label>
                                <input class="mb-0 form-control" type="text" name="tai-khoan" id="tai-khoan" placeholder="Vui lòng nhập tài khoản của bạn">
                                <?= isset($_SESSION['errors']['tai_khoan']) ? "<span class='error-message'>{$_SESSION['errors']['tai_khoan']}</span>" : null ?>
                            </div>
                            <div class="col-12 mb--20">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" type="email" name="email" id="email" placeholder="Vui lòng nhập email của bạn">
                                <?= isset($_SESSION['errors']['email']) ? "<span class='error-message'>{$_SESSION['errors']['email']}</span>" : null ?>
                            </div>

                            <span class='error-message'><?= isset($_SESSION['success']) ? $_SESSION['success'] : '' ?></span>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outlined">Gửi</button>
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

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
?>