//* Brand
$(document).on('click', '.updateBrand', function() {
    var brand_id = $(this).attr('brand_id');
    if (brand_id != '' && brand_id != null) {
        $.ajax({
            type: "POST",
            url: "server/brand/updateBrand.php",
            data: { brand_id: brand_id },
            dataType: "html",
            success: function(data) {
                $("#Modal_order .modal-body").html(data);
            }
        });
    }
});

$(document).on('click', '.deleteBrand', function() {
    var brand_id = $(this).attr('brand_id');
    if (brand_id != '' && brand_id != null) {
        $.ajax({
            type: "POST",
            url: "server/brand/deleteBrand.php",
            data: { brand_id: brand_id },
            dataType: "html",
            success: function(data) {
                $('.noti').html(data);
                $(".datatablesss").load(' .contentTable');
            }
        });
    }
});

//* Category products
$(document).on('click', '.updateCategory', function() {
    var cate_id = $(this).attr('cate_id');
    if (cate_id != '' && cate_id != null) {
        $.ajax({
            type: "POST",
            url: "server/category/updateCateProduct.php",
            data: { cate_id: cate_id },
            dataType: "html",
            success: function(data) {
                $("#updateCategory .body-update").html(data);
            }
        });
    }
});

//* Category blogs
$(document).on('click', '.updateCateBlogs', function() {
    var cate_id = $(this).attr('cate_id');
    if (cate_id != '' && cate_id != null) {
        $.ajax({
            type: "POST",
            url: "server/category/updateCateBlogs.php",
            data: { cate_id: cate_id },
            dataType: "html",
            success: function(data) {
                $("#updateCateBlogs .body-update").html(data);
            }
        });
    }
});

//* Views Products all
$(document).on('click', '.viewProduct', function() {
    var product_id = $(this).attr('product_id');
    if (product_id != '' && product_id != null) {
        $.ajax({
            type: "POST",
            url: "server/products/viewProduct.php",
            data: { product_id: product_id },
            dataType: "html",
            success: function(data) {
                $("#viewDetail .modal-body").html(data);
            }
        });
    }
});

//* Update product set
$(document).on('click', '.updateProductSet', function() {
    var product_set = $(this).attr('product_set');
    if (product_set != '' && product_set != null) {
        $.ajax({
            type: "POST",
            url: "server/products/updateProductSet.php",
            data: { product_set: product_set },
            dataType: "html",
            success: function(data) {
                $("#updateProductSet .modal-body").html(data);
            }
        });
    }
});

//* Update product one
$(document).on('click', '.updateProductOne', function() {
    var product_id = $(this).attr('product_id');
    if (product_id != '' && product_id != null) {
        $.ajax({
            type: "POST",
            url: "server/products/updateProductOne.php",
            data: { product_id: product_id },
            dataType: "html",
            success: function(data) {
                $("#updateProductOne .modal-body").html(data);
            }
        });
    }
});

//view detail product
$(document).on('click', '.viewProduct', function() {
    var product_id = $(this).attr('product_id');
    if (product_id != '' && product_id != null) {
        $.ajax({
            type: "POST",
            url: "server/products/updateProductOne.php",
            data: { product_id: product_id },
            dataType: "html",
            success: function(data) {
                $("#updateProductOne .modal-body").html(data);
            }
        });
    }
});

//* Update content Affiliate
$(document).on('click', '.updateAffiliate', function() {
    var content_id = $(this).attr('content_id');
    if (content_id != '' && content_id != null) {
        $.ajax({
            type: "POST",
            url: "server/affiliate/updateAffiliate.php",
            data: { content_id: content_id },
            dataType: "html",
            success: function(data) {
                $("#updateAffiliate .body-update").html(data);
            }
        });
    }
});

//* update ratio rose Affiliate
$(document).on('click', '.updateRoseAffiliate', function() {
    var rose_id = $(this).attr('rose_id');
    if (rose_id != '' && rose_id != null) {
        $.ajax({
            type: "POST",
            url: "server/affiliate/updateRoseAffiliate.php",
            data: { rose_id: rose_id },
            dataType: "html",
            success: function(data) {
                $("#updateRoseAffiliate .body-update").html(data);
            }
        });
    }
});

//* update Account Affiliate
$(document).on('click', '.updateAccountAff', function() {
    var account_id = $(this).attr('account_id');
    if (account_id != '' && account_id != null) {
        $.ajax({
            type: "POST",
            url: "server/affiliate/updateAccountAff.php",
            data: { account_id: account_id },
            dataType: "html",
            success: function(data) {
                $("#updateAccountAff .body-update").html(data);
            }
        });
    }
});

//* add rose Affiliate
$(document).on('click', '.addProgramRose', function() {
    var rose_id = $(this).attr('rose_id');
    if (rose_id != '' && rose_id != null) {
        $.ajax({
            type: "POST",
            url: "server/affiliate/addProgramRose.php",
            data: { rose_id: rose_id },
            dataType: "html",
            success: function(data) {
                $("#addProgramRose .body-update").html(data);
            }
        });
    }
});

//* update Blogs
$(document).on('click', '.updateBlogs', function() {
    var blog_id = $(this).attr('blog_id');
    if (blog_id != '' && blog_id != null) {
        $.ajax({
            type: "POST",
            url: "server/blog/updateBlogs.php",
            data: { blog_id: blog_id },
            dataType: "html",
            success: function(data) {
                $("#updateBlogs .body-update").html(data);
            }
        });
    }
});

//* views Blogs
$(document).on('click', '.viewsBlogs', function() {
    var blog_id = $(this).attr('blog_id');
    if (blog_id != '' && blog_id != null) {
        $.ajax({
            type: "POST",
            url: "server/blog/viewsBlogs.php",
            data: { blog_id: blog_id },
            dataType: "html",
            success: function(data) {
                $("#viewsBlogs .body-update").html(data);
            }
        });
    }
});

//* view manage order
$(document).on('click', '.viewManageOrder', function() {
    var orders_id = $(this).attr('orders_id');
    if (orders_id != '' && orders_id != null) {
        $.ajax({
            type: "POST",
            url: "server/manage_orders/viewManageOrderDetail.php",
            data: { orders_id: orders_id },
            dataType: "html",
            success: function(data) {
                $("#viewManageOrder .modal-body").html(data);
            }
        });
    }
});
//* update manage order
// $(document).on('click', '.updateProductOrder', function() {
//     var orders_id = $(this).attr('orders_id');
//     if (orders_id != '' && orders_id != null) {
//         $.ajax({
//             type: "POST",
//             url: "server/manage_orders/updateManageOrderDetail.php",
//             data: { orders_id: orders_id },
//             dataType: "html",
//             success: function() {
//                 $(".updateProductOrder").attr("disabled", "disabled");
//             }
//         });
//     }
// });

//* search admin
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

//* views Admin user
$(document).on('click', '.viewAdminUser', function() {
    var user_id = $(this).attr('user_id');
    if (user_id != '' && user_id != null) {
        $.ajax({
            type: "POST",
            url: "server/manage_user/viewAdminUserDetail.php",
            data: { user_id: user_id },
            dataType: "html",
            success: function(data) {
                $("#viewAdminUser .modal-body").html(data);
            }
        });
    }
});

//* update user
$(document).on('click', '.updateUsers', function() {
    var user_id = $(this).attr('user_id');
    if (user_id != '' && user_id != null) {
        $.ajax({
            type: "POST",
            url: "server/manage_user/updateUsersDetail.php",
            data: { user_id: user_id },
            dataType: "html",
            success: function(data) {
                $("#updateUsers .modal-body").html(data);
            }
        });
    }
});