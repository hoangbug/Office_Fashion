<?php
if(isset($useAjax)){
    include_once '../../model/adminCommentModel.php';
}else{
    include_once 'model/adminCommentModel.php';
}
    class manageCommentsController extends manageCommentsModel{
        private $comments;
        function __construct(){
            $this->comments = new manageCommentsModel();
        }

        public function viewComments_c(){
            $selectAllComment = $this->comments->selectAllComment_m();
            include_once 'views/comments/viewComments.php';
        }

        public function deleteComment_c(){
            if(isset($_GET['comment_id']) && !empty($_GET['comment_id'])){
                $comment_id = $_GET['comment_id'];
                $checkImage = $this->comments->selectImageComment_m($comment_id);
                if(!empty($checkImage)){
                    foreach($checkImage as $value){
                        unlink('../assets/images/comments/'.$value['sub_images']);
                    }
                }
                $this->comments->deleteComment_m($comment_id);
                header('Location: index.php?page=manage_comment');
            }
        }

        public function option(){
            if(isset($_GET['method'])){
                $method = $_GET['method'];
            }else{
                $method = 'viewComments';
            }
            switch($method){
                case 'viewComments':
                    $this->viewComments_c();
                    break;
                case 'deleteComment':
                    $this->deleteComment_c();
                    break;
                default:
                    // code
                    break;
            }
        }
    }
?>