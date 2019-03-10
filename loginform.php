<!DOCTYPE HTML>
<html>
<head>
<title>LoginForm</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="style.css"/>
<!-- Javascript validation for user inputs -->
<script type="text/javascript">
function validate()
{
var username = document.login.username.value;
var password = document.login.password.value;
if (username==null || username=="")
{
alert("Username can't be blank");
return false;
}
else if (password==null || password=="")
{
alert("password can't be blank");
return false;
}
}
</script>
</head>
<body>
<!-- Method type used is post, action page is Login.php and validate() function will get called on submit -->
<div style="text-align:center"><h1>MPSTME Login</h1></div>
<br>
<form name="login" method="post" action="login.php" onsubmit="return validate();" >
<div>Username: <input type="text" name="username" /> </div>
<div>Password: <input type="password" name="password" /> </div>
<div><input type="submit" value="Login"> </div>
</form>
</body>
</html>
