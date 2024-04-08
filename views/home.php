<!--=================================
        Hero Area
        ===================================== -->
<section class="hero-area hero-slider-1">
    <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 3000,
                            "speed": 3000,
                            "slidesToShow": 1,
                            "dots":true
                            }'>
        <div class="single-slide bg-shade-whisper  ">
            <div class="container">
                <div class="home-content text-center text-sm-left position-relative">
                    <div class="hero-partial-image image-right">
                        <img src="<?= BASE_URL ?>/assets/client/image/bg-images/home-slider-2-ai.png" alt="">
                    </div>
                    <div class="row g-0">
                        <div class="col-xl-6 col-md-6 col-sm-7">
                            <div class="home-content-inner content-left-side text-start">
                                <h1>H.G. Wells<br>
                                    De Vengeance</h1>
                                <h2>Che mặt trước của cuốn sách và để lại phần tóm tắt</h2>
                                <a href="#!" class="btn btn-outlined--primary">
                                    <?= formatCurrencyToVND(78000) ?> - Mua ngay!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide bg-ghost-white">
            <div class="container">
                <div class="home-content text-center text-sm-left position-relative">
                    <div class="hero-partial-image image-left">
                        <img src="<?= BASE_URL ?>/assets/client/image/bg-images/home-slider-1-ai.png" alt="">
                    </div>
                    <div class="row align-items-center justify-content-start justify-content-md-end">
                        <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                            <div class="home-content-inner content-right-side text-start">
                                <h1>J.D. Kurtness <br>
                                    De Vengeance</h1>
                                <h2>Che mặt trước của cuốn sách và để lại phần tóm tắt</h2>
                                <a href="#!" class="btn btn-outlined--primary">
                                    <?= formatCurrencyToVND(89000) ?> - Tìm hiểu thêm
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
        Home Features Section
        ===================================== -->
<section class="mb--30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="text">
                        <h5>Miễn phí vận chuyển</h5>
                        <p> Đơn hàng trên $500</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                        <i class="fas fa-redo-alt"></i>
                    </div>
                    <div class="text">
                        <h5>Đổi trả miễn phí</h5>
                        <p>Nếu sản phẩm lỗi</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <div class="text">
                        <h5>Được hoàn tiền 111%</h5>
                        <p>Nếu là hàng giả</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                        <i class="fas fa-life-ring"></i>
                    </div>
                    <div class="text">
                        <h5>Trợ giúp & hỗ trợ</h5>
                        <p>Gọi : + 0123.4567.89</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
        Promotion Section One
        ===================================== -->
<section class="section-margin">
    <h2 class="sr-only">Promotion Section</h2>
    <div class="container">
        <div class="row space-db--30">
            <div class="col-lg-6 col-md-6 mb--30">
                <a href="#!" class="promo-image promo-overlay">
                    <img src="<?= BASE_URL ?>/assets/client/image/bg-images/promo-banner-with-text.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 mb--30">
                <a href="#!" class="promo-image promo-overlay">
                    <img src="<?= BASE_URL ?>/assets/client/image/bg-images/promo-banner-with-text-2.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
<!--=================================
        Home Slider Tab
        ===================================== -->
