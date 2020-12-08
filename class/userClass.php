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
class User extends DB
{
    //login function
    public function login($email, $password)
    {
        $email_approved = 0;
        $phone_approved = 0;
        $active = 0;
        $sql = 'SELECT * FROM tbl_user WHERE `email`="' . $email . '" AND 
        `password`="' . $password . '" AND `email_approved`="' . $email_approved. '" AND 
        `phone_approved`="' . $phone_approved. '" AND `active`="' . $active. '" ';
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['is_admin'] == 'admin') {
                    $_SESSION["userdata"] = array('username' => $row['name'], 'user_id' => $row['id'], 'is_admin' => $row['is_admin']);
                    echo "<script>alert('Login Success');
                    window.location.href='Admin/index.php';
                    </script>";
                } elseif ($row['is_admin'] == 'user') {
                    $_SESSION["userdata"] = array('username' => $row['name'], 'user_id' => $row['id'], 'is_admin' => $row['is_admin']);
                    echo "<script>alert('Login Success');
                    window.location.href='index.php';
                    </script>";
                } else {
                    echo "<script>alert('Login Failed');
                    window.location.href='account.php';
                    </script>";
                }
            }
        }
    }
}
