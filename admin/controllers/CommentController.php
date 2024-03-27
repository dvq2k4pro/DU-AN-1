<?php
function commentListAll()
{
    $title = 'Danh sách bình luận';
    $view = 'comments/index';
    $script = 'datatable';
    $script2 = 'comments/script';
    $style = 'datatable';

    $comments = listCommentsForAdmin();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function commentShowOne($id)
{
    $comment = showCommentById($id);
    if (empty($comment)) {
        e404();
    }

    $title = 'Chi tiết bình luận';
    $view = 'comments/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function commentUpdate($id)
{
    $comment = showCommentById($id);
    if (empty($comment)) {
        e404();
    }

    $title = 'Cập nhật thông tin bình luận';
    $view = 'comments/update';

    if (!empty($_POST)) {
        $data = [
            "xoa_mem" => $_POST['xoa-mem'] ?? $comment['xoa_mem'],
        ];

        update('binh_luan', $id, $data);
        $_SESSION['success'] = 'Cập nhật thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=comment-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
