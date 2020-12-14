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
require 'AdminHeader.php';
require '../class/product_class.php';
$con = new product();
$con->connect('localhost', 'root', '', 'CedHosting');
$products = $con->viewprod();

if (isset($_REQUEST['edit_id'])) {
    $edit = $_REQUEST['edit_id'];
    $sql = $db->get_cat_data($edit);
}
if (isset($_REQUEST['delid'])) {
    $delid = $_REQUEST['delid'];
    $con->del_prod($delid);
}
?>
<div class="row">
    <div class="col">
        <div class="card bg-white shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">View Products</h3>
            </div>
            <div class="table-responsive">
                <table id="dtBasicExample" class="table p-4" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm proid">Catid</th>
                            <th class="th-sm">Category</th>
                            <th class="th-sm">Sub Category</th>
                            <th class="th-sm">Link</th>
                            <th class="th-sm">prod_available</th>
                            <th class="th-sm">Launch Date</th>
                            <th class="th-sm">Monthly price</th>
                            <th class="th-sm">Annual price</th>
                            <th class="th-sm">Web space</th>
                            <th class="th-sm">Bandwidth</th>
                            <th class="th-sm">Free Domian</th>
                            <th class="th-sm">Language</th>
                            <th class="th-sm">Mail Box</th>
                            <th class="th-sm inputb">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($products)) {
                            foreach ($products as $key) { ?>
                                <tr>
                                    <form method="POST">
                                        <td><?php echo $key['id'] ?></td>
                                        <td>Hosting</td>
                                        <td><?php echo $key['prod_name'] ?></td>
                                        <td><?php echo $key['html'] ?></td>

                                        <?php if ($key['prod_available'] == 1) {
                                            $avalb = "Yes";
                                        } else {
                                            $avalb = "No";
                                        }
                                        ?>
                                        <td><?php echo $avalb ?></td>
                                        <td><?php echo $key['prod_launch_date'] ?></td>
                                        <td><?php echo "₹" . $key['mon_price'] ?></td>
                                        <td><?php echo "₹" . $key['annual_price'] ?></td>
                                        <?php
                                        $features = json_decode($key['description']);
                                        $webspace = $features->web_space;
                                        $bandwidth = $features->bandwidth;
                                        $free_domain = $features->free_domain;
                                        $Language = $features->Language;
                                        $mailbox = $features->mailbox;
                                        ?>
                                        <td><?php echo $webspace ?></td>
                                        <td><?php echo $bandwidth ?></td>
                                        <td><?php echo $free_domain ?></span></td>
                                        <td><?php echo $Language ?></span></td>
                                        <td><?php echo $mailbox ?></span></td>
                                        <td><a href="edit_product.php?edit_prod=<?php echo $key['prod_id'] ?>" class="btn btn-primary" name="edit">EDIT</a>
                                            <a href="viewproduct.php?delid=<?php echo $key['prod_id'] ?>" onClick="javascript: return confirm('Please confirm deletion');" class="btn btn-primary" name="delete">DELETE</a>
                                        </td>
                                    </form>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</script>

<?php require 'footer.php' ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" media="all" />