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
$db = new Product();
$db->connect('localhost', 'root', '', 'CedHosting');
$item = array();
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $data = $db->getdata_prod($id);
    foreach ($data as $key) {
        $id = $key['id'];
        $prod_name = $key['prod_name'];
        $monthly_price = $key['mon_price'];
        $annual_price = $key['annual_price'];
        $description = json_decode($key['description'], true);
        $webspace = $description['web_space'];
        $bandwidth = $description['bandwidth'];
        $free_domain = $description['free_domain'];
        $language = $description['Language'];
        $mailbox = $description['mailbox'];
        // print_r($description);
        // echo $id;
    }
    $item = array(
        "id" => $id,
        "prod_name" => $prod_name,
        "monthly_price" => $monthly_price,
        "annual_price" => $annual_price,
        "webspace" => $webspace,
        "bandwidth" => $bandwidth,
        "free_domain" => $free_domain,
        "language" => $language,
        "mailbox" => $mailbox
    );
    // session_destroy();
    $_SESSION['cart'][$id] = $item;
    print_r($_SESSION['cart']);
    echo '<script>alert("Product Added Successfully");
    window.location.href="cart.php"</script>';
    return;
    // print_r($description);

    // echo $webspace,$bandwidth,$free_domain,$language,$mailbox;
}
