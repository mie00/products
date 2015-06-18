<?php

include_once("../model/config.php");
include_once("../model/products.php");
class controlDeleteProduct
{

    public function validateProductId($product_id)
    {
        if ($product_id == null) {
            $arr[] = false;
            $arr[] = "error/php";
            return $arr;
        } else {
            $res = $this->passProductToModel($product_id);
            if ($res == false) {
                $arr[] = false;
                $arr[] = "Error Mysql";
                return $arr;
            } else {
                $arr[] = true;
                $arr[] = $res;
                return $arr;
            }

        }
    }

    private function passProductToModel($product_id)
    {
        $objModel = new modelProducts;
        $res = $objModel->deleteProduct($product_id);
        return $res;
    }

}
?>