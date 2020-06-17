<?php
session_start();
ini_set('mysql.connect_timeout',300);
ini_set('default_socket_timeout',300);
class Database{

   public static $host="127.0.0.1";
   public static $user="root";
   public static $password="";
   public static $database="myDatabase";
    
    private static function connect(){
      
        $con=new mysqli(self::$host, self::$user, self::$password, self::$database) or die("Connect failed: %s\n". $con -> error);

        //$con=mysqli_connect($host,$user,$password);
        if($con) {
         //   echo "connected";
          return $con;
        } else {
           return "No Connection";
        }
    }
    
    // public static function query($query, $params = array()){

    //         $result = mysqli_query(self::connect(),$query);
    //         //$row = mysqli_fetch_array($result);
      
    //         return $result;
    //     }

        public static function query1($query, $params = array()){
            $result = self::connect()->query($query);
                return $result;
            }

            public static function queryArray($query, $params = array()){
                $result = self::connect()->query($query);
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
               // $row = $result -> fetch_array();
                    return $row;
                }

              
        public function addQuery($query) {
                   $link = self::connect();
            if(mysqli_query($link, $query)){
                    // self::showAlert("Records inserted successfully.");
                    return "Records inserted successfully.";

            } else{
                    return "ERROR: Could not able to execute $query. " . mysqli_error($link);
                }
                   
                }

                
    function showAlert($msg){
        echo "<script>
        alert('".$msg."')
        location.assign('./add-task')
        </script>";
        

    }               
                
    
    

}




?>