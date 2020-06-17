<?php
class DeleteTask extends Controller{
    public static function createTask()
    {
      $taskId = $_GET['id'];
     
    //   $userId = $_SESSION["id"];
     self::addQuery("DELETE FROM `tasks` WHERE `task_id`='".$taskId."'");
     header('Location: homeDashboard');
    //   print_r($result);
     // return self::createView('DeleteTask');
     // return AddTask::make('AddTask',$row);
      
  }
}
?>