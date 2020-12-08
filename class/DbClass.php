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
session_start();
class DB
{
    //connect to the database 
    public function connect($host, $user, $pass, $dtb)
    {
        $this->serverame = $host;
        $this->username = $user;
        $this->password = $pass;
        $this->dbname   = $dtb;

        return $this->conn = mysqli_connect($host, $user, $pass, $dtb) or die('Could Not Connect.');
    }
    //Inserting Data into the database
    public function insert($fields, $data, $table)
    {
        try {
            $queryFields = implode(",", $fields);

            $queryValues = implode('","', $data);

            $insert = 'INSERT INTO ' . $table . '(' . $queryFields . ') VALUES ("' . $queryValues . '")';

            if (mysqli_query($this->conn, $insert)) {
                unset($_SESSION['bookdata']);
                return true;
            } else {
                die(mysqli_error($this->conn));
            }
        } catch (Exception $ex) {
            echo "Some Exception Occured " . $ex;
        }
    }
    public function checkinsert($email, $mobile)
    {
        $result1 = mysqli_query($this->conn, "SELECT * FROM tbl_user WHERE `email`='$email' AND `mobile`='$mobile' ");
        if (mysqli_num_rows($result1) > 0) {
            while ($row = $result1->fetch_assoc()) {
                if ($row['email'] == $email) {
                    echo "<script>alert('Email Already Exist')</script>";
                    return $result1->num_rows;
                } elseif ($row['mobile'] == $mobile) {
                    echo "<script>alert('Mobile Already Exist')</script>";
                    return $result1->num_rows;
                }
            }
        }
    }
}
