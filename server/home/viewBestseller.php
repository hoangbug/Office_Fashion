<?php
$useAjax = 1;
include_once "../../controller/homeController.php";
$home = new homeController();
if (isset($_POST['status_id']) && !empty($_POST['status_id'])) {
    $status = $_POST['status_id'];
} else {
    $status = 2;
}
$selectNewProduct = $home->getProduct_c($status);
if ($status == 2) {
    foreach ($selectNewProduct as $value) {
?>
        <li class="item item-animate wide-first">
            <div class="item-inner">
                <div class="item-img">
                    <div class="item-img-info"><a href="product_detail.html" title="Sample Product" class="product-image"><img src="assets/images/products/<?= $value['main_image']; ?>" alt="Sample Product"></a>
                        <div class="new-label new-top-left">New
                        </div>
                        <div class="item-box-hover">
                            <div class="box-inner">
                                <div class="actions">
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add
                                                to
                                                Cart</span></button>
                                    </div>
                                    <div class="product-detail-bnt">
                                        <a href="quick_view.html" class="button detail-bnt"><span>Quick
                                                View</span></a>
                                    </div>
                                    <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add
                                                to
                                                Wishlist</span></a>
                                        <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add
                                                to
                                                Compare</span></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-info">
                    <div class="info-inner">
                        <div class="item-title"><a href="product_detail.html" title="Sample Product"><?= $value['name'] ?></a> </div>
                        <div class="item-content">
                            <div class="rating">
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div class="rating" style="width:80%"></div>
                                    </div>
                                    <p class="rating-links"><a href="#">1 Review(s)</a>
                                        <span class="separator">|</span>
                                        <a href="#">Add Review</a>
                                    </p>
                                </div>
                            </div>
                            <div class="item-price">
                                <div class="price-box"><span class="regular-price"><span class="price"><?php echo number_format($value['price'], 0, '', '.'); ?> ₫</span>
                                    </span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php
    }
} elseif ($status == 3) {
    foreach ($selectNewProduct as $value) {
    ?>
        <li class="item item-animate">
            <div class="item-inner">
                <div class="item-img">
                    <div class="item-img-info"><a href="product_detail.html" title="Sample Product" class="product-image"><img src="assets/products-images/product2.jpg" alt="Sample Product"></a>
                        <div class="sale-label sale-top-left">Sale
                        </div>
                        <div class="item-box-hover">
                            <div class="box-inner">
                                <div class="actions">
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add
                                                to
                                                Cart</span></button>
                                    </div>
                                    <div class="product-detail-bnt">
                                        <a href="quick_view.html" class="button detail-bnt"><span>Quick
                                                View</span></a>
                                    </div>
                                    <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add
                                                to
                                                Wishlist</span></a>
                                        <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add
                                                to
                                                Compare</span></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-info">
                    <div class="info-inner">
                        <div class="item-title"><a href="product_detail.html" title="Sample Product">Sample
                                Product</a> </div>
                        <div class="item-content">
                            <div class="rating">
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div class="rating" style="width:40%"></div>
                                    </div>
                                    <p class="rating-links"><a href="#">1 Review(s)</a>
                                        <span class="separator">|</span>
                                        <a href="#">Add Review</a>
                                    </p>
                                </div>
                            </div>
                            <div class="item-price">
                                <div class="price-box">
                                    <p class="old-price"><span class="price-label">Regular
                                            Price:</span> <span class="price">$100.00
                                        </span> </p>
                                    <p class="special-price"><span class="price-label">Special
                                            Price</span> <span class="price">$90.00
                                        </span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
<?php
    }
} else {
}
?>