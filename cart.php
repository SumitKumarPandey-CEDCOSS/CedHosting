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
?>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>Product Name</th>
            <th>Monthly Price</th>
            <th>Annualy Price</th>
            <th>WebSpace</th>
            <th>BandWidth</th>
            <th>Free Domain</th>
            <th>Language/Technology Support</th>
        </thead>
        <?php foreach ($_SESSION['cart'] as $key) {?>
        <tbody>
            <td><?php echo $key['id'] ?></td>
            <td><?php echo $key['prod_name'] ?></td>
            <td><?php echo $key['monthly_price'] ?></td>
            <td><?php echo $key['annual_price'] ?></td>
            <td><?php echo $key['webspace'] ?></td>
            <td><?php echo $key['bandwidth'] ?></td>
            <td><?php echo $key['free_domain'] ?></td>
            <td><?php echo $key['language'] ?></td>
            <td><?php echo $key['mailbox'] ?></td>
        </tbody>
        <?php } ?>
    </table>
</body>
<?php require_once 'footer.php'; ?>