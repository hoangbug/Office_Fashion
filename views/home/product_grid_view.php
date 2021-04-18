<div class="product-grid-view">
    <div class="col-md-12">
        <div class="std">
            <div class="home-tabs wow bounceInUp animated">
                <div class="producttabs">
                    <div id="magik_producttabs1" class="magik-producttabs">
                        <!--<h3></h3>-->
                        <div class="magik-pdt-container">
                            <!--Begin Tab Nav -->
                            <div class="magik-pdt-nav">
                                <ul class="pdt-nav">
                                    <li class="item-nav tab-loaded tab-nav-actived" data-type="order" data-catid="" data-orderby="new_arrivals" data-href="pdt_new_arrivals">
                                        <span class="title-navi">New Arrivals</span>
                                    </li>
                                    <li class="item-nav bestSeller" data-type="order" data-catid="" data-orderby="best_sales" data-href="pdt_best_sales">
                                        <span class="title-navi">Best Seller</span>
                                    </li>
                                    <li class="item-nav" data-type="order" data-catid="" data-orderby="hot_sales" data-href="pdt_hot_sales">
                                        <span class="title-navi">Hot Sales</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Tab Nav -->
                            <!--Begin Tab Content -->
                            <div class="magik-pdt-content wide-5">
                                <div class="pdt-content pdt_new_arrivals is-loaded tab-content-actived">
                                    <ul class="pdt-list products-grid-home zoomOut play">
                                        <?php
                                        $dem = 0;
                                        foreach ($selectProductNew as $value) {
                                            ?>
                                            <li class="item item-animate <?php $dem++; if($dem == 1 || $dem == 5 || $dem == 9){echo "wide-first";} ?>">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info"><a href="index.php?page=product&method=productDetail&id=<?=$value['id']?>" title="<?=$value['name'];?>" class="product-image"><img src="assets/images/products/<?= $value['main_image']; ?>" alt="<?=$value['name'];?>" style="width: 100%; height: 260.64px;"></a>
                                                            <div class="new-label new-top-left">New
                                                            </div>
                                                            <div class="item-box-hover">
                                                                <div class="box-inner">
                                                                    <div class="actions">
                                                                        <div class="add_cart">
                                                                            <a href="index.php?page=product&method=productDetail&id=<?= $value['id']; ?>"><button class="button btn-cart" type="button"><span>Add to Cart</span></button></a>
                                                                        </div>
                                                                        <div class="product-detail-bnt">
                                                                            <a product_id="<?=$value['id']?>" data-toggle="modal" data-target="#quickView" class="button detail-bnt quickViewProduct"><span>Quick View</span></a>
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
                                                            <div class="item-title"><a href="index.php?page=product&method=productDetail&id=<?=$value['id']?>" title="<?= $value['name'] ?>"><?= $value['name'] ?></a> </div>
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
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="pdt-content is-loaded pdt_best_sales" id="bestSeller">
                                    <ul class="pdt-list products-grid-home zoomOut play best_seller">
                                        <?php
                                        $dem = 0;
                                        foreach ($selectProductBest as $value) {
                                            ?>
                                            <li class="item item-animate <?php $dem++; if($dem == 1 || $dem == 5 || $dem == 9){echo "wide-first";} ?>">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info"><a href="index.php?page=product&method=productDetail" title="<?=$value['name'];?>" class="product-image"><img src="assets/images/products/<?= $value['main_image']; ?>" alt="<?=$value['name'];?>" style="width: 100%; height: 260.64px;"></a>
                                                            <div class="sale-label sale-top-left">Sale
                                                            </div>
                                                            <div class="item-box-hover">
                                                                <div class="box-inner">
                                                                    <div class="actions">
                                                                        <div class="add_cart">
                                                                            <a href="index.php?page=product&method=productDetail&id=<?= $value['id']; ?>"><button class="button btn-cart" type="button"><span>Add to Cart</span></button></a>
                                                                        </div>
                                                                        <div class="product-detail-bnt">
                                                                            <a product_id="<?=$value['id']?>" data-toggle="modal" data-target="#quickView" class="button detail-bnt quickViewProduct"><span>Quick View</span></a>
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
                                                            <div class="item-title"><a href="index.php?page=product&method=productDetail&id=<?=$value['id']?>" title="<?= $value['name'] ?>"><?= $value['name']; ?></a> </div>
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
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="pdt-content is-loaded pdt_hot_sales">
                                    <ul class="pdt-list products-grid-home zoomOut play">
                                        <?php
                                        $dem = 0;
                                        foreach ($selectProductHot as $value) {
                                            ?>
                                            <li class="item item-animate <?php $dem++; if($dem == 1 || $dem == 5 || $dem == 9){echo "wide-first";} ?>">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info"><a href="index.php?page=product&method=productDetail" title="<?=$value['name'];?>" class="product-image"><img src="assets/images/products/<?= $value['main_image']; ?>" alt="<?=$value['name'];?>" style="width: 100%; height: 260.64px;"></a>
                                                            <div class="sale-label sale-top-left">Sale
                                                            </div>
                                                            <div class="item-box-hover">
                                                                <div class="box-inner">
                                                                    <div class="actions">
                                                                        <div class="add_cart">
                                                                            <a href="index.php?page=product&method=productDetail&id=<?= $value['id']; ?>"><button class="button btn-cart" type="button"><span>Add to Cart</span></button></a>
                                                                        </div>
                                                                        <div class="product-detail-bnt">
                                                                            <a product_id="<?=$value['id']?>" data-toggle="modal" data-target="#quickView" class="button detail-bnt quickViewProduct"><span>Quick View</span></a>
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
                                                            <div class="item-title"><a href="index.php?page=product&method=productDetail&id=<?=$value['id']?>" title="<?= $value['name'] ?>"><?= $value['name']; ?></a> </div>
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
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>