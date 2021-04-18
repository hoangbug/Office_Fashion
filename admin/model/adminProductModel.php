<?php
if(isset($useAjax)){
    include_once '../../../config/myconfig.php';
}else{
include_once '../config/myconfig.php';
}
class productModel extends Connect{
    function __construct()
    {
        parent::__construct();
    }

    //* Insert products set
    protected function productInsertSet_m($brand_id, $name_sets, $image_sets, $total, $descriptionSet){
        $sql = "INSERT INTO `tbl_product_sets`(`brand_id`, `product_name_sets`, `image_sets`, `price`, `description`) VALUES  ( :brand_id, :product_name_sets, :image_sets, :price, :description)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":brand_id", $brand_id);
        $result->bindParam(":product_name_sets", $name_sets);
        $result->bindParam(":image_sets", $image_sets);
        $result->bindParam(":price", $total);
        $result->bindParam(":description", $descriptionSet);
        $result->execute();
    }

    //* Update products set
    protected function productUpdateSet_m($id, $product_name_sets, $image_sets, $description, $sale, $status){
        $sql = "UPDATE `tbl_product_sets` SET `product_name_sets`=:product_name_sets,`image_sets`=:image_sets,`description`=:description,`sale`=:sale,`status`=:status,`updated_at`=NOW() WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->bindParam(":product_name_sets", $product_name_sets);
        $result->bindParam(":image_sets", $image_sets);
        $result->bindParam(":description", $description);
        $result->bindParam(":sale", $sale);
        $result->bindParam(":status", $status);
        $result->execute();
    }

    //* Delete products set
    protected function productDeleteSet_m($id){
        $sql = "DELETE FROM `tbl_product_sets` WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
    }

