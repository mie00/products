<?php
include_once("../model/config.php");
include_once("../model/categories.php");
include_once("../model/products.php");
class controlAddNewProduct
{

    /**
     * @param $name
     * @param $category
     * @param $image_name
     * @return array
     */
    public function validateProductData($name,$category,$image_name)
    {
        if ($name == null || $category==null) {
            $arr[] = false;
            $arr[] = "Please Choose a category";
            return $arr;
        } else {
            $name=addslashes($name);
            $category=addslashes($category);
            $image_name=addslashes($image_name);
            $res = $this->passProductToModel($name,$category,$image_name);
            if ($res == false) {
                $arr[] = false;
                $arr[] = "Error inserting data";
                return $arr;
            } else {
                $arr[] = true;
                $arr[] = $res;
                return $arr;
            }

        }
    }

    private function passProductToModel($name,$category,$image_name)
    {
        $objModel = new modelProducts;
        $res = $objModel->addProduct($name,$category,$image_name);
        return $res;
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
        $objModel = new modelCategories();
        $res = $objModel->getCategories();
        return $res;
    }
}

?>