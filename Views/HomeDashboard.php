<?php
$userId = $_SESSION["id"];
// Redirect if not login
if(!$userId){
    header('Location:login');
}
$Designation = $_SESSION['Designation'];
if($Designation == 'lead'){
   $array1 = $data[0];
   $array2 = $data[1];
   $assignArray = $data[2];
   $currentUser=$data[3];
}
else{
    $taskArray = $data[0];
    $currentUser= $data[1];
}
define('CSS_PATH', 'http://pnp.local.com/public/css/');
define('IMAGE_PATH', 'http://pnp.local.com/public/');
?>
<!DOCTYPE html>
<html  lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel = "stylesheet"
   type = "text/css"
    href="<?=CSS_PATH?>HomeDashboard.css"  />
   
</head>
<body style="height: 100%;">
    <script>
        $(document).ready(function(){
            $('#viewProfile').on('click',function(){
                $('#profileModal').modal('show');

            })
        })
    </script>
    <?php
    if($Designation == 'lead'){
        echo "<div class='modal fade' id='exampleModalScrollable' tabindex='-1' role='dialog' aria-labelledby='exampleModalScrollableTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalScrollableTitle'>Add Task</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <form action='./add-task-action' method='post' enctype='multipart/form-data'>
                        <div class='modal-body'>

                            <div class='form-group'>
                                <label for='title' class='col-form-label'>Title</label>
                                <input type='text' id='title' class='form-control' name='title' placeholder='Task Title..'>
                            </div>
                            
                            <div class='form-group'>
                                <label for='description' class='col-form-label'>Description</label>
                                <textarea rows='2'  class='form-control' id='description' name='description' placeholder='Write description..' ></textarea>
                            </div>

                            <div class='form-group'>
                                <label for='startDate' class='col-form-labe'>Start Date</label>
                                <input type='date' class='form-control' id='startDate' name='startDate' placeholder='Select Start Date'>
                            </div>

                            <div class='form-group'>
                                <label for='duration' class='col-form-label'>Duration</label>
                                <input type='text' class='form-control' id='duration' name='durationHours' placeholder='Hours'>
                                <input type='text' class='form-control' id='duration' name='durationMinutes' placeholder='Minutes'>
                            </div>

                            <div class='form-group'>
                                <label for='assignTo' class='col-form-label'>Assign To</label>";
                                $options = array();
                                while($row = $assignArray->fetch_assoc()){
                                    $options[$row['id']] = $row["Name"];
                                }
                                echo "<select class='form-control' id='assignTo' name='assignTo'>";
                                foreach($options as $key => $val){
                                     "<option class='form-control' value='".$key."'>".$val."</option>";
                                    }
                                     "</select>";
                                     echo " </div>
                                     <div class='form-group'>
                                     <label for='attachment' class='col-form-label'>Attachment</label>
                                     <input type='file' class='form-control' id='file' name='file' placeholder='Your Attachments..'>
                            </div>
               
                            <div class='form-group'>
                             <label for='priority' class='col-form-label'>Priority</label>
                             <label class='radio-inline'>
                              <input type='radio' id='high' value='high' name='priority' >High
                             </label>
                             <label class='radio-inline'>
                              <input type='radio' id='medium' value='medium' name='priority' >Medium
                             </label>
                             <label class='radio-inline'>
                              <input type='radio' id='low' value='low' name='priority' >Low
                             </label>
                            </div>

                        </div>
                        <div class='modal-footer'> 
                          <button type='submit' class='btn btn-default'>Add </button>
                        </div>
                </form>
            </div>
        </div>
     </div>";
    }
    ?>



