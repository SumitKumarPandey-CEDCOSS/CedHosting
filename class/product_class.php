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
        if (mysqli_num_rows($result) > 0) {
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
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function Sub_Category()
    {
        $sql = 'SELECT * FROM tbl_product WHERE `prod_parent_id`=1  AND `prod_available`=1';
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function getdata()
    {
        $sql = "SELECT * FROM tbl_product WHERE `prod_parent_id`=0";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function match_category($category)
    {
        $sql = "SELECT * FROM tbl_product WHERE `prod_parent_id`=$category";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function Del_Cat($delid)
    {
        $result = mysqli_query($this->conn, "DELETE FROM tbl_product  WHERE `id`='" . $delid . "'");
        return "Rejected SuccessFully";
    }
    public function add_product($sel, $prod_name, $url, $monthly_price, $annualy_price, $sku, $features)
    {
        $sql = "INSERT INTO tbl_product(`prod_parent_id`, `prod_name`, `html`)
        VALUES ('" . $sel . "', '" . $prod_name . "','" . $url . "')";
        if ($this->conn->query($sql) === TRUE) {
            $last_id = $this->conn->insert_id;
            $sql = "INSERT INTO tbl_product_description(`prod_id`, `mon_price`, `annual_price`, `sku`, `description`)
           VALUES ('" . $last_id . "','" . $monthly_price . "','" . $annualy_price . "','" . $sku . "','" . $features . "')";
            if ($this->conn->query($sql) === TRUE) {
                echo '<script>alert("inserted")</script>';
                return 'success';
            }
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
    public function viewprod()
    {
        $sql = "SELECT tbl_product_description.id,prod_id,mon_price,annual_price,sku, 
        tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date,description FROM 
        tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id ";
        $products = $this->conn->query($sql);
        if (mysqli_num_rows($products) > 0) {
            return $products;
        }
    }
    public function get_cat_data($edit_id)
    {
        $sql = "SELECT * FROM tbl_product WHERE `id`=$edit_id";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function update_Category($avail, $sub_category, $link, $edit)
    {
        $sql = "UPDATE tbl_product SET `prod_available`='$avail', `prod_name`='$sub_category', `html`='$link' WHERE `id`='$edit'";
        $result = $this->conn->query($sql);
        return "Updated SuccessFully";
    }
    public function getdata_prod($edit)
    {
        $sql = "SELECT tbl_product_description.id,prod_id,mon_price,annual_price,sku, 
        tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date,description FROM 
        tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id WHERE `prod_id`=$edit";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function update_product($sel, $prod_name, $url, $monthly_price, $annualy_price, $sku, $features, $edit)
    {
        $sql = "UPDATE tbl_product SET `prod_name`='$prod_name', `html`='$url' WHERE `id`='$edit'";
        if ($this->conn->query($sql) === TRUE) {
            $last_id = $this->conn->insert_id;
            $sql = "UPDATE tbl_product_description SET `mon_price`='$monthly_price', `annual_price`='$annualy_price', `sku`='$sku', `description`='$features' WHERE `prod_id`='$edit'";
            if ($this->conn->query($sql) === TRUE) {
                echo '<script>alert("Updated SuccessFully");
                window.location.href="viewproduct.php";</script>';
            }
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
    public function del_prod($edit)
    {
        $sql = "DELETE FROM tbl_product WHERE `id`='$edit'";
        if ($this->conn->query($sql) === TRUE) {
            $last_id = $this->conn->insert_id;
            $sql = "DELETE FROM tbl_product_description WHERE `prod_id`='$edit'";
            if ($this->conn->query($sql) === TRUE) {
                echo '<script>alert("Deleted SuccessFully");
                window.location.href="viewproduct.php";</script>';
            }
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
    public function showdata($edit)
    {
        $sql = "SELECT * FROM `tbl_product_description`  INNER JOIN `tbl_product` ON `tbl_product_description`.`prod_id` = `tbl_product`.`id` WHERE `prod_parent_id`='".$edit."'";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
    public function product_data($id) 
    {
        $sql = "SELECT * FROM `tbl_product_description`  INNER JOIN `tbl_product` ON `tbl_product_description`.`prod_id` = `tbl_product`.`id` WHERE `prod_id`='".$id."'";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}
