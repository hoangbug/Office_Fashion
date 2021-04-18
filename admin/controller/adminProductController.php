<?php
if (isset($useAjax)) {
    include_once '../../model/adminProductModel.php';
} else {
    include_once 'model/adminProductModel.php';
}
class productController extends productModel
{
    private $product;
    function __construct()
    {
        $this->product = new productModel();
    }

    public function getProductSetDetail_c($id)
    {
        return $this->product->productSelectId_m($id);
    }

    public function getProductOneDetail_c($id)
    {
        return $this->product->productSelectOneId_m($id);
    }

    public function getCatePro_c()
    {
        return $this->product->selectAllCategory_m();
    }
    // get items
    public function getItems_c($id)
    {
        return $this->product->getOneCateProduct($id);
    }
    //get size product 
    public function getSizeProduct_c($product_id)
    {
        return $this->product->getSizeProduct($product_id);
    }
    //get detail image product
    public function getDetailImageProduct_c($product_id)
    {
        return $this->product->getDetailImageProduct($product_id);
    }

    public function getProductAll_c()
    {
        $selectAll = $this->product->selectAll_m();
        include_once 'views/products/list_product.php';
    }

    public function getProductSet_c()
    {
        $selectProductSet = $this->product->productSelectAllSet_m();
        include_once 'views/products/product_set.php';
    }

    public function getProductSetOne_c()
    {
        $selectProductSetOne = $this->product->selectAllOne_m();
        include_once 'views/products/product_one.php';
    }

    public function getProductAdd_c()
    {
        $selectCate = $this->product->selectAllCategory_m();
        $selectBrand = $this->product->getBrand_m();
        include_once 'views/products/add_product.php';
    }

