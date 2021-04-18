<?php
$useAjax = 1;
include_once '../../controller/adminHomeController.php';
$product = new adminHomeController();
function substr_word($str, $limit)
{
    if (stripos($str, " ")) {
        $ex_str = explode(" ", $str);
        $str_s = "";
        if (count($ex_str) > $limit) {
            for ($i = 0; $i < $limit; $i++) {
                $str_s .= $ex_str[$i] . " ";
            }
            return $str_s ." ...";
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $selectLiveSearch = $product->selectSearchAdmin_c($search);
    foreach ($selectLiveSearch as $value) {
?>
        <a href="index.php?search=ao" class="list-group-item list-group-item-action" title="<?=$value['name'];?>">
            <div style="display: flex; align-items: center;">
                <img src="../assets/images/products/<?= $value['main_image'] ?>" style="width: 60px; height: 60px;" alt="">
                <div style="padding-left: 20px;">
                    <h4 class="list-group-item-heading"><?=substr_word($value['name'], 6);?></h4>
                    <p class="list-group-item-text"><?=$value['price'];?></p>
                </div>
            </div>
        </a>
<?php
    }
}
?>