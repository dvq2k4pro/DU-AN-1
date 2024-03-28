<?php
function orderCheckout()
{
    $view = 'order';
    $title = 'Đặt hàng';

    require_once PATH_VIEW . 'layouts/master.php';
}

function orderPurchase()
{
    if (!empty($_POST) && !empty($_SESSION['cart'])) {
        // Xử lý lưu vào bảng don_hang và chi_tiet_don_hang
        $data = $_POST;
        $data['id_nguoi_dung'] = $_SESSION['user']['id'];
        $data['tong_tien'] = calculatorTotalOrder();
        $data['trang_thai_van_chuyen'] = STATUS_DELIVERY_WFC;
        $data['trang_thai_thanh_toan'] = STATUS_PAYMENT_UNPAID;

        $orderId = insertGetLastId('don_hang', $data);

        foreach ($_SESSION['cart'] as $bookId => $item) {
            $orderItem = [
                'id_don_hang' => $orderId,
                'id_sach' => $bookId,
                'so_luong' => $item['quantity'],
                'gia' => $item['gia'],
            ];

            insert('chi_tiet_don_hang', $orderItem);
        }

        // Xử lý hậu điều kiện
        deleteCartItemByCartId($_SESSION['cartId']);
        delete('gio_hang', $_SESSION['cartId']);

        unset($_SESSION['cart']);
        unset($_SESSION['cartId']);

        header('location: ' . BASE_URL . '?act=order-complete');
        exit();
    }

    header('location: ' . BASE_URL);
}

function orderComplete()
{
    $view = 'order-complete';
    $title = 'Đặt hàng thành công';

    require_once PATH_VIEW . 'layouts/master.php';
}
