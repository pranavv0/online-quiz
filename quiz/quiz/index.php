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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
 
 <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>
<style>
.input{
  border-radius:5px;
  margin:3px;
  padding:2px;
}
</style>
</head>
<body>

<div  style="background-color:white;">
<div  id="myModal">
      <div >
      <span align="center" style="color:darkblue;font-size:15px;font-weight: bold"><h2>Welcome to quiz</h2></span>
      </div>

      <div>
        <form  action="login.php?q=index.php" method="POST" id="form1">
<fieldset align="center" form="form1" style="background-color:lightblue;">
<legend>User-login</legend>
  <label for="username"></label>  
  <div >
  <input id="username" class="input" name="username" placeholder="Username"  type="username">
    </div>
    <label for="password"></label>
    <div>
    <input id="password"  class="input" name="password" placeholder="Enter your Password" type="password">
    </div>
    <div align="center">
      <button type="submit" class="input">Log in</button>
      <div>
<div class="w3-container">
  <a href="register.php" class="w3-button w3-black">Registration</a>
  <a href="adminlogin.php" class="w3-button w3-black">Admin-login</a>
</div>
    </fieldset>
</form>
    </div>
</div>
</div>

</body>
</html>
