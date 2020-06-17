<?php
session_start();
class EditProfile extends Controller{
    public static function createTask(){
        $result = self::query1("select * from user where parent = '0'"); 
        return self::createView('EditProfile',$result);
    }

    public static function EditUser(){
        $token = $_SESSION['google_id'];
        $Gender= $_REQUEST['gender'];
       $Designation=$_REQUEST['designation'];
       $Parent=null;
       if($Designation == 'lead'){
        $Parent= 0;
       }
       else{
       $Parent= $_REQUEST['select_lead'];
       }
       $sql = "UPDATE `user` SET `Gender`='".$Gender."',`Parent`='".$Parent."',`Designation`='".$Designation."' WHERE token_id='".$token."'";
       $updated= self::addQuery($sql);
       $result = self::query1("select * from user where token_id='".$token."'"); 
       $row = mysqli_fetch_array($result);
       if($row){
         
         $_SESSION['Email'] = $row['Email'];
         $_SESSION['id'] = $row['id'];
         $_SESSION['Name'] = $row['Name'];
         $_SESSION['Designation']=$row['Designation'];          
        header('Location: homeDashboard ');
        }
    }

    
}


?>
