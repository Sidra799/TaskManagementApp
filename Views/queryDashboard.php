<?php
if(!$_SESSION['id']){
  echo "<script>alert('Please Login to Continue') 
  location.assign('login');
  
  </script>";
}
$userData = $data[0];
$statusData = $data[1];
$array1 = $data[2];

$array2 = $data[3];
$previousComments =  $data[4];
// print_r($previousComments);

$toArray= array();
define('CSS_PATH', 'http://pnp.local.com/public/css/');
$Designation = $_SESSION['Designation'];

?>
<!DOCTYPE html>
<html lang="en">
<head style="height: 100%;">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel = "stylesheet"
   type = "text/css"
    href="<?=CSS_PATH?>queryDashboard.css"  />
</head>

<body style="height: 100%;">
    <div class="grid-container">

       

        <aside class="sidenav" style='height:100%'>
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

        <main class="main">

            <div class='commentsContainer'>
                <div class="container bootstrap snippets">
            <div class="row">
              <div class="col-xs-12 col-sm-9">
                <form class="form-horizontal" action="./edit-task-action" method="post">
                <input type="hidden"  name="id" value=<?php echo "'".$array1['task_id']."'"; ?>>
                
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">Edit Task</h4>
                  </div>
                  
                  <div class="panel-body">

                  <?php $_SESSION['taskTitle'] = $array1['title']; ?>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" id="title"   class="form-control" name="title" placeholder="Task Title.." value=<?php echo "'".$array1['title']."'"; ?>>
                      </div>
                    </div>
          
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea rows="2" id="description" name="description" class="form-control" placeholder="Write description.."  > <?php echo $array1['description']; ?> </textarea>
                      </div>
                    </div>
          
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Start Date</label>
                      <div class="col-sm-10">
                        <input type="date" id="startDate"  class="form-control" name="startDate" value=<?php echo "'".$array1['startDate']."'"; ?> placeholder="Select Start Date">
                      </div>
                    </div>
          
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Duration</label>
                      <div class="col-sm-10">
                        <input type="text" id="duration" class="form-control" name="durationHours"  value=<?php echo "'".$array1['durationHours']."'"; ?> placeholder="Hours">
                        <input type="text"  class="form-control" id="duration" name="durationMinutes"  value=<?php echo "'".$array1['durationMinutes']."'"; ?> placeholder="Minutes">
                      </div>
                    </div>
                    <?php
                    if($Designation == 'lead'){
                    ?>
          
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Assign To</label>
                      <div class="col-sm-10">
                        <?php
                         $options = array();
                         while($row = $array2->fetch_assoc()){
                            $options[$row["id"]] = $row["Name"];
                         }
                         echo "<select id='assignTo' class='form-control' name='assignTo'>";
                         foreach($options as $key => $val){
                                 echo "<option value='".$key."'>".$val."</option>";
                                }
                            echo "</select>";
                          ?>
                          </div>
                      </div>
                              <?php } ?>
          
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Priority</label>
                        <div class="col-sm-10">
                         <?php
                          if($array1['priority']=='high') {
                            echo "<label class='radio-inline'>
                            <input type='radio' id='high' value='high' name='priority' checked>High
                            </label>";
                          }
                          else{
                            echo "<label class='radio-inline'>
                            <input type='radio' id='high' value='high' name='priority' >High
                            </label>";
                          }
                          if($array1['priority']=='medium') {
                            echo "<label class='radio-inline'>
                            <input type='radio' id='medium' value='medium' name='priority' checked>Medium
                            </label>";
                          }
                          else{
                            echo "<label class='radio-inline'>
                            <input type='radio' id='medium' value='medium' name='priority' checked>Medium
                            </label>";
                          }
                          if($array1['priority']=='low') {
                            echo "<label class='radio-inline'>
                            <input type='radio' id='low' value='low' name='priority' checked>Low
                            </label>";
                          }
                          else{
                            echo "<label class='radio-inline'>
                            <input type='radio' id='low' value='low' name='priority' >Low
                            </label>";
                          }
                          ?>
                          </div>
                      </div>
          
                      <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                          <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="container bootstrap snippets">
            <div class="row">
              <div class="col-xs-12 col-sm-9">
                
                <form class="form-horizontal" action=<?php echo "./ask-query-action"."?id=".$_GET['id']?> method="post">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">ADD YOUR COMMENTS HERE</h4>
                  </div>
                  <div class="panel-body">

              <ul id='commentDiv' class="comment-section">

