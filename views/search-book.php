<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div>
            <p>Kết quả tìm kiếm cho '<b><?= $_SESSION['search-keyword'] ?></b>'</p>
        </div>
        <div class="row">
            <div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
                <?php if (!empty($books)) : ?>
                    <?php foreach ($books as $book) : ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-card">
                                <div class="product-grid-content">
                                    <div class="product-header">
                                        <h3><a href="<?= BASE_URL . '?act=book-detail&id=' . $book['id'] ?>"><?= $book['ten_sach'] ?></a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="<?= BASE_URL . $book['hinh_nen'] ?>" alt="">
                                            <div class="hover-contents">
                                                <a href="<?= BASE_URL . '?act=book-detail&id=' . $book['id'] ?>" class="hover-image">
                                                    <img src="<?= BASE_URL . $book['hinh_nen'] ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price"><?= formatCurrencyToVND($book['gia']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php
if (isset($_SESSION['search-keyword'])) {
    unset($_SESSION['search-keyword']);
}
?>