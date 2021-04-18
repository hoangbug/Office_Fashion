<?php
$useAjax = 1;
include_once "../../controller/adminManageUserController.php";
$user = new manageUserController();
?>
<div class="row">
    <div class="col-sm-4 col-xl-3">
        <h5 class="card-title" style="text-align: center;">User</h5>
    </div>
    <div class="col-sm-8 col-xl-9">
        <h5 class="card-title" style="text-align: center;">Thông tin user</h5>
    </div>
</div>
<?php
if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $selectUserId = $user->selectViewUser_c($user_id);
    $decentra = $user->decentralization_c();
    // if(isset($_COOKIE['idUser']) && !empty($_COOKIE['idUser'])){
    //     $user_id = $_COOKIE['idUser'];
        $checkUser = $user->checkUserDecentra_c($user_id);
    // }
    $arr = array();
    foreach($checkUser as $value){
        foreach($value as $info){
            array_push($arr, $info);
        }
    }
    // echo '<pre>';
    // print_r($arr);
    // echo '</pre>';
    foreach ($selectUserId as $value) {
?>
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-4 col-xl-3">
                    <div class="card">
                        <img class="img-fluid" src="assets/images/users/<?= $value['avatar'] ?>" alt="image user">
                        <div class="card-body">
                            <h3 class="text-success font-weight-bold" style="text-align: center;"> <?= $value['name'] ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5>ID - Tên user:</h5>
                                <h4 class="pl-3 text-info"><?= $value['id']; ?> - <?= $value['name'] ?></h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>Email:</h5>
                                <h4 class="pl-3 text-info"><?= $value['email']; ?></h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>Số điện thoại:</h5>
                                <h4 class="pl-3 text-info"><?= $value['phone']; ?></h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>Địa chỉ:</h5>
                                <h4 class="pl-3 text-info"><?= $value['address']; ?></h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>Password:</h5>
                                <h4 class="pl-3 text-info"><?= $value['password']; ?></h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>Trạng thái:</h5>
                                <h4 class="pl-3 text-info"><?php if (($value['status']) == 0) {
                                                                echo "<i class='ion ion-md-close-circle' style='color: red;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Chờ xử lý";
                                                            } elseif (($value['status']) == 1) {
                                                                echo "<i class='ion ion-md-checkmark-circle' style='color: lime;font-size: 23px; padding: 10px; vertical-align: middle;'></i>Đang hoạt động";
                                                            } ?></h4>
                            </div>
                            <div class="d-flex flex-column">
                                <h5>Phân quyền:</h5>
                                <div class="d-flex flex-column">
                                    <?php $count = 1; $i = 1; $j = 1; foreach($decentra as $info){ ?>
                                    <div class="form-check form-check-inline">
                                        <input type="hidden" name="user_id" value="<?=$user_id;?>">
                                        <input class="form-check-input decentralization" type="checkbox" name="decentralization[]" id="category<?=$i++;?>" value="<?=$info['id'];?>" <?php if(in_array($info['id'], $arr)){echo "checked";} ?>>
                                        <label class="form-check-label" for="category<?=$j++;?>"> <?=$count++;?>. Quản lý <?=$info['title'];?></label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>Thời gian tạo:</h5>
                                <h4 class="pl-3 text-info"><?= $value['created_at']; ?></h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>Cập nhật lúc:</h5>
                                <h4 class="pl-3 text-info"><?= $value['updated_at']; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="updateUser">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
<?php
    }
}
?>