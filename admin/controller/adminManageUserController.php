<?php
if (isset($useAjax)) {
    include_once '../../model/adminManageUserModel.php';
} else {
    include_once 'model/adminManageUserModel.php';
}
class manageUserController extends manageUserModel
{
    private $manage;
    function __construct() {
        $this->manage = new manageUserModel();
    }

    public function viewsManageUser_c() {
        $selectViewAll = $this->manage->selectAllUser_m();
        include_once 'views/manage_user/viewsManageUser.php';
    }

    public function selectViewUser_c($id) {
        return $this->manage->selectViewUser_m($id);
    }

    public function approvalUser_c() {
        $selectViewAll = $this->manage->selectAllUserApproval_m();
        include_once 'views/manage_user/approvalUser.php';
    }

    public function authorizationUser_c() {
        $selectViewAll = $this->manage->selectAllUserAuthorization_m();
        include_once 'views/manage_user/authorizationUser.php';
    }
    public function decentralization_c()
    {
        return $this->manage->decentralization_m();
    }

    public function checkUserDecentra_c($user_id)
    {
        return $this->manage->checkUserDecentra_m($user_id);
    }

    public function option()
    {
        if(isset($_GET['method'])){
            $method = $_GET['method'];
        }else{
            $method = 'viewsManageUser';
        }
        switch($method){
            case 'viewsManageUser':
                $this->viewsManageUser_c();
                break;
            case 'approvalUser':
                $this->approvalUser_c();
                if(isset($_POST['approval'])){
                    $user_id = $_POST['user_id'];
                    if(!empty($user_id) && $user_id > 0){
                        $this->manage->updateUserApproval_m($user_id);
                        header('Location: index.php?page=manage_userAdmin&method=approvalUser');
                    }
                }
                break;
            case 'authorizationUser':
                $this->authorizationUser_c();
                if(isset($_POST['updateUser'])){
                    $user_id = $_POST['user_id'];
                    if(isset($_POST['decentralization'])){
                        $check = $_POST['decentralization'];
                        // if(isset($_COOKIE['idUser']) && !empty($_COOKIE['idUser'])){
                            // $user_id = $_COOKIE['idUser'];
                            $checkEmptyUser = $this->manage->checkUserDecentra_m($user_id);
                            if(empty($checkEmptyUser)){
                                foreach ($check as $value) {
                                    $this->manage->insertDecentra_m($user_id, $value);
                                }
                            }else{
                                $this->manage->deleteDecentra_m($user_id);
                                foreach ($check as $value) {
                                    $this->manage->insertDecentra_m($user_id, $value);
                                }
                            }
                        // }
                    }
                }
                break;
            default:
                // code
                break;
        }
    }
}
?>