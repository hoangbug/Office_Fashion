<div class="row">
    <div class="col-12">
        <div class="card" id="databaseTable">
            <div class="card-body table-responsive" id="contentDatabase">
                <h4 class="m-t-0 header-title mb-4"><b>Products</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID - Tên nguời dùng</th>
                            <th>ID - Tên sản phẩm</th>
                            <th>Tổng tiền đơn hàng</th>
                            <th>Thanh toán</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Chi tết</th>
                            <th>Cập nhật</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $count = 1;
                    echo "<pre>";
                    print_r($selectOrderNotDelivered);
                    echo "</pre>";
                    foreach($selectOrderNotDelivered as $value){
                    ?>
                        <tr>
                            <td><?=$count++;?></td>
                            <td><?=$value['member_id'];?> - <?=$value['name_member'];?></td>
                            <td><?=$value['product_id'];?> - <?=$value['name'];?></td>
                            <td><?=number_format($value['total_money'], 0, '', '.');?></td>
                            <td><?php if($value['pay_method'] == 2){echo "Shop xu";}elseif($value['pay_method'] == 3){echo "Ví AirPay";}elseif($value['pay_method'] == 4){echo "Thẻ tín dụng/ Ghi nợ";}else{echo "Thanh toán khi nhận hàng";}?></td>
                            <td><?=$value['date_order'];?></td>
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
                            <td><button type="button" class="btn btn-warning viewProduct"  data-toggle="modal" data-target="#viewDetail" style="font-size: 23px;"><i class="ion-md-eye"></i></button></td>

                            <td><button type="button" class="btn btn-info updateProductOne" data-toggle="modal" data-target="#updateProductOne" style="font-size: 23px;"><i class="ion ion-md-brush"></i></button></td>

                            <td><a href="" onclick="return confirm('Bạn có thực sự muốn xóa sản phẩm này không? ');" class="btn btn-danger" style="font-size: 23px;"><i class="ion ion-md-close-circle-outline"></i></a></td>
                        </tr>
                        <?php
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-center" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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