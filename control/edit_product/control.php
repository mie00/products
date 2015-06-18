<?php
include_once("../model/config.php");
include_once("../model/categories.php");
include_once("../model/products.php");
class controlEditProduct
{

    public function getProductData($chosen_product_id)
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


    public function getCategories()
    {
        $res = $this->passToGetCategories();
        if ($res == false) {
            $arr[] = false;
            $arr[] = "msql error";
            return $arr;
        } else {
            $arr[] = true;
            $arr[] = $res;
            return $arr;
        }
    }

    private function passToGetCategories()
    {
        $objModel = new modelCategories;
        $res = $objModel->getCategories();
        return $res;
    }

    public function validateNewProductData($id,$name,$category,$image_name)
    {
        if ($name == null || $category==null) {
            $arr[] = false;
            $arr[] = "Please insert valid data";
            return $arr;
        } else {
            $res = $this->passProductToModel($id,$name,$category,$image_name);
            if ($res == false) {
                $arr[] = false;
                $arr[] = "Error editing data";
                return $arr;
            } else {
                $arr[] = true;
                $arr[] = $res;
                return $arr;
            }

        }
    }

    private function passProductToModel($id,$name,$category,$image_name)
    {
        $objModel = new modelProducts;
        $res = $objModel->editProduct($id,$name,$category,$image_name);
        return $res;
    }

}
?>