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
require 'header.php';
if (isset($_SESSION['data'])) {
    $email= $_SESSION['data']['email'];
    $mobile = $_SESSION['data']['mobile'];
}
?>
<body>
    <div class="success_msg">
        <center>
            <H1>Please Select An Option to verify your Credentials</H1><br>
        </center>
        <form action="email_verify.php" method="POST">
            <div class="input">
                <label for="">Email</label>
                <input type="text" value="<?php echo $email ?>" />
                <button type="submit" class="btn btn-primary">Verify</button>
            </div>
        </form>
        <form action="mobileOtp.php" method="POST">
            <div class="input">
                <label for="">Mobile</label>
                <input type="text" name="mobile" value="<?php echo $mobile ?>" />
                <button type="submit" class="btn btn-primary">Verify</button>
            </div>
        </form>

    </div>
</body>
<?php require 'footer.php' ?>
?>