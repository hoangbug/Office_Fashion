<?php
$useAjax = 1;
include_once "../../controller/adminAffiliateController.php";
$affiliate = new affiliateController();
if (isset($_POST['account_id']) && !empty($_POST['account_id'])) {
    $id = $_POST['account_id'];
    $accountDetail = $affiliate->getAccountDetail($id);
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-12" style="padding: 20px 12px;">
            <?php
            foreach ($accountDetail as $value) {
            ?>
                <div class="form-group" style="display: none;">
                    <label for="">ID</label>
                    <input type="text" class="form-control" id="" name="id" value="<?= $value['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="text" value="<?= $value['avatar'] ?>" name="img_old" style="display: none;" readonly>
                    <input type="file" class="form-control" name="fileUpload" accept="image/*">
                </div>
                <img src="../assets/images/affiliate/account/<?= $value['avatar'] ?>" alt="" style="width: 200px; height: 200px; margin-bottom: 20px;">
                <div class="form-group">
                    <label for="">Họ đệm</label>
                    <input type="text" class="form-control" id="" name="firstname" value="<?= $value['firstname']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" id="" name="lastname" value="<?= $value['lastname']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="" name="email" value="<?= $value['email']; ?>">
                    <input type="email" class="form-control" id="" name="email_old" style="display: none;" value="<?= $value['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Nghề nghiệp</label>
                    <input type="text" class="form-control" id="" name="profession" value="<?= $value['profession']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name="address" value="<?= $value['address']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" id="" name="phone" value="<?= $value['phone']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="text" class="form-control" id="" name="password" value="<?= $value['password']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="0" <?php if ($value['status'] == 0) {
                                                echo "selected";
                                            } ?>>Khóa tài khoản</option>
                        <option value="1" <?php if ($value['status'] == 1) {
                                                echo "selected";
                                            } ?>>Đang hoạt động</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Được tạo lúc</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['created_at']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Cập nhật lúc</label>
                    <input type="text" class="form-control" id="" name="" value="<?= $value['updated_at']; ?>" readonly>
                </div>
            <?php
            }
            ?>
            <button type="submit" name="updateAccount" class="btn btn-info">Cập nhật</button>
        </div>
        </div>
    </form>
<?php
}
?>