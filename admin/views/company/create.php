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
                            <label for="ten_cong_ty_phat_hanh" class="form-label">Tên công ty phát hành:</label>
                            <input type="text" class="form-control" id="ten_cong_ty_phat_hanh" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ten_cong_ty_phat_hanh'] : null ?>" placeholder="VD: Nhóm 8 Dự Án 1" name="ten_cong_ty_phat_hanh">
                            <span class='error-message'><?= isset($_SESSION['errors']['ten_cong_ty_phat_hanh']) ? $_SESSION['errors']['ten_cong_ty_phat_hanh'] : '' ?></span>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=companies">Back to list</a>
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