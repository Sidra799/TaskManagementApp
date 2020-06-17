<?php
// session_start(); 
class addStatus extends Controller{
   

    public static function createTaskDashboard(){
        $getStatus = 'SELECT * FROM `task_status`';
        $result = self::query1($getStatus);
        return self::CreateView('StatusDashboard',$result);
    }

    public static function createStatus(){
        $taskstatus = $_REQUEST['status'];
        $sql = "INSERT INTO `task_status`(`status`) VALUES ('".$taskstatus."')";
        $inserted = self::addQuery($sql);
        self:: showAlert($inserted);
    }
    
    public static function deleteStatus()
    {
       $statusId= $_GET['id'];
       echo $statusId;
       $deleteSql = "DELETE FROM `task_status` WHERE `id`=".$statusId."";
       echo $deleteSql;
       $deleted = self::addQuery($deleteSql);
       self::showAlert($deleted);

    }

    public static function editStatus()
    {
      $statusId = $_REQUEST['id'];
      $status = $_REQUEST['status'];
      $updateQuery = "UPDATE `task_status` SET `status`='".$status."' WHERE id=".$statusId."";
      $updated = self::addQuery($updateQuery);
      self::showAlert($updated);
    }

    function showAlert($msg){
        echo "<script>
        alert('".$msg."')
        location.assign('./Status')
        </script>";
    }



} ?>