<section class="section-padding">
    <h2 class="sr-only">Home Tab Slider Section</h2>
    <div class="container">
        <div class="sb-custom-tab">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="san-pham-noi-bat-tab" data-bs-toggle="tab" href="#san-pham-noi-bat" role="tab" aria-controls="san-pham-noi-bat" aria-selected="true">
                        Sản phẩm nổi bật
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="san-pham-moi-cap-nhat-tab" data-bs-toggle="tab" href="#san-pham-moi-cap-nhat" role="tab" aria-controls="san-pham-moi-cap-nhat" aria-selected="true">
                        Sản phẩm mới cập nhật
                    </a>
                    <span class="arrow-icon"></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="san-pham-nhieu-luot-theo-doi-tab" data-bs-toggle="tab" href="#san-pham-nhieu-luot-theo-doi" role="tab" aria-controls="san-pham-nhieu-luot-theo-doi" aria-selected="false">
                        Sản phẩm nhiều lượt theo dõi
                    </a>
                    <span class="arrow-icon"></span>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="san-pham-noi-bat" role="tabpanel" aria-labelledby="san-pham-noi-bat-tab">
                    <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                        <!-- Begin Featured Products -->
                        <?php foreach ($listAllSanPhamDacSac as $sanPhamDacSac) : ?>
                            <div class="single-slide">
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <h3>
                                                <a href="<?= BASE_URL . '?act=book-detail&id=' . $sanPhamDacSac['id'] ?>"><?= $sanPhamDacSac['ten_sach'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="<?= BASE_URL . $sanPhamDacSac['hinh_nen'] ?>" alt="" />
                                                <div class="hover-contents">
                                                    <a href="<?= BASE_URL . '?act=book-detail&id=' . $sanPhamDacSac['id'] ?>" class="hover-image">
                                                        <img src="<?= BASE_URL . $sanPhamDacSac['hinh_nen'] ?>" alt="" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price"><?= formatCurrencyToVND($sanPhamDacSac['gia']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- End Featured Products -->
                    </div>
                </div>
                <div class="tab-pane" id="san-pham-moi-cap-nhat" role="tabpanel" aria-labelledby="san-pham-moi-cap-nhat-tab">
                    <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                        <!-- Begin New Arrivals -->
                        <?php foreach ($listAllSachMoi as $sachMoi) : ?>
                            <div class="single-slide">
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <h3>
                                                <a href="<?= BASE_URL . '?act=book-detail&id=' . $sachMoi['id'] ?>"><?= $sachMoi['ten_sach'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="<?= BASE_URL . $sachMoi['hinh_nen'] ?>" alt="" />
                                                <div class="hover-contents">
                                                    <a href="<?= BASE_URL . '?act=book-detail&id=' . $sachMoi['id'] ?>" class="hover-image">
                                                        <img src="<?= BASE_URL . $sachMoi['hinh_nen'] ?>" alt="" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price"><?= formatCurrencyToVND($sachMoi['gia']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- End New Arrivals -->
                    </div>
                </div>
                <div class="tab-pane" id="san-pham-nhieu-luot-theo-doi" role="tabpanel" aria-labelledby="san-pham-nhieu-luot-theo-doi-tab">
                    <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                        <!-- Begin Most View Products -->
                        <?php foreach ($listAllSachNhieuLuotXem as $sachNhieuLuotXem) : ?>
                            <div class="single-slide">
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <h3>
                                                <a href="<?= BASE_URL . '?act=book-detail&id=' . $sachNhieuLuotXem['id'] ?>"><?= $sachNhieuLuotXem['ten_sach'] ?></a>
                                            </h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="<?= BASE_URL . $sachNhieuLuotXem['hinh_nen'] ?>" alt="" />
                                                <div class="hover-contents">
                                                    <a href="<?= BASE_URL . '?act=book-detail&id=' . $sachNhieuLuotXem['id'] ?>" class="hover-image">
                                                        <img src="<?= BASE_URL . $sachNhieuLuotXem['hinh_nen'] ?>" alt="" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span class="price"><?= formatCurrencyToVND($sachNhieuLuotXem['gia']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- End Most View Products -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
            Promotion Section Three
        ===================================== -->
<section class="section-margin">
    <div class="promo-wrapper promo-type-three">
        <a href="#!" class="promo-image promo-overlay bg-image" data-bg="<?= BASE_URL ?>/assets/client/image/bg-images/promo-banner-full.jpg">
        </a>
        <div class="promo-text w-100 ml-0">
            <div class="container">
                <div class="row w-100">
                    <div class="col-lg-7">
                        <h2>Tôi thích ý tưởng này!</h2>
                        <h3>Che mặt trước của cuốn sách và để lại phần tóm tắt</h3>
                        <a href="#!" class="btn btn--yellow"><?= formatCurrencyToVND(46800) ?> - Tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>