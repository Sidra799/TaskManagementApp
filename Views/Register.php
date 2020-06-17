<?php
define('CSS_PATH', 'http://pnp.local.com/public/css/');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <link rel = "stylesheet"
   type = "text/css"
    href="<?=CSS_PATH?>Login.css"  />

<body> 

<script>
  $(document).ready(function(){
    $("#form").validate({
      submitHandler: function (form) {
        $('input[type="submit"]').prop('disabled', true);
        var aUrl = "/register-action.?xAction=loginUser&"+$('form#form').serialize();
        $.ajax({
          type: 'post',
          url: aUrl,
          success: function(data){
            console.log(data.trim())
            if(data.trim() === "Email Sent"){
              $('form#form')[0].reset();
              alert('Registration successful, please verify in the registered Email-Id')
              location.assign('login')
               }
               else if (data.trim() === 'Password Does not match'){
                alert('Password Does not match')
              $('input[type="submit"]').prop('disabled', false);
               }

            else {
              alert('Error!!')
              $('input[type="submit"]').prop('disabled', false);
              }
              }
              });
              return false;
               }
               });
               });
</script>

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" role="form"  id = "form"  enctype="multipart/form-data" method="post" >
             
              <input type="hidden" name="form_submit" value=1/>

              <div class="form-label-group">
                <input type="text" id="inputName" name="name" class="form-control" placeholder="Fullname" required autofocus>
                <label for="inputName">Fullname</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div> 

              <div class="form-label-group">
                <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password" minlength="8" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input type="password" name='confirm_password' id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                <label for="confirm_password">Confirm Password</label>
              </div>

              <div class="form-label-group">
              <div class='custom-control custom-radio '>
                   <label for='designation' >Designation</label>
                   <br>
                   <label class='radio-inline'>
                       <input type="radio" id="lead" name="designation" value="lead"  onChange=<?php echo "check()";?>> Lead
                   </label>
                   <label class='radio-inline'>
                       <input type="radio" id="developer" name="designation" value="developer" onChange=check() > Developer
                   </label>
               </div>
              </div>
              
              <div  id = "parent"></div>

               <div class="form-label-group">
               <div  class='custom-control custom-radio mb-3'>
                   <label for='gender' >Gender</label>
                   <br>
                   <label class='radio-inline'>
                       <input type="radio" id="male" name="gender" value="male"> Male
                   </label>
                   <label class='radio-inline'>
                       <input type="radio" id="female" name="gender" value="female" > Female
                   </label>
                   <label class='radio-inline'>
                       <input type="radio" id="other" name="gender" value="other" > Other
                   </label>
               </div>
              </div>
              <button id='signin' class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
              <span class="login">Already have an account? <a class='loginRef' href="./login">Login</a></span> 
              </form>
          </div>
        </div>
      </div>
    </div>
  </div> 



    <script>
      function check(){
        if(document.getElementById('lead').checked == true){
          document.getElementById('parent').innerHTML=''
          }
          if(document.getElementById('developer').checked == true){
            document.getElementById('parent').innerHTML='';
            document.getElementById('parent').insertAdjacentHTML("beforeend", "<?php echo "<label  for='select_lead'>Choose your lead:</label><select class='custom-control custom-select mb-3' name='select_lead' id='select'>"; if($data){while($row = $data->fetch_assoc()){echo "<option value='".$row["id"]."'>".$row["Name"]."</option>";}echo "</select><br><br>";}?>");
          }


         
      
      }
    </script>







</body>
</html>