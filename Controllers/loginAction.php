<?php
// session_start();
class loginAction extends Controller{
    public static function doSomething(){
        $str = "ERR";
        $Email = $_REQUEST['email'];
        $Password = $_REQUEST['password'];
        $result = self::query1("select * from user where Email='".$Email."' and Password='".$Password."'");
        $row = mysqli_fetch_array($result);
        if($row){
            if( $row['status'] == 1){
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['Designation']=$row['Designation'];  
                $str = "LOGGED"; 
                echo $str; 
                return $str;
            }
            else{
                $str = "Please Verify  your Email First"; 
                echo $str; 
                return $str; 
            }
           
        }
        else {
            echo $str;
            return $str;
        }
    }

    function showAlert($msg){
     echo "<script>
     alert('".$msg."')
     location.assign('./login')
     </script>";
    } 

    public static function googleLoginAction(){
        include('config.php');
        if(isset($_GET["code"])){
         $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
         if(!isset($token['error'])){
             echo "in error";
             $google_client->setAccessToken($token['access_token']);
             $_SESSION['access_token'] = $token['access_token'];
             $google_service = new Google_Service_Oauth2($google_client);
             $data = $google_service->userinfo->get();
             $_SESSION['google_id'] = $data['id'];
             if(!empty($data['given_name'])){
                 $_SESSION['Name'] = $data['given_name'];
            }
            if(!empty($data['family_name'])){
                $_SESSION['user_last_name'] = $data['family_name'];
            }
            if(!empty($data['email'])){
                $_SESSION['Email'] = $data['email'];
            }
            if(!empty($data['gender'])){
                $_SESSION['user_gender'] = $data['gender'];
            }
            if(!empty($data['picture'])){
                $_SESSION['user_image'] = $data['picture'];
            }
         }
        }

        if(!isset($_SESSION['access_token'])){
            echo "qw";
            header('Location: '.$google_client->createAuthUrl());
        }
        else{
            $token = $_SESSION['google_id'];
            $Name = $_SESSION['Name'];
            $Email = $_SESSION['Email'];
            $result = self::query1("select * from user where token_id='".$token."' ");
            $row = mysqli_fetch_array($result);
            if($row){ 
              // old user 
              $_SESSION['Email'] = $row['Email'];
              $_SESSION['id'] = $row['id'];
              $_SESSION['Name'] = $row['Name'];
              $_SESSION['Designation']=$row['Designation'];
              header('Location: homeDashboard');
            } 
            else {
                // new user
                $query= "INSERT INTO user (`Email`, `Name`, `token_id`) VALUES ('".$Email."','".$Name."' , '".$token."')";
                $inserted = self::addQuery($query);
                header('Location: editProfile');
            }
        }
    }

    public static function twitterLoginAction(){
        echo "twitter login Action";
    }
}



?>