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
global $edit;
require '../class/DbClass.php';
require '../class/userClass.php';
require '../class/product_class.php';
$db = new Product();
$db->connect('localhost', 'root', '', 'CedHosting');
if (isset($_REQUEST['edit_id'])) {
    $edit = $_REQUEST['edit_id'];
    $sql = $db->get_cat_data($edit);
}
if (isset($_POST['update'])) {
    $avail = $_POST['sel1'];
    $sub_category = $_POST['sub-category'];
    $link = $_POST['link'];
    $db->update_Category($avail, $sub_category, $link, $edit);
    echo "<script>alert('Category Updated Successfully');
    window.location.href='category.php';</script>";
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
                        <?php if (isset($sql)) {
                            foreach ($sql as $key) { ?>
                                <!-- <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" id="sel1" name="sel">
                                            <option selected value="</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control" value="<?php echo $key['prod_name'] ?>" name="sub-category" placeholder="Sub-Category" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input class="form-control" value="<?php echo $key['html'] ?>" name="link" placeholder="Link" type="text">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" id="sel1" name="sel1">
                                            <option selected value="0">Not Available</option>
                                            <option selected value="1">Available</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="update" class="btn btn-primary my-4">Update Category</button>
                                </div>
                        <?php }
                        } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php require 'footer.php'; ?>