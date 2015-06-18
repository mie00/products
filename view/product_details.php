<?php
    session_start();
    include_once("../control/product_details/control.php");
    $objControl = new controlProductDetails;
    $html_title="Product Details";
    include_once("html/before_content.htm");
    $msg="";
    if(isset($_POST['subshowdetails'])) {
        $chosen_product_id = $_POST['chosen_product_id'];
        list($bool, $return) = $objControl->getProductDetails($chosen_product_id);
        if ($bool == true) {
            $product = mysqli_fetch_array($return) ;
            include_once("html/product_details.html");

        }
        else {
            $msg = $return;
        }

    }
    include_once("html/after_content.htm");
