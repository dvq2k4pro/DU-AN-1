<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<div class="myaccount-content container-sm mb-4" style="max-width: 50%">
    <div class="account-details-form">
        <form action="#" method="post">
            <div class="row">
                <div class="col-12  mb--30">
                    <h4>Đổi mật khẩu</h4>
                </div>
                <div class="col-12  mb--30">
                    <label for="mat-khau-hien-tai">Mật khẩu hiện tại</label>
                    <input id="mat-khau-hien-tai" name="mat-khau-hien-tai" placeholder="Mật khẩu hiện tại" type="password">
                    <?= isset($_SESSION['errors']['mat_khau_hien_tai']) ? "<span class='error-message'>" . $_SESSION['errors']['mat_khau_hien_tai'] . "</span>" : null ?>
                </div>
                <div class="col-lg-6 col-12  mb--30">
                    <label for="mat-khau-moi">Mật khẩu mới</label>
                    <input id="mat-khau-moi" name="mat-khau-moi" placeholder="Mật khẩu mới" type="password">
                    <?= isset($_SESSION['errors']['mat_khau_moi']) ? "<span class='error-message'>" . $_SESSION['errors']['mat_khau_moi'] . "</span>" : null ?>
                </div>
                <div class="col-lg-6 col-12  mb--30">
                    <label for="xac-nhan-mat-khau">Xác nhận mật khẩu</label>
                    <input id="xac-nhan-mat-khau" name="xac-nhan-mat-khau" placeholder="Xác nhận mật khẩu" type="password">
                    <?= isset($_SESSION['errors']['xac_nhan_mat_khau']) ? "<span class='error-message'>" . $_SESSION['errors']['xac_nhan_mat_khau'] . "</span>" : null ?>
                </div>
                <?php if (isset($_SESSION['success'])) : ?>
                    <?= "<span class='mb-4'>" . $_SESSION['success'] . "</span>" ?>
                <?php endif; ?>
                <div class="col-12">
                    <button type="submit" class="btn btn--primary">Lưu thay đổi</button>
                </div>
            </div>
        </form>
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