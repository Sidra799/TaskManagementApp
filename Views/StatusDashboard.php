<?php
define('CSS_PATH', 'http://pnp.local.com/public/css/');

?>
<!DOCTYPE html>
<html lang="en">
<head style="height: 100%;">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <link rel = "stylesheet"
   type = "text/css"
    href="<?=CSS_PATH?>StatusDashboard.css"  />
</head>


<body style="height: 100%;">
<!-- ADD Status Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 cslass="modal-title">Add Status</h4>
        </div>
        <form action="./addStatusAction" method="post">
        <div class="modal-body">
          
          <label for="status">Status: </label>
          <input type="text" id='status' name='status' placeholder="Status">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Add </button>
        </div>

        </form>
             </div>
    </div>
  </div>

<!--Edit Status Modal -->
<div class="modal fade" id="edit_user" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 cslass="modal-title">Edit Status</h4>
        </div>
        <form action= 'editStatusAction' id = 'editForm'>
        <div class="modal-body">
        <input type="hidden" id='id' name='id' >
        <label for="status">Status: </label>
          <input type="text" id='statusfield' name='status' >
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Edit</button>
        </div>

        </form>
      </div>
    </div>
  </div>
  
<script>
 function function_alert(taskId) {
    var decision = confirm('Are You Sure ?');
    if(decision){
      console.log(taskId)
     window.location.href = "./deleteStatusAction?id="+taskId;
     
    }
    }

  //  To show Edit Modal
  $(document).ready(function(){    
   $('.edit_btn').on('click',function(e){
    $('#edit_user').modal('show');
    var statusId= e.target.id;
  
    $tr=$(this).closest('tr');
    //Set Values in Edit Modal
    var data = $tr.children('td').map(function(){
      return $(this).text();
    }).get();
    var status = data[1];
    console.log(status);
 
    $('#id').val(statusId);
    $('#statusfield').val(status);
    })
  });
 
</script>

    <div class="grid-container">
      
        <aside class="sidenav">
            <div class='profile'>
                <div class="card">
                <h1><?php echo $_SESSION["Name"]; ?></h1>
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
        <?php 
         $url = 'http://newsapi.org/v2/everything?q=bitcoin&from=2020-05-17&sortBy=publishedAt&apiKey=e9f08acb136f4e8980405aa03f8d05b0';
         $response = file_get_contents($url);
         $NewsData = json_decode($response);
        //  print_r($NewsData);
         ?>
        
        <main class="main">
        
        <div class="tickerv-wrap" style=" background:#808080"><ul>
          <?php
          foreach ($NewsData->articles as $News) {
            ?>
            <li><?php echo $News->title; ?> <a href=<?php echo $News->url; ?> > Read More... </a></li>
            <?php } ?>
          </ul></div>
        
        
          <div>
          <Button id='addBtn' class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">Add Status</Button>
          <?php
           echo "<div class='record'>";
           echo "<table class='table table-bordered'>
           <tr>
           <th>SNo</th>
           <th>Status</th>
           <th></th>
           </tr>";
           $i=0;
           while($rows = $data->fetch_assoc()){
            $i+=1;
            echo "<tr>
            <td>".$i."</td>
            <td>".$rows["status"]."</td><td>";
            echo "<Button class= 'edit_btn'   id='".$rows['id']."'>Edit</Button>";
            echo "<Button  onclick='function_alert(".$rows["id"].")'>Delete</Button>
            </td>
            </tr>";
            }
            echo "</table>";
          ?>
         </div>
         </main>
    </div>
    </body>
    </html>