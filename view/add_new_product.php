<?php
    include_once("../control/add_new_product/control.php");
    $objControl = new controlAddNewProduct;
    $html_title="Add New Product";
    include_once("html/before_content.htm");
    $msg="";
    if(isset($_POST['subgotoadd'])) {
        $current_category=$_POST['current_category'];
        $select_categories="<option value='$current_category'>$current_category</option>";
    }
    else{
        $current_category="";
        $select_categories="<option value=''>Choose Category</option>";
    }
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
    include_once("html/add_new_product_form.html");
    if(isset($_POST['subaddproduct'])) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $image_name=$_FILES['image']['name'];
        $image_tmp_name=$_FILES['image']['tmp_name'];
        $image="images/".$photo_name;
    //    echo $name.$category.$image_name;
        list($bool, $return) = $objControl->validateProductData($name,$category,$image_name);
        if ($bool == true) {
            move_uploaded_file($image_tmp_name,$image);
            header("location:index1.php");
        }
        else {
            $msg = $return;
        }

    }
    include_once("html/after_content.htm");
