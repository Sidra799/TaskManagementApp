<?php
class Controller extends Database{

    public static function CreateView($viewName,$data=null){
        require_once("./Views/$viewName.php");
        // define('CSS_PATH', 'http://pnp.local.com/public/css/');
        // echo CSS_PATH; 
    }
}
?>