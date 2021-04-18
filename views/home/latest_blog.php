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
<div class="container">
    <div class="row">
        <div class="new_title center">
            <h2>Latest Blog</h2>
        </div>
        <?php foreach($selectBlogHot as $value){ ?>
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="blog_inner">
                <div class="blog-img"> <img src="assets/images/blogs/<?=$value['main_image'];?>" alt="Blog image">
                    <div class="mask"> <a class="info" href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>">Read More</a> </div>
                </div>
                <h3><a href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>"><?=$value['title'];?></a> </h3>
                <div class="post-date"><i class="icon-calendar"></i><?=$value['created_at'];?></div>
                <p><?=substr_word($value['description'], 15);?></p>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="blog_inner">
                <div class="blog-img"> <img src="assets/images/blog-img2.jpg" alt="Blog image">
                    <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
                </div>
                <h3><a href="blog_detail.html">Pellentesque habitant morbi</a> </h3>
                <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                    egestas. Fusce sit ... </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="blog_inner">
                <div class="blog-img"> <img src="assets/images/blog-img3.jpg" alt="Blog image">
                    <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
                </div>
                <h3><a href="blog_detail.html">Pellentesque habitant morbi</a> </h3>
                <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                    egestas. Fusce sit ... </p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="blog_inner">
                <div class="blog-img"> <img src="assets/images/blog-img4.jpg" alt="Blog image">
                    <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
                </div>
                <h3><a href="blog_detail.html">Pellentesque habitant morbi</a> </h3>
                <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                    egestas. Fusce sit ... </p>
            </div>
        </div> -->
    </div>
</div>