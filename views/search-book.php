<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div>
            <p>Kết quả tìm kiếm cho '<b><?= $_SESSION['search-keyword'] ?? null ?></b>'</p>
        </div>
        <div class="row">
            <div class="col-lg-3  mt--40 mt-lg--0">
                <div class="inner-page-sidebar">
                    <!-- Accordion -->
                    <div class="single-block">
                        <h3 class="sidebar-title">Thể loại</h3>
                        <ul class="sidebar-menu--shop">
                            <?php foreach ($categories as $category) : ?>
                                <li><a href="<?= BASE_URL . '?act=filter-book-by-category&id=' . $category['id'] . '&search-keyword=' . $_SESSION['search-keyword'] ?>"><?= $category['ten_the_loai'] ?> (<?= getQuantityRow($category['id'], $_SESSION['search-keyword']) ?>)</a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Price -->
                    <div class="single-block">
                        <h3 class="sidebar-title">Lọc theo giá</h3>
                        <form action="<?= BASE_URL . '?act=filter-book-by-price&search-keyword=' . $_SESSION['search-keyword'] ?>" method="post">
                            <br>
                            <label for="min-price mt-3">Giá thấp nhất:</label>
                            <input style="padding-left: 3px;" type="text" name="min-price" id="min-price">
                            <?= isset($_SESSION['errors']['min_price']) ? "<span class='error-message'>{$_SESSION['errors']['min_price']}</span>" : null ?>
                            <br>
                            <label for="max-price">Giá cao nhất:</label>
                            <br>
                            <input style="padding-left: 4px;" type="text" name="max-price" id="max-price">
                            <?= isset($_SESSION['errors']['max_price']) ? "<span class='error-message'>{$_SESSION['errors']['max_price']}</span>" : null ?>
                            <br>
                            <button type="submit" class="btn btn-outline-success mt-3">Lọc</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-lg-9'>
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
    </div>
</main>
<?php
if (isset($_SESSION['search-keyword'])) {
    unset($_SESSION['search-keyword']);
}

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>