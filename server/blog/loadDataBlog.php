<?php
$useAjax = 1;
include_once '../../controller/blogController.php';
$blog = new blogController();
if (isset($_GET['pages']) && !empty($_GET['pages'])) {
    $pages = $_GET['pages'];
    // echo $pages;
    // die();
    $row = 5;
    $from = ($pages - 1) * $row;
    // echo $from;
    // die();
    $contentBlog = $blog->paginationBlog_c($from, $row);
    // echo '<pre>';
    // print_r($contentBlog);
    // echo '</pre>';
    // die();
    foreach ($contentBlog as $value) {
?>
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
                <!-- <p>Aliquam laoreet consequat malesuada. Integer vitae diam sed dolor euismod laoreet eget ac felis. Donec non erat sed elit bibendum sodales. Donec eu cursus velit. Proin nunc lacus, gravida mollis dictum ut, vulputate eu turpis. Sed felis sapien, commodo in iaculis in, feugiat sed enim. Sed nunc ipsum, fermentum varius dignissim vitae, blandit et ante.Maecenas sagittis, lorem sed congue egestas, lectus purus congue nisl, ac molestie enim ligula nec eros. Sed leo tortor, tincidunt sit amet elementum vel, eleifend at orci. Maecenas ut turpis felis. Donec sit amet quam sem, et aliquet est.</p> -->
            </div>
            <p> <a class="btn" href="index.php?page=blog&method=blogDetail&id=<?= $value['id'] ?>">Read More</a> </p>
        </div>
        <footer class="entry-meta"> This entry was posted in <a rel="category tag" title="View all posts in First Category" href="#">First Category</a> On
            <time datetime="<?= $value['created_at'] ?>" class="entry-date"><?= $value['created_at'] ?></time>
            .
        </footer>
<?php
    }
}
?>