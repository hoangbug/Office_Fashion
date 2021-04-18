<?php
if(isset($useAjax)){
    include_once '../../model/adminHomeModel.php';
}else{
    include_once 'model/adminHomeModel.php';
}
    class adminHomeController extends adminHomeModel
    {
        private $adminHome;
        function __construct()
        {
            $this->adminHome = new adminHomeModel();
        }

        //content page

        //page login
        public function viewLogin(){
            include_once 'views/account/login.php';
        }

        //* search
        public function viewHome(){
            if(isset($_GET['search']) && !empty($_GET['search'])){
                $search = $_GET['search'];
                $selectSearch = $this->adminHome->selectSearchSubmit_m($search);
                include_once 'views/products/list_product.php';
            }else{
                include_once 'views/home/home.php';
            }
        }

        //* search ajax
        public function selectSearchAdmin_c($search)
        {
            return $this->adminHome->selectSearchAdmin_m($search);
        }

        // location page
        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'home';
            }

            switch ($method) {
                case 'home':
                   $this->viewHome();
                    break;
                case 'login':
                    # code...
                    break;
                
                default:
                    header("Location:../404error.html");
                    break;
            }
        }
    }

?>