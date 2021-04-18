<?php
session_start();
ob_start();
include_once 'controller/adminDecentralizationController.php';
$decentra = new adminDecenController();
$decentra->checkIndex_c();

include_once "controller/adminAccountController.php";
$account = new adminAccountController();
$account->checkCookie();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'views/layout/head.php';
    ?>
</head>

<body data-layout="horizontal">
    <div id="wrapper">
        <header id="topnav">
            <?php
            if(isset($_GET['page']) && $_GET['page'] != "account" || !isset($_GET['page'])) {
                include_once "controller/adminDecentralizationController.php";
                $decen = new adminDecenController();
                $decen->option();
            }
            ?>
        </header>
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    
                    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = "home";
                    }

                    switch ($page) {
                        case 'home':
                            include_once "controller/adminHomeController.php";
                            $home = new adminHomeController();
                            $home->option();
                            break;
                        case 'brand':
                            include_once "controller/adminBrandController.php";
                            $home = new adminBrandController();
                            $home->option();
                            break;
                        case 'categoryProduct':
                            include_once "controller/adminCateProductController.php";
                            $category = new cateProductController();
                            $category->option();
                            break;
                        case 'categoryBlogs':
                            include_once "controller/adminCateBlogsController.php";
                            $category = new cateBlogsController();
                            $category->option();
                            break;
                        case 'account':
                            $account->option();
                            break;
                        case 'product':
                            include_once "controller/adminProductController.php";
                            $product = new productController();
                            $product->option();
                            break;
                        case 'affiliate':
                            include_once "controller/adminAffiliateController.php";
                            $affiliate = new affiliateController();
                            $affiliate->option();
                            break;
                        case 'blog':
                            include_once "controller/adminBlogController.php";
                            $blog = new blogController();
                            $blog->option();
                            break;
                        case 'manage_orders':
                            include_once "controller/adminManageOrdersController.php";
                            $order = new manageOrdersController();
                            $order->option();
                            break;
                        case 'manage_comment':
                            include_once "controller/adminCommentController.php";
                            $comment = new manageCommentsController();
                            $comment->option();
                            break;
                        case 'manage_userAdmin':
                            include_once "controller/adminManageUserController.php";
                            $manage_user = new manageUserController();
                            $manage_user->option();
                            break;
                        case 'manage_code':
                            include_once "controller/adminManageCodeController.php";
                            $manage_code = new manageCodeController();
                            $manage_code->option();
                            break;
                        default:
                            header("Location:../404error.html");
                            break;
                    }
                    ?>
                </div>
            </div>
            <?php
            if (isset($_GET['page']) && $_GET['page'] != "account" || !isset($_GET['page'])) {
                include_once 'views/layout/footer.php';
            }

            ?>
        </div>
    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <div class="right-bar">
        <?php
        if (isset($_GET['page']) && $_GET['page'] != "account") {
            include_once 'views/layout/right_bar.php';
        }
        ?>
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <?php
    if (isset($_GET['page']) && $_GET['page'] != "account") {
    ?>
        <div class="rightbar-overlay"></div>

        <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
            <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
        </a>
    <?php
    }
    ?>
    
    <!-- Vendor js -->
    <?php
    include_once 'views/layout/script.php';
    ?>
</body>

</html>