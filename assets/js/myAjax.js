//* views detail affiliate
$(document).on('click', '.viewsProgram', function() {
    var program_id = $(this).attr('program_id');
    if (program_id != '' && program_id != null) {
        $.ajax({
            type: "POST",
            url: "server/affiliate/viewsDetailAffiliate.php",
            data: { program_id: program_id },
            dataType: "html",
            success: function(data) {
                $("#myModal .modal-content").html(data);
            }
        });
    }
});

//* viewLink affiliate
$(document).on('click', '.viewsLink', function() {
    var program_id = $(this).attr('program_id');
    if (program_id != '' && program_id != null) {
        $.ajax({
            type: "POST",
            url: "server/affiliate/viewsLinkAffiliate.php",
            data: { program_id: program_id },
            dataType: "html",
            success: function(data) {
                $("#myModal1 .modal-content").html(data);
            }
        });
    }
});

//* insert program user
$(document).ready(function() {
    $(document).on('click', '.program', function() {
        // $(".program").attr("disabled", "disabled");
        var program_id = $(this).attr('program_id');
        var affiliate_id = $(this).attr('sessionUser');
        // var affiliate_id = $('.affiliate_id').val();
        if (program_id != "" && affiliate_id != "") {
            $.ajax({
                url: "server/affiliate/insertProgram.php",
                type: "POST",
                data: { program_id: program_id, affiliate_id: affiliate_id },
                dataType: "html",
                success: function(data) {
                    $("#myModal .modal-content").html(data);
                }
            });
        } else {
            alert('Please fill all the field !');
        }
    });
});

//* insert change code
$(document).ready(function() {
    // $(document).on('click', '.changeCode', function() {
    $('.changeCode').on('click', function(e) {
        e.preventDefault();
        // $(".program").attr("disabled", "disabled");
        var code_id = $(this).attr('code_id');
        var cate_id = $(this).attr('cate_id');
        var type_code = $(this).attr('type_code');
        var affiliate_id = $(this).attr('affiliate_id');
        var money_cart = $(this).attr('money_cart');
        var quantity = $('#soluong' + code_id).val();
        // alert(name);
        // if (quantity > 0 && quantity <= 10 && quantity != "" && isNaN(quantity)) {
        if (code_id != "" && cate_id != "" && type_code != "" && affiliate_id != "" && money_cart != "") {
            $.ajax({
                url: "server/affiliate/insertGifts.php",
                type: "POST",
                data: { code_id: code_id, cate_id: cate_id, type_code: type_code, affiliate_id: affiliate_id, quantity: quantity, money_cart: money_cart },
                dataType: "html",
                success: function(data) {
                    $("#myModal .modal-content").html(data);
                }
            });
        } else {
            alert('Please fill all the field !');
        }
        // } else {
        //     alert('Số lượng tối thiểu là 1 và tối đa = 10 !');
        // }
    });
});

// xử lý cart

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
$(document).on('click', '.addProductToCart', function(e) {
    e.preventDefault();
    var product_id = $(this).attr('product_id');
    var quantity = $('#qty').val();
    var totalProduct = $('#totalProduct').val();
    // debugger;
    if (sizeDefault == 0 && sizeProduct == 0) {
        $('.checkSize').css({ 'background': '#fff5f5' });
        $('#noti-checksize').html('Vui lòng chọn Phân loại hàng');
    } else if (sizeDefault == '1' || sizeProduct != 0) {
        $.ajax({
            type: "POST",
            url: "server/shoppingCart/addProductToCart.php",
            data: { product_id: product_id, quantity: quantity, sizeDefault: sizeDefault, sizeProduct: sizeProduct, totalProduct: totalProduct },
            dataType: "html",
            success: function(data) {
                $("#mini-carts").load(" #detail-mini-cart");
                $('.noti').html(data);
                // alert(data);
                var audio = new Audio('assets/audio/nhacchuong2.mp3');
                audio.play();
                $('.noti-cart').delay(2000).slideUp();
            }
        });
    }
});

//update cart
$(document).on('change', '.update-cart', function(e) {
    var quantity = $(this).val();
    var product_id = $(this).attr('product_id');
    var name_size = $(this).attr('name_size');
    $.ajax({
        url: 'server/shoppingCart/updateCart.php',
        type: 'POST',
        dataType: 'html',
        data: { quantity: quantity, product_id: product_id, name_size: name_size },
        success: function(data) {
            $("#mini-carts").load(" #detail-mini-cart");
            $("#delCart").load(" .delCartLoad");
        }
    });
});


//del cart 
$(document).on('click', '.delOneProductCart', function(e) {
    e.preventDefault();
    var product_id = $(this).attr('product_id');
    var name_size = $(this).attr('name_size');
    // alert(name_size);
    $.ajax({
        type: "POST",
        url: "server/shoppingCart/delOneProductCart.php",
        data: { product_id: product_id, name_size: name_size },
        dataType: "html",
        success: function(data) {
            $("#mini-carts").load(" #detail-mini-cart");
            $("#delCart").load(" .delCartLoad");
        }
    });
});
// end - cart

