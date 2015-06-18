<?php
    include_once("../control/delete_product/control.php");
    $objControl = new controlDeleteProduct;
    $html_title="Delete Product";
    include_once("html/before_content.htm");
    $msg="";
    if(isset($_POST['subdeleteproduct'])) {
        $product_id = $_POST['chosen_product_id'];
        list($bool, $return) = $objControl->validateProductId($product_id);
        if ($bool == true) {
            $htm="
            <h3>Product Deleted</h3>
            <h3><a href='index1.php'>Back to Main</a></h3>
            ";
            echo $htm;
        }
        else {
            $msg = $return;
        }


    }