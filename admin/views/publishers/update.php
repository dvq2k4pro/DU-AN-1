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
                            <label for="ten_nha_xuat_ban" class="form-label">Tên nhà xuất bản:</label>
                            <input type="text" class="form-control" id="ten_nha_xuat_ban" value="<?= $publisher['ten_nha_xuat_ban'] ?>" placeholder="Vui lòng nhập tên nhà xuất bản" name="ten_nha_xuat_ban">
                            <span class='error-message'><?= isset($_SESSION['errors']['ten_nha_xuat_ban']) ? $_SESSION['errors']['ten_nha_xuat_ban'] : '' ?></span>
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
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=publishers">Back to list</a>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>