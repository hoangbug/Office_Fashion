<meta charset="utf-8">
<title>Data Table | Velonic - Responsive Bootstrap 4 Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Responsive bootstrap 4 admin template" name="description">
<meta content="Coderthemes" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- App favicon -->
<link rel="shortcut icon" href="assets\images\favicon.ico">

<!-- Plugins css-->



<link href="assets\libs\custombox\custombox.min.css" rel="stylesheet" type="text/css">

<!-- third party css -->
<link href="assets\libs\datatables\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="assets\libs\datatables\buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="assets\libs\datatables\responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="assets\libs\datatables\select.bootstrap4.min.css" rel="stylesheet" type="text/css">


<!-- App css -->
<link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
<link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
<link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<link rel="stylesheet" href="assets/css/mycss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets\ckeditor\ckeditor.js"></script>
<?php
if (isset($_GET['method'])) {
    $method = $_GET['method'];
    if (!($method == 'addProduct')) {
?>
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<?php
    }
}
?>