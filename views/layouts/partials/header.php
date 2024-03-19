<div class="site-header d-none d-lg-block">
    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 ">
                    <a href="<?= BASE_URL ?>" class="site-brand">
                        <img src="<?= BASE_URL ?>/assets/client/image/logo.png" alt="">
                    </a>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Free Support 24/7</p>
                            <p class="font-weight-bold number">+01-202-555-0181</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right ">
                            <li class="menu-item">
                                <a href="contact.html">Trang chủ</a>
                            </li>
                            <li class="menu-item">
                                <a href="contact.html">Giới thiệu</a>
                            </li>
                            <li class="menu-item">
                                <a href="contact.html">Liên hệ</a>
                            </li>
                            <li class="menu-item">
                                <a href="contact.html">Tin tức</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Thể loại</a>
                            <ul class="category-menu">
                                <?php foreach ($categories as $category) : ?>
                                    <li class="cat-item">
                                        <a href="#!"><?= $category['ten_the_loai'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-5">
                    <div class="header-search-block">
                        <input type="text" placeholder="Search entire store here">
                        <button>Search</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-navigation flex-lg-right">
                        <div class="cart-widget">
                            <div class="login-block">
                                <a href="login-register.html" class="font-weight-bold">Login</a> <br>
                                <span>or</span><a href="login-register.html">Register</a>
                            </div>
                            <div class="cart-block">
                                <div class="cart-total">
                                    <span class="text-number">
                                        1
                                    </span>
                                    <span class="text-item">
                                        Shopping Cart
                                    </span>
                                    <span class="price">
                                        £0.00
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="cart-dropdown-block">
                                    <div class=" single-cart-block ">
                                        <div class="cart-product">
                                            <a href="product-details.html" class="image">
                                                <img src="<?= BASE_URL ?>/assets/client/image/products/cart-product-1.jpg" alt="">
                                            </a>
                                            <div class="content">
                                                <h3 class="title"><a href="product-details.html">Kodak PIXPRO
                                                        Astro Zoom AZ421 16 MP</a>
                                                </h3>
                                                <p class="price"><span class="qty">1 ×</span> £87.34</p>
                                                <button class="cross-btn"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" single-cart-block ">
                                        <div class="btn-block">
                                            <a href="cart.html" class="btn">View Cart <i class="fas fa-chevron-right"></i></a>
                                            <a href="checkout.html" class="btn btn--primary">Check Out <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>