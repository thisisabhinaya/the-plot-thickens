
<html>
<head>
<title>Dashboard</title>
<link rel = "stylesheet" type = "text/css" href="style.css"/>
<script>
function updateSlots()
{var choice=document.getElementById("choice").value;
document.ChooseSlot.getElementById("show").innerHTML="Slot Reserved!";
<?php
include_once("DBConnection.php"); 
session_start();
$username = $_SESSION['username']; 

$stmt2=$db->prepare("SELECT USERNAME, PASSWORD, USER_TYPE FROM users WHERE USERNAME= ?");
$stmt2->bind_param('i', $username); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$stmt2->execute(); // actually perform the query
$result = $stmt2->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

echo "Welcome ".$r['USER_TYPE'];
?>

}

</script>
</head>
<body>
<div style="text-align:center"><h1>MPSTME Parking Lot Dashboard</h1></div>
<br/>
 
<div class="statusMessage"> Welcome <?php echo $username ?> </div>
  

 <?php
 if(!isset($_SESSION['username'])) //If user is not logged in then he cannot access the dashboard page
 {
 //echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
 header("location:loginform.php");
 }
 ?>
<div>
<center>
<img id="lot" src="images/lotsmall.jpg" srcset="images/lotmedium.jpg 1000w, images/lotlarge.jpg 2000w" alt="Parking Lot Spots" />
 </center>
</div>

<form id="ChooseSlot" method="POST" onsubmit="return updateSlots();">
<br>
<label for="choice">Refer to map and choose closest spot: </label>
<input type="text" name="choice" maxlength=5><br>

<input type="submit" form="ChooseSlot" value="Reserve Slot"></button>
</form>
<div id="show"></div>
<div style="text-align: right"><a href="Logout.php">Logout</a></div> 
</body>
</html>