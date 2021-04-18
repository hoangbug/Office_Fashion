<div id="magik-slideshow" class="magik-slideshow">
    <?php
    include_once "views/home/slideshow.php";
    ?>
</div>
<!-- end banner -->
<div class="top-banner-section wow bounceInUp animated">
    <?php
    include_once "views/layout/top_banner_section.php";
    ?>
</div>

<div class="main-col">
    <div class="container">
        <div class="row">
            <?php
            include_once 'views/home/product_grid_view.php';
            ?>
        </div>
    </div>
</div>

<!-- Featured Products -->
<section class="featured-pro container wow bounceInUp animated">
    <?php
    include_once 'views/home/featured_product.php';
    ?>
</section>

<div class="offer-slider wow animated parallax parallax-2">
    <?php
    include_once "views/home/offer_slider.php";
    ?>
</div>
<!--Offer silder End-->

<!-- Latest Blog -->
<section class="latest-blog wow bounceInUp animated">
    <?php
    include_once "views/home/latest_blog.php";
    ?>
</section>
<!-- End Latest Blog -->

<!-- offer banner section -->

<div class="offer-banner-section wow bounceInUp animated">
    <?php
    include_once "views/home/offer_banner_section.php";
    ?>
</div>