<section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
        <div class="col-main" id="delCart">
            <div class="cart delCartLoad">
                <div class="page-title">
                    <h2 style="text-align: center; color:green;">Giỏ hàng</h2>
                </div>
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                ?>
                    <div class="table-responsive">
                        <form method="post" action="#">
                            <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                            <fieldset>
                                <table class="data-table cart-table" id="shopping-cart-table" >
                                    <thead>
                                        <tr class="first last">
                                             <th rowspan="1"> <input type="checkbox"> Tất cả</th>
                                            <th rowspan="1">Hình ảnh</th>
                                            <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                                            <th rowspan="1" class="hidden-phone"></th>
                                            <th colspan="1" class="a-center"><span class="nobr">Đơn giá</span></th>
                                            <th class="a-center " rowspan="1">Số lượng</th>
                                            <th colspan="1" class="a-center">Thành tiền</th>
                                            <th class="a-center" rowspan="1">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="first last">
                                            <td class="a-right last" colspan="8"><a href="index.php" class="button btn-continue" title="Continue Shopping"><span>Continue Shopping</span></a>
                                                <button class="button btn-update updateCart" title="Update Cart" value="update_qty" name="update_cart_action" ><span>Update Cart</span></button>
                                                <a href="index.php?page=cart&method=delAllCart" class="button btn-update" title="Clear Cart"><span>Clear Cart</span></a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $totalMoneyCart = 0;
                                        foreach ($_SESSION['cart'] as $value) {
                                            $moneyDetailProduct = $value['quantity'] * $value['price'];
                                            $totalMoneyCart += $moneyDetailProduct;
                                        ?>
                                            <tr class="first odd">
                                                 <td><input type="checkbox"> </td>
                                                <td class="image"><a class="product-image" title="Sample Product" href="index.php?page=product&method=productDetail&id=<?=$value['id'];?>"><img style="width: 100px;" alt="Sample Product" src="assets/images/products/<?=$value['main_image'];?>"></a></td>
                                                <td>
                                                    <h2 class="product-name"> <a href="index.php?page=product&method=productDetail&id=<?=$value['id'];?>"><?=$value['name'];?></a> </h2>
                                                </td>
                                                <?php
                                                    if($value['name_size'] != 'default'){
                                                ?>
                                                    <td class="a-center hidden-table">Phân loại : <?=$value['name_size']?></td>
                                                <?php
                                                    }else{
                                                ?>
                                                    <td class="a-center hidden-table"></td>
                                                <?php    
                                                    }
                                                ?>
                                                
                                                <td class="a-center hidden-table"><span class="cart-price"> <span class="price"><?= number_format($value['price'], 0, '', '.') . " vnđ"; ?></span> </span></td>

                                                <td class="a-center movewishlist"><input maxlength="12" name_size='<?=$value['name_size']?>' style="text-align: center; width: 50px;" type="number" name="quantitys" product_id='<?=$value['id']?>' class="input-text qty update-cart" title="Qty" size="4" value="<?=$value['quantity']?>" ></td>

                                                <td class="a-center movewishlist"><span class="cart-price"> <span class="price"><?= number_format($moneyDetailProduct, 0, '', '.') . " vnđ"; ?></span> </span></td>
                                                
                                                <td class="a-center last"><a class="button remove-item delOneProductCart" name_size="<?=$value['name_size']?>" product_id="<?=$value['id'];?>" title="Remove item" href="#"><span>Remove item</span></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </fieldset>
                        </form>
                    </div>
                    <!-- BEGIN CART COLLATERALS -->
                    <div class="cart-collaterals row">
                        <div class="col-sm-4">
                            <div class="discount">
                                <h3>Mã giảm giá</h3>
                                <!-- <form method="post" action="#" id="discount-coupon-form"> -->
                                    <label for="coupon_code">Nhập mã phiếu giảm giá của bạn.</label>
                                    <input type="hidden" value="0" id="remove-coupone" name="remove">
                                    <input type="text" <?php if(isset($_SESSION['gift_code']) && !empty($_SESSION['gift_code'])){?> value="<?=$_SESSION['gift_code']?>" <?php echo 'disabled';} ?>  name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                    <button value="Apply Coupon"  <?php if(isset($_SESSION['gift_code']) && !empty($_SESSION['gift_code'])){?> value="<?=$_SESSION['gift_code']?>" <?php echo 'disabled';} ?> class="button coupon checkDisCount" title="Apply Coupon"><span>Áp dụng</span></button>
                                <!-- </form> -->
                            </div>
                        </div>
                        <div class="col-sm-3">
                        </div>
                        <div class="totals col-sm-5">
                            <h3>Tổng số giỏ hàng</h3>
                            <div class="inner">
                                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                                    <tfoot>
                                        <tr>
                                            <td colspan="1" class="a-left"><strong>Thành tiền</strong></td>
                                            <td class="a-right"><strong><span class="price"><?php if(isset($_SESSION['checkDiscount']) && !empty($_SESSION['checkDiscount'])){
                                              echo number_format($totalMoneyCart-$_SESSION['checkDiscount'], 0, '', '.') . " vnđ";
                                            }else{echo number_format($totalMoneyCart, 0, '', '.') . " vnđ";}  ?></span></strong></td>
                                        </tr>
                                        
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td colspan="1" class="a-left"> Tổng cộng </td>
                                            <td class="a-right"><span class="price"><?= number_format($totalMoneyCart, 0, '', '.') . " vnđ"; ?></span></td>
                                        </tr>
                                        <?php
                                            if(isset($_SESSION['checkDiscount']) && !empty($_SESSION['checkDiscount'])){
                                        ?>
                                        <tr>
                                            <td colspan="1" class="a-left"> Áp dụng phiếu giảm giá </td>
                                            <td class="a-right"><span class="price" style="color: red;">-<?= number_format($_SESSION['checkDiscount'], 0, '', '.') . " vnđ"; ?></span></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <ul class="checkout">
                                    <li>
                                        <a href="index.php?page=cart&method=checkoutCart"><button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button></a>
                                    </li>
                                    <li><a title="Checkout with Multiple Addresses" href="#">Checkout with Multiple Addresses</a> </li>

                                </ul>
                            </div>
                            <!--inner-->

                        </div>
                    </div>

                    <!--cart-collaterals-->

            </div>
            <div class="crosssel wow bounceInUp animated">
                <div class="">
                    <h2>Based on your selection, you may be interested in the following items:</h2>
                </div>
                <div class="category-products">
                    <ul class="products-grid crosssel-pro">
                        <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"> <a href="product_detail.html" title="Sample Product" class="product-image"> <img src="products-images/product11.jpg" alt="Sample Product"> </a>
                                        <div class="new-label new-top-left">New</div>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                                    <span class="add-to-links"> <a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a href="product_detail.html" title="Sample Product"> Sample Product </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:80%"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price" id="product-price-1"> <span class="price">$125.00</span> </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"> <a href="product_detail.html" title="Sample Product" class="product-image"> <img src="products-images/product12.jpg" alt="Sample Product"> </a>
                                        <div class="sale-label sale-top-left">Sale</div>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                                    <span class="add-to-links"> <a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a href="product_detail.html" title="Sample Product"> Sample Product </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:40%"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $100.00 </span> </p>
                                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $90.00 </span> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"> <a href="product_detail.html" title="Sample Product" class="product-image"> <img src="products-images/product13.jpg" alt="Sample Product"> </a>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                                    <span class="add-to-links"> <a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a href="product_detail.html" title="Sample Product"> Sample Product </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:0%"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $100.00 </span> </p>
                                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $90.00 </span> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"> <a href="product_detail.html" title="Sample Product" class="product-image"> <img src="products-images/product14.jpg" alt="Sample Product"> </a>
                                        <div class="item-box-hover">
                                            <div class="box-inner">
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                                                    <span class="add-to-links"> <a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a href="product_detail.html" title="Sample Product"> Sample Product </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div class="rating" style="width:100%"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $100.00 </span> </p>
                                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $90.00 </span> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        <?php
                } else {
        ?>
            <div style="width: 500px ; margin: 0 auto;"><img src="assets/images/cart/emtycart.png" alt=""></div>
        <?php
                }
        ?>
        </div>
    </div>
</section>
<div class="top-banner-section wow bounceInUp animated">
    <?php
    include_once "views/layout/top_banner_section.php";
    ?>
</div>
<!-- end banner section -->
<div class="brand-logo">
    <?php
    include_once "views/layout/brand_logo.php";
    ?>
</div>