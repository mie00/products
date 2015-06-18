<?php
include_once("../model/config.php");
include_once("../model/products.php");
class controlProductDetails
{

    public function getProductDetails($chosen_product_id)
    {
        if ($chosen_product_id == null) {
            $arr[] = false;
            $arr[] = "";
            return $arr;
        } else {
            $res = $this->passProductIdToModel($chosen_product_id);
            if ($res == false) {
                $arr[] = false;
                $arr[] = "Database Error";
                return $arr;
            } else {
                $arr[] = true;
                $arr[] = $res;
                return $arr;
            }

        }
    }

    private function passProductIdToModel($chosen_product_id)
    {
        $objModel = new modelProducts;
        $res = $objModel->getProductDetails($chosen_product_id);
        if (mysqli_num_rows($res) <= 0) {
            return false;
        } else {
            return $res;
        }
    }
}
?>