<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lib/jquery.bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lib/fancyBox/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/option2.css" />
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- script -->
    <script type="text/javascript" src="/assets/lib/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- meta -->
    <meta name="description" content="<?= $_varibles['SEO_description']; ?>">
    <meta name="keywords" content="<?= $_varibles['SEO_keywords']; ?>">
    <meta name="author" content="<?= $this->setting_model->get('author'); ?>">
    <title><?= $_varibles['SEO_title']; ?></title>
    <!-- /meta -->
</head>
<body class="home option2">
<!-- HEADER -->
<div id="header" class="header">
    <!-- top-header -->
    <?php $this->load->view('site/top_header',$_varibles); ?>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <?php $this->load->view('site/main_header',$_varibles); ?>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <?php //$this->load->view('site/category_menu',$_varibles); ?>
                <?php $this->load->view('site/main_menu',$_varibles); ?>
            </div>
            <!-- userinfo on top-->
            <!-- <div id="form-search-opntop"></div> -->
            <!-- userinfo on top-->
            <!-- <div id="user-info-opntop"></div> -->
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <span class="notify notify-right"><?= $this->cart->total_items(); ?></span>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
<div class="container"><?php if(isset($_alert)) $this->load->view($_alert); ?></div>
<!-- content -->
<?php $this->load->view($_content,$_varibles); ?>
<!-- /content -->


<!-- Footer -->
<?php $this->load->view('site/footer',$_varibles); ?>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="/assets/lib/select2/js/select2.min.js"></script>
<script type="text/javascript" src="/assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="/assets/lib/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/lib/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="/assets/lib/fancyBox/jquery.fancybox.js"></script>
<script type="text/javascript" src="/assets/lib/jquery-ui/jquery-ui.min.js"></script>
<!-- COUNTDOWN -->
<script type="text/javascript" src="/assets/lib/countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="/assets/lib/countdown/jquery.countdown.js"></script>
<!-- iCheck -->
<script src="/vendors/iCheck/icheck.min.js"></script>
<!-- ./COUNTDOWN -->
<script type="text/javascript" src="/assets/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="/assets/js/theme-script.js"></script>


</body>
</html>