<?php
$useAjax = 1;
include_once "../../controller/adminProductController.php";
$product = new productController();
if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    $id = $_POST['product_id'];
    $productDetail = $product->getProductOneDetail_c($id);
    $cateDetail = $product->getItems_c($productDetail[0]['cate_pro_id']);
    $items = $cateDetail['items'];
    $sizeDetail = $product->getSizeProduct_c($id);
    $imageDetail = $product->getDetailImageProduct_c($id);
    $selectAllCate = $product->getCatePro_c();
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-12" style="padding: 20px 12px;">
            <?php
            foreach ($productDetail as $value) {
            ?>
                <div class="form-group" style="display: none;">
                    <label for="">ID</label>
                    <input type="text" class="form-control" id="" name="id" value="<?= $value['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <select name="cate_id" id="" class="form-control">
                        <?php
                        foreach ($selectAllCate as $info) {
                            ?>
                            <option value="<?= $info['id'] ?>" <?php if ($value['cate_pro_id'] == $info['id']) {
                                echo "selected";
                            } ?>><?= $info['name_cate']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tên thương hiệu</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['name_brand']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Mã bộ đồ</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['product_sets_id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên bộ đồ</label>
                    <input type="text" class="form-control" id="" name="product_name_sets" value="<?= $value['product_name_sets']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="" name="product_name" value="<?= $value['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="text" value="<?= $value['main_image'] ?>" name="img_old" style="display: none;" readonly>
                    <input type="file" class="form-control" name="fileUpload" accept="image/*">
                </div>
                <img src="../assets/images/products/<?= $value['main_image'] ?>" alt="" style="width: 200px; height: 200px;">
        </div>
        <div class="form-group">
            <label for="">Giá bán</label>
            <input type="text" class="form-control" id="" name="price" value="<?= $value['price']; ?>">
        </div>
        <div class="form-group">
            <label for="">Cập nhật số lượng size</label>
        </div>
        <!-- // detail quantity size -->
        <!-- <option value="1">Áo nam</option>
        <option value="2">Áo nữ</option>
        <option value="3">Quần nam</option>
        <option value="4">Quần nữ</option>
        <option value="5">Giày</option>
        <option value="6">Khác</option> -->
        <?php
                //size áo
                if (isset($items) && $items == 1 || $items == 2) {
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div>
                                            <label for="showEasing">Size XS</label>
                                            <input id="showEasing" name="sizeAo[]" type="text" placeholder="swing, linear" class="input-mini form-control" value="<?= $sizeDetail[0]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="hideEasing">Size S</label>
                                            <input id="hideEasing" name="sizeAo[]" type="text" placeholder="swing, linear" class="input-mini form-control" value="<?= $sizeDetail[1]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="showMethod">Size M</label>
                                            <input id="showMethod" name="sizeAo[]" type="text" placeholder="show, fadeIn, slideDown" class="input-mini form-control" value="<?= $sizeDetail[2]['quantity']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div>
                                            <label for="showDuration">Size L</label>
                                            <input id="showDuration" name="sizeAo[]" type="text" placeholder="ms" class="input-mini form-control" value="<?= $sizeDetail[3]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="hideDuration">Size XL</label>
                                            <input id="hideDuration" name="sizeAo[]" type="text" placeholder="ms" class="input-mini form-control" value="<?= $sizeDetail[4]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="timeOut">Size XXL</label>
                                            <input id="timeOut" name="sizeAo[]" type="text" placeholder="ms" class="input-mini form-control" value="<?= $sizeDetail[5]['quantity']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        <?php
                }
                // size quần
                elseif (isset($items) && $items == 3 || $items == 4) {
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div class="mt-3">
                                            <label for="showEasing">Size 27</label>
                                            <input id="showEasing" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[0]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="showEasing">Size 28</label>
                                            <input id="showEasing" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[1]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="hideEasing">Size 29</label>
                                            <input id="hideEasing" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[2]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="showMethod">Size 30</label>
                                            <input id="showMethod" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[3]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="hideMethod" class="m-t-10">Size 31</label>
                                            <input id="hideMethod" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[4]['quantity']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div class="mt-3">
                                            <label for="showDuration">Size 32</label>
                                            <input id="showDuration" name="sizeQuan[]" class="input-mini form-control" type="text" value="<?= $sizeDetail[5]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="hideDuration">Size 33</label>
                                            <input id="hideDuration" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[6]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="timeOut">Size 34</label>
                                            <input id="timeOut" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[7]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="extendedTimeOut">Size 35</label>
                                            <input id="extendedTimeOut" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[8]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="extendedTimeOut">Size 36</label>
                                            <input id="extendedTimeOut" name="sizeQuan[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[9]['quantity']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        <?php
                }
                // size giày
                elseif (isset($items) && $items == 5) {
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div class="mt-3">
                                            <label for="showEasing">Size 34</label>
                                            <input id="showEasing" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[0]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="showEasing">Size 35</label>
                                            <input id="showEasing" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[1]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="hideEasing">Size 36</label>
                                            <input id="hideEasing" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[2]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="showMethod">Size 37</label>
                                            <input id="showMethod" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[3]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="showDuration">Size 38</label>
                                            <input id="showDuration" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[4]['quantity']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div class="mt-3">
                                            <label for="hideDuration">Size 39</label>
                                            <input id="hideDuration" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[5]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="timeOut">Size 40</label>
                                            <input id="timeOut" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[6]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="extendedTimeOut">Size 41</label>
                                            <input id="extendedTimeOut" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[7]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="extendedTimeOut">Size 42</label>
                                            <input id="extendedTimeOut" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[8]['quantity']; ?>">
                                        </div>
                                        <div class="mt-3">
                                            <label for="hideMethod" class="m-t-10">Size 43</label>
                                            <input id="hideMethod" name="sizeGiay[]" type="text" class="input-mini form-control" value="<?= $sizeDetail[9]['quantity']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        <?php
                }
                //size ví, thắt lưng , ...
                elseif (isset($items) && $items == 6) {
        ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div>
                                            <label for="showEasing">Số lượng hiện có</label>
                                            <input id="showEasing" type="text" name="default" class="input-mini form-control" value="<?= $sizeDetail[0]['quantity']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="control-group mt-4 mt-xl-0">
                                    <div class="controls">
                                        <div>
                                            <label for="showDuration">Số lượng thêm</label>
                                            <input id="showDuration" type="text" name="addQuantity" placeholder="Nhập số lượng muốn thêm" class="input-mini form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        <?php
                }

        ?>

        <?php
                if (!empty($imageDetail)) {
                    $countImage = count($imageDetail);
        ?>
            <div class="form-group">
                <div class="card-body">
                    <h4 class="header-title mb-4">Ảnh phụ hiện có</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <?php
                                    for ($i = 0; $i < $countImage; $i++) {
                                    ?>
                                        <th>Ảnh <?= $i+1; ?></th>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                for ($i = 0; $i < $countImage; $i++) {
                                ?>
                                    <td><img src="../assets/images/detail_image_products/<?=$imageDetail[$i]['sub_images']?>" width="100" height="auto" alt="">
                                        <input type="text" name="subImageCurrent[]" style="display: none;" value="<?=$imageDetail[$i]['sub_images']?>">
                                    </td>
                                <?php
                                }
                                ?>
                                 </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
                }
        ?>
        <!-- update detail image -->
        <div class="form-group">
            <label for="">Cập nhật ảnh phụ mới</label>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="listDetailImageProduct[]" multiple accept="image/*">
                <label class="custom-file-label" for="imgInp">Chọn ảnh</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea class="form-control" id="editor" name="description"><?= $value['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Sale</label>
            <input type="text" class="form-control" id="" name="sale" value="<?= $value['sale']; ?>">
        </div>
        <div class="form-group">
            <label for="">Lượt xem</label>
            <input type="text" class="form-control" id="" name="" value="<?= $value['views']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="0" <?php if ($value['status'] == 0) {
                                        echo "selected";
                                    } ?>>Out of stock</option>
                <option value="1" <?php if ($value['status'] == 1) {
                                        echo "selected";
                                    } ?>>On sales</option>
                <option value="2" <?php if ($value['status'] == 2) {
                                        echo "selected";
                                    } ?>>New Arrivals</option>
                <option value="3" <?php if ($value['status'] == 3) {
                                        echo "selected";
                                    } ?>>Best Sellers</option>
                <option value="4" <?php if ($value['status'] == 4) {
                                        echo "selected";
                                    } ?>>Hot Sales</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Được tạo lúc</label>
            <input type="text" class="form-control" id="" name="" value="<?= $value['created_at']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Cập nhật lúc</label>
            <input type="text" class="form-control" id="" name="" value="<?= $value['updated_at']; ?>" readonly>
        </div>
    <?php
            }
    ?>

    <button type="submit" name="updateProductSet" class="btn btn-info">Cập nhật</button>
    </div>
    </form>
<?php
}
?>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>