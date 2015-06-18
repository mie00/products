<?php
include_once("../control/edit_product/control.php");
$objControl = new controlEditProduct;
$html_title="Edit Product";
include_once("html/before_content.htm");
$msg="";
$select_categories="";
if(isset($_POST['subgotoedit'])) {
    $chosen_product_id=$_POST['chosen_product_id'];
    list($bool,$resource) = $objControl->getProductData($chosen_product_id);
    if($bool==false){
        $msg= $resource;
    }
    else{
        while($product=mysqli_fetch_array($resource)){
            $chosen_product_name=$product['name'];
            $chosen_product_image=$product['image'];
            $chosen_product_category=$product['category'];
            $select_categories="<option value='$chosen_product_category'>$chosen_product_category</option>";
            list($bool,$resource) = $objControl->getCategories();


            if($bool==false){
                $msg= $resource;
            }
            else{
                while($categories=mysqli_fetch_array($resource)){
                    $all_categories= "<option value='".$categories['name']."'>".$categories['name']."</option>";
                    $select_categories .=$all_categories;
                }

            }
        }

    }
    include_once("html/edit_product_form.html");
}

if(isset($_POST['subeditproduct'])) {
    $id=$_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $image_name=$_FILES['image']['name'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image="images/".$photo_name;
    //    echo $name.$category.$image_name;
    list($bool, $return) = $objControl->validateNewProductData($id,$name,$category,$image_name);
    if ($bool == true) {
        move_uploaded_file($image_tmp_name,$image);
        header("location:index1.php");
    }
    else {
        $msg = $return;
    }

}