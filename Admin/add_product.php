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
$sql2 = $db->Sub_Category();
if (isset($_POST['submit'])) {
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
    $features = array('web_space' => $web_space, 'bandwidth' => $bandwidth, 'free_domain' => $free_domain, 'Language' => $lang, 'mailbox' => $mail);
    $features = json_encode($features);
    $msg = $db->add_product($sel, $prod_name, $url, $monthly_price, $annualy_price, $sku, $features);
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
        <?php if (isset($msg)) {?>
        <div class="alert alert-<?php echo $msg ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Product Added Successfully.
        </div>
        <?php } ?>
        <div class="card-body">
            <form method="POST" action="" id="demoForm">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-username">Select Product Category</label>
                                <select id="select" class="form-control" id="sel1" name="sel">
                                    <option selected>Choose...</option>
                                    <?php foreach ($sql2 as $key) { ?>
                                        <option value="<?php echo $key['id'] ?>"><?php echo $key['prod_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <span id="eb1" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Enter Product Name</label>
                                <input type="text" name="prod_name" id="input1" class="form-control" placeholder="Product name">
                                <span id="eb2" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Page URL</label>
                                <input type="text" name="url" id="input2" class="form-control" placeholder="Page URL">
                                <span id="eb3" class="error"></span>
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
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Enter Monthly Price</label>
                                <input id="input3" name="monthly_price" class="form-control  decimal inputVal" placeholder="Enter Monthly Price" type="text">
                                <span id="eb4" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Enter Annualy Price</label>
                                <input id="input4" name="annualy_price" class="form-control  decimal inputVal" placeholder="Enter Annualy Price" type="text">
                                <span id="eb5" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">SKU</label>
                                <input id="input5" name="sku" class="form-control" placeholder="SKU" type="text">
                                <span id="eb6" class="error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h3>Features</h3>
                <hr class="my-4" />
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Web Space(in GB) </label>
                                <input id="input6" name="web_space" class="form-control  decimal inputVal" placeholder="Web Space" type="text">
                                <span id="eb7" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Bandwidth (in GB)</label>
                                <input id="input7" name="bandwidth" class="form-control  decimal inputVal" placeholder="Bandwidth" type="text">
                                <span id="eb8" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Free Domain</label>
                                <input id="input8" name="free_domain" class="form-control" placeholder="Free Domain" type="text">
                                <span id="eb9" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Language / Technology Support</label>
                                <input id="input9" name="lang" class="form-control" placeholder="Language" type="text">
                                <span id="eb10" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-error">
                                <label class="form-control-label" for="input-first-name">Mailbox</label>
                                <input id="input10" name="mail" class="form-control" placeholder="Mailbox" type="text">
                                <span id="eb11" class="error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="form-group">
                            <input id="submit" class="form-control btn btn-success" value="Create Now" name="submit" type="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submit').attr('disabled', 'disabled');
            $('.inputVal').keyup(function() {
                var val = $(this).val();
                if (isNaN(val)) {
                    val = val.replace(/[^0-9\.]/g, '');
                    if (val.split('.').length > 2)
                        val = val.replace(/\.+$/, "");
                }
                $(this).val(val);
            });

            $('select').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb1').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                } else {
                    $(this).css("border", "2px solid green");
                    $('#eb1').html("");
                    $("#submit").removeAttr('disabled');
                }
            });

            $('#input1').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb2').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                }
                if (val) {
                    var pat = /^\d*?[a-zA-Z][a-zA-Z0-9\-]{1,}\d*$/i.test($("#input1").val());
                    if (!pat) {
                        $('#eb2').html("*Required");
                        $(this).focus();
                        $(this).css("border", "2px solid red");
                        $('#submit').attr('disabled', 'disabled');
                    } else {
                        $(this).css("border", "2px solid green");
                        $('#eb2').html("");
                        $("#submit").removeAttr('disabled');
                    }
                }
            });

            $('#input3').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb4').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                } else {
                    $(this).css("border", "2px solid green");
                    $('#eb4').html("");
                    $("#submit").removeAttr('disabled');
                }
            });

            $('#input4').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb5').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                } else {
                    $(this).css("border", "2px solid green");
                    $('#eb5').html("");
                    $("#submit").removeAttr('disabled');
                }
            });

            $('#input5').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb6').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                }
                if (val) {
                    var pat = /^\d?[a-zA-Z0-9#-]+?[a-zA-Z0-9][a-zA-Z0-9\-#]{1,}\d*$/i.test($("#input5").val());
                    if (!pat) {
                        $('#eb6').html("Only #,- allowed. Must contain 2 non-special characters !!");
                        $(this).focus();
                        $(this).css("border", "2px solid red");
                        $('#submit').attr('disabled', 'disabled');
                    } else {
                        $(this).css("border", "2px solid green");
                        $('#eb6').html("");
                        $("#submit").removeAttr('disabled');
                    }
                }
            });

            $('#input6').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb7').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                } else {
                    $(this).css("border", "2px solid green");
                    $('#eb7').html("");
                    $("#submit").removeAttr('disabled');
                }
            });

            $('#input7').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb8').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                } else {
                    $(this).css("border", "2px solid green");
                    $('#eb8').html("");
                    $("#submit").removeAttr('disabled');
                }
            });

            $('#input8').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb9').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                }
                if (val) {
                    var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input8").val());
                    if (!pat) {
                        $('#eb9').html("Only alphabetic/numeric values allowed.");
                        $(this).focus();
                        $(this).css("border", "2px solid red");
                        $('#submit').attr('disabled', 'disabled');
                    } else {
                        $(this).css("border", "2px solid green");
                        $('#eb9').html("");
                        $("#submit").removeAttr('disabled');
                    }
                }
            });

            $('#input9').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb10').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                }
                if (val) {
                    var pat = /^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$/i.test($("#input9").val());
                    if (!pat) {
                        $('#eb10').html("Only alphabetic/numeric values allowed.");
                        $(this).focus();
                        $(this).css("border", "2px solid red");
                        $('#submit').attr('disabled', 'disabled');
                    } else {
                        $(this).css("border", "2px solid green");
                        $('#eb10').html("");
                        $("#submit").removeAttr('disabled');
                    }
                }
            });

            $('#input10').blur(function() {
                var val = $(this).val();
                if (val == "") {
                    $('#eb11').html("*Required");
                    $(this).focus();
                    $(this).css("border", "2px solid red");
                    $('#submit').attr('disabled', 'disabled');
                }
                if (val) {
                    var pat = /(^[0-9]*$)|(^[A-Za-z]+$)/i.test($("#input10").val());
                    if (!pat) {
                        $('#eb11').html("Only alphabetic/numeric values allowed.");
                        $(this).focus();
                        $(this).css("border", "2px solid red");
                        $('#submit').attr('disabled', 'disabled');
                    } else {
                        $(this).css("border", "2px solid green");
                        $('#eb11').html("");
                        $("#submit").removeAttr('disabled');
                    }
                }
            });
        });
    </script>