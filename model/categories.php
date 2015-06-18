<?php
class modelCategories {
    public function getCategories()
    {
        $objconfig = new config;
        $q = "SELECT name FROM categories ";
        $res = mysqli_query($objconfig->connectionString, $q);
        return $res;
    }

}
?>