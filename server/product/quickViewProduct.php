<?php
$useAjax = 1;
include_once '../../controller/productController.php';
$product = new productController();
if(isset($_GET['product_id'])){
    $id = (int)$_GET['product_id'];
$product->quickViewProduct($id);
   $selectProductId = $product->selectAllId_c($id);

   $getDetailImagesProduct = $product->getDetailImagesProduct_c($id);

   $getQuantitySizeProduct = $product->getQuantitySizeProduct_c($id);
?>

<div class="noti"></div>
<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="row">
                <div class="col-md-9">
                <div class="product-view">
                    <div class="product-essential">
                        <form action="#" method="post" id="product_addtocart_form">
                            <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                            <div class="product-img-box col-sm-5 col-xs-12 bounceInRight animated">
                                <div class="new-label new-top-left"> New </div>
                                <div class="product-image">
                                    <div class="large-image"> <a href="assets/images/products/<?= $selectProductId['main_image'] ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:10"> <img alt="Thumbnail" src="assets/images/products/<?= $selectProductId['main_image'] ?>"> </a> </div>
                                    <div class="flexslider flexslider-thumb">
                                        <ul class="previews-list slides">
                                            <?php
                                            foreach ($getDetailImagesProduct as $value) {
                                            ?>
                                                <li><a href='assets/images/detail_image_products/<?= $value['sub_images'] ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'assets/images/detail_image_products/<?= $value['sub_images'] ?>' "><img src="assets/images/detail_image_products/<?= $value['sub_images'] ?>" alt="" style="height: 91.84px;" /></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <div class="product-shop col-sm-7 col-xs-12 bounceInUp animated">
                                <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                                <div class="product-name">
                                    <h1><?= $selectProductId['name'] ?></h1>
                                </div>
                                <div class="short-description">
                                    <!--<h2>Quick Overview</h2>-->
                                    <p><?= $selectProductId['description'] ?></p>
                                </div>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:90%" class="rating"></div>
                                    </div>
                                    <p class="rating-links"> <a href="#">1 Đánh giá(s)</a> <span class="separator">|</span> <a href="#">Thêm đánh giá của bạn</a> </p>
                                </div>
                                <p class="availability in-stock pull-right"><span>In Stock</span></p>
                                <div class="price-block">
                                    <div class="price-box">

                                        <?php
                                        if ($selectProductId['sale'] != 0) {
                                        ?>
                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> <?= number_format($selectProductId['price'], 0, ',', '.'); ?> đ </span> </p>
                                            <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> <?= number_format($selectProductId['price'], 0, ',', '.'); ?> đ </span> </p>
                                        <?php
                                        } else {
                                        ?>
                                            <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> <?= number_format($selectProductId['price'], 0, ',', '.'); ?> đ </span> </p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="add-to-box">
                                    <div class="add-to-cart">
                                        <?php
                                        if ($getQuantitySizeProduct[0]['name_size'] != 'default') {
                                            
                                        ?>
                                        <input type="text" id="sizeDefault" style="display:none;" value="0">
                                        <div style="margin-bottom:20px; padding:10px 10px 10px 0px;" class="checkSize">
                                            <label for="">Size:</label>
                                            <div class="">
                                                <div class="">
                                                    <?php
                                                        $totalProduct = 0;
                                                        foreach ($getQuantitySizeProduct as $value) {
                                                            $totalProduct += $value['quantity'];
                                                    ?>
                                                        <button class="sizeProduct" quantitySize="<?=$value['quantity']?>" detailSizeProduct="<?=$value['name_size']?>" style="width: 50px; height: 30px;outline: none; background:white; border : 1px #ddd solid;text-align: center; <?php if($value['quantity'] == 0){echo "color:#ddd";}?>" <?php if($value['quantity'] == 0){echo "disabled";}?>><?=$value['name_size']?></button>
                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <div id="noti-checksize" style="padding: 10px; color:red;"></div>
                                        </div>
                                        <?php
                                        }else{
                                        ?>
                                            <input type="text" id="sizeDefault" style="display:none;" value="1">
                                        <?php
                                        }
                                        ?>
                                        <label for="qty">Số lượng:</label>
                                        <div class="pull-left">
                                            <div class="custom pull-left">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count checkVal" type="button"><i class="icon-minus">&nbsp;</i></button> 
                                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="5" id="qty" name="qty">

                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count checkVal" type="button"><i class="icon-plus">&nbsp;</i></button>
                                                
                                                 <input id="totalProduct" style="display:none;" value="<?php if(!isset($totalProduct)){echo $getQuantitySizeProduct[0]['quantity'] ;}else{echo $totalProduct;} ?>"> 
                                                 <span class="quantityProduct"><?php if(!isset($totalProduct)){echo $getQuantitySizeProduct[0]['quantity'] ;}else{echo $totalProduct;} ?> Sản phẩm có sẵn</span>
                                            </div> 
                                        </div>
                                        <p> <button style="margin-top:20px;" product_id="<?=$selectProductId['id']?>" class="button btn-cart addProductToCart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Thêm vào giỏ hàng</span></button>
                                        <button style="margin-top:20px; background : #ee4d2d; " class="button btn-cart addProductToCartNow" title="Add to Cart" type="button"><span> Mua ngay</span></button></p>
                                    </div>
                                    <div class="email-addto-box">

                                        <ul class="add-to-links">
                                            <li> <a class="link-wishlist" href="wishlist.html"><span>Thêm vào yêu thích</span></a></li>
                                            <li><span class="separator">|</span> <a class="link-compare" href="compare.html"><span>So sánh</span></a></li>
                                        </ul>
                                        <p class="email-friend"><a href="#" class=""><span>Gửi email cho bạn bè</span></a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="assets/js/cloud-zoom.js"></script>
<script type="text/javascript">
var sizeDefault = $('#sizeDefault').val();
var sizeProduct = 0;


$(document).on('click', '.sizeProduct', function(e) {
    e.preventDefault();
    var quantitySize = $(this).attr('quantitySize');
    $('#totalProduct').val(quantitySize);
    $('.quantityProduct').html(quantitySize + ' sản phẩm có sẵn');
    sizeProduct = $(this).attr('detailSizeProduct');
    $('.sizeProduct').css({ 'background': 'white', 'border': '1px #ddd solid' });
    $(this).css({ 'background': 'pink', 'border': '1px red solid' });
    $('.checkSize').css({ 'background': 'white' });
    $('#noti-checksize').html('');
});


// so lượng tăng giảm
$('#qty').mouseleave(function() {
    var quantity = $('#qty').val();
    var totalProduct = $('#totalProduct').val();
    if (quantity < 0 || quantity == 0 || isNaN(quantity)) {
        $('#qty').val(1);
    }
});

$('.increase').mouseover(function() {
    var quantity = $('#qty').val();
    var totalProduct = $('#totalProduct').val();
    if (quantity < 0 || quantity == 0 || isNaN(quantity)) {
        $('#qty').val(1);
    }
    if (quantity < totalProduct) {
        $(this).removeAttr('readonly');
    }
});

$('.increase').click(function() {
    var quantity = $('#qty').val();
    var totalProduct = $('#totalProduct').val();
    if (quantity < 0 || quantity == 0 || isNaN(quantity)) {
        $('#qty').val(1);
    }
    if (quantity >= totalProduct) {
        $('.increase').attr('readonly', '');
    }
});

//add cart
// $(document).on('click', '.addProductToCartsss', function(e) {
//     e.preventDefault();
//     var product_id = $(this).attr('product_id');
//     var quantity = $('#qty').val();
//     var totalProduct = $('#totalProduct').val();
//     // debugger;
//     if (sizeDefault == 0 && sizeProduct == 0) {
//         $('.checkSize').css({ 'background': '#fff5f5' });
//         $('#noti-checksize').html('Vui lòng chọn Phân loại hàng');
//     } else if (sizeDefault == '1' || sizeProduct != 0) {
//         $.ajax({
//             type: "POST",
//             url: "server/shoppingCart/addProductToCart.php",
//             data: { product_id: product_id, quantity: quantity, sizeDefault: sizeDefault, sizeProduct: sizeProduct, totalProduct: totalProduct },
//             dataType: "html",
//             success: function(data) {
//                 $("#mini-carts").load(" #detail-mini-cart");
//                 $('.noti').html(data);
//                 var audio = new Audio('assets/audio/nhacchuong2.mp3');
//                 audio.play();
//                 $('.noti-cart').delay(2000).slideUp();
//             }
//         });
//     }
// });
</script>
