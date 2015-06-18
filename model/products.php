<?php
class modelProducts {
    public function addProduct($name,$category,$image_name)
    {
        $objconfig = new config;
        $q="insert into products (name,category,image) values('$name','$category','$image_name')";
        $res = mysqli_query($objconfig->connectionString, $q);
        return $res;
    }

    public function deleteProduct($product_id)
    {
        $objconfig = new config;
        $q = "Delete From products where id=$product_id";
        $res = mysqli_query($objconfig->connectionString, $q);
        return $res;
    }

    public function getProductDetails($chosen_product_id)
    {
        $objconfig = new config;
        $q = "SELECT * FROM products where id=$chosen_product_id";
        $res = mysqli_query($objconfig->connectionString, $q);
        return $res;
    }

    public function editProduct($id,$name,$category,$image_name)
    {
        //     echo $name.$category.$image_name;
        $objconfig = new config;
        $q="update products set name='$name' ,category='$category',image='$image_name' where id=$id";
        $res = mysqli_query($objconfig->connectionString, $q);
        return $res;
    }

    public function getProducts($chosen_category)
    {
        $objconfig = new config;
        $q = "SELECT * FROM products where category='$chosen_category'";
        $res = mysqli_query($objconfig->connectionString, $q);
        return $res;
    }

}
?>