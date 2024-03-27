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
                            <label for="xoa-mem" class="form-label">Xoá mềm:*</label>
                            <select style="width: 30%;" name="xoa-mem" id="xoa-mem" class="form-control">
                                <option <?= $comment['bl_xoa_mem'] == 1 ? 'selected' : null ?> value="1">Có</option>
                                <option <?= $comment['bl_xoa_mem'] == 0 ? 'selected' : null ?> value="0">Không</option>
                            </select>
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
                <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=comments">Back to list</a>
            </form>
        </div>
    </div>
</div>