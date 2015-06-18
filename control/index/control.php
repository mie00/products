<?php
include_once("../model/config.php");
include_once("../model/categories.php");
include_once("../model/products.php");
class controlIndex
{

    public function validateCategoryName($chosen_category)
    {
        if ($chosen_category == null) {
            $arr[] = false;
            $arr[] = "Please Choose a category";
            return $arr;
        } else {
            $res = $this->passCategoryToModel($chosen_category);
            if ($res == false) {
                $arr[] = false;
                $arr[] = "Category doesn't contain products";
                return $arr;
            } else {
                $arr[] = true;
                $arr[] = $res;
                return $arr;
            }

        }
    }

    private function passCategoryToModel($chosen_category)
    {
        $objModel = new modelProducts;
        $res = $objModel->getProducts($chosen_category);
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
}

?>