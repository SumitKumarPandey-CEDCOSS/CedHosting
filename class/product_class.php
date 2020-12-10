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
class Product extends DB
{
    //login function
    public function Category()
    {
        $sql = 'SELECT * FROM tbl_product ';
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result)>0) {
            return $result;
        }
    }
    public function check_category($id, $sub_category)
    {
        $result1 = mysqli_query($this->conn, "SELECT * FROM tbl_product WHERE `prod_parent_id`='$id' AND `prod_name`='$sub_category' ");
        if (mysqli_num_rows($result1) > 0) {
            while ($row = $result1->fetch_assoc()) {
                if ($row['prod_parent_id'] == $id) {
                    echo "<script>alert('ID Already Exist')</script>";
                    return $result1->num_rows;
                } elseif ($row['prod_name'] == $sub_category) {
                    echo "<script>alert('Product Name Already Exist')</script>";
                    return $result1->num_rows;
                }
            }
        }
    }
    public function Category_name()
    {
        $sql = 'SELECT * FROM tbl_product WHERE `id`=1';
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result)>0) {
            return $result;
        }
    }
    public function Sub_Category()
    {
        $sql = 'SELECT * FROM tbl_product WHERE `prod_parent_id`=1';
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result)>0) {
            return $result;
        }
    }
    public function getdata() 
    {
        $sql = "SELECT * FROM tbl_product WHERE `prod_parent_id`=0";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result)>0) {
            return $result;
        }
    }
    public function match_category($category) 
    {
        $sql = "SELECT * FROM tbl_product WHERE `prod_parent_id`=$category";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result)>0) {
            return $result;
        }
    }
}
