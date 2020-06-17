<!DOCTYPE html>
<html lang="en">
<head style="height: 100%;">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  h1, h5{
    color:#525252;
  }
  body {font-family: Arial, Helvetica, sans-serif;}
  form {border: 3px solid #f1f1f1;}
  input[type=email], input[type=text] , input[type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  }
  input[type=radio]{
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;

  }
  button {
  background-color: darkslategrey;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
   }
   button:hover {
  opacity: 0.8;
   }
   .container {
  padding: 16px;
  }
  span.login {
  float: right;
  padding-top: 16px;
  }
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
  span.login {
     display: block;
     float: none;
  }

  }

</style>
<body style="height: 100%;">

    <div class = "register">
    <h1>Edit Profile</h1>

    <h5>Please fill your credentials to Complete your Profile</h5>

        <form id = "form" action=".\editProfileAction" method="post">
            <div class="container">
            
              
              <label for="designation"><b>Designation</b></label><br>
              <label id = "designation">
              <input type="radio" id="lead" name="designation" value="lead"  onChange=<?php echo "check()";?>>
<label for="lead">Lead</label>
<input type="radio" id="developer" name="designation" value="developer" onChange=check()>
<label for="developer">Developer</label>
              
              </label><br><br>  
              <input type="hidden" name="form_submit" value=1/>
              <div id = "parent"></div>

              
              <label for="gender"><b>Gender</b></label><br>           
  <label>
       <input type="radio" id="male" name="gender" value="male">
       <label for="male">Male</label>

      <input type="radio" id="female" name="gender" value="female">
     <label for="female">Female</label>

     <input type="radio" id="other" name="gender" value="other">
     <label for="other">Other</label>

  </label><br><br>
              


              <button type="submit">ADD</button>
             
            </div>
          </form>
    </div>

    <script>
      function check(){
        console.log('In check')
        if(document.getElementById('lead').checked == true){
          document.getElementById('parent').innerHTML=''
          }
          if(document.getElementById('developer').checked == true){
            document.getElementById('parent').innerHTML='';
            document.getElementById('parent').insertAdjacentHTML("beforeend", "<?php echo "<label for='select_lead'>Choose your lead:</label><select name='select_lead' id='select'>"; if($data){while($row = $data->fetch_assoc()){echo "<option value='".$row["id"]."'>".$row["id"]."</option>";}echo "</select><br><br>";}?>");
           }

         
      
      }
    </script>
</body>
</html>