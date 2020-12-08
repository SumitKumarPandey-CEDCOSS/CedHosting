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
require 'header.php';
$db = new User();
$db->connect('localhost', 'root', '', 'CedHosting');
$error = array();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['address'];
    $sec_ques = $_POST['select'];
    $sec_ans = $_POST['sec_ans'];
    $password = md5($_POST['pass']);
    $confirmpass = md5($_POST['confirmpass']);

    if ($password != $confirmpass) {
        $error = array('input' => 'password', 'msg' => 'password doesnt match');
    }
    $err = $db->checkinsert($email, $mobile);
    if ($err == 0) {
        $fields = array('name', 'mobile', 'email', 'security_question', 'security_answer', 'password');
        $values = array($name, $mobile, $email, $sec_ques, $sec_ans, $password);
        $sql = $db->insert($fields, $values, 'tbl_user');
        if ($sql) {
            echo "<script>alert('Signup Successfully');
            window.location.href='login.php';</script>";
        }
    }
}
?>
<!---login--->
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container">
            <div class="register">
                <div id="errordiv">
                    <?php if (sizeof($error) > 0) : ?>
                        <ul>
                            <?php foreach ($error as $value) : ?>
                                <li><?php echo $error['msg'];
                                    break ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <form method="POST" action="">
                    <div class="register-top-grid">
                        <h3>personal information</h3>
                        <div>
                            <span>User Name<label>*</label></span>
                            <input type="text" name="name" placeholder="Enter Name" required>
                        </div>
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="text" name="address" placeholder="Enter Email" required>
                        </div>
                        <div>
                            <span>Mobile<label>*</label></span>
                            <input type="text" name="mobile" placeholder="Enter Mobile Number" pattern="[789][0-9]{9}" required>
                        </div>
                        <div>
                            <select name="select" id="sel">
                                <option value="0">Security Question</option>
                                <option value="Your Pet Name">Your Pet Name</option>
                                <option value="Your Favourite Color">Your Favourite Color</option>
                            </select>
                            <input type="text" name="sec_ans" placeholder="Enter Security Answer" required>
                        </div>
                        <div class="clearfix"> </div>
                        <a class="news-letter" href="#">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked="" required><i> </i>Sign Up for Newsletter</label>
                        </a>
                    </div>
                    <div class="register-bottom-grid">
                        <h3>login information</h3>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" name="pass" required>
                        </div>
                        <div>
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" name="confirmpass" required>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="register-but">
                        <input type="submit" value="submit" name="submit">
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- registration -->
</div>
<!-- login -->
<?php require 'footer.php'; ?>