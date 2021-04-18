<?php
if(isset($useAjax)){
    include_once '../../model/adminDecentralizationModel.php';
}else{
    include_once 'model/adminDecentralizationModel.php';
}
    class adminDecenController extends adminDecentralizationModel
    {
        private $adminHome;
        function __construct()
        {
            $this->adminHome = new adminDecentralizationModel();
        }

        public function option()
        {
            if(isset($_COOKIE['idUser']) && !empty($_COOKIE['idUser'])){
                $user_id = $_COOKIE['idUser'];
                $selectDecen = $this->adminHome->selectDecentralization_m($user_id);
                include_once 'views/layout/header.php';
            }
        }

        public function checkIndex_c()
        {
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page == 'categoryProduct' || $page == 'categoryBlogs' || $page == 'brand'){
                    $page = 'category';
                }
                if(isset($_COOKIE['idUser']) && !empty($_COOKIE['idUser'])){
                    $user_id = $_COOKIE['idUser'];
                    $checkDecen = $this->adminHome->checkIndex_m($user_id);
                    $arr = [];
                    foreach($checkDecen as $value){
                        foreach($value as $info){
                            array_push($arr, $info);
                        }
                    }
                    if(!in_array($page, $arr)){
                         header("Location:../404error.html");
                    }
                }
            }
        }
    }
?>