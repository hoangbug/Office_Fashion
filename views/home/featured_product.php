<div class="slider-items-products">
    <div class="new_title center">
        <h2>Featured Products</h2>
    </div>
    <div id="featured-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col4 products-grid">
            <?php
            foreach($selectProductSet as $value){
            ?>
            <div class="item">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="<?=$value['product_name_sets'];?>" href="index.php?page=clothesSet&method=productDetailSet&id=<?=$value['id']?>"> <img alt="Sample Product" src="assets/images/products/<?= $value['image_sets']; ?>" style="width: 100%; height: 321.3px;"> </a>
                            <div class="sale-label sale-top-left">hot</div>
                            <div class="item-box-hover">
                                <div class="box-inner">
                                    <div class="actions">
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to
                                                    Cart</span></button>
                                        </div>
                                        <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                        <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                    Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to
                                                    Compare</span></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title"> <a title="<?=$value['product_name_sets'];?>" href="product_detail.html">
                                    <?=$value['product_name_sets'];?> </a> </div>
                            <div class="item-content">
                                <div class="rating">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:80%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                    </div>
                                </div>
                                <div class="item-price">
                                   <div class="price-box">
                                    <?php
                                    if ($value['sale'] != 0) {
                                        ?>
                                        <p class="old-price"><span class="price-label">Regular
                                        Price:</span> <span class="price"><?php echo number_format($value['price'], 0, '', '.'); ?> ₫
                                        </span> </p>
                                        <p class="special-price"><span class="price-label">Special
                                            Price</span> <span class="price"><?php $total = $value['price'] * ((100 - $value['sale']) / 100);
                                            echo number_format($total, 0, '', '.'); ?> ₫
                                        </span> </p>
                                        <?php
                                    } else {
                                        ?>
                                        <p class="special-price"><span class="price-label">Special
                                        Price</span> <span class="price"><?php echo number_format($value['price'], 0, '', '.'); ?> ₫
                                        </span> </p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <!-- <div class="item">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="assets/products-images/product11.jpg"></a>
                            <div class="item-box-hover">
                                <div class="box-inner">
                                    <div class="actions">
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to
                                                    Cart</span></button>
                                        </div>
                                        <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                        <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                    Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to
                                                    Compare</span></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title"> <a title="Sample Product" href="product_detail.html">
                                    Sample Product </a> </div>
                            <div class="item-content">
                                <div class="rating">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:30%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                    </div>
                                </div>
                                <div class="item-price">
                                    <div class="price-box">
                                        <p class="old-price"> <span class="price-label">Regular
                                                Price:</span> <span class="price"> $567.00 </span> </p>
                                        <p class="special-price"> <span class="price-label">Special
                                                Price</span> <span class="price"> $456.00 </span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <div class="item">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="assets/products-images/product12.jpg"></a>
                            <div class="item-box-hover">
                                <div class="box-inner">
                                    <div class="actions">
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to
                                                    Cart</span></button>
                                        </div>
                                        <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                        <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                    Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to
                                                    Compare</span></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title"> <a title="Sample Product" href="product_detail.html">
                                    Sample Product </a> </div>
                            <div class="item-content">
                                <div class="rating">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:100%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                    </div>
                                </div>
                                <div class="item-price">
                                    <div class="price-box">
                                        <p class="old-price"> <span class="price-label">Regular
                                                Price:</span> <span class="price"> $100.00 </span> </p>
                                        <p class="special-price"> <span class="price-label">Special
                                                Price</span> <span class="price"> $90.00 </span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="item">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="assets/products-images/product13.jpg"> </a>
                            <div class="new-label new-top-left">new</div>
                            <div class="item-box-hover">
                                <div class="box-inner">
                                    <div class="actions">
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to
                                                    Cart</span></button>
                                        </div>
                                        <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                        <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                    Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to
                                                    Compare</span></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title"> <a title="Sample Product" href="product_detail.html">
                                    Sample Product </a> </div>
                            <div class="item-content">
                                <div class="rating">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:80%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                    </div>
                                </div>
                                <div class="item-price">
                                    <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="item">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="assets/products-images/product14.jpg"></a>
                            <div class="item-box-hover">
                                <div class="box-inner">
                                    <div class="actions">
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to
                                                    Cart</span></button>
                                        </div>
                                        <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                        <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                    Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to
                                                    Compare</span></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title"> <a title="Sample Product" href="product_detail.html">
                                    Sample Product </a> </div>
                            <div class="item-content">
                                <div class="rating">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:30%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                    </div>
                                </div>
                                <div class="item-price">
                                    <div class="price-box">
                                        <p class="old-price"> <span class="price-label">Regular
                                                Price:</span> <span class="price"> $567.00 </span> </p>
                                        <p class="special-price"> <span class="price-label">Special
                                                Price</span> <span class="price"> $456.00 </span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <div class="item">
                <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="assets/products-images/product15.jpg"></a>
                            <div class="item-box-hover">
                                <div class="box-inner">
                                    <div class="actions">
                                        <div class="add_cart">
                                            <button class="button btn-cart" type="button"><span>Add to
                                                    Cart</span></button>
                                        </div>
                                        <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                        <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                    Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to
                                                    Compare</span></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                            <div class="item-title"> <a title="Sample Product" href="product_detail.html">
                                    Sample Product </a> </div>
                            <div class="item-content">
                                <div class="rating">
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:100%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                    </div>
                                </div>
                                <div class="item-price">
                                    <div class="price-box">
                                        <p class="old-price"> <span class="price-label">Regular
                                                Price:</span> <span class="price"> $100.00 </span> </p>
                                        <p class="special-price"> <span class="price-label">Special
                                                Price</span> <span class="price"> $90.00 </span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            

        </div>
    </div>
</div>