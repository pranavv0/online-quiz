<!DOCTYPE>
<html>
<head>
<title> Admin </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>

<style>
.click{
    border-radius:2px;
    background-color:silver;
}

.input{
  border-radius:5px;
  margin:3px;
  padding:2px;
}
</style>

</head>

<body  style="background:white ;">
<div style="background-color:lightblue; height:70px;">
<div>
<div>
<span align="centre" ><h3></h3></span></div>
<?php
include_once 'dbConnection.php';
session_start();
if (!(isset($_SESSION['username']))  || ($_SESSION['key']) != '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
    session_destroy();
    header("location:index.php");
} else {
    $name     = $_SESSION['name'];
    $username = $_SESSION['username'];
    
    include_once 'dbConnection.php';
    echo '<span class="pull-right top title1" ><span style="color:white"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <span class="log log1" style="color:lightyellow">' . $name . '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php?q=account.php" style="color:lightyellow"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}
?>

</div></div>

    <div>
      
    <div id="bs-example-navbar-collapse-1" class="w3-container">
      <ul>
        <li <?php
if (@$_GET['q'] == 0)
    echo 'class="active"';
?>>
  <a href="dash.php?q=0" class="w3-button w3-black">Home</a>
</li>&nbsp

        <li <?php
if (@$_GET['q'] == 4)
    echo 'class="active"';
?>>
<a href="dash.php?q=4" class="w3-button w3-black">Add Quiz</a></li>&nbsp
        <li <?php
if (@$_GET['q'] == 5)
    echo 'class="active"';
?>>
<a href="dash.php?q=5" class="w3-button w3-black">Remove Quiz</a></li>&nbsp
       <li <?php
if (@$_GET['q'] == 6)
    echo 'class="active"';
?>>
<a href="dash.php?q=6" class="w3-button w3-black">online users</a></li>&nbsp
      </ul>
          </div>
  </div>
<div>
<div>
<?php
if (@$_GET['q'] == 0) {
    
    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
    echo '<div><table  style="vertical-align:middle" border="1">
<tr><td style="vertical-align:middle"><b>S.N. &nbsp&nbsp&nbsp&nbsp</b></td><td style="vertical-align:middle"><b>Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td><td style="vertical-align:middle"><b>&nbsp&nbsp&nbspTotal question  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td><td style="vertical-align:middle"><b>&nbsp&nbsp&nbsp Marks &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td><td style="vertical-align:middle"><b>&nbsp&nbsp&nbsp&nbsp Time limit &nbsp&nbsp&nbsp&nbsp&nbsp</b></td><td style="vertical-align:middle"><b>&nbsp&nbsp&nbsp&nbsp Status &nbsp&nbsp&nbsp&nbsp&nbsp</b></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle">&nbsp&nbsp' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $total . '</td><td style="vertical-align:middle">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $correct * $total . '</td><td style="vertical-align:middle">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $time . '&nbsp;min</td><td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?deidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#ff6b81;font-size:12px;padding:5px; margin:5px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Disabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?eeidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:darkgreen;font-size:12px;padding:5px; margin:5px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';
            
        }
    }
}


if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
    echo ' 
<div>
<span style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div>   
 <form name="form" action="update.php?q=addquiz"  method="POST">
 <center>
<fieldset style="width:50%;" >
<div>
  <label for="name"></label>  
  <div>
  <input id="name" class="input" name="name" placeholder="Enter Quiz title" type="text" style="width:100%;">
    
  </div>
</div>
<div>
  <label for="total"></label>  
  <div>
  <input id="total"  class="input" name="total" placeholder="Enter total number of questions" type="number" style="width:100%;">
    
  </div>
</div>
<div>
  <label for="right"></label>  
  <div>
  <input id="right" class="input" name="right" placeholder="Enter marks on right answer" min="0" type="number" style="width:100%;">
    
  </div>
</div>
<div>
  <label for="wrong"></label>  
  <div>
  <input id="wrong"  class="input" name="wrong" placeholder="Enter minus marks on wrong answer without sign" min="0" type="number" style="width:100%;">
    
  </div>
</div>
<div>
  <labelfor="time"></label>  
  <div>
  <input id="time"  class="input" name="time" placeholder="Enter time limit for test in minute" min="1" type="number" style="width:100%;">
    
  </div>
</div>

<div>
  <div> 
    <input  type="submit"  class="input" style="align:center" value="Submit" style="width:50%;"/>
  </div>
</div>

</fieldset>
</center>
</form></div>';
    
    
    
}
if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
    echo ' 
<div>
<span  style="margin-left:40%;font-size:30px;"><b>Create QuiZ..</b></span><br /><br />
<div><form name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
<fieldset>
';
    
    for ($i = 1; $i <= @$_GET['n']; $i++) {
        echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br /><!-- Text input-->
<div>
  <label for="qns' . $i . ' "></label>  
  <div>
  <textarea rows="3"  class="input" style ="width:100%;" cols="5" name="qns' . $i . '" placeholder="Write question number ' . $i . ' here..."></textarea>  
  </div>
</div>
<center>
<div>
  <label for="' . $i . '1"></label>  
  <div>
  <input class="input" id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" type="text">
    
  </div>
</div>
<div>
  <label for="' . $i . '2"></label>  
  <div>
  <input  class="input" id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" type="text">
    
  </div>
</div>
<div>
  <label for="' . $i . '3"></label>  
  <div>
  <input class="input" id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" type="text">
    
  </div>
</div>
<div>
  <label for="' . $i . '4"></label>  
  <div>
  <input class="input" id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select  class="input" id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer ">
   <option value="a">Choose Currect Answer Of Q.- ' . $i . '</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
    }
    
    echo '<div>
  <div> 
  </center>
    <input class="input"  type="submit" style="align:center; height:30px; widhe:30px; background-color:#3B3B98" />
  </div>
</div>

</fieldset>
</form></div>';
    
    
    
}



if (@$_GET['q'] == 6) {
    
    $result = mysqli_query($con, "SELECT * FROM online") or die('Error');
    echo '<div><table border="1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>UserName</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $name      = $row['username'];
        
        

        
        
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle"><b><a href="update.php?sname=' . $name . '" style="margin:0px;background:#eb3b5a;color:white" class="input">&nbsp;<span><b>STOP</b></span></a></b></td></tr>';
    }
    $c = 0;
    echo '</table></div>';
    
}









if (@$_GET['q'] == 5) {
    
    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Sucess');
    echo '<div><table border="1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Topic</b></td><td style="vertical-align:middle"><b>Total question</b></td><td style="vertical-align:middle"><b>Marks</b></td><td style="vertical-align:middle"><b>Time limit</b></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle">' . $time . '&nbsp;min</td>
  <td style="vertical-align:middle"><b><a href="update.php?q=rmquiz&eid=' . $eid . '" style="margin:0px;background:red;color:white">&nbsp;<span><b>Remove</b></span></a></b></td></tr>';
    }
    $c = 0;
    echo '</table></div>';
    
}
?>
</div>
</div></div>
</body>
</html>
