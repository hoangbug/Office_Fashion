<?php
if(isset($useAjax)){
    include_once '../../../config/myconfig.php';
}else{
    include_once '../config/myconfig.php';
}
class manageCommentsModel extends Connect{
    function __construct()
    {
        parent::__construct();
    }
    
    protected function selectAllComment_m(){
        $sql = "SELECT tbl_comments.id, tbl_comments.product_id, tbl_comments.member_id, tbl_comments.content, tbl_comments.status, tbl_comments.updated_at, tbl_member.name, tbl_member.avatar, tbl_category_products.gender_product FROM tbl_comments, tbl_member, tbl_products, tbl_category_products WHERE tbl_comments.member_id = tbl_member.id AND tbl_comments.product_id = tbl_products.id AND tbl_products.cate_pro_id = tbl_category_products.id";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function selectImageComment_m($id){
        $sql = "SELECT tbl_comments_detail.sub_images FROM tbl_comments_detail, tbl_comments WHERE tbl_comments_detail.comment_id = tbl_comments.id AND tbl_comments.id =:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function deleteComment_m($comment_id){
        $sql = "";
        $result = $this->pdo->prepare($sql);
        $result->execute();
    }
}
?>