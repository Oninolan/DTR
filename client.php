<html>
<head><title>Chat Client</title>
<link rel="stylesheet" href="style.css"></head>
<body>
<div class = "logincentered">
<h3 style="color:white">Chat with Admin</h3>
<form method="POST">
<p style="color:white">Enter Message: <input type="text" name="txtMessage" size="20"></p>
<center><input type="submit" name="btnSend" value="send" class="button"></center><br/><br/>

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

  <textarea rows="10" cols="45"><?php echo @$reply; ?></textarea></div>
</form>