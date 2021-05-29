<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}
	
	else {
?>


<html>
<head><title>Chat Client</title>
<link rel="stylesheet" href="style.css"></head>
<body>

<?php
	error_reporting(E_ALL ^ E_NOTICE);
	echo "Hi ". ucwords($_SESSION["getLogin"]);
?>

&nbsp; &nbsp;<a href= "client.php">Chat </a>

&nbsp; &nbsp;<a href= "modify.php">View Account </a>

&nbsp; &nbsp;<a href= "logout.php">Logout </a>


<h3>Chat Option</h3>
<form method="POST">
Enter Message: <input type="text" name="txtMessage" size="20">
<input type="submit" name="btnSend" value="send"><br/><br/>

<?php
  $host = "127.0.0.1";
  $port = 50001;
  set_time_limit(0);
  if (isset($_POST["btnSend"])){
	  
	  $msg = $_REQUEST["txtMessage"];
	  $sock = socket_create(AF_INET, SOCK_STREAM, 0);
	  socket_connect($sock, $host, $port);
	  
	  socket_write($sock, $msg, strlen($msg));
	  
	  $reply = socket_read($sock, 1924);
	  $reply = trim($reply);
	  $reply = "Server says:\t". $reply;
  }
?>

  <textarea rows="10" cols="45"><?php echo @$reply; ?></textarea>
</form>

<?php } ?>