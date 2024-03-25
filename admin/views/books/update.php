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
                Update
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="ten-sach" class="form-label">Tên sách:*</label>
                            <input type="text" class="form-control" id="ten-sach" value="<?= $book['s_ten_sach'] ?>" placeholder="VD: Dragon Balls" name="ten-sach">
                            <span class='error-message'><?= isset($_SESSION['errors']['ten_sach']) ? $_SESSION['errors']['ten_sach'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="gia" class="form-label">Giá:*</label>
                            <input type="text" class="form-control" id="gia" value="<?= $book['s_gia'] ?>" placeholder="Vui lòng nhập giá" name="gia">
                            <span class='error-message'><?= isset($_SESSION['errors']['gia']) ? $_SESSION['errors']['gia'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="so-trang" class="form-label">Số trang:*</label>
                            <input type="text" class="form-control" id="so-trang" value="<?= $book['s_so_trang'] ?>" placeholder="Vui lòng nhập số trang" name="so-trang">
                            <span class='error-message'><?= isset($_SESSION['errors']['so_trang']) ? $_SESSION['errors']['so_trang'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="id_nha_xuat_ban" class="form-label">Nhà xuất bản:*</label>
                            <select style="width: 50%;" class="form-control" id="id_nha_xuat_ban" name="id-nha-xuat-ban">
                                <?php foreach ($publishers as $publisher) : ?>
                                    <option <?= $book['s_id_nha_xuat_ban'] == $publisher['id'] ? 'selected' : null ?> value="<?= $publisher['id'] ?>"><?= $publisher['ten_nha_xuat_ban'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['id_the_loai']) ? $_SESSION['errors']['id_the_loai'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="id_cong_ty_phat_hanh" class="form-label">Công ty phát hành:*</label>
                            <select style="width: 50%;" class="form-control" id="id_cong_ty_phat_hanh" name="id-cong-ty-phat-hanh">
                                <?php foreach ($companies as $company) : ?>
                                    <option value="<?= $company['id'] ?>"><?= $company['ten_cong_ty_phat_hanh'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['id_cong_ty_phat_hanh']) ? $_SESSION['errors']['id_cong_ty_phat_hanh'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="hinh-nen" class="form-label">Hình nền:*</label>
                            <input style="border: none; padding: 0; border-radius: 0;" type="file" class="form-control" id="hinh-nen" name="hinh-nen">
                            <img src="<?= BASE_URL . $book['s_hinh_nen'] ?>" alt="" width="100px">
                            <span class='error-message'><?= isset($_SESSION['errors']['hinh_nen']) ? $_SESSION['errors']['hinh_nen'] : '' ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Thể loại:*</label>
                            <select style="width: 50%;" class="form-control" id="category_id" name="id-the-loai">
                                <?php foreach ($categories as $category) : ?>
                                    <option <?= $book['s_id_the_loai'] == $category['id'] ? 'selected' : null ?> value="<?= $category['id'] ?>"><?= $category['ten_the_loai'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['id_the_loai']) ? $_SESSION['errors']['id_the_loai'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="kich-thuoc" class="form-label">Kích thước:*</label>
                            <select style="width: 30%;" name="id-kich-thuoc" id="kich-thuoc" class="form-control">
                                <?php foreach ($sizes as $size) : ?>
                                    <option value="<?= $size['id'] ?>"><?= $size['ten_kich_thuoc'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['id_kich_thuoc']) ? $_SESSION['errors']['id_kich_thuoc'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="san-pham-dac-sac" class="form-label">Sản phẩm đặc sắc:*</label>
                            <select style="width: 30%;" name="san-pham-dac-sac" id="san-pham-dac-sac" class="form-control">
                                <option <?= $book['s_san_pham_dac_sac'] == 1 ? 'selected' : null ?> value="1">Đúng</option>
                                <option <?= $book['s_san_pham_dac_sac'] == 0 ? 'selected' : null ?> value="0">Sai</option>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['vai_tro']) ? $_SESSION['errors']['vai_tro'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="loai-bia" class="form-label">Loại bìa:*</label>
                            <select style="width: 30%;" name="loai-bia" id="loai-bia" class="form-control">
                                <option <?= $book['s_loai_bia'] == 1 ? 'selected' : null ?> value="1">Bìa cứng</option>
                                <option <?= $book['s_loai_bia'] == 0 ? 'selected' : null ?> value="0">Bìa mềm</option>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['loai_bia']) ? $_SESSION['errors']['loai_bia'] : '' ?></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="id-tac-gia" class="form-label">Tác giả:*</label>
                            <select style="width: 50%;" class="form-control" id="id-tac-gia" name="id-tac-gia[]" multiple>
                                <?php foreach ($authors as $author) : ?>
                                    <option <?= in_array($author['id'], $authorIdsForBook) ? 'selected' : null ?> value="<?= $author['id'] ?>"><?= $author['ten_tac_gia'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class='error-message'><?= isset($_SESSION['errors']['id_tac_gia']) ? $_SESSION['errors']['id_tac_gia'] : '' ?></span>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 mt-3">
                        <label for="content" class="form-label">Mô tả:</label>
                        <textarea id="content" name="mo-ta"><?= $book['s_mo_ta'] ?? null ?></textarea>
                    </div>
                </div>
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['success'] ?>
                        <?php unset($_SESSION['success']) ?>
                    </div>
                <?php endif; ?>
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
?>