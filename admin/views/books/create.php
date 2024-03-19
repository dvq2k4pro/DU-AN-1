<style>
    .form-control:focus {
        box-shadow: none;
    }
</style>

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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="ten-sach" class="form-label">Tên sách:*</label>
                            <input type="text" class="form-control" id="ten-sach" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ten_sach'] : null ?>" placeholder="VD: Dragon Balls" name="ten-sach">
                            <span class='error-message'><?= isset($_SESSION['errors']['ten_sach']) ? $_SESSION['errors']['ten_sach'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="gia" class="form-label">Giá:*</label>
                            <input type="text" class="form-control" id="gia" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['gia'] : null ?>" placeholder="Vui lòng nhập giá" name="gia">
                            <span class='error-message'><?= isset($_SESSION['errors']['gia']) ? $_SESSION['errors']['gia'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="hinh-nen" class="form-label">Hình nền:*</label>
                            <input style="border: none; padding: 0; border-radius: 0;" type="file" class="form-control" id="hinh-nen" name="hinh-nen">
                            <span class='error-message'><?= isset($_SESSION['errors']['hinh_nen']) ? $_SESSION['errors']['hinh_nen'] : '' ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Thể loại:*</label>
                            <select style="width: 50%;" class="form-control" id="category_id" name="id-the-loai">
                                <?php foreach ($categories as $category) : ?>
                                    <option <?= isset($_SESSION['data']['id_the_loai']) && ($_SESSION['data']['id_the_loai'] == $category['id']) ? 'selected' : null ?> value="<?= $category['id'] ?>"><?= $category['ten_the_loai'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['id_the_loai']) ? $_SESSION['errors']['id_the_loai'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="id-tac-gia" class="form-label">Tác giả:*</label>
                            <select style="width: 50%;" class="form-control" id="id-tac-gia" name="id-tac-gia">
                                <?php foreach ($authors as $author) : ?>
                                    <option <?= isset($_SESSION['data']['id_tac_gia']) && ($_SESSION['data']['id_tac_gia'] == $author['id']) ? 'selected' : null ?> value="<?= $author['id'] ?>"><?= $author['ten_tac_gia'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['id_tac_gia']) ? $_SESSION['errors']['id_tac_gia'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="san-pham-dac-sac" class="form-label">Sản phẩm đặc sắc:*</label>
                            <select style="width: 30%;" name="san-pham-dac-sac" id="san-pham-dac-sac" class="form-control">
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['san_pham_dac_sac'] == 1 ? 'selected' : null ?> value="1">Đúng</option>
                                <option <?= isset($_SESSION['data']) && $_SESSION['data']['san_pham_dac_sac'] == 0 ? 'selected' : null ?> value="0">Sai</option>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['vai_tro']) ? $_SESSION['errors']['vai_tro'] : '' ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 mt-3">
                        <label for="content" class="form-label">Mô tả:</label>
                        <textarea id="content" name="mo-ta"><?= isset($_SESSION['data']) ? $_SESSION['data']['mo_ta'] : null ?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=books">Back to list</a>
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