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
require '../class/DbClass.php';
require '../class/userClass.php';
require '../class/product_class.php';
$db = new Product();
$db->connect('localhost', 'root', '', 'CedHosting');
$sql2 = $db->Category_name();
if (isset($_POST['submit'])) {
    $id = $_POST['sel'];
    $sub_category = $_POST['sub-category'];
    $link = $_POST['link'];
    $err = $db->check_category($id, $sub_category);
    if ($err == 0) {
        $fields = array('prod_parent_id', 'prod_name', 'html');
        $values = array($id, $sub_category, $link);
        $db->insert($fields, $values, 'tbl_product');
        echo "<script>alert('Category Added Successfully')</script>";
    }
}
if (isset($_REQUEST['delid'])) {
    $delid = $_REQUEST['delid'];
    echo "<script>alert('Deleted Successfully')</script>";
    echo $db->Del_Cat($delid);
    header("Refresh:0;url=category.php");
}

require 'AdminHeader.php';
?>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 mt-5">
            <div class="card bg-secondary border-0 mb-0" style="margin-top:160px;">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <h1>Category</h1>
                    </div>
                    <form role="form" method="POST">
                        <div class="form-group mb-3">
                            <div class="input-group input-group-merge input-group-alternative">
                                <select class="form-control" id="sel1" name="sel">
                                    <option selected>Choose...</option>
                                    <?php foreach ($sql2 as $key) { ?>
                                        <option value="<?php echo $key['id'] ?>"><?php echo $key['prod_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input class="form-control" name="sub-category" title="Enter Only Alphabatic" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" placeholder="Sub-Category" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input class="form-control" name="link" placeholder="Link" type="text">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary my-4">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<h2 class='mb-3 text-center py-3'>Category</h2>
<form action="" method="POST">
    <table id="dtBasicExample" class="table px-3 pb-4" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Category</th>
                <th class="th-sm">Product Name</th>
                <th class="th-sm">Availability</th>
                <th class="th-sm">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql1 = $db->getdata();
            foreach ($sql1 as $key1) { ?>
                <?php $sql = $db->match_Category($key1['id']); ?>
                <?php foreach ($sql as $key) { ?>
                    <tr>
                        <td hidden><input type="hidden" value="<?php echo $key1['id'] ?>"></td>
                        <td>
                            <?php echo $key1['prod_name'] ?>
                        </td>
                        <td><?php echo $key['prod_name'] ?></td>
                        <td>
                            <select name="available" style="border:none;-webkit-appearance:none; padding:5px;">
                                <option value="" selected=""><?php if ($key['prod_available'] == '1') {
                                                                    echo 'Available';
                                                                } else {
                                                                    echo 'Not Available';
                                                                } ?></option>
                                <option value=""><?php if ($key['prod_available'] == '1') {
                                                        echo 'Not Available';
                                                    } else {
                                                        echo 'Available';
                                                    } ?></option>
                            </select>
                        </td>
                        <td><?php echo $key['html'] ?></td>
                        <td><a href="edit_category.php?edit_id=<?php echo $key['id']; ?>" class="btn btn-primary" name="update">Edit</a>
                        <a class="btn btn-primary" onClick="javascript: return confirm('Please confirm deletion');" href="category.php?delid=<?php echo $key['id'] ?>">Delete</a></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</form>
<?php require 'footer.php'; ?>