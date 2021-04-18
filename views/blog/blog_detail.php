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
            return $str_s ." ...";
        } else {
            return $str;
        }
    } else {
        return $str;
    }
}
?>
<!-- Main Container -->
<div class="main-container col2-right-layout bounceInUp animated">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9">
                <div class="page-title">
                    <h2>Blog</h2>
                </div>
                <div class="blog-wrapper" id="main">
                    <div class="site-content" id="primary">
                        <div role="main" id="content">
                            <?php
                            // echo '<pre>';
                            // print_r($selectAllBlogOnid);
                            // echo '</pre>';
                            // foreach ($selectAllBlogOnid as $value) { 
                                ?>
                                <article class="blog_entry clearfix">
                                    <header class="blog_entry-header clearfix">
                                        <div class="blog_entry-header-inner">
                                            <h2 class="blog_entry-title"> <?= $selectAllBlogOnid['title']; ?> </h2>
                                        </div>
                                        <!--blog_entry-header-inner-->
                                    </header>
                                    <!--blog_entry-header clearfix-->
                                    <div class="entry-content">
                                        <div class="featured-thumb"><a href="#"><img alt="blog-img4" src="assets/images/blogs/<?= $selectAllBlogOnid['main_image'] ?>" style="width: 100%; height: 512px;"></a></div>
                                        <div class="entry-content">
                                            <?= $selectAllBlogOnid['content_blog']; ?>
                                        </div>
                                    </div>
                                    <footer class="entry-meta"> This entry was posted in <a rel="category tag" title="View all posts in First Category" href="#/first-category">First Category</a> On
                                        <time datetime="<?= $selectAllBlogOnid['created_at'] ?>" class="entry-date"><?= $selectAllBlogOnid['created_at'] ?></time>
                                        .
                                    </footer>
                                </article>
                            <div class="comment-content wow bounceInUp animated" style="margin: 50px auto;">
                                <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="aezW0zGb"></script>
                                <div class="fb-comments" data-href="<?php echo $getUrl; ?>" data-width="100%" data-numposts="5"></div>
                                <div class="clear"></div>
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
</div>
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
