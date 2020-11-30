<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
session_start();
if(isset($_SESSION['username']) && (!isset($_SESSION['key']))){
   header('location:account.php?q=1');
}
else if(isset($_SESSION['username']) && isset($_SESSION['key']) && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39'){
   header('location:dash.php?q=0');
}
else{}
?>
<html>
<head>

<title> Quiz </title>
   
 
 <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 
 
</script>
<style>
.input{
  border-radius:5px;
  margin:3px;
  padding:2px;
}
</style>
<script>
function validateForm() {
  var y = document.forms["form"]["name"].value; 
  if (y == null || y == "") {
    document.getElementById("errormsg").innerHTML="Name must be filled out.";
    return false;
  }
  var br = document.forms["form"]["branch"].value;
  if (br == "") {
    document.getElementById("errormsg").innerHTML="Please select your branch";
    return false;
  }
 
  var g = document.forms["form"]["gender"].value;
  if (g=="") {
    document.getElementById("errormsg").innerHTML="Please select your gender";
    return false;
  }
  var x = document.forms["form"]["username"].value;
  if (x.length == 0) {
    document.getElementById("errormsg").innerHTML="Please enter a valid username";
    return false;
  }
  if (x.length < 2) {
    document.getElementById("errormsg").innerHTML="Username must be at least 4 characters long";
    return false;
  }
  var m = document.forms["form"]["phno"].value;
  if (m.length != 10) {
    document.getElementById("errormsg").innerHTML="Phone number must be 10 digits long";
    return false;
  }
  var a = document.forms["form"]["password"].value;
  if(a == null || a == ""){
    document.getElementById("errormsg").innerHTML="Password must be filled out";
    return false;
  }
  if(a.length<5 || a.length>15){
    document.getElementById("errormsg").innerHTML="Passwords must be 5 to 15 characters long.";
    return false;
  }
  var b = document.forms["form"]["cpassword"].value;
  if (a!=b){
    document.getElementById("errormsg").innerHTML="Passwords must match.";
    return false;
  }
}
</script>
 <form align="center" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST" id="form1" >
<fieldset align="center" form="form1" style="background-color:lightblue;">
<legend>Registration</legend>

<div>
  <label for="name"></label>  
  <div>
  <div id="errormsg" style="font-size:14px;font-family:calibri;font-weight:normal;color:red"><?php
if (@$_GET['q7']) {
    echo '<p style="color:red;font-size:15px;">' . @$_GET['q7'];
}
?></div>
    
  </div>
</div>
<div>
  <label for="name"></label>  
  <div>
  <input id="name" class="input" name="name" placeholder="Enter your name" type="text" value="<?php
echo isset($_GET['id']) ? $_GET['id'] : '';
?>">
    
  </div>
</div>
<div>
  <label for="rollno"></label>  
  <div>
  <input id="rollno" class="input" name="rollno" placeholder="Roll_Number" type="text" value="<?php
echo isset($_GET['rollno']) ? $_GET['rollno'] : '';
?>">
    
  </div>
</div>
<div>
  <label for="gender"></label>
  <div>
    <select id="gender"  class="input" name="gender" placeholder="Select your gender" >
   <option value="" <?php
if (!isset($_GET['gender']))
    echo "selected";
?>>Select Gender</option>
  <option value="M" <?php
if  (($_POST['gender']=="M"))
    echo "selected";
?>>Male</option>
  <option value="F" <?php
if ($_GET['gender'] == "F")
    echo "selected";
?>>Female</option> </select>
  </div>
</div>
<div>
  <label for="branch"></label>
  <div>
    <select id="branch" class="input" name="branch" placeholder="Select your branch" >
   <option value="" <?php
if (!isset($_GET['branch']))
    echo "selected";
?>>Select Branch</option>
  <option value="CSE" <?php
if ($_GET['branch'] == "CSE")
    echo "selected";
?>>Computer Science and Engineering</option>
  <option value="ECE" <?php
if ($_GET['branch'] == "ECE")
    echo "selected";
?>>Electronics and Communication Engineering</option> </select>
  </div>
</div>
<div>
  <label for="username"></label>
  <div>
    <input id="username"  class="input" name="username" placeholder="Choose a username" type="text" value="<?php
echo  isset($_GET['username']) ? $_GET['username'] : '';
?>" 
style="<?php
if (isset($_GET['q7']))
    echo "border-color:red";
 ?>">    
  </div>
</div>

<div>
  <label for="phno"></label>  
  <div>
  <input id="phno"  class="input" name="phno" placeholder="Enter your mobile number" type="number_format" value="<?php
echo $_GET['phno'];
?>">
    
  </div>
</div>

<div>
  <label for="password"></label>
  <div>
    <input id="password" class="input" name="password" placeholder="Enter your password" type="password">
    
  </div>
</div>

<div>
  <label for="cpassword"></label>
  <div>
    <input id="cpassword" class="input" name="cpassword" placeholder="Confirm Password" type="password">
    
  </div>
</div>

<div>
  <label for=""></label>
  <div style="text-align: center"> 
    <input  type="submit" class="input" value=" Register" style="text-align:center" />
  </div>
</div>

</fieldset>
</form>