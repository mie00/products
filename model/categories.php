<?php
class modelCategories {
    public $objconfig;
    public function getCategories()
    {
        $q = "SELECT name FROM categories ";
        $res = mysqli_query($objconfig->connectionString, $q);
        return $res;
    }
    public function __construct($objconfig){
            $this->objconfig = $objconfig;
    }

}
?>
