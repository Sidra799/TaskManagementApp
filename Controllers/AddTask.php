<?php

session_start();

class AddTask extends Controller{
      
   

    public function addTaskAction(){
      if (getimagesize($_FILES['file']['tmp_name']) == false)
       {echo "<br />Please Select An Image.";} else {
        
      
      $userId = $_SESSION["id"];
        $Title = $_REQUEST['title'];
        $Description = $_REQUEST['description']; 
        $StartDate = $_REQUEST['startDate'];
        $DurationHours = $_REQUEST['durationHours'];
        $DurationMinutes = $_REQUEST['durationMinutes'];
        $AssignTo = $_REQUEST['assignTo'];
        $Priority = $_REQUEST['priority'];

       // $image = $_FILES['file']['tmp_name'];
        $image = $_FILES['file']['name'];
        $target = "images/".basename($image);
       

      //  $image = base64_encode(file_get_contents(addslashes($image)));
      //  $sqlInsertimageintodb = "INSERT INTO `imageuploadphpmysqlblob`(`filename`, `image`) VALUES ('$name','$image')";


       $query= "INSERT INTO tasks (`title`, `createdBy`, `startDate`, `priority`, `description`, `assignedUserId`, `durationHours`, `durationMinutes`, `image`, `imagePath`, `statusId`) VALUES ('".$Title."', '".$userId."', '".$StartDate."', '".$Priority."', '".$Description."', '".$AssignTo."', '".$DurationHours."', '".$DurationMinutes."','".$image."','".$target."', '7')";
     
      
      $inserted = self::addQuery($query);
      
       self::showAlert($inserted);
       
       if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }
      header('location: homeDashboard');
    }
    }


    function showAlert($msg){
      echo "ss";
      echo "<script>
      alert('".$msg."')
      location.assign('./add-task')
      </script>";
      
  
  } 
   
}
?>