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
require 'class/userClass.php';
$db = new User();
$db->connect('localhost', 'root', '', 'CedHosting');
if (!empty($_GET['key']) && isset($_GET['key'])) {
    $code = $_GET['key'];
    $db->verify($code);
}
if (isset($_REQUEST['msg'])) {
    $msg = $_REQUEST['msg'];
}
require 'header.php';
?>
<body>
    <div class="success_msg">
        <center>
            <?php if (isset($msg)) {?>
            <H1>YOUR <?php echo $msg ?> HAS BEEN VERIFIED SUCCESSFULLY</H1><br>
            <a href="login.php">Click Here to Login</a>
            <?php } else { ?>
            <H1>YOUR EMAIL HAS BEEN VERIFIED SUCCESSFULLY</H1><br>
            <a href="login.php">Click Here to Login</a>
            <?php } ?>
        </center>
    </div>
</body>
<?php require 'footer.php' ?>