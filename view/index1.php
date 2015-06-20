<?php
    session_start();
    include_once("../control/index/control.php");
    $objControl = new controlIndex;
    $html_title="Main";
    include_once("html/before_content.htm");
    $msg="";
    $select_categories="";
    list($bool,$resource) = $objControl->getCategories();
    $select_categories="<option value=''>Choose Category</option>";

    if($bool==false){
        $msg= $resource;
    }
    else{


        while($categories=mysqli_fetch_array($resource)){
            $all_categories= "<option value='".$categories['name']."'>".$categories['name']."</option>";
            $select_categories .=$all_categories;
        }

    }

    include_once("html/choose_category_form.html");
    if(isset($_POST['subchoosecategory']) || isset($_SESSION['chosen_category'])) {
        if(isset($_POST['subchoosecategory'])){
            $chosen_category = $_POST['chosen_category'];
            $_SESSION['chosen_category']=$chosen_category;
        }
        else{
            $chosen_category=$_SESSION['chosen_category'];
        }

        list($bool, $return) = $objControl->validateCategoryName($chosen_category);
        if ($bool == true) {?>
        <table>
            <tr>
                <td>Product</td>
                <td colspan='3'>Actions</td>
            </tr>
            <?php $products_table = "";
            while ($products = mysqli_fetch_array($return)): ?>
            <tr>
                <td><p>" . $products['name'] . "</p></td>
                <td>
                  <form action='product_details.php' method='post'>
                    <input type='submit' name='subshowdetails' value='Show Details'/>
                    <input type='hidden' name='chosen_product_id' value='" . $products['id'] . "'/>
                  </form>
                </td>
                <td>
                  <form action='edit_product.php' method='post'>
                    <input type='submit' name='subgotoedit' value='Edit'/>
                    <input type='hidden' name='chosen_product_id' value='" . $products['id'] . "'/>
                  </form>
                </td>
                <td>
                  <form action='delete_product.php' method='post'>
                    <input type='submit' name='subdeleteproduct' value='Delete'/>
                    <input type='hidden' name='chosen_product_id' value='" . $products['id'] . "'/>
                  </form>
                </td>
            </tr>
            
            <?php endwhile;?>
            </table>
            <form action='add_new_product.php' method='post'>
                <input type='submit' name='subgotoadd' value='Add New Product to this category'/>
                <input type='hidden' name='current_category' value='" . $chosen_category . "'/>
            </form>
        <?}
        else {
            $msg = $return;
        }

    }
include_once("html/after_content.htm");
?>

