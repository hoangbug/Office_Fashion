<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script> -->
<?php
if (isset($_GET['page']) && isset($_GET['method'])) {
    $page = $_GET['page'];
    $method = $_GET['method'];
    if ($page == 'affiliate' && $method == 'registerAffiliate' || $method == 'loginAffiliate' ||  $method == 'registerMember' || $method == 'loginMember') {
?>
        <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
        <script src="assets/js/material-bootstrap-wizard.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
<?php
    }
}
?>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/revslider.js"></script>
<script type="text/javascript" src="assets/js/common.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.mobile-menu.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="assets/js/cloud-zoom.js"></script>
<script type="text/javascript" src="assets/js/myJavascript.js"></script>
<script type="text/javascript" src="assets/js/myAjax.js"></script>
<?php
if (isset($_GET['page']) && isset($_GET['method'])) {
    $page = $_GET['page'];
    $method = $_GET['method'];
    if ($page == 'affiliate' && $method == 'programAffiliate' || $method == 'programManage'  ||  $method == 'changeCode' || $method == 'turnOverAffiliate') {
?>
        <script type="text/javascript" src="assets/js/myClock.js"></script>
<?php

    }
}
?>


<script type='text/javascript'>
    jQuery(document).ready(function() {
        jQuery('#rev_slider_4').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 1920,
            startheight: 650,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'off',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'off',
            forceFullWidth: 'on',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>