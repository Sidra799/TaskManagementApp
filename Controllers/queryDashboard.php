<?php
// session_start();
class queryDashboard extends Controller{
    public static function createTask()
    {
        $sql = "SELECT * FROM `user`";
      $userResult = self::queryArray($sql);
      $statusResult = self::query1("SELECT * FROM `task_status`");
      $userId = $_SESSION["id"];
       $taskId = $_GET['id'];
       $result = self::query1("select * from tasks where task_id=".$taskId);
       $taskResult = mysqli_fetch_array($result);
       $assignResult = self::query1("select * from user where parent = '".$userId."'");
       
      $query = "SELECT b.Name AS `Emp_Name`, a.id ,a.query, a.fromUid,a.Date,a.TaskId FROM queries a, user b WHERE  a.fromUid = b.id and a.TaskId = '".$taskId."'";
      $previousComments = self::queryArray($query);
      // echo "wq";
      // print_r($previousComments);
       
       
       $array3 = array($userResult,$statusResult,$taskResult,$assignResult,$previousComments);


    
        return self::CreateView('queryDashboard',$array3);
    }

    public static function askQuery(){
      date_default_timezone_set("Asia/Karachi");
        $formId = $_SESSION['id'];
        $fromEmail=$_SESSION['Email'];
        $fromName=$_SESSION['Name'];
        $taskId= $_GET['id'];
        $query = $_REQUEST['query'];
        $toId= $_REQUEST['toId'];
        $date= date("Y-m-d h:i:sa");
        echo $date;
        $arr= explode(",", $toId);
        foreach ($arr as $userID) {
        echo $userID;
        $sql = "SELECT * FROM `user` WHERE id=".$userID."";
        $row = self::queryArray($sql);
        $headers = null;
        $ms = null;
        if($row){
        foreach($row as $key => $val){
       $toEmail= $val['Email'];
       $toName = $val['Name'];
       }
       $taskTitle = $_SESSION['taskTitle'];
       
       
       $subject="Query";
       $headers .= "MIME-Version: 1.0"."\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
      $headers .= "From:".$fromName." | To Do List <info@pnp.local.com>"."\r\n";
      $ms.="<html></body><div><div>Dear $toName,</div></br></br>";
      $ms.="<div style='padding-top:8px;'>Task Title: $taskTitle </div> </br></br>";
      $ms.="<div style='padding-top:8px;'>Query: $query </div></br></br>";

      $ms.="<div style='padding-top:8px;'>Please click The following link to Check the Task</div>
      <div style='padding-top:10px;'><a href='http://pnp.local.com/queryDashboard?id=$taskId'>Click Here</a></div>
      <div style='padding-top:4px;'>Powered by <a href='http://pnp.local.com/login'>pnp.com</a></div></div>
      </body></html>";
      $sql = "INSERT INTO `queries`(`query`, `fromUid`, `ToUid`, `TaskId`,`Date`) VALUES ('".$query."',".$formId.",".$userID.",".$taskId.",'".$date."')";
        $inserted = self::addQuery($sql);
        echo $inserted;
        // $headers = "From:" . $fromEmail;
        echo $toEmail;
        if(mail($toEmail,$subject,$ms,$headers)){
        self::showAlert($inserted);
        }
        else{ 
        self::showAlert(" Email Sending Error");
        }
     }
       }
       
      }
  
    function showAlert($msg){
        echo "ss";
        echo "<script>
        alert('".$msg."')
        location.assign(`./queryDashboard?id={$_GET['id']}`)
        </script>";
      }

    public static function statusAction()
      {
           $taskID =$_GET['id'];
          $taskStatus= $_REQUEST['status'];
          echo $taskStatus;

          $updateSql= "UPDATE `tasks` SET `statusId`=".$taskStatus." WHERE `task_id`=".$taskID."";
           $inserted= self::addQuery($updateSql);
          self::showAlert($inserted);
        }
} 
?>