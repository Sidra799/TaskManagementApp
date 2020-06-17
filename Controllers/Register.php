<?php
class Register extends Controller{
    public static function createTask(){
        $result = self::query1("select * from user where parent = '0'");
        return self::createView('Register',$result);
    }

    public static function emailVerification()
    {
      if(!empty($_GET['code']) && isset($_GET['code']))
      {
        $code=$_GET['code'];
        // echo $code;
$num=self::queryArray("SELECT * FROM user WHERE activationcode='$code'");
// print_r($num);
// $num=mysqli_fetch_array($sql);
if($num>0)
{
$st=0;
$result4 =self::queryArray("SELECT id FROM user WHERE activationcode='$code' and status='$st'");
// $result4=mysqli_fetch_array($result);
if($result4>0)
 {
$st=1;
$result1=self::addQuery("UPDATE user SET status='$st' WHERE activationcode='$code'");
$msg="Your account is activated";
          echo "<script>alert('Your account is activated');
          location.assign('\login');
          </script>";
          // header('Location:login');

}
else
{
$msg ="Your account is already active, no need to activate again";
echo "<script>alert('Your account is already active, no need to activate again');location.assign('\login');</script>";
// header('Location:login');
}
}
else
{
$msg ="Wrong activation code.";
echo "<script>alert('Wrong activation code.');</script>";
// header('Location:login');
}
}
    }
   
    public static function registerAction(){
        $Name = $_REQUEST['name'];
        $Email = $_REQUEST['email'];
        $Password = $_REQUEST['password'];
        $Designation = $_REQUEST['designation'];
        $status=0;
        $activationcode=md5($Email.time());

        $Parent = null;
        $headers=null;
        $ms = null;
        if($Designation == "lead"){
          $Parent = 0;
        }
        else{
          $Parent = $_REQUEST['select_lead'];
        }
        $Confirm_Password = $_REQUEST['confirm_password'];
        if($Password != $Confirm_Password){
        $result = "Password Does not match";
        echo $result;
        return $result;
        }
        else{
          $Gender = $_REQUEST['gender'];
          $query= "INSERT INTO user (`Email`, `Password`, `Name`, `Gender`, `Parent`, `Designation`, `status`, `activationcode`) VALUES ('".$Email."', '".$Password."', '".$Name."', '".$Gender."', '".$Parent."', '".$Designation."', ".$status.", '".$activationcode."')";
          $result=self::addQuery($query,'Register');
          $to=$Email;
          $msg= "Thanks for new Registration.";
          $subject="Email verification";
          $headers .= "MIME-Version: 1.0"."\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
         $headers .= 'From:pnp.local.com | To Do List <info@pnp.local.com>'."\r\n";
         $ms.="<html></body><div><div>Dear $Name,</div></br></br>";
         $ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
         <div style='padding-top:10px;'><a href='http://pnp.local.com/email_verification?code=$activationcode'>Click Here</a></div>
         <div style='padding-top:4px;'>Powered by <a href='phpgurukul.com'>phpgurukul.com</a></div></div>
         </body></html>";
         if(mail($to,$subject,$ms,$headers)){
           $result = 'Email Sent';
          echo $result;
          return $result;
         }
        }
      }
}

?>