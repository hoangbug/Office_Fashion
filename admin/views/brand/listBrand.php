 <!-- start page title -->
 <div class="row">
     <div class="col-3">
         <div class="page-title-box">
             <h4 class="page-title">THƯƠNG HIỆU</h4>
             <div class="clearfix"></div>
         </div>
     </div>
     <div class="col-9 noti">
         <?php
            if (isset($_SESSION['checkBrand']) && $_SESSION['checkBrand'] == 1) {
            ?>
             <div class='animate__animated animate__zoomInDown' style='animation-duration: 0.5s;color:red;font-weight:bold;box-shadow: 0px 1px 6px 0px #F5F5ED; border-radius: 10px; padding:20px;'>
                 <p style='color:green'>Đã thêm thương hiệu thành công! </p>
             </div>
         <?php
                unset($_SESSION['checkBrand']);
            } elseif (isset($_SESSION['updateBrand']) && $_SESSION['updateBrand'] == 1) {
            ?>
             <div class='animate__animated animate__zoomInDown' style='animation-duration: 0.5s;color:red;font-weight:bold;box-shadow: 0px 1px 6px 0px #F5F5ED; border-radius: 10px; padding:20px;'>
                 <p style='color:green'>Cập nhật thương hiệu thành công!</p>
             </div>
         <?php
                unset($_SESSION['updateBrand']);
            }
            elseif (isset($_SESSION['deleteBrand']) && $_SESSION['deleteBrand'] == 1) {
                ?>
                 <div class='animate__animated animate__zoomInDown' style='animation-duration: 0.5s;color:red;font-weight:bold;box-shadow: 0px 1px 6px 0px #F5F5ED; border-radius: 10px; padding:20px;'>
                     <p style='color:green'>Xóa thương hiệu thành công!</p> 
                 </div>
             <?php
                    unset($_SESSION['deleteBrand']);
                }
            ?>
     </div>
 </div>
 <div class="row">
     <div class="col-12" style="margin: 20px;">
         <button class="btn btn-info btn-rounded waves-effect width-md waves-light" data-toggle="modal" data-target=".addBrand">Thêm thương hiệu mới</button>
     </div>
 </div>

 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-body table-responsive datatablesss">
                 <h4 class="m-t-0 header-title mb-4"><b>Danh sách thương hiệu</b></h4>

                 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap contentTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center;font-size: 13px;">

                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Thương hiệu</th>
                             <th>Ảnh</th>
                             <th>Lượt xem</th>
                             <th>Trạng thái</th>
                             <th>Ngày tạo</th>
                             <th>Sửa</th>
                             <th>Xóa</th>
                         </tr>
                     </thead>

                     <tbody>
                         <?php
                            $count = 1;
                            foreach ($listBrand as $brand) {
                            ?>
                             <tr>
                                 <td><?= $count++; ?></td>
                                 <td><?= $brand['name_brand']; ?></td>
                                 <td><img width="100" height="80" src="../assets/images/brand/<?= $brand['avatar']; ?>" alt=""></td>
                                 <td><?= $brand['views']; ?></td>
                                 <?php if ($brand['status'] == 1) {
                                    ?>
                                     <td style="color: green;">Đang hợp tác</td>
                                 <?php
                                    } else {
                                    ?>
                                     <td style="color: red;">Dừng hợp tác</td>
                                 <?php
                                    } ?>
                                 <td><?= $brand['created_at']; ?></td>
                                 <td><i brand_id="<?= $brand['id']; ?>" style="font-size: 25px;background:#FFBF00;border-radius: 5px; padding :5px 10px 5px 10px; color :white;cursor: pointer;" class="ion ion-md-build updateBrand" data-toggle="modal" data-target=".bs-example-modal-center"></i></td>
                                 <td>
                                 <a href="index.php?page=brand&method=deleteBrand&id=<?= $brand['id']; ?>" onclick="return confirm('Bạn có muốn xóa không ?')">
                                 <i style="font-size: 25px ; background:#DF0101; border-radius: 5px; padding :5px 10px 5px 10px; color :white;cursor: pointer;" class="ion ion-md-close-circle" ></i>
                                 </a>
                                 </td>

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

 <div class="modal fade bs-example-modal-center" id="Modal_order" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabelcenter" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="mySmallModalLabelcenter">Cập nhật thương hiệu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             </div>
             <div class="modal-body">

             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <div class="modal fade bs-example-modal-center addBrand" id="Modal_order" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabelcenter" style="display: none;" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="mySmallModalLabelcenter">Thêm thương hiệu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             </div>
             <div class="modal-body">
                 <form method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                         <label for="name_brand">Tên thương hiệu</label>
                         <input type="text" class="form-control" id="name_brand" name="name_brand" aria-describedby="name_brand" placeholder="Nhập tên thương hiệu">
                     </div>
                     <div class="form-group">
                         <label for="avatar">Ảnh thương hiệu</label>
                         <input type="file" onchange="viewImage(event)" accept = "image/*" class="form-control" id="avatar" name="avatar">
                         <img width="100" height="100%" style="box-shadow: 0px 1px 6px 0px grey; margin:10px;" id="output" />
                     </div>
                     <button type="submit" name="addBrand" class="btn btn-primary">Thêm</button>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>