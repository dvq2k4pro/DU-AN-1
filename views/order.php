<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đặt hàng</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form s-->
                <div class="checkout-form">
                    <form method="post" action="<?= BASE_URL . '?act=order-purchase' ?>">
                        <div class="row row-40">
                            <div class="col-12">
                                <h1 class="quick-title">Đặt hàng</h1>
                            </div>
                            <div class="col-lg-7 mb--20">
                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-40">
                                    <h4 class="checkout-title">Địa chỉ thanh toán</h4>
                                    <div class="row">
                                        <div class="col-12 mb--20">
                                            <label for="ho-ten">Họ và tên:*</label>
                                            <input type="text" id="ho-ten" name="ten_nguoi_dung" required placeholder="Họ và tên" value="<?= $_SESSION['user']['ho_ten'] ?>">
                                        </div>
                                        <div class="col-12 mb--20">
                                            <label for="dia-chi">Địa chỉ:*</label>
                                            <input type="text" id="dia-chi" name="dia_chi" required placeholder="địa chỉ" value="<?= $_SESSION['user']['dia_chi'] ?>">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label for="email">Email:*</label>
                                            <input type="email" id="email" name="email" required placeholder="Địa chỉ email" value="<?= $_SESSION['user']['email'] ?>">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label for="so-dien-thoai">Số điện thoại:*</label>
                                            <input type="text" id="so-dien-thoai" required name="so_dien_thoai" placeholder="Số điện thoại" value="<?= $_SESSION['user']['so_dien_thoai'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <!-- Cart Total -->
                                    <div class="col-12">
                                        <div class="checkout-cart-total">
                                            <h2 class="checkout-title">Đơn hàng của bạn</h2>
                                            <h4>Sách <span>Tổng tiền</span></h4>
                                            <ul>
                                                <?php
                                                if (!empty($_SESSION['cart'])) :

                                                    foreach ($_SESSION['cart'] as $cart) : ?>
                                                        <li><span class="left"><?= $cart['ten_sach'] ?> (<?= $cart['quantity'] ?>)</span> <span class="right"><?= formatCurrencyToVND($cart['gia'] * $cart['quantity']) ?></span></li>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </ul>
                                            <h4>Tổng tiền đơn hàng <span><?= formatCurrencyToVND(calculatorTotalOrder()) ?></span></h4>
                                            <div class="method-notice mt--25">
                                                <article>
                                                    <h3 class="d-none sr-only">blog-article</h3>
                                                    Sorry, it seems that there are no available payment methods for
                                                    your state. Please contact us if you
                                                    require
                                                    assistance
                                                    or wish to make alternate arrangements.
                                                </article>
                                            </div>
                                            <button type="submit" class="place-order w-100">Đặt hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>