<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
        <a class="btn btn-primary" href="<?= BASE_URL_ADMIN ?>?act=size-create">Create</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên kích thước</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên kích thước</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($sizes as $size) : ?>
                            <tr>
                                <td><?= $size['id'] ?></td>
                                <td><?= $size['ten_kich_thuoc'] ?> Cm</td>

                                <td>
                                    <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=size-detail&id=<?= $size['id'] ?>">Show</a>
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=size-update&id=<?= $size['id'] ?>">Update</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=size-delete&id=<?= $size['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>