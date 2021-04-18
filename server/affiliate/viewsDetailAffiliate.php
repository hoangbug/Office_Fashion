<?php
$useAjax = 1;
include_once "../../controller/affiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['program_id']) && !empty($_POST['program_id'])) {
    $id = $_POST['program_id'];
    $roseDetail = $affiliate->getSelectProgram_m($id);
    foreach ($roseDetail as $value) {
?>
        <form action="" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="margin: 20px">Thông tin chương trình</h4>
                <img src="assets/images/affiliate/img-content/<?= $value['image'] ?>" width="100%" alt="">
            </div>
            <div class="modal-body">
                <h5 style="color: red;">Hoa hồng khách hàng cũ <?= $value['rose_old']; ?>%</h5>
                <h5 style="color: red;">Hoa hồng khách hàng mới <?= $value['rose_new']; ?>%</h5>
                <h3><?= $value['title']; ?></h3>
                <p><?= $value['description']; ?></p>
                <p>Có hiệu lực từ: <?= $value['created_at']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="margin-top: 21px;" data-dismiss="modal">Close</button>
            </div>
        </form>
<?php
    }
}
?>