    public function productSetDelete_c()
    {
        if (isset($_GET['id_proset']) && !empty($_GET['id_proset']) && isset($_GET['img']) && !empty($_GET['img'])) {
            $id_proset = $_GET['id_proset'];
            $img = $_GET['img'];
            $listProductOfSet = $this->product->getProducOfSet($id_proset);
            foreach ($listProductOfSet as $value) {
                $product = $this->getDetailImageProduct_c($value['id']);
                $count = count($product);
                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        unlink("../assets/images/detail_image_products/" . $product[$i]['sub_images']);
                    }
                }
                unlink("../assets/images/products/" . $value['main_image']);
            }
            $this->product->productDeleteSet_m($id_proset);
            unlink("../assets/images/products/" . $img);
            header('Location: index.php?page=product&method=productSet');
        }
        if (isset($_GET['id_proOne']) && !empty($_GET['id_proOne']) && isset($_GET['img']) && !empty($_GET['img'])) {
            $id_proOne = $_GET['id_proOne'];
            $img = $_GET['img'];
            $product = $this->getDetailImageProduct_c($id_proOne);
            $count = count($product);
            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    unlink("../assets/images/detail_image_products/" . $product[$i]['sub_images']);
                }
            }
            $this->product->productOneDelete_m($id_proOne);
            unlink("../assets/images/products/" . $img);

            // echo "<pre>";
            // print_r($product);
            // echo "</pre>";
            // die();

            header('Location: index.php?page=product&method=productOne');
        }
    }

    public function option()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'listProduct';
        }

        switch ($method) {
            case 'listProduct':
                $this->getProductAll_c();
                break;
            case 'productSet':
                $this->getProductSet_c();
                if (isset($_POST['updateProductSet'])) {
                    $id = $_POST['id'];
                    $product_name_sets = $_POST['product_name_sets'];
                    if (isset($_FILES['fileUpload'])) {
                        $fileUpload = $_FILES['fileUpload'];
                    }
                    $image_sets = time() . $this->product->convert_name(($fileUpload['name']));
                    $img_old = $_POST['img_old'];
                    $description = $_POST['description'];
                    $sale = $_POST['sale'];
                    $status = $_POST['status'];
                    $formatFile = array("image/jpeg", "image/png", "image/jpg");
                    $type = $_FILES['fileUpload']['type'];
                    if (!empty($product_name_sets) && !empty($description)) {
                        if (isset($fileUpload['name']) && !empty($fileUpload['name'])) {
                            if (in_array($type, $formatFile)) {
                                move_uploaded_file($fileUpload['tmp_name'], '../assets/images/products/' . $image_sets);
                                unlink("../assets/images/products/" . $img_old);
                                $this->product->productUpdateSet_m($id, $product_name_sets, $image_sets, $description, $sale, $status);
                                $_SESSION['success'] = "Cập nhật thành công!";
                                header('Location: index.php?page=product&method=productSet');
                            } else {
                                $_SESSION['error'] = "File up load không đúng định dạng!";
                                header('Location: index.php?page=product&method=productSet');
                            }
                        } else {
                            $_SESSION['success'] = "Cập nhật thành công!";
                            $this->product->productUpdateSet_m($id, $product_name_sets, $img_old, $description, $sale, $status);
                            header('Location: index.php?page=product&method=productSet');
                        }
                    } else {
                        $_SESSION['error'] = "Thông tin không được bỏ trống!";
                        header('Location: index.php?page=product&method=productSet');
                    }
                }
                break;
            case 'productOne':
                $this->getProductSetOne_c();
                if (isset($_POST['updateProductSet'])) {
                    $id = $_POST['id'];
                    $cate_id = $_POST['cate_id'];
                    $product_name = $_POST['product_name'];
                    $fileUpload = $_FILES['fileUpload'];
                    $price = $_POST['price'];
                    $main_img = time() . $this->product->convert_name(($fileUpload['name']));
                    $img_old = $_POST['img_old'];
                    // $price = $_POST['price'];
                    $description = $_POST['description'];
                    $sale = $_POST['sale'];
                    $status = $_POST['status'];
                    $formatFile = array("image/jpeg", "image/png", "image/jpg");
                    $type = $_FILES['fileUpload']['type'];

                    //update detail image
                    $subImageCurrent = $_POST['subImageCurrent'];
                    $listDetailImageProduct = $_FILES['listDetailImageProduct'];
                    $sllImage = count($listDetailImageProduct['name']);

                    if (!empty($listDetailImageProduct['name'][0])) {
                        $success = 0;
                        for ($i = 0; $i < $sllImage; $i++) {
                            if (!empty($listDetailImageProduct['name'][$i])) {
                                if (in_array($listDetailImageProduct['type'][$i], $formatFile)) {
                                    $success = 1;
                                    $nameSubimage =  time() . $this->product->convert_name($listDetailImageProduct['name'][$i]);
                                    move_uploaded_file($listDetailImageProduct['tmp_name'][$i], '../assets/images/detail_image_products/' . $nameSubimage);
                                    $this->product->insertDetailImageProduct($id,  $nameSubimage);
                                    // unlink("../assets/images/products/" . $img_old);
                                }
                            }
                        }
                        if ($success == 1 && !empty($subImageCurrent)) {
                            $sllCurrentImage = count($subImageCurrent);
                            for ($i = 0; $i < $sllCurrentImage; $i++) {
                                unlink("../assets/images/detail_image_products/" . $subImageCurrent[$i]);
                                $this->product->deleteDetailProduct($id, $subImageCurrent[$i]);
                            }
                        }
                    }
                    //update size
                    if (isset($_POST['sizeAo'])) {
                        $sizeAo = $_POST['sizeAo'];
                        for ($j = 0; $j < 6; $j++) {
                            switch ($j) {
                                case '0':
                                    $name_size = "XS";
                                    break;
                                case '1':
                                    $name_size = "S";
                                    break;
                                case '2':
                                    $name_size = "M";
                                    break;
                                case '3':
                                    $name_size = "L";
                                    break;
                                case '4':
                                    $name_size = "XL";
                                    break;
                                case '5':
                                    $name_size = "XXL";
                                    break;
                            }
                            if ($sizeAo[$j] < 0 || !is_numeric($sizeAo[$j])) {
                                $size = 0;
                                $this->product->updateSizeProduct($size, $id, $name_size);
                            } elseif ($sizeAo[$j] > 0 && is_numeric($sizeAo[$j])) {
                                $this->product->updateSizeProduct($sizeAo[$j], $id, $name_size);
                            }
                        }
                    }
                    //size quần
                    if (isset($_POST['sizeQuan'])) {
                        $sizeQuan = $_POST['sizeQuan'];
                        $count = -1;
                        for ($j = 27; $j < 37; $j++) {
                            $count++;
                            $name_size = $j;
                            if ($sizeQuan[$count] < 0 || !is_numeric($sizeQuan[$count])) {
                                $size = 0;
                                $this->product->updateSizeProduct($size, $id, $name_size);
                            } elseif ($sizeQuan[$count] > 0 && is_numeric($sizeQuan[$count])) {
                                $this->product->updateSizeProduct($sizeQuan[$count], $id, $name_size);
                            }
                        }
                    }
                    //size áo
                    if (isset($_POST['sizeGiay'])) {
                        $sizeGiay = $_POST['sizeGiay'];
                        $count = -1;
                        for ($j = 34; $j < 44; $j++) {
                            $count++;
                            $name_size = $j;
                            if ($sizeGiay[$count] < 0 || !is_numeric($sizeGiay[$count])) {
                                $size = 0;
                                $this->product->updateSizeProduct($size, $id, $name_size);
                            } elseif ($sizeGiay[$count] > 0 && is_numeric($sizeGiay[$count])) {
                                $this->product->updateSizeProduct($sizeGiay[$count], $id, $name_size);
                            }
                        }
                    }
                    //size khác
                    if (isset($_POST['default'])) {
                        $default = $_POST['default'];
                        $addQuantity = $_POST['addQuantity'];
                        $sizeOther = $default + $addQuantity;
                        $name_size = "default";
                        if ($sizeOther < 0 || !is_numeric($sizeOther)) {
                            $size = 0;
                            $this->product->updateSizeProduct($size, $id, $name_size);
                        } elseif ($sizeOther > 0 && is_numeric($sizeOther)) {
                            $this->product->updateSizeProduct($sizeOther, $id, $name_size);
                        }
                    }
                    // echo "<pre>";
                    // print_r($sizeQuan);
                    // echo "</pre>";
                    // die();
                    if (!empty($product_name) && !empty($description) && !empty($price)) {
                        $selectSetId = $this->product->selectIdProduct_m($id);
                        $priceSet = ($selectSetId['price'] - $selectSetId['price_old']) + $price;
                        if (isset($fileUpload['name']) && !empty($fileUpload['name'])) {
                            if (in_array($type, $formatFile)) {
                                move_uploaded_file($fileUpload['tmp_name'], '../assets/images/products/' . $main_img);
                                unlink("../assets/images/products/" . $img_old);
                                $this->product->productUpdateSetMoney_m($selectSetId['id'], $priceSet);
                                $this->product->productOneUpdate_m($id, $cate_id, $product_name, $main_img, $price, $description, $sale, $status);
                                $_SESSION['success'] = "Cập nhật thành công!";
                                header('Location: index.php?page=product&method=productOne');
                            } else {
                                $_SESSION['error'] = "File up load không đúng định dạng!";
                                header('Location: index.php?page=product&method=productOne');
                            }
                        } else {
                            $this->product->productUpdateSetMoney_m($selectSetId['id'], $priceSet);
                            $this->product->productOneUpdate_m($id, $cate_id, $product_name, $img_old, $price, $description, $sale, $status);
                            $_SESSION['success'] = "Cập nhật thành công!";
                            header('Location: index.php?page=product&method=productOne');
                        }
                    } else {
                        $_SESSION['error'] = "Thông tin không được bỏ trống!";
                        header('Location: index.php?page=product&method=productOne');
                    }
                }
                break;
            case 'addProduct':
                $this->getProductAdd_c();
                if (isset($_POST['insert_set'])) {
                    $count = $_POST['count'];
                    $name_sets = $_POST['name_sets'];
                    $items = $_POST['items'];
                    if (isset($_FILES['fileUploadSet'])) {
                        $fileUploadSet = $_FILES['fileUploadSet'];
                    }
                    $image_sets = time() . $this->product->convert_name($fileUploadSet['name']);
                    $typeSet = $_FILES['fileUploadSet']['type'];
                    // $priceSet = $_POST['priceSet'];
                    $descriptionSet = $_POST['descriptionSet'];

                    $brand_id = $_POST['brand_id'];

                    $cate_pro_id = $_POST['cate_pro_id'];
                    $product_name = $_POST['product_name'];
                    if (isset($_FILES['fileUpload'])) {
                        $fileUpload = $_FILES['fileUpload'];
                    }
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $formatFile = array("image/jpeg", "image/png", "image/jpg");

                    $total = array_sum($price);
                    // insert product_sets
                    if (!empty($name_sets) && !empty($brand_id) && !empty($fileUploadSet['name']) && !empty($descriptionSet)) {
                        if ($_FILES['fileUploadSet']['error'] > 0) {
                            echo "Upload error!";
                        } else {
                            if (in_array($typeSet, $formatFile)) {
                                move_uploaded_file($fileUploadSet['tmp_name'], '../assets/images/products/' . $image_sets);
                                $this->product->productInsertSet_m($brand_id, $name_sets, $image_sets, $total, $descriptionSet);
                                header('Location: index.php?page=product&method=productSet');
                            } else {
                                $_SESSION['error'] = "File up load không đúng định dạng!";
                                header('Location: index.php?page=product&method=addProduct');
                            }
                        }
                    } else {
                        $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                        header('Location:index.php?page=product&method=addProduct');
                    }
                    //* product sets
                    $product_sets = $this->product->getLastProductSetId();

                    // insert tbl_products
                    if (!empty($cate_pro_id) && !empty($brand_id) && !empty($product_name) && !empty($fileUploadSet['name']) && !empty($price) && !empty($description) && !empty($product_sets)) {
                        for ($i = 0; $i < $count; $i++) {
                            $type = $fileUpload['type'][$i];
                            $check = 0;
                            if (in_array($type, $formatFile)) {
                                $check = 1;
                                $main_img = time() . $this->product->convert_name(($fileUpload['name'][$i]));
                                move_uploaded_file($fileUpload['tmp_name'][$i], '../assets/images/products/' . $main_img);

                                $this->product->productInsert_m($cate_pro_id[$i], $brand_id, $product_sets['id'], $product_name[$i], $main_img, $price[$i], $description[$i]);
                                header('Location: index.php?page=product&method=productSet');
                            } else {
                                $_SESSION['error'] = "File up load không đúng định dạng!";
                                header('Location: index.php?page=product&method=addProduct');
                            }

                            if ($check == 1) {
                                $product = $this->product->getLastProductId();
                                $quantity = 0;
                                //insert size áo
                                if ($items[$i] == 1 || $items[$i] == 2) {
                                    for ($j = 0; $j < 6; $j++) {
                                        switch ($j) {
                                            case '0':
                                                $name_size = "XS";
                                                break;
                                            case '1':
                                                $name_size = "S";
                                                break;
                                            case '2':
                                                $name_size = "M";
                                                break;
                                            case '3':
                                                $name_size = "L";
                                                break;
                                            case '4':
                                                $name_size = "XL";
                                                break;
                                            case '5':
                                                $name_size = "XXL";
                                                break;
                                        }
                                        $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                    }
                                }
                                //insert size quần
                                elseif ($items[$i] == 3 || $items[$i] == 4) {
                                    for ($j = 27; $j < 37; $j++) {
                                        $name_size = $j;
                                        $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                    }
                                }
                                //insert size giày
                                elseif ($items[$i] == 5) {
                                    for ($j = 34; $j < 44; $j++) {
                                        $name_size = $j;
                                        $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                    }
                                }
                                //insert size ví , thắt lưng , ....
                                elseif ($items[$i] == 6) {
                                    $name_size = "default";
                                    $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                }
                            }
                        }
                    } else {
                        $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                        header('Location: index.php?page=product&method=addProduct');
                    }
                }
                //* Products one
                if (isset($_POST['insert_one'])) {
                    $cate_pro_id = $_POST['cate_pro_id'];
                    $brand_id = $_POST['brand_id'];
                    $product_name = $_POST['product_name'];
                    $items = $_POST['items'];
                    if (isset($_FILES['fileUpload'])) {
                        $fileUpload = $_FILES['fileUpload'];
                    }
                    $main_img = time() . $this->product->convert_name(($fileUpload['name']));
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $formatFile = array("image/jpeg", "image/png", "image/jpg");
                    $type = $_FILES['fileUpload']['type'];

                    if (!empty($product_name) && !empty($main_img) && !empty($price) && !empty($description)) {
                        if(is_numeric($price) && $price > 0){
                            if ($_FILES['fileUpload']['error'] > 0) {
                                echo "Upload error!";
                            } else {
                                $check = 0;
                                if (in_array($type, $formatFile)) {
                                    $check = 1;
                                    move_uploaded_file($fileUpload['tmp_name'], '../assets/images/products/' . $main_img);
                                    $this->product->productOneInsert_m($cate_pro_id, $brand_id, $product_name, $main_img, $price, $description);
                                    header('Location: index.php?page=product&method=productOne');
                                } else {
                                    $_SESSION['error'] = "File up load không đúng định dạng!";
                                    header('Location: index.php?page=product&method=addProduct');
                                }
                                if ($check == 1) {
                                    $product = $this->product->getLastProductId();
                                    $quantity = 0;
                                    //insert size áo
                                    if ($items == 1 || $items == 2) {
                                        for ($j = 0; $j < 6; $j++) {
                                            switch ($j) {
                                                case '0':
                                                    $name_size = "XS";
                                                    break;
                                                case '1':
                                                    $name_size = "S";
                                                    break;
                                                case '2':
                                                    $name_size = "M";
                                                    break;
                                                case '3':
                                                    $name_size = "L";
                                                    break;
                                                case '4':
                                                    $name_size = "XL";
                                                    break;
                                                case '5':
                                                    $name_size = "XXL";
                                                    break;
                                            }
                                            $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                        }
                                    }
                                    //insert size quần
                                    elseif ($items == 3 || $items == 4) {
                                        for ($j = 27; $j < 37; $j++) {
                                            $name_size = $j;
                                            $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                        }
                                    }
                                    //insert size giày
                                    elseif ($items == 5) {
                                        for ($j = 34; $j < 44; $j++) {
                                            $name_size = $j;
                                            $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                        }
                                    }
                                    //insert size ví , thắt lưng , ....
                                    elseif ($items == 6) {
                                        $name_size = "default";
                                        $this->product->insertDetailSize($product['id'], $name_size, $quantity);
                                    }
                                }
                            }
                        }else{
                            $_SESSION['error'] = "Giá tiền không đúng!";
                            header('Location: index.php?page=product&method=addProduct');
                        }
                    } else {
                        $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
                        header('Location: index.php?page=product&method=addProduct');
                    }
                }
                break;
            case 'product_set_delete':
                $this->productSetDelete_c();
                break;
            default:
                break;
        }
    }
}
