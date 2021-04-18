<?php
if(isset($useAjax)){
    include_once '../../../config/myconfig.php';
}else{
include_once '../config/myconfig.php';
}
class manageUserModel extends Connect{
    function __construct()
    {
        parent::__construct();
    }

    //* select all user admin
    protected function selectAllUser_m(){
        $sql = "SELECT `id`, `name`, `avatar`, `email`, `phone`, `status` FROM `tbl_user`";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function selectAllUserApproval_m(){
        $sql = "SELECT `id`, `name`, `avatar`, `email`, `phone`, `status` FROM `tbl_user` WHERE status = 0";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function selectAllUserAuthorization_m(){
        $sql = "SELECT `id`, `name`, `avatar`, `email`, `phone`, `status` FROM `tbl_user` WHERE status = 1";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* update approval
    protected function updateUserApproval_m($id){
        $sql = "UPDATE `tbl_user` SET `status`=1,`updated_at`=NOW() WHERE `id`=:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
    }

    //* select user id
    protected function selectViewUser_m($id){
        $sql = "SELECT tbl_user.id, tbl_user.name, tbl_user.avatar, tbl_user.email, tbl_user.phone, tbl_user.address, tbl_user.password, tbl_user.role, tbl_user.status, tbl_user.created_at, tbl_user.updated_at FROM tbl_user WHERE tbl_user.id =:id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* select tbl_decentralization
    protected function decentralization_m(){
        $sql = "SELECT `id`,`title`,`decentralization` FROM `tbl_decentralization` WHERE `status` = 1";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function decentralizationOne_m(){
        $sql = "SELECT `id` FROM `tbl_decentralization` WHERE `status` = 1";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* check
    protected function checkUserDecentra_m($user_id){
        $sql = "SELECT `decentralization_id` FROM `tbl_decentralization_user` WHERE `user_id` =:user_id";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":user_id", $user_id);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //* insert tbl_decentralization_user
    protected function insertDecentra_m($user_id, $decentralization_id){
        $sql = "INSERT INTO `tbl_decentralization_user`(`user_id`, `decentralization_id`) VALUES (:user_id, :decentralization_id)";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":user_id", $user_id);
        $result->bindParam(":decentralization_id", $decentralization_id);
        $result->execute();
    }

    //* delete
    protected function deleteDecentra_m($user_id){
        $sql = "DELETE FROM `tbl_decentralization_user` WHERE `user_id` =:user_id ";
        $result = $this->pdo->prepare($sql);
        $result->bindParam(":user_id", $user_id);
        $result->execute();
    }
}
?>