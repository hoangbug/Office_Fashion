<?php
if (isset($_SESSION['nameMember'])) {
    $totalMoneyCarts = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $detailMoney = $value['quantity'] * $value['price'];
        $totalMoneyCarts += $detailMoney;
    }
?>

    <div class="main-container col2-right-layout bounceInUp animated">
        <div class="main container">
            <div class="row">
                <form action="" method="POST">
                <div class="col-main col-sm-5">
                    <div class="page-title">
                        <h2 style="color: #2ecc71 ;">Thanh toán</h2>
                    </div>
                    <ol class="one-page-checkout" id="checkoutSteps">
                        <li id="opc-shipping">
                            <div class="step-title"> <span class="number">1</span>
                                <h3 class="one_page_heading"> Thông tin </h3>
                            </div>
                            <div class="content">
                                <ul class="form-list">
                                    <li>
                                        <label for="name">Họ tên <span class="required">*</span></label>
                                        <br>
                                        <input type="text" style="display:none;" name="total_money" value="<?=$totalMoneyCarts?>">
                                        <input type="text" style="display:none;" title="member_id" class="input-text" id="member_id" value="<?= $_SESSION['idMember']; ?>" name="member_id">
                                        <input type="text" style="color: grey; font-weight:bold;" title="name" class="input-text" id="name" value="<?= $_SESSION['nameMember']; ?>" name="name">
                                    </li>
                                    <li>
                                        <label for="phone">Số điện thoại <span class="required">*</span></label>
                                        <br>
                                        <input type="text" style="color: grey; font-weight:bold;" title="phone" id="phone" class="input-text" value="<?= $_SESSION['phoneMember']; ?>" name="phone">
                                    </li>
                                    <li>
                                        <label for="address">Địa chỉ<span class="required">*</span></label>
                                        <br>
                                        <input type="text" style="color: grey; font-weight:bold;" title="address" id="address" class="input-text" value="<?= $_SESSION['addressMember']; ?>" name="address">
                                    </li>
                                    <li>
                                        <label for="email">Email<span class="required">*</span></label>
                                        <br>
                                        <input type="email" style="color: grey; font-weight:bold;" title="email" id="email" class="input-text" value="<?= $_SESSION['emailMember']; ?>" name="email">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li id="opc-shipping" class="section">
                            <div class="step-title"> <span class="number">2</span>
                                <h3 class="one_page_heading"> Phương thức vận chuyển</h3>
                            </div>
                            <div class="content">
                                <ul class="form-list">
                                    <li>
                                        <input type="radio" name="ship_method" id="billing:use_for_shipping_yes" value="1" checked="checked" class="radio">
                                        <label for="billing:use_for_shipping_yes">Giao hàng nhanh(từ 1-3 ngày)</label>
                                        <br>
                                        <input type="radio" name="ship_method" id="billing:use_for_shipping_no" value="2" class="radio">
                                        <label for="billing:use_for_shipping_no">Giao hàng tiết kiệm(từ 3-7 ngày)</label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li id="opc-shipping" class="section">
                            <div class="step-title"> <span class="number">3</span>
                                <h3 class="one_page_heading"> Phương thức thanh toán</h3>
                            </div>
                            <div class="content">
                                <ul class="form-list">
                                    <li>
                                        <input type="radio" name="pay_method" id="pay_method" value="1" checked="checked" class="radio">
                                        <label for="pay_method">Thanh toán khi nhận hàng</label>
                                        <br>
                                        <input type="radio" name="pay_method" id="pay_method" disabled value="0" class="radio">
                                        <label for="pay_method">Thanh toán bằng Shop xu</label>
                                         <br>
                                        <input type="radio" name="pay_method" id="pay_method" value="2" disabled class="radio">
                                        <label for="pay_method">Thanh toán bằng ví AriPay</label>
                                        <br>
                                        <input type="radio" name="pay_method" id="pay_method" disabled value="3" class="radio">
                                        <label for="pay_method">Thanh toán bằng ZaloPay</label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li id="opc-shipping" class="section">
                            <div class="step-title"> <span class="number">4</span>
                                <h3 class="one_page_heading"> Ghi chú</h3>
                            </div>
                            <div class="content">
                                <ul class="form-list">
                                    <li>
                                        <textarea name="note" style="width: 457px; height: 150px;" placeholder="Tại đây bạn có thể thay đổi địa chỉ giao hàng"></textarea>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ol>
                    <div class="buttons-set">
                        <button  name="checkout" type="submit" class="button" style="background:#2ecc71 ; color:white;">Đặt hàng</button>
                    </div>
                </div>
                </form>
                <aside class="col-right sidebar col-sm-7">
                    <div class="block block-progress">
                        <div class="block-title ">Thông tin đơn hàng của bạn</div>
                        <div class="block-content">
                            <table style="text-align: center;">
                                <tr>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 15px 10px 15px; color:green; font-weight:bold;">#</td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:green; font-weight:bold;">Sản phẩm</td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:green; font-weight:bold;">Phân loại</td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:green; font-weight:bold;">Số lượng</td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:green; font-weight:bold;">Đơn giá</td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:green; font-weight:bold;">Thành tiền</td>
                                    
                                </tr>
                                <?php
                                $count = 1;
                                $totalMoneyCart = 0;
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $detailMoney = $value['quantity'] * $value['price'];
                                    $totalMoneyCart += $detailMoney;
                                ?>
                                    <tr>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 15px 10px 15px; color:grey;"><?=$count++;?></td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:grey;"><?=$value['name'];?></td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:grey;"><?php if($value['name_size'] != 'default'){echo $value['name_size'];}?></td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:grey;"><?=$value['quantity']?></td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:grey;"><?=number_format($value['price'], 0, '', '.')."đ";?></td>
                                    <td style="border: 1px solid #cbcbcb; padding : 10px 24px 10px 24px; color:grey;"><?=number_format($detailMoney, 0, '', '.') . " vnđ";?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <?php
                                    if(isset($_SESSION['checkDiscount']) && !empty($_SESSION['checkDiscount'])){
                                    ?>
                                <tr>
                                    <td colspan="6" style="border: 1px solid #cbcbcb; color:green;padding:10px; font-weight:bold;">Áp dụng phiếu giảm giá : -<?=number_format($_SESSION['checkDiscount'], 0, '', '.') ." vnđ";?></td>
                                </tr>
                                    <?php
                                    }
                                    ?>
                                <tr>
                                    <td colspan="6" style="border: 1px solid #cbcbcb; color:green;padding:10px; font-weight:bold;">Tổng cộng : <?php  if(isset($_SESSION['checkDiscount']) && !empty($_SESSION['checkDiscount'])){echo number_format($totalMoneyCart-$_SESSION['checkDiscount'], 0, '', '.') ." vnđ"; }else{echo number_format($totalMoneyCart, 0, '', '.') ." vnđ";} ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <div style="width: 100px; height: 50px;"></div>

    <!-- Main Container End -->
    <div class="top-banner-section wow bounceInUp animated">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-6">
                    <div class="col add-banner1">
                        <div class="top-b-text"><strong>Designer Shoes</strong> For Women</div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-6">
                    <div class="col free-shipping"><strong>Free Shipping</strong> on order over $199</div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-6">
                    <div class="col add-banner2">
                        <div class="top-b-text"><strong>Luxury Handbags</strong>2015 New Arrive</div>
                    </div>



                </div>
                <div class="col-lg-3 col-sm-3 col-xs-6">
                    <div class="col last offer"><strong>New Collection</strong> Lorem ipsum.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end banner section -->
    <div class="brand-logo">
        <div class="container">
            <div class="slider-items-products">
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="assets/images/b-logo1.png" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="assets/images/b-logo2.png" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="assets/images/b-logo3.png" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="assets/images/b-logo4.png" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="assets/images/b-logo5.png" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="assets/images/b-logo6.png" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="assets/images/b-logo1.png" alt="Image"></a> </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item"><a href="#"><img src="images/b-logo4.png" alt="Image"></a> </div>
                        <!-- End Item -->

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    $_SESSION['checkLoginCheckout'] = 1;
    header('Location:index.php?page=member&method=loginMember');
}
?>