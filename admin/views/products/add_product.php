<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <h2 style="background-color: #1a2942; color: #fff; padding: 15px;">Chọn sản phẩm cần thêm</h2>
        <ul class="menu-product">
            <form action="" method="POST">
                <?php
                if (isset($_POST['add'])) {
                    if (isset($_POST['amount'])) {
                        $amount = $_POST['amount'];
                        if (!empty($amount)) {
                            $_SESSION['amount'] = $amount;
                            $count = count($amount);
                            $_SESSION['countNumber'] = $count;
                        }
                    }
                }

                foreach ($selectCate as $value) {
                    ?>
                    <li class="list-product">
                        <label>
                            <input type="checkbox" value="<?= $value['name_cate']; ?>" class="check_me" name="amount[]" <?php if (isset($amount) && !empty($amount)) {
                                if (in_array($value['name_cate'], $amount)) {
                                    echo "checked";
                                }
                            } ?> />
                            <span class="icon_check"></span>
                            <span class="list_text"><?= $value['name_cate']; ?></span>
                        </label>
                    </li>
                    <?php
                }
                ?>
                <button type="submit" name="add" class="btn btn-success">Add Products</button>
            </form>
        </ul>
        <div class="content" style="margin-top: 50px;">
            <form method="POST" enctype="multipart/form-data" onsubmit="return checkEmpty();">
                <?php
                if (isset($count) && !empty($count)) {
                    if ($count >= 2) {
                        ?>
                        <input type="text" class="check" style="display:none;" value="1">
                        <input type="text" class="countAddProduct" style="display:none;" value="<?=$count?>">
                        <input type="text" class="form-control" id="" name="count" style="display:none;" value="<?= $count; ?>">
                        <div class="form-group">
                            <label for="name_sets" style="color: turquoise;">Tên bộ đồ</label>
                            <input type="text" class="form-control name_sets" id="name_sets" name="name_sets" placeholder="Nhập tên bộ đồ">
                        </div>
                        <div class="form-group">
                            <label style="color: turquoise;">Ảnh bộ đồ</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input img_ProductSet" id="customFile" name="fileUploadSet" accept="image/*">
                                <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                            </div>
                            <span id="error-imageSets"></span>
                        </div>
                        <div class="form-group">
                            <label for="brand_id" style="color: turquoise;">Thương hiệu</label>
                            <select name="brand_id" id="" class="form-control">
                                <?php
                                foreach ($selectBrand as $value) {
                                    ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['name_brand']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descriptionSet">Mô tả</label>
                            <textarea name="descriptionSet" class="ckeditor descriptionSet" placeholder=""></textarea>
                        </div>
                        <?php
                        for ($i = 0; $i < $count; $i++) {
                            
                            ?>
                            <div class="form-group" style="display: flex;">
                                <?php
                                foreach ($selectCate as $value) {
                                    if ($value['name_cate'] == $amount[$i]) {
                                        ?>
                                        <label for="product_sets" style="display: flex; align-items: center;">Nhập sản phẩm <h5 style="color: tomato; padding-left: 10px;"><?= $value['name_cate']; ?></h5></label>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="category">Danh mục</label>
                                <?php
                                foreach ($selectCate as $value) {
                                    if ($value['name_cate'] == $amount[$i]) {
                                        ?>
                                        <input value="<?php echo $value['id']; ?>" name="cate_pro_id[]" style="display:none;" class="form-control">
                                        <input value="<?php echo $value['name_cate']; ?>" class="form-control" readonly>
                                        <input value="<?php echo $value['items']; ?>" name="items[]" style="display:none;">
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" class="form-control product_name<?=$i?>" id="product_name" name="product_name[]" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="images">Ảnh sản phẩm</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input imgInp<?=$i?>" id="imgInp" name="fileUpload[]" accept="image/*">
                                    <label class="custom-file-label" for="imgInp">Chọn ảnh</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá bán</label>
                                <input type="text" class="form-control price<?=$i?>" id="price" name="price[]" placeholder="Nhập giá bán">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description[]" class="ckeditor description<?=$i?>" placeholder=""></textarea>
                            </div>
                            <?php
                        }
                        ?>
                        <button type="submit" name="insert_set" class="btn btn-danger">Thêm mới</button>
                        <?php
                    } else {
                    ?>
                        <input type="text" class="check" style="display:none;" value="2">
                    <?php
                        // for ($i = 0; $i < $count; $i++) {
                            ?>
                            <div class="form-group" style="display: flex;">
                                <?php
                                foreach ($selectCate as $value) {
                                    if ($value['name_cate'] == $amount[0]) {
                                        ?>
                                        <label for="product_sets" style="display: flex; align-items: center;">Nhập sản phẩm <h5 style="color: tomato; padding-left: 10px;"><?= $value['name_cate']; ?></h5></label>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="category">Danh mục</label>
                                <?php
                                foreach ($selectCate as $value) {
                                    if ($value['name_cate'] == $amount[0]) {
                                        ?>
                                        <input value="<?php echo $value['id']; ?>" name="cate_pro_id" style="display:none;" class="form-control">
                                        <input value="<?php echo $value['name_cate']; ?>" class="form-control" readonly>
                                        <input value="<?php echo $value['items'];?>" name="items" style="display:none;">
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="brand_id" style="color: turquoise;">Thương hiệu</label>
                                <select name="brand_id" id="" class="form-control">
                                    <?php
                                    foreach ($selectBrand as $value) {
                                        ?>
                                        <option value="<?= $value['id']; ?>"><?= $value['name_brand']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="images">Ảnh sản phẩm</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="imgInp" name="fileUpload" accept="image/*">
                                    <label class="custom-file-label" for="imgInp">Chọn ảnh</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá bán</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="ckeditor" id="ckeditor" placeholder=""></textarea>
                            </div>
                            <?php
                        // }
                        ?>
                        <button type="submit" name="insert_one" class="btn btn-warning">Thêm mới</button>
                        <?php
                    }
                }
                ?>
            </form>
        </div>
    </div>
    <div class="col-2"></div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <?php
        if (isset($_SESSION['error'])) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="col-2"></div>
</div>
