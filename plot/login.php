<!DOCTYPE HTML>
<html>
<body>
<?php 
 include_once("DBConnection.php"); 
 session_start(); //always start a session in the beginning 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
 if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code 
 { 
 echo 
 "Incorrect username or password"; //
 header("location: loginform.php");//You will be sent to LoginForm.php for re-login 
 } 
 
 $inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
 $inPassword = $_POST["password"]; 
 $user_type="nil";
$stmt= $db->prepare("SELECT USERNAME, PASSWORD, USER_TYPE FROM users WHERE USERNAME = ?");
 //All input credential records for students faculty handicapped
 $stmt->bind_param("i", $inUsername); //bind_param() - Binds variables to a prepared statement as parameters. "i" indicates the type of the parameter.
 $stmt->execute();
 $stmt->bind_result($UsernameDB, $PasswordDB, $TypeDB); // Binding i.e. mapping database results to new variables
 
 //Compare if the database has username and password entered by the user. 
 if ($stmt->fetch() ) 
 {
 $_SESSION['username']=$inUsername; //Storing the username value in session variable so that it can be retrieved on other pages

 header("location: dashboard.php"); // user will be taken to dashboard
 }
 else
 {
    
	header("location: loginform.php");
	echo "Incorrect username or password"; 
   ?>
 
   <a href="loginform.php">Login</a>
       <?php 
 } 
 } 
       ?>
 </body> 
 </html>