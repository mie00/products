<?php
class config{
    public $server="localhost";
    public $username="root";
    public $password="111111";
    public $db="electronics";
    public $connectionString;


    public function __construct(){
        $this->connectionString = mysqli_connect($this->server,$this->username,$this->password);
        mysqli_select_db($this->connectionString,$this->db);
    }
}





