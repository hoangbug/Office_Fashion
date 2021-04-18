<?php
session_start();
$useAjax = 1;
include_once '../../controller/productController.php';
$product = new productController();
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $limit = 3;
    // $countCommentProduct = $product->countCommentProduct_c($product_id);
    // $count = ceil($countCommentProduct['countAll'] / $limit);
    if (isset($_POST['pages']) && !empty($_POST['pages'])) {
        $pages = $_POST['pages'];
    } else {
        $pages = 1;
    }
    $from = ($pages - 1) * $limit;
    $loadComment = $product->selectCommentProduct_c($product_id, $from, $limit);
    foreach ($loadComment as $value) {
        $checkSubImg = $product->selectImageComment_c($value['id']);
?>
        <li class="comment">
            <div class="comment-wrapper">
                <div class="comment-author vcard">

                    <span class="author"><?= $value['name']; ?></span>
                </div>
                <!--comment-author vcard-->
                <div class="comment-meta">
                    <time datetime="<?= $value['updated_at']; ?>" class="entry-date"><?= $value['updated_at']; ?></time>
                    .
                </div>
                <!--comment-meta-->
                <div class="comment-body"><?= $value['content']; ?> </div>
                <div style="display: flex; overflow: overlay; margin: 20px 0 30px 0;">
                    <?php if (!empty($checkSubImg)) {
                        foreach ($checkSubImg as $info) {
                    ?>
                            <div class="comment-body"><img src="assets/images/comments/<?= $info['sub_images']; ?>" style="height: 200px; margin: 0 10px;" alt=""></div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <?php if (isset($_SESSION['idMember']) && ($_SESSION['idMember'] == $value['member_id'])) { ?>
                    <div class="comment-body"><button type="button">Xóa</button></div>
                <?php } ?>
            </div>
        </li>
<?php

    }
}
?>