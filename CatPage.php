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
require 'class/product_class.php';
require 'header.php';
$db = new Product();
$db->connect('localhost', 'root', '', 'CedHosting');
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $data = $db->get_cat_data($id);
    $sql = $db->showdata($id);
}
// if (isset($data)) {
//     foreach ($data as $key) {
?>
<div class="content">
    <?php
    if (isset($data)) {
        foreach ($data as $key) {
            echo $key['html'];
        }
    } ?>
    <div class="tab-prices">
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div class="linux-prices">
                            <?php
                            if (isset($sql)) {
                                foreach ($sql as $key1) {
                                    $features = json_decode($key1['description']);
                                    $webspace = $features->web_space;
                                    $bandwidth = $features->bandwidth;
                                    $free_domain = $features->free_domain;
                                    $Language = $features->Language;
                                    $mailbox = $features->mailbox;
                            ?>
                                    <div class="col-md-3 linux-price">
                                        <div class="linux-top">
                                            <h4><?php echo $key1['prod_name'] ?></h4>
                                        </div>
                                        <div class="linux-bottom">
                                            <h5>$<?php echo $key1['mon_price'] ?>
                                                &nbsp;<span class="month">per month</span></h5>
                                            <h5>$<?php echo $key1['annual_price'] ?>
                                                &nbsp;<span class="month">Annualy</span></h5>
                                            <h6><?php echo $free_domain ?></h6>
                                            <ul>
                                                <li><strong><?php echo $webspace ?></strong> Web Space</li>
                                                <li><strong><?php echo $bandwidth ?></strong> BandWidth</li>
                                                <li><strong><?php echo $mailbox ?></strong> Email Accounts</li>
                                                <li><strong><?php echo $bandwidth ?></strong> Global CDN</li>
                                                <li><strong><?php echo $Language ?></strong> Technology Support</li>
                                                <li><strong>Location</strong> : <img src="images/india.png"></li>
                                            </ul>
                                        </div>

                                        <a href="book.php?id=<?php echo $key1['id'] ?>">buy now</a>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>