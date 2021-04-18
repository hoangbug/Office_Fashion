<?php
session_start();
ob_start();

// echo '<pre>';
// print_r($_SESSION['likeProduct']);
// echo '</pre>';
//  session_destroy();
$arr = ["loginAffiliate", "registerAffiliate", "viewAffiliate", "affiliate", "programAffiliate", "programManage", "loginMember", "registerMember", "turnOverAffiliate", "changeCode"];
if (isset($_GET['affiliate'])) {
    include_once "controller/affiliateController.php";
    $affiliate = new affiliateController();
    $affiliate->getLink();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once "views/layout/head.php";
    ?>
</head>
<body class="cms-index-index cms-home-page ">
    <?php include_once "views/plugins/messenger.php"; ?>

    <?php include_once "views/layout/noti.php"; ?>

    <div id="page">
        <!-- Header -->
        <header>
            <?php if (isset($_GET['method'])) {
                $method = $_GET['method'];
                if (!in_array($method, $arr)) {
                    include_once "views/layout/header.php";
                }
            } else {
                include_once "views/layout/header.php";
            }
            ?>
        </header>
        <!-- end header -->
        <?php if (isset($_GET['method'])) {
            $method = $_GET['method'];
            if (!in_array($method, $arr)) {
        ?>
                <div class="mm-toggle-wrap">
                    <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="mm-toggle-wrap">
                <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
            </div>
        <?php
        }
        ?>
        <!-- Navbar -->
        <?php if (isset($_GET['method'])) {
            $method = $_GET['method'];
            if (!in_array($method, $arr)) {
        ?>
                <nav>
                    <?php include_once "views/layout/nav.php"; ?>
                </nav>
            <?php
            }
        } else {
            ?>
            <nav>
                <?php include_once "views/layout/nav.php"; ?>
            </nav>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = "home";
        }

        switch ($page) {
            case 'home':
                include_once "controller/homeController.php";
                $home = new homeController();
                $home->option();
                break;
            case 'product':
                include_once "controller/productController.php";
                $product = new productController();
                $product->option();
                break;
            case 'affiliate':
                include_once "controller/affiliateController.php";
                $affiliate = new affiliateController();
                $affiliate->option();
                break;
            case 'women':
                include_once "controller/womenController.php";
                $women = new womenController();
                $women->option();
                break;
            case 'men':
                include_once "controller/menController.php";
                $men = new menController();
                $men->option();
                break;
            case 'clothesSet':
                include_once "controller/clothesSetController.php";
                $clothesSet = new clothesSetController();
                $clothesSet->option();
                break;
            case 'cart':
                include_once "controller/cartController.php";
                $cart = new cartController();
                $cart->option();
                break;
            case 'member':
                include_once "controller/memberController.php";
                $member = new memberController();
                $member->option();
                break;
            case 'blog':
                include_once "controller/blogController.php";
                $blog = new blogController();
                $blog->option();
                break;
            default:
                header("Location:404error.html");
                break;
        }
        ?>
        
        <!-- <div class="brand-logo"> -->
            <?php 
            include_once "controller/homeController.php";
            $brand = new homeController();
            $selectBrand = $brand->selectBrand_c();
            if (isset($_GET['method']) && !empty($_GET['method'])) {
            $method = $_GET['method'];
                if (!in_array($method, $arr)) {
                    include_once "views/layout/brand_logo.php";
                }
            }else{
                include_once "views/layout/brand_logo.php";
            }
             ?>
        <!-- </div> -->
        <!-- Footer -->
        <?php if (isset($_GET['method']) && !empty($_GET['method'])) {
            $method = $_GET['method'];
            if (!in_array($method, $arr)) {
        ?>
                <footer>
                    <?php include_once "views/layout/footer.php"; ?>
                </footer>
            <?php
            }
        } else {
            ?>
            <footer>
                <?php include_once "views/layout/footer.php"; ?>
            </footer>
        <?php
        }
        ?>
    </div>
    <div id="mobile-menu">
        <?php if (isset($_GET['method']) && !empty($_GET['method'])) {
            $method = $_GET['method'];
            if (!in_array($method, $arr)) {
                include_once "views/layout/mobile_menu.php";
            }
        }else{
            include_once "views/layout/mobile_menu.php";
        }
        ?>
    </div>
    <!-- JavaScript -->
    <?php
    include_once "views/layout/script.php";
    ?>
</body>

</html>