//quick view product
$(document).on('click', '.quickViewProduct', function(e) {
    e.preventDefault();
    var product_id = $(this).attr('product_id');
    $.ajax({
        type: "GET",
        url: "server/product/quickViewProduct.php",
        data: { product_id: product_id },
        dataType: "html",
        success: function(data) {
            $('#contentQuickViewProduct').html(data);

        }
    });
});

// $(document).on('click', '.addProductToCarts', function(e) {
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


//* comments product

$(document).ready(function() {
    // load_comment_data();
    var pages = 1;
    var getUrl = $(location).attr('href');
    var arr = getUrl.split("=");
    // console.log(product_id[3]);
    var product_id = arr[3];
    if (product_id != "" && product_id != null && pages != "" && pages != null) {
        function load_comment_data() {
            $.ajax({
                url: "server/product/viewComments.php",
                type: "POST",
                data: { product_id: product_id, pages: pages },
                dataType: "html",
                success: function(data) {
                    $('#comment_table').html(data);
                    // alert(1);
                }
            });
        }
    }

    if (product_id != "" && product_id != null && pages != "" && pages != null) {
        function load_pagination_data() {
            // alert(3);
            $.ajax({
                type: "POST",
                url: "server/product/paginationCmt.php",
                data: { pages: pages, product_id: product_id },
                dataType: "html",
                success: function(data) {
                    $('#load_page').html(data);
                }
            });
        }
    }

    $('#load_comment').click(function() {
        load_comment_data();
        load_pagination_data();
    });



    $('#submit_files').click(function() {
        var product_id = $('#product_id').val();
        var member_id = $('#member_id').val();
        var comment = $('#comment').val();

        if (product_id != '' && product_id != null && member_id != "" && member_id != null && comment != "" && comment != null) {

            var error_images = '';
            var form_data = new FormData();
            var files = $('#multiple_files')[0].files;
            if (files.length > 10) {
                error_images += 'You can not select more than 10 files';
            } else {
                for (var i = 0; i < files.length; i++) {
                    var name = document.getElementById("multiple_files").files[i].name;
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                        error_images += '<p>Invalid ' + i + ' File</p>';
                    }
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
                    var f = document.getElementById("multiple_files").files[i];
                    var fsize = f.size || f.fileSize;
                    if (fsize > 2000000) {
                        error_images += '<p>' + i + ' File Size is very big</p>';
                    } else {
                        form_data.append("file[]", document.getElementById('multiple_files').files[i]);
                        form_data.append("member", member_id);
                    }
                }
            }
            if (error_images == '') {
                $.ajax({
                    url: "server/product/loadComment.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        // $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
                    },
                    success: function(data) {
                        document.getElementById('multiple_files').value = "";
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "server/product/loadComment.php",
                    data: { product_id: product_id, member_id: member_id, comment: comment },
                    dataType: "html",
                    success: function(data) {
                        load_comment_data();
                        load_pagination_data();
                        document.getElementById('comment').value = "";
                    }
                });
            } else {
                $('#multiple_files').val('');
                $('#error_image').html("<span class='text-danger'>" + error_images + "</span>");
                return false;
            }
        } else {
            alert("Bạn chưa đăng nhập!");
            // window.location.replace('http://localhost/web_ban_do_cong_so/index.php?page=member&method=loginMember');
            window.location.replace('http://hoangbug.com/index.php?page=member&method=loginMember');
        }
    });
});




//* search product all
$('#search').keyup(function() {
    var search = $('#search').val();
    if (search.length > 0 && search != "" && search != null) {
        $.ajax({
            type: "POST",
            url: "server/search/searchProduct.php",
            data: { search: search },
            dataType: "html",
            success: function(data) {
                $('#list_search').html(data);
            }
        });

    } else {
        $('#list_search').html("");
    }
});

// add to wishlist

$(document).on('click', '.link-wishlist', function() {
    var product_id = $(this).attr('product_id');
    if (product_id != "" && product_id != null) {
        $.ajax({
            type: "POST",
            url: "server/product/addToWishlist.php",
            data: { product_id: product_id},
            dataType: "html",
            success: function(data) {
                $('.noti').html(data);
                var audio = new Audio('assets/audio/nhacchuong2.mp3');
                audio.play();
                $('.noti-cart').delay(2000).slideUp();
            }
        });
    }
});

//check Discount code

$(document).on('click', '.checkDisCount', function() {
    var gift_code = $('#coupon_code').val();
    if (gift_code != "" && gift_code != null) {
        $.ajax({
            type: "POST",
            url: "server/shoppingCart/addDiscount.php",
            data: { gift_code: gift_code },
            dataType: "html",
            success: function(data) {
                $('.noti').html(data);
                var audio = new Audio('assets/audio/nhacchuong2.mp3');
                audio.play();
                $('.noti-cart').delay(2000).slideUp();
                $("#delCart").load(" .delCartLoad");
            }
        });
    }
});



$(document).on('click', '.del-wishlist', function(e) {
    e.preventDefault();
    var product_id = $(this).attr('product_id');
    // alert(name_size);
    $.ajax({
        type: "POST",
        url: "server/product/delWishlist.php",
        data: { product_id: product_id },
        dataType: "html",
        success: function(data) {
            $("#loadWishList").load(" #loadWishListss");
        }
    });
});