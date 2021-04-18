<div class="container">
    <div class="row">
        <div class="nav-inner col-lg-12">
            <ul id="nav" class="hidden-xs">
                <li class="level0 parent drop-menu <?php if(isset($_GET['page'])){if($_GET['page'] == "home"){echo "active";}}else{echo "active";} ?>"><a href="index.php"><span>Home</span></a>
                    <!-- <ul class="level1">
                        <li class="level1 first parent"><a href="index.php"><span>Home Version 1</span></a>
                        </li>
                        <li class="level1 parent"><a href="../version_2/index.php"><span>Home Version
                                    2</span></a></li>
                        <li class="level1 parent"><a href="../version_3/index.php"><span>Home Version
                                    3</span></a></li>

                                </ul> -->
                            </li>
                            <li class="mega-menu <?php if(isset($_GET['page']) && $_GET['page'] == 'women'){echo "active";} ?>"><a href="index.php?page=women" class="level-top"><span>Women</span></a>
                                <div style="left: 0px; display: none;" class="level0-wrapper dropdown-6col">
                                    <div class="container">
                                        <div class="level0-wrapper2">
                                            <div class="col-1">
                                                <div class="nav-block nav-block-center">
                                                    <ul class="level0">
                                                        <li class="level1 nav-6-1 parent item"><a href="grid.html" class=""><span>Stylish Bag</span></a>
                                                            <ul class="level1">
                                                                <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Clutch Handbags</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Diaper Bags</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Bags</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html" class=""><span>Hobo handbags</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Material Bag</span></a>
                                                            <ul class="level1">
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Beaded
                                                                Handbags</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Fabric
                                                                Handbags</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Handbags</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Leather
                                                                Handbags</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Shoes</span></a>
                                                            <ul class="level1">
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Flat Shoes</span></a>
                                                                </li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Flat Sandals</span></a>
                                                                </li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Boots</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Heels</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Jwellery</span></a>
                                                            <ul class="level1">
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Bracelets</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid-2.html"><span>Necklaces &amp;
                                                                Pendent</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Pendants</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Pins &amp;
                                                                Brooches</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Dresses</span></a>
                                                            <ul class="level1">
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casual Dresses</span></a>
                                                                </li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Evening</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Designer</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Party</span></a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Swimwear</span></a>
                                                            <ul class="level1">
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Swimsuits</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="#/swimwear/beach-clothing.html"><span>Beach
                                                                Clothing</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Clothing</span></a></li>
                                                                <li class="level2 nav-6-1-1"><a href="grid.html"><span>Bikinis</span></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--nav-block nav-block-center-->
                                            <div class="col-2">
                                                <div class="menu_image"><a href="#" title=""><img src="assets/images/menu_image.jpg" alt="menu_image"></a></div>
                                                <div class="menu_image1"><a href="#" title=""><img src="assets/images/menu_image1.jpg" alt="menu_image"></a></div>
                                            </div>
                                        </div>
                                        <!--level0-wrapper2-->
                                    </div>
                                </div>
                            </li>
                            <li class="mega-menu <?php if(isset($_GET['page']) && $_GET['page'] == 'men'){echo "active";} ?>"><a href="index.php?page=men" class="level-top"><span>Men</span></a>
                                <div style="left: 0px; display: none;" class="level0-wrapper dropdown-6col">
                                    <div class="container">
                                        <div class="level0-wrapper2">
                                            <div class="nav-block nav-block-center">
                                                <ul class="level0">
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html" class=""><span>Shoes</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Sport
                                                            Shoes</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casual Shoes</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Leather Shoes</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>canvas shoes</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Dresses</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casual Dresses</span></a>
                                                            </li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Evening</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Designer</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Party</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Jackets</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Coats</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Formal Jackets</span></a>
                                                            </li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Leather Jackets</span></a>
                                                            </li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Blazers</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Watches</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Fasttrack</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casio</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Titan</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Tommy-Hilfiger</span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Sunglasses</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Ray
                                                            Ban</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Fasttrack</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Police</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Oakley</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Accesories</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Backpacks</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Wallets</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Laptops Bags</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Belts</span></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--level0-wrapper2-->
                                            <div class="nav-add">
                                                <div class="push_item">
                                                    <div class="push_img"><a href="#"><img alt="sunglass" src="assets/images/menu_man_sunglass.png"></a></div>
                                                </div>
                                                <div class="push_item">
                                                    <div class="push_img"><a href="#"><img alt="watch" src="assets/images/menu_man_watch.png"></a></div>
                                                </div>
                                                <div class="push_item">
                                                    <div class="push_img"><a href="#"><img alt="jeans" src="assets/images/menu_man_jeans.png"></a></div>
                                                </div>
                                                <div class="push_item push_item_last">
                                                    <div class="push_img"><a href="#"><img alt="shoes" src="assets/images/menu_man_shoes.png"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mega-menu <?php if(isset($_GET['page']) && $_GET['page'] == 'clothesSet'){echo "active";} ?>"><a href="index.php?page=clothesSet" class="level-top"><span>Suit</span></a>
                                <div style="left: 0px; display: none;" class="level0-wrapper dropdown-6col">
                                    <div class="container">
                                        <div class="level0-wrapper2">
                                            <div class="nav-block nav-block-center">
                                                <ul class="level0">
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html" class=""><span>Shoes</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Sport
                                                            Shoes</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casual Shoes</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Leather Shoes</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>canvas shoes</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Dresses</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casual Dresses</span></a>
                                                            </li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Evening</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Designer</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Party</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Jackets</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Coats</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Formal Jackets</span></a>
                                                            </li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Leather Jackets</span></a>
                                                            </li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Blazers</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Watches</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Fasttrack</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Casio</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Titan</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Tommy-Hilfiger</span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Sunglasses</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Ray
                                                            Ban</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Fasttrack</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Police</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Oakley</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="level1 nav-6-1 parent item"><a href="grid.html"><span>Accesories</span></a>
                                                        <ul class="level1">
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Backpacks</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Wallets</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Laptops Bags</span></a></li>
                                                            <li class="level2 nav-6-1-1"><a href="grid.html"><span>Belts</span></a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--level0-wrapper2-->
                                            <div class="nav-add">
                                                <div class="push_item">
                                                    <div class="push_img"><a href="#"><img alt="sunglass" src="assets/images/menu_man_sunglass.png"></a></div>
                                                </div>
                                                <div class="push_item">
                                                    <div class="push_img"><a href="#"><img alt="watch" src="assets/images/menu_man_watch.png"></a></div>
                                                </div>
                                                <div class="push_item">
                                                    <div class="push_img"><a href="#"><img alt="jeans" src="assets/images/menu_man_jeans.png"></a></div>
                                                </div>
                                                <div class="push_item push_item_last">
                                                    <div class="push_img"><a href="#"><img alt="shoes" src="assets/images/menu_man_shoes.png"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                <li class="level0 nav-8 level-top <?php if(isset($_GET['page']) && $_GET['page'] == 'product' && $_GET['method'] == 'wishlist' ){echo "active";} ?>"><a href="index.php?page=product&method=wishlist"  class="level-top"><span>Wishlist</span></a></li>
                <li class="level0 nav-8 level-top"><a href="grid.html" class="level-top"><span>Kids</span></a></li>
                <li class="level0 nav-8 level-top <?php if(isset($_GET['page']) && $_GET['page'] == 'blog'){echo "active";} ?>"><a href="index.php?page=blog" class="level-top"><span>Blog</span></a></li>
                <li class="nav-custom-link mega-menu"> <a class="level-top" href="#"><span>Custom</span></a>
                    <div class="level0-wrapper custom-menu" style="left: 0px; display: none;">
                        <div class="container">
                            <div class="header-nav-dropdown-wrapper clearer">
                                <div class="grid12-5">
                                    <div class="custom_img"><a href="#"><img src="assets/images/custom-img1.jpg" alt="custom img1"></a></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                    fringilla augue.</p>
                                    <button class="learn_more_btn" title="Add to Cart" type="button"><span>Learn More</span></button>
                                </div>
                                <div class="grid12-5">
                                    <div class="custom_img"><a href="#"><img src="assets/images/custom-img2.jpg" alt="custom img2"></a></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                    fringilla augue.</p>
                                    <button class="learn_more_btn" title="Add to Cart" type="button"><span>Learn More</span></button>
                                </div>
                                <div class="grid12-5">
                                    <div class="custom_img"><a href="#"><img src="assets/images/custom-img3.jpg" alt="custom img3"></a></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                    fringilla augue.</p>
                                    <button class="learn_more_btn" title="Add to Cart" type="button"><span>Learn More</span></button>
                                </div>
                                <div class="grid12-5">
                                    <div class="custom_img"><a href="#"><img src="assets/images/custom-img4.jpg" alt="custom img4"></a></div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                    fringilla augue.</p>
                                    <button class="learn_more_btn" title="Add to Cart" type="button"><span>Learn More</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="level0 nav-8 level-top <?php if(isset($_GET['page']) && $_GET['page'] == 'affiliate'){echo "active";} ?>"><a href="index.php?page=affiliate&method=viewAffiliate" class="level-top"><span>Affiliate</span></a></li>
            </ul>
            <div class="menu_top">
                
                <div class="top-cart-contain pull-right" id="mini-carts">
                    <!-- Top Cart -->
                    <div class="mini-cart" id="detail-mini-cart">
                    <div data-toggle="dropdown" data-hover="dropdown"  class="basket dropdown-toggle"><a href="index.php?page=cart&method=viewCart"><span class="hidden-xs">Giỏ hàng (<?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {echo count($_SESSION['cart']);} else {echo 0;} ?>)</span></a></div>
                        <div>
                            <div class="top-cart-content" style="display: none;">
                                <?php
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    $totalMoneyCart = 0;
                                    foreach ($_SESSION['cart'] as $value) {
                                        $moneyDetailProduct = $value['quantity'] * $value['price'];
                                        $totalMoneyCart += $moneyDetailProduct;
                                    }
                                    ?>
                                    <div class="block-subtitle">
                                        <div class="top-subtotal">Số lượng : <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                            echo count($_SESSION['cart']);
                                        } else {
                                            echo 0;
                                        } ?>    <span class="price"><?= number_format($totalMoneyCart, 0, '', '.') . " vnđ"; ?></span>
                                    </div>
                                    <!--top-subtotal-->
                                    <div class="pull-right">
                                        <a href="index.php?page=cart&method=viewCart"><button title="View Cart" class="view-cart" type="button"><span>Chi tiết </span></button></a>
                                    </div>
                                    <!--pull-right-->
                                </div>
                                <!--block-subtitle-->
                                <ul class="mini-products-list" id="cart-sidebar">
                                    <?php
                                    $count = 0;
                                    // echo '<pre>';
                                    // print_r($_SESSION['cart']);
                                    // echo '</pre>';
                                    foreach ($_SESSION['cart'] as $value) {
                                        $count++;
                                        $moneyDetailProduct = $value['quantity'] * $value['price'];
                                        if ($count < 4) {
                                            ?>
                                            <li class="item first">
                                                <div class="item-inner"><a class="product-image" title="Sample Product" href="#l"><img alt="Sample Product" src="assets/images/products/<?= $value['main_image'] ?>"></a>
                                                    <div class="product-details">
                                                        <div class="access"><a class="btn-remove1 delOneProductCart" name_size="<?=$value['name_size']?>" product_id="<?=$value['id'];?>" title="Xóa khỏi giỏ hàng" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                                        <a href="index.php?page=product&method=productDetail&id=<?= $value['id']; ?>"><h4 class="product-name"><?= $value['name']; ?><span> <?php if(($value['name_size']) != 'default'){echo '('.$value['name_size'].')';}else{echo "";}?></span></h4></a>
                                                        <h5><?= $value['quantity']; ?> x <span class="price"><?= number_format($value['price'], 0, '', '.') . "đ"; ?></span></h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }
                                    $count = count($_SESSION['cart']);
                                    if ($count > 3) {
                                        ?>
                                        <li class="item first">
                                            <a href="index.php?page=cart&method=viewCart" class="view-cart" style="display: block; margin:0px 0px 0px 115px;" type="button">Xem tất cả</a>

                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="actions">
                                    <a href="index.php?page=cart&method=checkoutCart"> <button class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button></a>
                                    
                                </div>
                                <!--actions-->
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- Top Cart -->
                <div id="ajaxconfig_info" style="display:none"><a href="#/"></a>
                    <input value="" type="hidden">
                    <input id="enable_module" value="1" type="hidden">
                    <input class="effect_to_cart" value="1" type="hidden">
                    <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                </div>
            </div>
        </div>
    </div>
</div>
</div>