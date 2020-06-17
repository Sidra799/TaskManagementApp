<?php
// session_start();
class Home extends Controller{
   

    public static function createTaskDashboard(){
      // return self::createView('HomeDashboard');

      $Designation = $_SESSION['Designation'];
      $userId = $_SESSION["id"];
      if($Designation=='lead'){
        $assignResult = self::query1("select * from user where parent = '".$userId."'");


        $sql = "SELECT b.Name AS `Emp_Name`, a.task_id ,a.title, a.createdBy,a.startDate,a.priority,a.description,a.durationMinutes,a.durationHours,a.image,a.imagePath,c.status AS `Task_status` FROM tasks a, user b, task_status c WHERE a.assignedUserId = b.id and a.statusId = c.id and a.createdBy = '".$userId."'";
        $result = self::query1($sql);
        $result1 = self::query1("select * from user where parent = '".$userId."'");
       
        
          $getCurrentUser=self::query1("SELECT * FROM `user` WHERE id='".$userId."'");
        
        $finalResult= array($result,$result1,$assignResult,$getCurrentUser);


        return self::createView('HomeDashboard', $finalResult);
        // return self::createView('HomeDashboard');


      }
      else{
        $sql = "SELECT b.Name AS `Emp_Name`, a.task_id ,a.title, a.createdBy,a.startDate,a.priority,a.description,a.durationHours,a.durationMinutes,a.image,a.imagePath,c.status AS `Task_status` FROM tasks a, user b, task_status c WHERE a.createdBy = b.id and a.statusId = c.id and a.assignedUserId = '".$userId."'";
        $taskResult = self::query1($sql);
        $getCurrentUser = self::query1("SELECT  b.Name AS `Emp_Name`,a.Email, a.Password, a.Name, a.Gender, a.Parent, a.Designation FROM `user` a, `user` b WHERE a.Parent=b.id and a.id='".$userId."'");
        $result=array($taskResult,$getCurrentUser);
        // print_r($result);
        return self::createView('HomeDashboard', $result);
        // return self::createView('HomeDashboard');

      }
    }

    public static function filterTaskAction(){
      $Title= $_REQUEST['filterTitle'];
      $Date= $_REQUEST['filterDate'];
      $Priority= $_REQUEST['filterPriority'];
      $Designation = $_SESSION['Designation'];
      $userId = $_SESSION["id"];
      if($Designation=='lead'){
        $AssignedTo= $_REQUEST['filterAssignedTo'];
        $sql = "SELECT b.Name AS `Emp_Name`, a.task_id ,a.title, a.createdBy,a.startDate,a.priority,a.description,a.durationHours,a.durationMinutes ,a.image,a.imagePath ,c.status AS `Task_status` FROM tasks a, user b, task_status c WHERE a.statusId = c.id  and a.assignedUserId = b.id and a.createdBy = '".$userId."' ";
        $filterArrary= array("title"=>$Title,"startDate"=>$Date,"assignedUserId"=>$AssignedTo,"priority"=>$Priority); 
       foreach($filterArrary as $x=>$x_value){
         if($x_value){
           $addQuery="and a.".$x." ='".$x_value."'";
           $sql=$sql.$addQuery;
          }
        }
        $result = self::query1($sql);
        $result2 = self::query1("select * from user where parent = '".$userId."'");

        $result1 = self::query1("select * from user where parent = '".$userId."'");
        $getCurrentUser=self::query1("SELECT * FROM `user` WHERE id='".$userId."'");

        $finalResult= array($result,$result1,$result2,$getCurrentUser);


        if(!$result){
          echo "notFound";
        }
        return self::createView('homeDashboard', $finalResult);
      }
      else{
        $sql = "SELECT b.Name AS `Emp_Name`, a.task_id ,a.title, a.createdBy,a.startDate,a.priority,a.description,a.durationHours,a.durationMinutes ,a.image,a.imagePath ,c.status AS `Task_status` FROM tasks a, user b, task_status c WHERE a.statusId = c.id  and a.createdBy = b.id and a.assignedUserId = '".$userId."'";
        $filterArrary= array("title"=>$Title,"startDate"=>$Date,"priority"=>$Priority); 
        foreach($filterArrary as $x=>$x_value){
          if($x_value){
            $addQuery="and a.".$x." ='".$x_value."'";
            $sql=$sql.$addQuery;
          }
        }
        
        $result1 = self::query1($sql);
        $getCurrentUser = self::query1("SELECT  b.Name AS `Emp_Name`,a.Email, a.Password, a.Name, a.Gender, a.Parent, a.Designation FROM `user` a, `user` b WHERE a.Parent=b.id and a.id='".$userId."'");

        if(!$result1){
          echo "notFound";
        }
        $result = array($result1,$getCurrentUser);
        return self::createView('homeDashboard',$result);
      }
    }
     public static function logout()
     {
       session_destroy();
       header('Location:login');
     }
       
   
       
}
?>