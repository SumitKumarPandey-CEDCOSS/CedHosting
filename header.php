<?php

/**
 * Php version 7.2.10
 * 
 * @category Components
 * @package  Packagename
 * @author   Sumit kumar Pandey <pandeysumit399@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/php%20mysql%20task1/register/signup.php
 */

require_once 'class/DbClass.php';
require_once 'class/userClass.php';
require_once 'class/product_class.php';
$db = new Product();
$db->connect('localhost', 'root', '', 'CedHosting');
$sql1 = $db->Category_name();
$sql = $db->Sub_category();
if (!empty(isset($_SESSION['userdata']))) {
    $username = $_SESSION['userdata']['username'];
    $user = $_SESSION['userdata']['user_id'];
}
if (isset($_SESSION['cart'])) {
    $data = count($_SESSION['cart']);
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>CED HOSTING</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
     Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!---fonts-->
    <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!---fonts-->

    <!--script-->
    <script src="js/modernizr.custom.97074.js"></script>
    <script src="js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <!--lightboxfiles-->
    <script type="text/javascript">
        $(function() {
            $('.team a').Chocolat();
        });
    </script>
    <script type="text/javascript" src="js/jquery.hoverdir.js"></script>
    <script type="text/javascript">
        $(function() {

            $(' #da-thumbs > li ').each(function() {
                $(this).hoverdir();
            });

        });
    </script>
    <!--script-->
    <!--script-->
    <link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!--script-->
</head>

<body>
    <!---header--->
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <i class="sr-only">Toggle navigation</i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </button>
                        <div class="navbar-brand">
                            <h1><a href="index.html"><img src="images/logo3.png" class="img-fluid" style="width:200px; height:160px; margin-top:-20%;" /></a></h1>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
                            <li><a href="about.php">About</a></li>
                            <li class="dropdown">
                                <a href="services.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
                            </li>
                            <li class="dropdown">
                                <?php foreach ($sql1 as $key) { ?>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $key['prod_name'] ?><i class="caret"></i></a>
                                <?php } ?>
                                <ul class="dropdown-menu">
                                    <?php foreach ($sql as $key) { ?>
                                        <li><a href="CatPage.php?id=<?php echo $key['id'] ?>"><?php echo $key['prod_name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li><a href="pricing.php">Pricing</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="cart.php">Cart&nbsp;<i class="fa fa-shopping-cart"><span class="badge badge-pill badge-success"><?php if (isset($data)&&(isset($_SESSION['userdata']))) {
                                                                                                                                                echo $data;
                                                                                                                                            } ?></span></i></a></li>
                            <?php if (isset($username)) { ?>
                                <li><a href="logout.php">Logout</a></li>
                            <?php } else { ?>
                                <li><a href="login.php">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <!---header--->