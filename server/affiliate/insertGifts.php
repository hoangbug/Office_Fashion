<?php
session_start();
$useAjax = 1;
include_once "../../controller/affiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['code_id']) && isset($_POST['cate_id']) && isset($_POST['type_code']) && isset($_POST['affiliate_id']) && isset($_POST['quantity']) && isset($_POST['money_cart'])) {
    $code_id = $_POST['code_id'];
    $cate_id = $_POST['cate_id'];
    $type_code = $_POST['type_code'];
    $affiliate_id = $_POST['affiliate_id'];
    $quantity = $_POST['quantity'];
    $money_cart = $_POST['money_cart'];
    $permitted_chars  = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $gift_code = substr(str_shuffle($permitted_chars), 0, 16);
?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="margin: 20px">Mã code</h4>
    </div>
    <div class="modal-body" style="display: flex;">
        <?php
        if (!empty($code_id) && !empty($cate_id) && !empty($type_code) && !empty($affiliate_id) && !empty($quantity)) {
            if (is_numeric($quantity)) {
                if ($quantity > 0 && $quantity <= 10) {
                    $check = $affiliate->checkGifts_c($affiliate_id, $code_id);
                    if (empty($check)) {
                        $totalAll = $affiliate->checkTotalRoseAff_c($affiliate_id);
                        $total_cart = $money_cart * $quantity;
                        if ($totalAll['total_rose'] >= $total_cart) {
                            $affiliate->insertGiftCodeOne_c($cate_id, $affiliate_id, $code_id, $gift_code, $type_code, $quantity);
                            $updateTotal = $totalAll['total_rose'] - $total_cart;
                            $affiliate->updateAffiliate_c($affiliate_id, $updateTotal);
        ?>
                            <input id="myInput" type="text" value="<?php echo $gift_code; ?>" style="border: none; font-size: 30px; width: 100%;" readonly>
                            <button onclick="copyClipboard()" class="btn btn-info btn-lg"><i class="fa fa-link" aria-hidden="true"></i> Copy</button>
                    <?php
                        } else {
                            ?>
                            <input id="myInput" type="text" value="Tài khoản của bạn không đủ để đổi!" style="border: none; font-size: 30px; width: 100%;" readonly>
                            <?php
                        }
                    } else {
                        ?>
                        <input id="myInput" type="text" value="Bạn chỉ được đổi tối đa số lượng lần!" style="border: none; font-size: 30px; width: 100%;" readonly>
                        <?php
                    }
                } else {
                    ?>
                    <input id="myInput" type="text" value="Số lượng tối thiểu là 1 và tối đa = 10!" style="border: none; font-size: 30px; width: 100%;" readonly>
                <?php
                }
            } else {
                ?>
                <input id="myInput" type="text" value="Đăng kí không thành công! Số lượng phải là số!" style="border: none; font-size: 30px; width: 100%;" readonly>
            <?php
            }
        } else {
            ?>
            <input id="myInput" type="text" value="Bạn chưa nhập số lượng!" style="border: none; font-size: 30px; width: 100%;" readonly>
        <?php
        }
        ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" style="margin-top: 21px;" data-dismiss="modal">Close</button>
    </div>
    <script>
        function copyClipboard() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }
    </script>
<?php

}
?>