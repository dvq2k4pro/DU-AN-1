<?php


function cartAdd($bookId, $quantity = 0)
{
    // Kiểm tra xem là có sách với cái Id kia không
    $book = showOne('sach', $bookId);
    if (empty($book)) {
        debug('404 Not found');
    }

    // Kiểm tra xem trong bảng gio_hang đã có bản ghi nào của người dùng đang đăng nhập chưa
    // Có rồi thì lấy ra id của giỏ hàng, nếu chưa có thì tạo mới
    $cartId = getCartId($_SESSION['user']['id']);
    $_SESSION['cart-id'] = $cartId;

    // Thêm sách vào session cart
    // Thêm tiếp sản phẩm vào bảng chi_tiet_gio_hang
    if (!isset($_SESSION['cart'][$bookId])) {
        $_SESSION['cart'][$bookId] = $book;
        $_SESSION['cart'][$bookId]['quantity'] = $quantity;

        insert('chi_tiet_gio_hang', [
            'id_gio_hang' => $cartId,
            'id_sach' => $bookId,
            'so_luong' => $quantity
        ]);
    } else {
        $_SESSION['cart'][$bookId]['quantity'] += $quantity;
        updateQuantityByCartIdAndBookId($cartId, $bookId, $_SESSION['cart'][$bookId]['quantity']);
    }

    // Chuyển hướng qua trang list cart
    header('location: ' . BASE_URL . '?act=cart-list');
}

function cartList()
{
    $view = 'cart-list';
    $title = 'Giỏ hàng';

    $carts = $_SESSION['cart'];

    require_once PATH_VIEW . 'layouts/master.php';
}

function cartInc($bookId)
{
    // Kiểm tra sản phẩm có tồn tại không
    $book = showOne('sach', $bookId);
    if (empty($book)) {
        debug('404 Not found');
    }

    // Tăng số lượng lên 1
    if (isset($_SESSION['cart'][$bookId])) {
        $_SESSION['cart'][$bookId]['quantity'] += 1;
        updateQuantityByCartIdAndBookId($_SESSION['cart-id'], $bookId, $_SESSION['cart'][$bookId]['quantity']);
    }

    // Chuyển hướng qua trang list cart
    header('location: ' . BASE_URL . '?act=cart-list');
}

function cartDesc($bookId)
{
    // Kiểm tra sản phẩm có tồn tại không
    $book = showOne('sach', $bookId);
    if (empty($book)) {
        debug('404 Not found');
    }

    // Giảm số lượng xuống 1
    if (isset($_SESSION['cart'][$bookId]) && $_SESSION['cart'][$bookId]['quantity'] > 1) {
        $_SESSION['cart'][$bookId]['quantity'] -= 1;
        updateQuantityByCartIdAndBookId($_SESSION['cart-id'], $bookId, $_SESSION['cart'][$bookId]['quantity']);
    }

    // Chuyển hướng qua trang list cart
    header('location: ' . BASE_URL . '?act=cart-list');
}

function cartDelete($bookId)
{
    // Kiểm tra sản phẩm có tồn tại không
    $book = showOne('sach', $bookId);
    if (empty($book)) {
        debug('404 Not found');
    }

    // Xoá bản ghi trong session và bảng chi_tiet_gio_hang
    if (isset($_SESSION['cart'][$bookId])) {
        unset($_SESSION['cart'][$bookId]);

        deleteCartItemByCartIdAndBookId($_SESSION['cart-id'], $bookId);
    }

    // Chuyển hướng qua trang list cart
    header('location: ' . BASE_URL . '?act=cart-list');
}
