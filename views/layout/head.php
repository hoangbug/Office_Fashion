<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta property="fb:app_id" content="1096164877550920"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<!-- Favicons Icon -->
<link rel="icon" href="assets/images/logo-icon.png" type="image/x-icon" />
<link rel="shortcut icon" href="assets/images/logo-icon.png" type="image/x-icon" />
<title>World of business clothes || Hoang Bug</title>

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="all">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css" media="all">
<link rel="stylesheet" type="text/css" href="assets/css/revslider.css">
<link rel="stylesheet" type="text/css" href="assets/css/fancybox.css" >
<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
<!-- <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.css"> -->
<link rel="stylesheet" type="text/css" href="assets/css/flexslider.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.mobile-menu.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css">
<?php if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page == 'blog' || $page == 'product'){
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/blogmate.css">
    <?php
}
} ?>

<?php
if(isset($_GET['page']) && isset($_GET['method'])){
    $page = $_GET['page'];
    $method = $_GET['method'];
    if($page == 'affiliate' && $method == 'registerAffiliate' || $method == 'loginAffiliate' || $method == 'loginMember' || $method == 'registerMember'){
?>
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
<?php
    }
}
?>
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="assets/css/mycss.css">
