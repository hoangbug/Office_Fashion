<?php
$useAjax = 1;
include_once '../../controller/productController.php';
$product = new productController();
if(isset($_POST['product_id']) && !empty($_POST['product_id']) && isset($_POST['pages']) && !empty($_POST['pages'])){
    $product_id = $_POST['product_id'];
    $pages = $_POST['pages'];
    $limit = 3;
    $links = 2;
    $countCommentProduct = $product->countCommentProduct_c($product_id);
    $count = ceil($countCommentProduct['countAll'] / $limit);
    if($pages == 1 || $pages == $count){
        $links = 4;
    }elseif($pages == 2 || $pages == ($count-1)){
        $links = 3;
    }
    $start = (($pages - $links) > 0) ? $pages - $links : 1;
    $end = (($pages + $links) < $count) ? $pages + $links : $count;
    for ($i = $start; $i <= $end; $i++) {
    ?>
        <li class="page-item" id="pagination_cmt">
            <button type="button" class="page-link add_class" id="add_class" product_id="<?=$product_id;?>" pages="<?=$i;?>"><?= $i; ?></button>
        </li>
    <?php
    }
}
?>
<script>
$('.add_class').click(function () { 
    var pages = $(this).attr('pages');
    var product_id = $(this).attr('product_id');
    if (pages > 0 && pages != "" && pages != null) {
        $.ajax({
            type: "POST",
            url: "server/product/paginationCmt.php",
            data: { pages: pages, product_id },
            dataType: "html",
            success: function(data) {
                $('#load_page').html(data);
                // alert(9);
            }
        });
    } 

    if (product_id != "" && product_id != null && pages != "" && pages != null) {
        // function load_comment_data() {
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
        // }
    }
});

//* add class
$(document).on('click', '#pagination_cmt #add_class', function() {
    $(this).addClass("active").siblings().removeClass('active');
});

</script>