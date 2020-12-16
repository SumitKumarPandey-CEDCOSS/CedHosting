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
require 'class/DbClass.php';
require 'class/product_class.php';
require 'header.php';
if (empty($_SESSION['cart'])) {
    echo "<script>alert('Cart Empty');window.location.href='login.php'</script>";
}
if (isset($_REQUEST['delid'])) {
    $id = $_REQUEST['delid'];
    unset($_SESSION['cart'][$id]);
    echo "<script>alert('Remove Item SuccessFully');
    window.location.href='cart.php'</script>";
}
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2 class="text-center" style="padding:20px;"><img src="images/cart.png" class="img-responsive" style="margin-left:550px;" width="150px" height="150px" alt=""></h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Monthly Price</th>
                            <th scope="col">Annualy Price</th>
                            <th scope="col">WebSpace</th>
                            <th scope="col">BandWidth</th>
                            <th scope="col">Free Domain</th>
                            <th scope="col">Language/Technology Support</th>
                            <th scope="col">Mailbox</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($_SESSION['cart'] as $key) { ?>
                        <tbody>
                            <tr>
                                <td scope="row"><?php echo $key['id'] ?></td>
                                <td><?php echo $key['prod_name'] ?></td>
                                <td>$<?php echo $key['monthly_price'] ?></td>
                                <td>$<?php echo $key['annual_price'] ?></td>
                                <td><?php echo $key['webspace'] ?>(GB)</td>
                                <td><?php echo $key['bandwidth'] ?></td>
                                <td><?php echo $key['free_domain'] ?></td>
                                <td><?php echo $key['language'] ?></td>
                                <td><?php echo $key['mailbox'] ?></td>
                                <td><a href="cart.php?delid=<?php echo $key['id'] ?>" class="btn btn-danger">Remove</a></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
                <div class="row" style="padding-bottom:10px;text-align:center;">
                    <div class="col-sm-12 col-md-12">
                        <a href="#" class="btn btn-success">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>