<?php
// session_start();
class EditTask extends Controller{

  
    public static function editTaskAction(){
        $Designation= $_SESSION["Designation"];
        $taskId= $_REQUEST['id'];
        $Title = $_REQUEST['title'];
        $Description = $_REQUEST['description']; 
        $StartDate = $_REQUEST['startDate'];
        $DurationHours = $_REQUEST['durationHours'];
        $DurationMinutes = $_REQUEST['durationMinutes'];
        echo $DurationMinutes;
        $Priority = $_REQUEST['priority'];
        echo "qw";
        if($Designation == 'lead'){
            echo 'lead';
            $AssignTo = $_REQUEST['assignTo'];
            $sql= " UPDATE `tasks` SET `title`='.$Title.',`startDate`='.$StartDate.',`priority`='.$Priority.',`description`='.$Description.',`assignedUserId`='.$AssignTo.',`durationHours`='.$DurationHours.' ,`durationMinutes`='.$DurationMinutes.' WHERE `task_id`='.$taskId.'";
            $check=self::addQuery($sql);
            echo $check;
            header('Location:homeDashboard');
        }
        else{
            echo 'dev';
            $sql= " UPDATE `tasks` SET `title`='.$Title.',`startDate`='.$StartDate.',`priority`='.$Priority.',`description`='.$Description.',`durationHours`='.$DurationHours.' ,`durationMinutes`='.$DurationMinutes.' WHERE `task_id`='.$taskId.'";
            $check = self::addQuery($sql);
            echo $check;
            header('Location:homeDashboard');
        }

       
    }
      public function createTask()
    {
        $userId = $_SESSION["id"];
        $taskId = $_GET['id'];
        $result = self::query1("select * from tasks where task_id=".$taskId);
        $row = mysqli_fetch_array($result);
        $result1 = self::query1("select * from user where parent = '".$userId."'");
        $sql = "SELECT * FROM `user`";
        $userResult = self::queryArray($sql);
        $array3 = array($row,$result1,$userResult);
        return self::CreateView('editTaskDashboard',$array3);

    }


}
?>