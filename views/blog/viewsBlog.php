<?php
function substr_word($str, $limit)
{
    if (stripos($str, " ")) {
        $ex_str = explode(" ", $str);
        $str_s = "";
        if (count($ex_str) > $limit) {
            for ($i = 0; $i < $limit; $i++) {
                $str_s .= $ex_str[$i] . " ";
            }
            return $str_s . " ...";
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}
?>
<section class="main-container col2-right-layout bounceInUp animated">
    <div class="main container" style="margin: 100px auto; margin-top: 0 !important;">
        <div class="row">
            <div class="col-main col-sm-9">
                <div class="page-title">
                    <h2>Blog</h2>
                </div>
                <div class="blog-wrapper" id="main" total_page="<?= ceil($countData['count'] / 5); ?>">
                    <div class="site-content" id="primary">
                        <div role="main" id="content">
                            <?php foreach ($selectProduct as $value) { ?>
                                <article class="blog_entry clearfix">
                                    <header class="blog_entry-header clearfix">
                                        <div class="blog_entry-header-inner">
                                            <h2 class="blog_entry-title"> <a rel="bookmark" href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>"><?= $value['title']; ?></a> </h2>
                                        </div>
                                        <!--blog_entry-header-inner-->
                                    </header>
                                    <div class="entry-content">
                                        <div class="featured-thumb"><a href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>"><img src="assets/images/blogs/<?= $value['main_image'] ?>" alt="blog image" style="width: 100%; height: 512px;"></a></div>
                                        <div class="entry-content">
                                            <p><?= $value['description']; ?></p>
                                        </div>
                                        <p> <a class="btn" href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>">Read More</a> </p>
                                    </div>
                                    <footer class="entry-meta"> This entry was posted in <a rel="category tag" title="View all posts in First Category" href="#">First Category</a> On
                                        <time datetime="<?= $value['created_at'] ?>" class="entry-date"><?= $value['created_at'] ?></time>
                                        .
                                    </footer>
                                </article>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="pager" style="margin: 0px 0 50px 0;">
                        <div class="toolbar">
                            <div class="pager">
                                <!-- <div id="limiter">
                                    <label>Sắp xếp theo: </label>
                                    <ul>
                                        <li><a href="#">Mới nhất<span class="right-arrow"></span></a>
                                            <ul>
                                                <li><a href="#">Nổi bật nhất</a></li>
                                                <li><a href="#">Phù hợp nhất</a></li>
                                                <li><a href="#">Xu hướng</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> -->
                                <div class="pages">
                                    <label style="line-height: 3;">Page:</label>
                                    <ul class="pagination">
                                        <li style="<?php if ($pages <= 1) {
                                                        echo 'display: none;';
                                                    } ?>">
                                            <a href="<?php if ($pages <= 1) {
                                                            echo "";
                                                        } else {
                                                            echo "index.php?page=blog&pages=" . $prev;
                                                        } ?>">&laquo;</a>
                                        </li>
                                        <?php for ($i = $start; $i <= $end; $i++) { ?>
                                            <li class="<?php if ($pages == $i) {
                                                            echo "active";
                                                        } ?>">
                                                <a href="index.php?page=blog&pages=<?= $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php } ?>
                                        <li style="<?php if ($pages >= $count) {
                                                        echo 'display: none;';
                                                    } ?>">
                                            <a href="<?php if ($pages >= $count) {
                                                            echo "";
                                                        } else {
                                                            echo "index.php?page=blog&pages=" . $next;
                                                        } ?>">&raquo;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-right sidebar col-sm-3">
                <div role="complementary" class="widget_wrapper13" id="secondary">
                    <div class="popular-posts widget widget__sidebar" id="recent-posts-4">
                        <h3 class="widget-title">Bài viết nổi bật</h3>
                        <div class="widget-content">
                            <ul class="posts-list unstyled clearfix">
                                <?php foreach ($selectViewsTop as $value) { ?>
                                    <li>
                                        <figure class="featured-thumb"> <a href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>"> <img width="80" height="53" alt="blog image" src="assets/images/blogs/<?= $value['main_image'] ?>" style="width: 80px; height: 53px;"> </a> </figure>
                                        <!--featured-thumb-->
                                        <h4><a title="Pellentesque posuere" href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>"><?php echo substr_word($value['title'], 8); ?></a></h4>
                                        <p class="post-meta"><i class="icon-calendar"></i>
                                            <time datetime="<?= $value['created_at'] ?>" class="entry-date"><?= $value['created_at'] ?></time>
                                            .
                                        </p>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!--widget-content-->
                    </div>
                    <div class="popular-posts widget widget_categories" id="categories-2">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            <li class="cat-item cat-item-19599"><a href="#">First Category</a></li>
                            <li class="cat-item cat-item-19599"><a href="#">Second Category</a></li>
                        </ul>
                    </div>
                    <!-- Banner Ad Block -->
                    <div class="ad-spots widget widget__sidebar">
                        <h3 class="widget-title">Ad Spots</h3>
                        <div class="widget-content"><a target="_self" href="#" title=""><img alt="offer banner" src="assets/images/offer-banner1.jpg"></a></div>
                    </div>
                    <!-- Banner Text Block -->
                    <div class="text-widget widget widget__sidebar">
                        <h3 class="widget-title">Text Widget</h3>
                        <div class="widget-content">Mauris at blandit erat. Nam vel tortor non quam scelerisque cursus. Praesent nunc vitae magna pellentesque auctor. Quisque id lectus.<br>
                            <br>
                            Massa, eget eleifend tellus. Proin nec ante leo ssim nunc sit amet velit malesuada pharetra. Nulla neque sapien, sollicitudin non ornare quis, malesuada.
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- Main Container End -->
<div class="top-banner-section wow bounceInUp animated">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-xs-6">
                <div class="col add-banner1">
                    <div class="top-b-text"><strong>Designer Shoes</strong> For Women</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6">
                <div class="col free-shipping"><strong>Free Shipping</strong> on order over $199</div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6">
                <div class="col add-banner2">
                    <div class="top-b-text"><strong>Luxury Handbags</strong>2015 New Arrive</div>
                </div>



            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6">
                <div class="col last offer"><strong>New Collection</strong> Lorem ipsum.</div>
            </div>
        </div>
    </div>
</div>
<!-- end banner section -->