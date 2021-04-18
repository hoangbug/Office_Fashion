<?php
    if(isset($useAjax)){
        include_once '../../config/myconfig.php';
    }else{
        include_once 'config/myconfig.php' ;
    }

    class blogModel extends Connect
    {
        function __construct()
        {
            parent::__construct();
        }

        //* update
        public function updateBlogs_m($id, $views)
        {
            $sql = "UPDATE `tbl_blogs` SET `views`=:views WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":views", $views);
            $result->execute();
        }

        protected function countData_m(){
            $sql = "SELECT COUNT(id) AS 'count' FROM `tbl_blogs`";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select all blog newbie - pagination Blog
        protected function paginationBlog_m($from, $row){
            $sql = "SELECT * FROM `tbl_blogs` ORDER BY id DESC LIMIT $from, $row";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select blog on id
        protected function selectOnIdBlog_m($id){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.cate_blog_id, tbl_blogs.user_id, tbl_blogs.title, tbl_blogs.main_image, tbl_blogs.description, tbl_blogs.content_blog, tbl_blogs.views, tbl_blogs.status, tbl_blogs.created_at, tbl_blogs.updated_at, tbl_category_blogs.name_cate, tbl_user.name FROM tbl_blogs, tbl_category_blogs, tbl_user WHERE tbl_blogs.cate_blog_id = tbl_category_blogs.id AND tbl_blogs.user_id = tbl_user.id AND tbl_blogs.id =:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* select 4 row views top
        protected function selectBogViewsTop_m(){
            $sql = "SELECT * FROM `tbl_blogs` ORDER BY views DESC LIMIT 0,4";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* lấy url
        protected function getCurURL()
        {
            // Kiểm tra xem giao thức web là http hay https
            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
                $pageURL = "https://";
            } else {
                $pageURL = 'http://';
            }

            // Lấy url hiện tại, cái lúc trước bị thiếu cái $_SERVER["REQUEST_URI"];
            if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            }
            return $pageURL;
        }
        
    }

?>