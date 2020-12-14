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
if (isset($_REQUEST['edit_prod'])) {
    $edit = $_REQUEST['edit_prod'];
    $data = $db->getdata_prod($edit);
}
if (isset($_POST['update'])) {
    $sel = $_POST['sel'];
    $prod_name = $_POST['prod_name'];
    $url = $_POST['url'];
    $monthly_price = $_POST['monthly_price'];
    $annualy_price = $_POST['annualy_price'];
    $sku = $_POST['sku'];
    $web_space = $_POST['web_space'];
    $bandwidth = $_POST['bandwidth'];
    $free_domain = $_POST['free_domain'];
    $lang = $_POST['lang'];
    $mail = $_POST['mail'];
    $features = array('web_space'=>$web_space, 'bandwidth'=>$bandwidth, 'free_domain'=>$free_domain, 'Language'=>$lang, 'mailbox'=>$mail);
    $features = json_encode($features);
    echo $db->update_product($sel, $prod_name, $url, $monthly_price, $annualy_price, $sku, $features, $edit);
}
require 'AdminHeader.php';
?>
<div class="col-xl-8 order-xl-1 m-5">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Create New Product</h3>
                    <small>Enter Product Details</small>
                </div>
                <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="">
            <?php if (isset($data)) { 
            foreach ($data as $key) { ?>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">Select Product Category</label>
                                <select class="form-control" id="sel1" name="sel">
                                        <option value="<?php echo $key['id'] ?>"><?php echo $key['prod_name'] ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Enter Product Name</label>
                                <input type="text" value="<?php echo $key['prod_name'] ?>" name="prod_name" id="input-first-name" class="form-control" placeholder="Product name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Page URL</label>
                                <input type="text" value="<?php echo $key['html'] ?>" name="url" id="input-first-name" class="form-control" placeholder="Page URL">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h3 class="mb-0">Product Description</h3>
                <small>Enter Product Description Below</small>
                <hr class="my-4" />
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Enter Monthly Price</label>
                                <input id="input-address" value="<?php echo $key['mon_price'] ?>" name="monthly_price" class="form-control" placeholder="Enter Monthly Price" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Enter Annualy Price</label>
                                <input id="input-address" name="annualy_price" value="<?php echo $key['annual_price'] ?>" class="form-control" placeholder="Enter Annualy Price" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">SKU</label>
                                <input id="input-address" value="<?php echo $key['sku'] ?>" name="sku" class="form-control" placeholder="SKU" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <?php
                $features = json_decode($key['description']);
                $webspace = $features->web_space;
                $bandwidth = $features->bandwidth;
                $free_domain = $features->free_domain;
                $Language = $features->Language;
                $mailbox = $features->mailbox;
                ?>
                <h3>Features</h3>
                <hr class="my-4" />
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Web Space(in GB) </label>
                                <input id="input-address" value="<?php echo $webspace ?>" name="web_space" class="form-control" placeholder="Web Space" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Bandwidth (in GB)</label>
                                <input id="input-address" value="<?php echo $bandwidth ?>" name="bandwidth" class="form-control" placeholder="Bandwidth" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Free Domain</label>
                                <input id="input-address" value="<?php echo $free_domain ?>" name="free_domain" class="form-control" placeholder="Free Domain" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Language / Technology Support</label>
                                <input id="input-address" value="<?php echo $Language ?>" name="lang" class="form-control" placeholder="Language" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Mailbox</label>
                                <input id="input-address" value="<?php echo $mailbox ?>" name="mail" class="form-control" placeholder="Mailbox" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="form-group">
                            <input id="input-address" class="form-control btn btn-success" value="UPDATE" name="update" type="submit">
                        </div>
                    </div>
                </div>
            <?php } }?>
            </form>
        </div>
    </div>
    <?php require 'footer.php'; ?>