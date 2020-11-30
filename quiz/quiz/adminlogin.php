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
  
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>

</script>
<style>
.input{
  border-radius:5px;
  margin:3px;
  padding:2px;
}
</style>
</head>
<body>

<form role="form" method="post" action="admin.php?q=adminlogin.php" id="form1">
<fieldset align="center" form="form1" style="background-color:lightblue;">
<legend>Admin-login</legend>
<div>
<input type="text"  class="input" name="uname" maxlength="20"  placeholder="Username"/> 
</div>
<div class="form-group">
<input type="password" class="input" name="password" maxlength="30" placeholder="Password" class="form-control"/>
</div>
<div align="center">
<input type="submit" class="input" name="login" value="Login" />
</div>
</fieldset>
</form>
</body>
</html>