<script>
   var users = <?php echo json_encode($previousComments); ?>;
   var currentUser = <?php echo $_SESSION['id']; ?>;
   var comments = document.getElementById('commentDiv');

  console.log(users);

  users.forEach(previousComment => {
    console.log(previousComment['fromUid']);
   if(previousComment['fromUid']==currentUser){
     console.log('current')
     comments.insertAdjacentHTML('afterbegin',`<li class='comment author-comment'>

<div class='info'>
<a href='#'>`+previousComment.Emp_Name+`</a>
<span>`+previousComment.Date+`</span>
</div>

<a class='avatar' href='#'>
<img src='images/avatar_author.jpg' width='35' alt='Profile Avatar' title='Jack Smith' />
</a>

<p>`+previousComment.query+`</p>

</li>`)

     
    
   }
   else{
    console.log('not current')

    comments.insertAdjacentHTML('afterbegin',`<li class='comment user-comment'>

<div class='info'>
<a href='#'>`+previousComment.Emp_Name+`</a>
<span>`+previousComment.Date+`</span>
</div>

<a class='avatar' href='#'>
<img src='images/avatar_author.jpg' width='35' alt='Profile Avatar' title='Jack Smith' />
</a>

<p>`+previousComment.query+`</p>

</li>`)
   }
    
    
  });
</script>


<!-- <li class="write-new"> -->

  <!-- <form action="#" method="post">

      <textarea placeholder="Write your comment here" name="comment"></textarea>

      <div>
          <img src="images1/sample.png" width="35" alt="Profile of Bradley Jones" title="Bradley Jones" />
          <button type="submit">Submit</button>
      </div> -->

  <!-- </form> -->

<!-- </li>

</ul> -->

                  <li class="write-new">

                    <div class="form-group">
                      <div class="col-sm-10">
                        <div class = 'queryContainer'>
                          <input type='hidden' id='toId' name='toId' />
                          <textarea id="query" name="query" placeholder="Write your query here.." onInput='check()' ></textarea>
                          <div class= 'suggestion' id= 'suggestion'></div>
                        </div>
                      </div>
                    </div>
          
                    <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-2">
                        <Button class="btn btn-primary" id='askBtn' type='submit'>Ask</Button>
                      </div>
                    </div>

                  </div>
                </div>
              </form>
              </li>

</ul>
            </div>
           </div>
        </div> 

     


                
            </div>

            <div class='innerSidebar'>
              

                <div class="input-field col s12">
                <form id='statusForm' action=<?php echo "./statusAction"."?id=".$_GET['id']?> method="post">

                  <?php 
                  $options = array();
                  while($row = $statusData->fetch_assoc()){
                      $options[$row["id"]] = $row["status"];
                  }
                  echo " <select type='submit' class='select-css' id='selectStatus' name='status'>
                  <option value='' disabled selected>Choose your option</option>";
                  foreach($options as $key => $val){
                    echo " <option value='".$key."'>".$val."</option>";
                  }
                  echo "</select>";
                  ?>
                  <label>Select Your Task Status</label>
                </form>
              </div>
            </div>
            
          </main>

        

</div>
<script>
    var selectStatus=document.getElementById('selectStatus');
    selectStatus.onchange=function(){
        var statusForm=document.getElementById('statusForm')
        statusForm.submit()

    }


    var inputQuery= document.getElementById('query');
    var suggestionPanel= document.getElementById('suggestion');
    var users = <?php echo json_encode($userData); ?>;
    function check(e){
      var query=inputQuery.value
      suggestionPanel.innerHTML=""
      if(query.endsWith('@')){
          users.forEach(user => {
           
              const div = document.createElement('div');
              div.setAttribute("id",'divName');
              div.className = user['id']
              div.innerHTML = user['Name'];
              suggestionPanel.appendChild(div); 
          });
        }
    }
    var toIDArray=[];
          
      suggestionPanel.addEventListener('click',(e)=> {
      var container=document.querySelector('.queryContainer');
      var toIdField = document.getElementById('toId');

     var user= users.find(element => element.id == e.target.classList[0] )

     var Email = user.Email
     var id = e.target.classList[0]
     toIDArray.push(id);
     console.log(toIDArray)
     inputQuery.value+=user.Name
     toIdField.value=toIDArray;

      
      //  container.insertAdjacentHTML('afterbegin',`<input type='hidden' name='toEmail' value=`+user.Email+` />`)
      //  container.insertAdjacentHTML('afterbegin',`<input type='hidden' name='taskId' value= />`)

    });
    


</script>  
  
</body>
</html>