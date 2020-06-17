<?php
define('CSS_PATH', 'http://pnp.local.com/public/css/');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    
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

</head>
<script>
  $(document).ready(function(){
    $("#frmLogin").validate({
      submitHandler: function (form) {
        $('input[type="submit"]').prop('disabled', true);
        var aUrl = "/loginAction.?xAction=loginUser&"+$('form#frmLogin').serialize();
        $.ajax({
          type: 'post',
          url: aUrl,
          success: function(data){
            if(data.trim() === "LOGGED"){
              $('form#frmLogin')[0].reset();
              location.assign('homeDashboard')
               }
               else if(data.trim() === "Please Verify  your Email First"){
              alert('Please Verify  your Email First')
              $('input[type="submit"]').prop('disabled', false);
              }
              
               
            else if(data.trim() === "ERR"){
              alert('Incorrect Credentials')
              $('input[type="submit"]').prop('disabled', false);
              }
              }
              });
              return false;
               }
               });
               });
</script>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" role="form"  id="frmLogin" enctype="multipart/form-data" method="post" onsubmit="return false;" novalidate="novalidate">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password"  required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
                

              </div>
              <button id='signin' class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <span class="register">Don't have an account? <a id='register' href="./register">Register</a></span> 
              <hr class="my-4">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="button"><i class="fab fa-google mr-2"></i> <a href="./googleLoginAction">Login With Google</a></button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="button"><i class="fab fa-twitter mr-2"></i> <a href="./twitterLoginAction">Login With Twitter</a></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>