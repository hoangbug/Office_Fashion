<?php

    if(isset($useAjax)){
        include_once '../../model/blogModel.php';
    }else{
        include_once 'model/blogModel.php';
    }
    class blogController extends blogModel
    {
        private $blog;
        
        function __construct()
        {
            $this->blog = new blogModel();
        }

        public function viewsBlog_c()
        {
            $limit = 5;
            $links = 2;
            $countData = $this->blog->countData_m();
            $selectViewsTop = $this->blog->selectBogViewsTop_m();
            $count = ceil($countData['count'] / $limit);
            if(isset($_GET['pages']) && !empty($_GET['pages'])){
                $pages = $_GET['pages'];
                if($pages == 1 || $pages == $count){
                    $links = 4;
                    echo $links;
                    $prev = $pages - 1;
                    $next = $pages + 1;
                    $start = (($pages - $links ) > 0) ? $pages - $links : 1;
                    $end = (($pages + $links ) < $count) ? $pages + $links : $count;
                    $from = ($pages - 1) * $limit;
                    $selectProduct = $this->blog->paginationBlog_m($from, $limit);
                    include_once 'views/blog/viewsBlog.php';
                }elseif($pages == 2 || $pages == ($count - 1)){
                    $links = 3;
                    $prev = $pages - 1;
                    $next = $pages + 1;
                    $start = (($pages - $links ) > 0) ? $pages - $links : 1;
                    $end = (($pages + $links ) < $count) ? $pages + $links : $count;
                    $from = ($pages - 1) * $limit;
                    $selectProduct = $this->blog->paginationBlog_m($from, $limit);
                    include_once 'views/blog/viewsBlog.php';
                }else{
                    $prev = $pages - 1;
                    $next = $pages + 1;
                    $start = (($pages - $links ) > 0) ? $pages - $links : 1;
                    $end = (($pages + $links ) < $count) ? $pages + $links : $count;
                    $from = ($pages - 1) * $limit;
                    $selectProduct = $this->blog->paginationBlog_m($from, $limit);
                    include_once 'views/blog/viewsBlog.php';
                }
                
            }else{
                $pages = 1;
                $links = 4;
                $prev = $pages - 1;
                $next = $pages + 1;
                $start = (($pages - $links ) > 0) ? $pages - $links : 1;
                $end = (($pages + $links ) < $count) ? $pages + $links : $count;
                $from = ($pages - 1) * $limit;
                $selectProduct = $this->blog->paginationBlog_m($from, $limit);
                include_once 'views/blog/viewsBlog.php';
            }
        }

        public function viewsBlogDetail_c()
        {
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $getUrl = $this->blog->getCurURL();
                $selectAllBlogOnid = $this->blog->selectOnIdBlog_m($id);
                $views = $selectAllBlogOnid['views'];
                $views += 1;
                $this->blog->updateBlogs_m($id, $views);
                $selectViewsTop = $this->blog->selectBogViewsTop_m();
                include_once 'views/blog/blog_detail.php';
            }
        }

        public function getCurURL_c(){
            return $this->product->getCurURL();
        }

        public function option()
        {
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'blog';
            }
            switch($method){
                case 'blog':
                    $this->viewsBlog_c();
                    break;
                case 'blogDetail':
                    $this->viewsBlogDetail_c();
                    break;
                default:
                    // code
                break;
            }
        }
    }
?>
