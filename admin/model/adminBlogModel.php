<?php
    if(isset($useAjax)){
        include_once '../../../config/myconfig.php';
    }else{
        include_once '../config/myconfig.php';
    }
    class blogModel extends Connect{
        function __construct()
        {
            parent::__construct();
        }

         //* Insert blog
        protected function blogInsert_m($cate_blog_id, $user_id, $title, $main_image, $description, $content_blog){
            $sql = "INSERT INTO `tbl_blogs`(`cate_blog_id`, `user_id`, `title`, `main_image`, `description`, `content_blog`) VALUES (:cate_blog_id, :user_id, :title, :main_image, :description, :content_blog)";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":cate_blog_id", $cate_blog_id);
            $result->bindParam(":user_id", $user_id);
            $result->bindParam(":title", $title);
            $result->bindParam(":main_image", $main_image);
            $result->bindParam(":description", $description);
            $result->bindParam(":content_blog", $content_blog);
            $result->execute();
        }

        //* Update blog
        protected function blogUpdate_m($id, $id_user, $cate_blog_id, $title, $main_image, $description, $content_blog, $status){
            $sql = "UPDATE `tbl_blogs` SET `cate_blog_id`=:cate_blog_id,`title`=:title,`main_image`=:main_image,`description`=:description,`content_blog`=:content_blog,`status`=:status,`updated_at`=NOW() WHERE `id`=:id AND `user_id`=:id_user";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":id_user", $id_user);
            $result->bindParam(":cate_blog_id", $cate_blog_id);
            $result->bindParam(":title", $title);
            $result->bindParam(":main_image", $main_image);
            $result->bindParam(":description", $description);
            $result->bindParam(":content_blog", $content_blog);
            $result->bindParam(":status", $status);
            $result->execute();
        }

        //* Delete blog
        protected function blogDelete_m($id){
            $sql = "DELETE FROM `tbl_blogs` WHERE `id`=:id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
        }

        //* Select all blog
        protected function selectAllBlog_m(){
            $sql = "SELECT tbl_blogs.id, tbl_blogs.cate_blog_id, tbl_blogs.user_id, tbl_blogs.title, tbl_blogs.main_image, tbl_blogs.description, tbl_blogs.views, tbl_blogs.status, tbl_blogs.created_at, tbl_category_blogs.name_cate, tbl_user.name FROM tbl_blogs, tbl_category_blogs, tbl_user WHERE tbl_blogs.cate_blog_id = tbl_category_blogs.id AND tbl_blogs.user_id = tbl_user.id";
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
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select name cate blogs
        protected function selectNameCateBlog_m(){
            $sql = "SELECT `id`, `name_cate` FROM `tbl_category_blogs`";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        //* select id_user where email
        protected function selectOnIdUser_m($email){
            $sql = "SELECT `id` FROM `tbl_user` WHERE `email`=:email";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":email", $email);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //* Convert images
        protected function convert_name($str) {
            $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
            $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
            $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
            $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
            $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
            $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
            $str = preg_replace("/(đ)/", 'd', $str);
            $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
            $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
            $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
            $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
            $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
            $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
            $str = preg_replace("/(Đ)/", 'D', $str);
            $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
            $str = preg_replace("/( )/", '-', $str);
            return $str;
        }

        //* check user - id blogs
        protected function checkUserBlogs_m($user_id, $blog_id){
            $sql = "SELECT * FROM tbl_blogs, tbl_user WHERE tbl_blogs.user_id = tbl_user.id AND tbl_user.id =:user_id AND tbl_blogs.id =:blog_id";
            $result = $this->pdo->prepare($sql);
            $result->bindParam(":user_id", $user_id);
            $result->bindParam(":blog_id", $blog_id);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
?>