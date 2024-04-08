<?php

function orderListAll()
{
    $title = 'Danh sách đơn hàng';
    $view = 'orders/index';
    $script = 'datatable';
    $script2 = 'orders/script';
    $style = 'datatable';

    $orders = listAll('don_hang');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function orderShowOne($id)
{
    $order = showOne('don_hang', $id);
    $orderDetail = showOneForOrder($id);

    if (empty($order)) {
        e404();
    }

    $title = 'Chi tiết đơn hàng';
    $view = 'orders/show-one';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function orderUpdate($id)
{
    $order = showOne('don_hang', $id);

    if (empty($order)) {
        e404();
    }

    $title = 'Cập nhật thông tin đơn hàng';
    $view = 'orders/update';

    if (!empty($_POST)) {
        $dateTime = new DateTime('now');
        $currentDateTime = $dateTime->format('Y-m-d H:i:s');

        $data = [
            "trang_thai_van_chuyen" => $_POST['trang-thai-van-chuyen'] ?? $order['trang_thai_van_chuyen'],
            "trang_thai_thanh_toan" => $_POST['trang-thai-thanh-toan'] ?? $order['trang_thai_thanh_toan'],
            "ngay_cap_nhat_cuoi_cung" => $currentDateTime ?? $order['ngay_cap_nhat_cuoi_cung'],
        ];

        update('don_hang', $id, $data);
        $_SESSION['success'] = 'Cập nhật thành công!';

        header('location: ' . BASE_URL_ADMIN . '?act=order-update&id=' . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
