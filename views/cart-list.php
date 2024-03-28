<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Cart Page Start -->
<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container">
            <div class="page-section-title">
                <h1>Giỏ hàng</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="#" class="">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail">Hình ảnh</th>
                                        <th class="pro-title">Tên sách</th>
                                        <th class="pro-price">Giá</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    <?php

                                    if (!empty($_SESSION['cart'])) :

                                        foreach ($carts as $cart) : ?>
                                            <tr>
                                                <td class="pro-remove"><a href="<?= BASE_URL . '?act=cart-delete&bookId=' . $cart['id'] ?>" onclick="return confirm('Bạn có chắc chắng muốn xoá không?')"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                                <td class="pro-thumbnail"><a href="<?= BASE_URL . '?act=book-detail&id=' . $cart['id'] ?>"><img src="<?= BASE_URL . $cart['hinh_nen'] ?>" alt="Product"></a></td>
                                                <td class="pro-title"><a href="<?= BASE_URL . '?act=book-detail&id=' . $cart['id'] ?>"><?= $cart['ten_sach'] ?></a></td>
                                                <td class="pro-price"><span><?= formatCurrencyToVND($cart['gia']) ?></span></td>
                                                <td class="pro-quantity">
                                                    <div style="display: flex; justify-content: center;" class="pro-qty">
                                                        <div class="count-input-block">
                                                            <a style="display: flex; align-items: center; font-size: 20px;" href="<?= BASE_URL . '?act=cart-desc&bookId=' . $cart['id'] ?>">-</a>
                                                            <input style="margin: 0 12px; padding: 0" type="number" class="form-control text-center" value="<?= $cart['quantity'] ?>" disabled>
                                                            <a style="display: flex; align-items: center; font-size: 20px;" href="<?= BASE_URL . '?act=cart-inc&bookId=' . $cart['id'] ?>">+</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal"><span><?= formatCurrencyToVND($cart['gia'] * $cart['quantity']) ?></span></td>
                                            </tr>
                                    <?php endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section-2">
        <div class="container">
            <div class="row">
                <div style="flex: 1;"></div>
                <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                    <!-- Cart Summary -->

                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Tóm tắt giỏ hàng</span></h4>
                            <p>Sub Total <span class="text-primary">$1250.00</span></p>
                            <p>Shipping Cost <span class="text-primary">$00.00</span></p>
                            <h2>Grand Total <span class="text-primary">$1250.00</span></h2>
                        </div>
                        <div class="cart-summary-button">
                            <a href="checkout.html" class="checkout-btn c-btn btn--primary">Thanh toán</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</main>