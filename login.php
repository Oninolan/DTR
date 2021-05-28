<?php
	session_start();
	if(isset($_SESSION['getLogin'])) 	
	{
		header("location:dtr.php");
	}
	
	else {
?>

<html>
<head>
	<title>Log-In</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<ul>
  <li><a href= "client.php">Chat </a></li>
  <li><a href= "add.php">Sign up here </a></li>
</ul>

<div class = "logincentered"><center>
<h1>Welcome to Employee's Log-In Panel</h1><br><br>
<table opacity= 0%>
<tr>
<form name="frm" method="post" action="check.php">
<td><h3 style="color:white">Username:</h3></td><td><input type="text" name="username"/></td>
</tr>
<tr>
<td><h3 style="color:white">Password:</h3></td><td><input type="password" name="pass"/></td>
</tr>
<tr>
<td colspan="2" align="center"><br><input type="submit" value="Login" name="loginBtn" class="button"/></td>
</tr>
</form>
</table>
<?php
if(isset($_GET["error"])) {
  $error=$_GET["error"];
  
  //this line will be called by the check.php if the login credentials are incorrect 
  if ($error==1) {
  echo "<p align='center'>Username and/or password invalid<br/></p>"; }
}
 
?>
</center>
<div>
</body>
</html>

<?php } ?>


