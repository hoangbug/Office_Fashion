<div class="main-container col2-right-layout wow bounceInUp animated">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9">
                <div class="my-account">
                    <div class="page-title">
                        <h2>Sản phẩm yêu thích</h2>
                    </div>
                    <div class="my-wishlist" id='loadWishList'>
                        <div class="table-responsive" id='loadWishListss'>
                            <form method="post" action="#" id="wishlist-view-form">
                                <fieldset>
                                    <input type="hidden" value="ROBdJO5tIbODPZHZ" name="form_key">
                                    <table id="wishlist-table" class="clean-table linearize-table data-table">
                                        <thead>
                                            <tr class="first last">
                                                <th class="customer-wishlist-item-image"></th>
                                                <th class="customer-wishlist-item-quantity">Tên</th>
                                                <th class="customer-wishlist-item-price">Giá</th>
                                                <th class="customer-wishlist-item-cart">Lựa chọn</th>
                                                <th class="customer-wishlist-item-remove"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['likeProduct']) && !empty($_SESSION['likeProduct'])) {
                                                foreach ($_SESSION['likeProduct'] as  $value) {

                                            ?>
                                                    <tr id="item_31" class="first odd">
                                                        <td class="wishlist-cell0 customer-wishlist-item-image"><a title="Sample Product" href="index.php?page=product&method=productDetail&id=<?=$value['id']?>" class="product-image"> <img width="150" height="150" alt="Sample Product" src="assets/images/products/<?=$value['main_image']?>"> </a></td>
                                                        <td class="wishlist-cell1 customer-wishlist-item-info">
                                                            <h3 class="product-name"><a title="Sample Product" href="product_detail.html"><?=$value['name']?></a></h3>
                                                        </td>
                                                        <td data-rwd-label="Price" class="wishlist-cell3 customer-wishlist-item-price">

                                                            <div class="cart-cell">
                                                                <div class="price-box"> <span class="regular-price"> <span class="price"><?= number_format($value['price'], 0, ',', '.'); ?> đ</span> </span> </div>
                                                            </div>
                                                        </td>
                                                        <td class="wishlist-cell4 customer-wishlist-item-cart">
                                                            <a href="index.php?page=product&method=productDetail&id=<?=$value['id']?>">
                                                            <div class="cart-cell">
                                                                <button class="button btn-cart" title="Add to Cart" type="button"><span><span>Add to Cart</span></span></button>
                                                            </div>
                                                            </a>
                                                            <p><a href="#" class="">Edit</a></p>
                                                        </td>
                                                        <td class="wishlist-cell5 customer-wishlist-item-remove last"><a class="remove-item del-wishlist" title="Clear Cart" product_id='<?=$value['id']?>' href="#"><span><span></span></span></a></td>
                                                    </tr>
                                            <?php
                                                    # code...
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <div class="buttons-set buttons-set2">
                                        <button class="button btn-share" title="Share Wishlist" name="save_and_share" type="submit"><span>Share Wishlist</span></button>
                                        <button class="button btn-add" title="Add All to Cart" type="button"><span>Add All to Cart</span></button>
                                        <button class="button btn-update" title="Update Wishlist" name="do" type="submit"><span>Update Wishlist</span></button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="buttons-set">
                        <p class="back-link"><a href="#"><small>« </small>Back</a></p>
                    </div>
                </div>
            </div>
            <aside class="col-right sidebar col-sm-3">
                <div class="block block-account">
                    <div class="block-title">My Account</div>
                    <div class="block-content">
                        <ul>
                            <li><a href="dashboard.html">Account Dashboard</a></li>
                            <li><a href="#">Account Information</a></li>
                            <li><a href="#">Address Book</a></li>
                            <li><a href="#">My Orders</a></li>
                            <li><a href="#">Billing Agreements</a></li>
                            <li><a href="#">Recurring Profiles</a></li>
                            <li><a href="#">My Product Reviews</a></li>
                            <li><a href="#">My Tags</a></li>
                            <li class="current"><a>My Wishlist</a></li>
                            <li><a href="#">My Downloadable</a></li>
                            <li class="last"><a href="#">Newsletter Subscriptions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="block block-compare">
                    <div class="block-title ">Compare Products (2)</div>
                    <div class="block-content">
                        <ol id="compare-items">
                            <li class="item odd">
                                <input type="hidden" value="2173" class="compare-item-id">
                                <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> Sofa with Box-Edge Polyester Wrapped Cushions</a>
                            </li>
                            <li class="item last even">
                                <input type="hidden" value="2174" class="compare-item-id">
                                <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> Sofa with Box-Edge Down-Blend Wrapped Cushions</a>
                            </li>
                        </ol>
                        <div class="ajax-checkout">
                            <button type="submit" title="Submit" class="button button-compare"><span>Compare</span></button>
                            <button type="submit" title="Submit" class="button button-clear"><span>Clear</span></button>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>