<div class='modal fade' id='profileModal' tabindex='-1' role='dialog' aria-labelledby='profileModal' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalScrollableTitle'>Profile</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <form action='' method='post' enctype='multipart/form-data'>
                        <div class='modal-body'>
                            <?php 
                         while($rows = $currentUser->fetch_assoc()){
                             echo "
                             <div class='form-group'>
                             <label for='name' class='col-form-label'>FullName</label>
                             <input type='text' id='Name' class='form-control' value=".$rows['Name']." name='Name' readonly>
                         </div>

                         <div class='form-group'>
                         <label for='Email' class='col-form-label'>Email</label>
                         <input type='text' id='Email' class='form-control' value=".$rows['Email']." name='Email' readonly>
                     </div>";
                             if($rows['Designation']=='lead'){
                                 echo "
                                 <div class='form-group'>
                                <label for='Designation' class='col-form-label'>Designation</label>
                                <label class='radio-inline'>
                                    <input type='radio' id='lead' value='lead' name='Designation' checked disabled>Lead
                                </label>
                                <label class='radio-inline'>
                                    <input type='radio' id='developer' value='developer' name='Designation' disabled>Developer
                                </label>
                            </div>
                            ";
                             }
                             else{
                                 echo "
                                 <div class='form-group'>
                                <label for='Designation' class='col-form-label'>Designation</label>
                                <label class='radio-inline'>
                                    <input type='radio' id='lead' value='lead' name='Designation' disabled>Lead
                                </label>
                                <label class='radio-inline'>
                                    <input type='radio' id='developer' value='developer' name='Designation' checked disabled>Developer
                                </label>
                            </div>

                            <div class='form-group'>
                            <label for='assignTo' class='col-form-label'>Assign To</label>
                            <select class='form-control' id='assignTo' name='assignTo' disabled>
                                <option class='form-control' >".$rows['Emp_Name']."</option>
                            </select>
                        </div>
                                 ";

                             }
                         }

                        
                         if($rows['Gender'] === 'male'){
                             echo "<div class='form-group'>
                             <label for='Gender' class='col-form-label'>Gender</label>
                             <label class='radio-inline'>
                                 <input type='radio' id='male' value='male' name='Gender' checked disabled>Male
                             </label>
                             <label class='radio-inline'>
                                 <input type='radio' id='female' value='female' name='Gender' disabled>Female
                             </label>
                             <label class='radio-inline'>
                                 <input type='radio' id='other' value='other' name='Gender' disabled>Other
                             </label>
                         </div>";
                         }
                         elseif($rows['Gender'] === 'female'){
                            echo "<div class='form-group'>
                            <label for='Gender' class='col-form-label'>Gender</label>
                            <label class='radio-inline'>
                                <input type='radio' id='male' value='male' name='Gender' disabled>Male
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' id='female' value='female' name='Gender' checked disabled>Female
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' id='other' value='other' name='Gender' disabled>Other
                            </label>
                        </div>";
                        }
                        else{
                            echo "<div class='form-group'>
                            <label for='Gender' class='col-form-label'>Gender</label>
                            <label class='radio-inline'>
                                <input type='radio' id='male' value='male' name='Gender' disabled>Male
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' id='female' value='female' name='Gender' disabled>Female
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' id='other' value='other' name='Gender' checked disabled>Other
                            </label>
                        </div>";
                        }
                        ?>
                        </div>
                    </form>
                </div>
            </div>
