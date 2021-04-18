<?php
    if(isset($useAjax)){
        include_once '../../../config/myconfig.php';
    }else{
    include_once '../config/myconfig.php';
    }
    class adminDecentralizationModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //* select tbl_decentralization_user
        protected function selectDecentralization_m($user_id){
            $sql = "SELECT tbl_decentralization.id, tbl_decentralization.decentralization FROM tbl_decentralization_user, tbl_decentralization WHERE tbl_decentralization_user.decentralization_id = tbl_decentralization.id AND tbl_decentralization_user.user_id =:user_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":user_id", $user_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        protected function checkIndex_m($user_id){
            $sql = "SELECT tbl_decentralization.title FROM tbl_decentralization_user, tbl_decentralization WHERE tbl_decentralization_user.decentralization_id = tbl_decentralization.id AND tbl_decentralization_user.user_id =:user_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":user_id", $user_id);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>