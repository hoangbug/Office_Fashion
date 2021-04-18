<?php
$useAjax = 1;
include_once "../../controller/affiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['program_id']) && !empty($_POST['program_id'])) {
    $id = $_POST['program_id'];
    $affiliateCode = $affiliate->getAffiliateCode_c($id);
    foreach ($affiliateCode as $value) {
?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="margin: 20px">Mã code</h4>
        </div>
        <div class="modal-body" style="display: flex;">
            <input id="myInput" type="text" value="index.php?affiliate=<?=$value['affiliate_code']?>" style="border: none; font-size: 30px; width: 100%;" readonly>
            <!-- <input id="myInput" type="text" value="hoangbug.com/index.php?affiliate=<?=$value['affiliate_code']?>" style="border: none; font-size: 30px; width: 100%;" readonly> -->
            <button onclick="copyClipboard()" class="btn btn-info btn-lg"><i class="fa fa-link" aria-hidden="true"></i> Copy</button>
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
}
?>