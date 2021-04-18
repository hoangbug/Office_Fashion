<?php
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
?>
<div class="row" style="margin-top: 50px;">
    <div class="col-12">
        <div class="card" id="databaseTable">
            <div class="card-body table-responsive" id="contentDatabase">
                <h4 class="m-t-0 header-title mb-4"><b>Manage Order</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID - Tên nguời dùng</th>
                            <th>Link bình luận</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th>Chi tết</th>
                            <th>Cập nhật</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        if (isset($selectAllComment) && !empty($selectAllComment)) {
                            foreach ($selectAllComment as $value) {
                        ?>
                                <tr>
                                    <td><?= $count++; ?></td>
                                    <td><?= $value['member_id']; ?> - <?= $value['name']; ?></td>
                                    <td>Link: <a href="../index.php?page=product&method=productDetail&id=<?=$value['product_id']?>" target="_blank" class="text-info">index.php?page=product&method=productDetail&id=<?=$value['product_id']?></a></td>
                                    <td><?= substr_word($value['content'], 10); ?></td>
                                    <td><?= $value['updated_at']; ?></td>
                                    <td><?php if (($value['status']) == 0) {
                                            echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Ẩn";
                                        } elseif (($value['status']) == 1) {
                                            echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Hiện";
                                        } ?></td>
                                    <td><button type="button" class="btn btn-info viewManageOrder" data-toggle="modal" data-target="#viewManageOrder" orders_id="<?= $value['id'] ?>" style="font-size: 23px;"><i class="ion-md-eye"></i></button></td>

                                    <td style=""><button type="button" product_id="<?= $value['id']; ?>" class="btn btn-warning updateProductOne" data-toggle="modal" data-target="#updateProductOne" style="font-size: 23px;"><i class="ion ion-md-brush"></i></button></td>

                                    <td><a href="index.php?page=manage_comment&method=deleteComment&comment_id=<?= $value['id']; ?>" onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này không? ');" class="btn btn-danger" style="font-size: 23px;"><i class="ion ion-md-close-circle-outline"></i></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-center" id="viewManageOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>