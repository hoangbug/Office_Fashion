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
                            <th>Thanh toán</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Tổng tiền đơn hàng</th>
                            <th>Trạng thái</th>
                            <th>Chi tết</th>
                            <?php if(!empty($selectAllStatus)){
                                if(isset($_GET['status']) && !empty($_GET['status']) && $_GET['status'] != 2){
                                ?>
                                <th>Phê duyệt</th>
                                <?php
                                }
                                if(isset($_GET['status']) && !empty($_GET['status']) && $_GET['status'] == 2){ ?>
                                <th>Xóa</th>
                                <?php
                                }
                            } ?>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $count = 1;
                    if(isset($selectAll) && !empty($selectAll)){
                    foreach($selectAll as $value){
                    ?>
                        <tr>
                            <td><?=$count++;?></td>
                            <td><?=$value['member_id'];?> - <?=$value['name_member'];?></td>
                            <td><?php if($value['pay_method'] == 2){echo "Shop xu";}elseif($value['pay_method'] == 3){echo "Ví AirPay";}elseif($value['pay_method'] == 4){echo "Thẻ tín dụng/ Ghi nợ";}else{echo "Thanh toán khi nhận hàng";}?></td>
                            <td><?=$value['date_order'];?></td>
                            <td><?=number_format($value['total_money'], 0, '', '.');?></td>
                            <td><?php if (($value['status']) == 1) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chờ xử lý";
                                    } elseif (($value['status']) == 2) {
                                        echo "<i class='ion ion-md-close-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã hủy";
                                    }elseif (($value['status']) == 3) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã xác nhận";
                                    }elseif (($value['status']) == 4) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chưa giao hàng";
                                    }elseif (($value['status']) == 5) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang giao hàng";
                                    }elseif (($value['status']) == 6) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã giao hàng";
                                    }elseif (($value['status']) == 7) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Hoàn tất";
                                    }?></td>
                            <td><button type="button" class="btn btn-info viewManageOrder"  data-toggle="modal" data-target="#viewManageOrder" orders_id="<?=$value['id']?>" style="font-size: 23px;"><i class="ion-md-eye"></i></button></td>
                        </tr>
                        <?php
                    }
                }
                //*
                if(isset($selectAllStatus) && !empty($selectAllStatus)){
                    foreach($selectAllStatus as $value){
                        ?>
                        <tr>
                            <td><?=$count++;?></td>
                            <td><?=$value['member_id'];?> - <?=$value['name_member'];?></td>
                            <td><?php if($value['pay_method'] == 2){echo "Shop xu";}elseif($value['pay_method'] == 3){echo "Ví AirPay";}elseif($value['pay_method'] == 4){echo "Thẻ tín dụng/ Ghi nợ";}else{echo "Thanh toán khi nhận hàng";}?></td>
                            <td><?=$value['date_order'];?></td>
                            <td><?=number_format($value['total_money'], 0, '', '.');?></td>
                            <td><?php if (($value['status']) == 1) {
                                        echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chờ xử lý";
                                    } elseif (($value['status']) == 2) {
                                        echo "<i class='ion ion-md-close-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã hủy";
                                    }elseif (($value['status']) == 3) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã xác nhận";
                                    }elseif (($value['status']) == 4) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chưa giao hàng";
                                    }elseif (($value['status']) == 5) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang giao hàng";
                                    }elseif (($value['status']) == 6) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đã giao hàng";
                                    }elseif (($value['status']) == 7) {
                                        echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Hoàn tất";
                                    }?></td>
                            <td><button type="button" class="btn btn-info viewManageOrder"  data-toggle="modal" data-target="#viewManageOrder" orders_id="<?=$value['id']?>" style="font-size: 23px;"><i class="ion-md-eye"></i></button></td>
                            
                            <?php if($value['status'] != 2){ ?>
                            <form action="" method="post">
                            <input type="hidden" name="orders_id" value="<?= $value['id']; ?>">
                            <td><button type="submit" class="btn btn-warning" name="updateProductOrder" style="font-size: 23px;"><i class="ion ion-md-brush"></i></button></td>
                            </form>
                            <?php } ?>
                            <?php if($value['status'] == 2){ ?>
                            <td><a href="index.php?page=manage_orders&method=deleteOrders&order_id=<?= $value['id']; ?>&status=2" onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này không? ');" class="btn btn-danger" style="font-size: 23px;"><i class="ion ion-md-close-circle-outline"></i></a></td>
                            <?php } ?>
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