    //* Select product set
    protected function productSelectAllSet_m(){
        $sql = "SELECT tbl_product_sets.id, tbl_product_sets.product_name_sets, tbl_product_sets.brand_id, tbl_product_sets.image_sets, tbl_product_sets.price, tbl_product_sets.description, tbl_product_sets.sale, tbl_product_sets.views, tbl_product_sets.status, tbl_product_sets.created_at, tbl_product_sets.updated_at, tbl_brand.name_brand
        FROM tbl_product_sets, tbl_brand
        WHERE tbl_product_sets.brand_id = tbl_brand.id";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* Select product set id
    protected function productSelectId_m($id){
        $sql = "SELECT tbl_product_sets.id, tbl_product_sets.product_name_sets, tbl_product_sets.image_sets, tbl_product_sets.price, tbl_product_sets.description, tbl_product_sets.sale, tbl_product_sets.views, tbl_product_sets.status, tbl_product_sets.created_at, tbl_product_sets.updated_at, tbl_brand.name_brand
        FROM tbl_product_sets, tbl_brand
        WHERE tbl_product_sets.brand_id=tbl_brand.id AND tbl_product_sets.id=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //select product of product set
    protected function getProducOfSet($product_sets_id)
    {
        $sql = "SELECT * FROM tbl_products WHERE `product_sets_id` = :product_sets_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_sets_id", $product_sets_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* Insert products
    protected function productInsert_m($cate_id, $brand_id, $product_sets_id, $name, $main_img, $price, $description){
        $sql = "INSERT INTO `tbl_products`(`cate_pro_id`, `brand_id`, `product_sets_id`, `name`, `main_image`, `price`, `description`) VALUES (:cate_id, :brand_id, :product_sets_id, :name, :main_img, :price, :description)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":cate_id", $cate_id);
        $result->bindParam(":brand_id", $brand_id);
        $result->bindParam(":product_sets_id", $product_sets_id);
        $result->bindParam(":name", $name);
        $result->bindParam(":main_img", $main_img);
        $result->bindParam(":price", $price);
        $result->bindParam(":description", $description);
        $result->execute();
    }

    //* Insert products
    protected function productOneInsert_m($cate_id, $brand_id, $name, $main_img, $price, $description){
        $sql = "INSERT INTO `tbl_products`(`cate_pro_id`, `brand_id`, `name`, `main_image`, `price`, `description`) VALUES (:cate_id, :brand_id, :name, :main_img, :price, :description)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":cate_id", $cate_id);
        $result->bindParam(":brand_id", $brand_id);
        $result->bindParam(":name", $name);
        $result->bindParam(":main_img", $main_img);
        $result->bindParam(":price", $price);
        $result->bindParam(":description", $description);
        $result->execute();
    }

    //* Update products
    protected function productOneUpdate_m($id, $cate_id, $name, $main_img,$price, $description, $sale, $status){
        $sql = "UPDATE `tbl_products` SET `cate_pro_id`=:cate_id, `name`=:name, `main_image`=:main_img, `price`=:price, `description`=:description, `sale`=:sale, `status`=:status, `updated_at`=NOW()   WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->bindParam(":cate_id", $cate_id);
        $result->bindParam(":name", $name);
        $result->bindParam(":main_img", $main_img);
        $result->bindParam(":price", $price);
        $result->bindParam(":description", $description);
        $result->bindParam(":sale", $sale);
        $result->bindParam(":status", $status);
        $result->execute();
    }

    //* out id product set in update mmoney product set
    protected function selectIdProduct_m($id){
        $sql = "SELECT tbl_product_sets.id, tbl_product_sets.price FROM tbl_products, tbl_product_sets WHERE tbl_product_sets.id = tbl_products.product_sets_id AND tbl_products.id =:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    //* update money product set
    protected function productUpdateSetMoney_m($id, $price){
        $sql = "UPDATE `tbl_product_sets` SET `price`=:price WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->bindParam(":price", $price);
        $result->execute();
    }

     //* Delete products 
     protected function productOneDelete_m($id){
        $sql = "DELETE FROM `tbl_products` WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
    }

    //! Select all
    protected function selectAll_m()
    {
        $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_products.product_sets, tbl_products.product_name_sets, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products, tbl_category_products, tbl_brand WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* Select all set
    protected function selectAllSet_m()
    {
        $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_product_sets.id AS 'product_sets', tbl_product_sets.product_name_sets, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products, tbl_category_products, tbl_brand, tbl_product_sets WHERE tbl_products.cate_pro_id = tbl_category_products.id AND tbl_products.brand_id = tbl_brand.id AND tbl_products.product_sets_id = tbl_product_sets.id AND tbl_products.product_sets_id IS NOT NULL ORDER BY tbl_product_sets.id DESC";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //* Select all one
    protected function selectAllOne_m()
    {
        $sql = "SELECT tbl_products.id, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_product_sets.id AS 'product_sets', tbl_product_sets.product_name_sets, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at FROM tbl_products LEFT OUTER JOIN tbl_category_products ON tbl_category_products.id = tbl_products.cate_pro_id LEFT OUTER JOIN tbl_brand ON tbl_brand.id = tbl_products.brand_id LEFT OUTER JOIN tbl_product_sets ON tbl_product_sets.id = tbl_products.product_sets_id ORDER BY tbl_products.id DESC";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* selec all one id
    protected function productSelectOneId_m($id){
        $sql = "SELECT tbl_products.id, tbl_products.cate_pro_id, tbl_products.brand_id, tbl_products.product_sets_id, tbl_products.name, tbl_products.main_image, tbl_products.price, tbl_products.description, tbl_products.sale, tbl_products.views, tbl_products.status, tbl_products.created_at, tbl_products.updated_at, tbl_category_products.name_cate, tbl_brand.name_brand, tbl_product_sets.product_name_sets FROM tbl_products LEFT OUTER JOIN tbl_product_sets ON tbl_products.product_sets_id=tbl_product_sets.id LEFT OUTER JOIN tbl_category_products ON tbl_products.cate_pro_id=tbl_category_products.id LEFT OUTER JOIN tbl_brand ON tbl_products.brand_id=tbl_brand.id WHERE tbl_products.id=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    //* Convert images
    protected function convert_name($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        return $str;
    }

    //* Select category
    protected function selectAllCategory_m(){
        $sql = "SELECT * FROM `tbl_category_products`";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    //* Select all brand
    protected function getBrand_m()
    {
        $sql = "SELECT * FROM `tbl_brand`";
        $result = $this->pdo->prepare($sql) ;
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //get last product set id
    protected function getLastProductSetId()
    {
        $sql = "SELECT * FROM tbl_product_sets ORDER BY id DESC LIMIT 1";
        $result = $this->pdo->prepare($sql) ;
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    // update size , detail image

    // get last product id
    protected function getLastProductId()
    {
        $sql = "SELECT * FROM tbl_products ORDER BY id DESC LIMIT 1";
        $result = $this->pdo->prepare($sql) ;
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    //get one category product
    protected function getOneCateProduct($id)
    {
        $sql = "SELECT `id`, `gender_product`, `items`, `name_cate`, `status`, `created_at` FROM `tbl_category_products` WHERE `id` = :id";
        $result = $this->pdo->prepare($sql) ;
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    //get size product
    protected function getSizeProduct($product_id)
    {
        $sql = "SELECT `id`, `product_id`, `name_size`, `quantity`, `status`, `created_at` FROM `tbl_detail_size` WHERE `product_id` = :product_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_id", $product_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //update quantity size
    protected function updateSizeProduct($quantity,$product_id,$name_size)
    {
        $sql = "UPDATE `tbl_detail_size` SET `quantity`= :quantity WHERE `product_id` = :product_id AND `name_size` = :name_size";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_id", $product_id);
        $result->bindParam(":name_size", $name_size);
        $result->bindParam(":quantity", $quantity);
        $result->execute();
    }
    // insert detail size 
    protected function insertDetailSize($product_id, $name_size, $quantity)
    {
        $sql = "INSERT INTO `tbl_detail_size`(`product_id`, `name_size`, `quantity`) VALUES (:product_id, :name_size, :quantity)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_id", $product_id);
        $result->bindParam(":name_size", $name_size);
        $result->bindParam(":quantity", $quantity);
        $result->execute();
    }

    // update detail image product
    protected function updateDetailImageProduct($sub_images,$id , $product_id)
    {
        $sql = "UPDATE `tbl_detail_images` SET `sub_images`=:sub_images WHERE `id` = :id AND `product_id` = :product_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_id", $product_id);
        $result->bindParam(":id", $id);
        $result->bindParam(":sub_images", $sub_images);
        $result->execute();
    }

    //insert detail image product
    protected function insertDetailImageProduct($product_id, $sub_images)
    {
        $sql = "INSERT INTO `tbl_detail_images`(`product_id`, `sub_images`) VALUES (:product_id, :sub_images)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_id", $product_id);
        $result->bindParam(":sub_images", $sub_images);
        $result->execute();
    }
    //select detail image product
    protected function getDetailImageProduct($product_id)
    {
        $sql = "SELECT `id`, `product_id`, `sub_images`, `status`, `created_at` FROM `tbl_detail_images` WHERE `product_id` =:product_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_id", $product_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //delete detail image product
    protected function deleteDetailProduct($product_id, $sub_images)
    {
        $sql = "DELETE FROM `tbl_detail_images` WHERE `sub_images` = :sub_images AND `product_id` = :product_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":product_id", $product_id);
        $result->bindParam(":sub_images", $sub_images);
        $result->execute();
    }
}
?>