</div>



    <div class="grid-container">
        <aside style='height:100%' class="sidenav">
            <div class='profile'>
                <div class="card">
                    <h1 id="viewProfile"><?php echo $_SESSION["Name"]; ?></h1>
                    <p class="title"><?php echo $_SESSION["Email"]; ?></p>
                    <p><?php echo $_SESSION["Designation"]; ?></p>
                </div>
            </div>
            <ul class="sidenav__list">
                <li class="sidenav__list-item"><a href="homeDashboard">Home</a></li>
                <li class="sidenav__list-item"><a href="Status">Status</a></li>
                <li class="sidenav__list-item"><a href="logout">Logout</a></li>


            </ul>
        </aside>
        
        <main class="main">

            <div class= "container">
                <form action="./filterTask-action" method="post">
                <div class='filter'>
                    <div class='filterTitle'>
                        <Label>Title</Label>
                        <br>
                        <input type='text' name='filterTitle' placeholder='Search By Title'/>
                    </div>
                    <div class='filterDate'>
                        <Label>Date</Label>
                        <br>
                        <input type='Date' name='filterDate' placeholder='Search By Date'/>
                    </div>
      
                    <div class='filterPriority'>
                        <Label>Priority</Label>
                        <br>
                        <select name="filterPriority" id="Priority">
                            <option value="">Search By Priority</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <?php
                    if($Designation == 'lead'){
                        echo "<div class='filterAssignedTo'>
                        <Label id='filterAssignedToLabel'>Assigned To</Label>
                        <br>";
                        $options = array();
                        while($row = $array2->fetch_assoc()){
                            $options[$row["id"]] = $row["Name"];
                        }
                        echo "<select id='assignTo' name='filterAssignedTo'>";
                        echo "<option value=''>Search by Assigned User</option>";
                    
                     
                         foreach($options as $key => $val){
                              echo "<option value='".$key."'>".$val."</option>";
                             }
                         echo "</select>";
                         echo "</div>";
                        }
                        ?>
                        <span></span>
                        <Button type='submit'  class="btn btn-primary" id='filterBtn' >Filter</Button>
                        <Button type="button" data-toggle="modal" data-target="#exampleModalScrollable" id='addBtn'  class="btn btn-primary" >Add</Button>
                        
                        <!-- <Button type='click' id='addBtn'  class="btn btn-primary" ><a href='./add-task'>Add</a></Button> -->
                    <?php
                    if($Designation =='developer'){
                        echo "<script>var btn = document.getElementById('addBtn')
                        btn.style.display = 'none';</script>";
                    }
                    ?>
                                            </div>
                </form>
                
                <div class= "tableContainer">
                  <?php
                    if($Designation=='lead'){
                         "<div class='record'>";
                         echo "<table class='table table-bordered'>
                         <tr>
                         <th>Title</th>
                         <th>Start Date</th>
                         <th>Priority</th>
                         <th>Status</th>
                         <th>Description</th>
                         <th>Assigned To</th>
                         <th>Duration</th>
                         <th>image</th>
                         <th></th>
                         </tr>";
                         while($rows = $array1->fetch_assoc()){
                             echo "<tr>
                             <td>".$rows["title"]."</td>
                             <td>".$rows["startDate"]."</td>
                             <td>".$rows["priority"]."</td>
                             <td>".$rows["Task_status"]."</td>
                             <td>".$rows["description"]."</td>
                             <td>".$rows["Emp_Name"]."</td>
                             <td>".$rows["durationHours"]." hrs and ".$rows["durationMinutes"]." mins "."</td>
                             <td><a href ='".IMAGE_PATH."".$rows["imagePath"]."'>".$rows["image"]."</a></td>
                             <td>";
                             echo "<Button><a href='queryDashboard?id=".$rows["task_id"]."'>Edit</a></Button>";
                             echo "<Button  onclick='function_alert(".$rows["task_id"].")'>Delete</Button>
                             </td>
                             </tr>";
                            }
                             "</table>";
                            }
                        else{
                                echo "<div class='record'>";
                                echo "<table class='table table-bordered'>
                                <tr>
                                <th>Title</th>
                                <th>CreatedBy</th>
                                <th>Start Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th></th>
                                </tr>";
                                while($rows = $taskArray->fetch_assoc()){
                                    
                                    echo "<tr>
                                    <td>".$rows["title"]."</td>
                                    <td>".$rows["Emp_Name"]."</td>
                                    <td>".$rows["startDate"]."</td>
                                    <td>".$rows["priority"]."</td>
                                    <td>".$rows["Task_status"]."</td>
                                    <td>".$rows["description"]."</td>
                                    <td>".$rows["durationHours"]." hrs and ".$rows["durationMinutes"]." mins "."</td>
                                    <td>
                                    <Button><a href='queryDashboard?id=".$rows["task_id"]."'>Edit</a></Button>
                                   
                                    </td>
                                    </tr>";
                                }
                                echo "</table>";
                            }
                    ?>
                            </div>
                        </div>
                    </main>
                </div>
                <script>
                    function function_alert(taskId) {
                        var decision = confirm('Are You Sure ?');
                        if(decision){
                            console.log(taskId)
                            window.location.href = "./delete-task?id="+taskId;
                        }
                    }
                </script>
</body>

</html>