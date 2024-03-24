<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= $categoryInfo['ten_the_loai'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
            <?php
            if (empty($listAllSachCungTheLoai)) {
                echo "<p style='text-align: center;'>Danh sách trống</p>";
            }
            ?>
            <?php foreach ($listAllSachCungTheLoai as $sachCungTheLoai) : ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="product-card">
                        <div class="product-grid-content">
                            <div class="product-header">
                                <h3><a href="<?= BASE_URL . '?act=book-detail&id=' . $sachCungTheLoai['s_id'] ?>"><?= $sachCungTheLoai['s_ten_sach'] ?></a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="<?= BASE_URL . $sachCungTheLoai['s_hinh_nen'] ?>" alt="">
                                    <div class="hover-contents">
                                        <a href="<?= BASE_URL . '?act=book-detail&id=' . $sachCungTheLoai['s_id'] ?>" class="hover-image">
                                            <img src="<?= BASE_URL . $sachCungTheLoai['s_hinh_nen'] ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="price-block">
                                    <span class="price"><?= formatCurrencyToVND($sachCungTheLoai['s_gia']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
</div>