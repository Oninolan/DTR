<?php
	session_start();
	if(!isset($_SESSION["getLogin"]))
	{
		header("location:login.php");
	}
	
	else {
?>

<html>
<head>

<title>Employee DTR</title>
</head>
<body bgcolor='#CCCCCC'>

<?php
	error_reporting(E_ALL ^ E_NOTICE);
	echo "Hi ". ucwords($_SESSION["getLogin"]);
?>

&nbsp; &nbsp;<a href= "employeeChat.php">Chat </a>

&nbsp; &nbsp;<a href= "modify.php">View Account </a>

&nbsp; &nbsp;<a href= "logout.php">Logout </a>


<center>
<h2>Work Schedule </h2>
<h3>[ Online Daily Time Record ]</h3>
<form action="dtrprocess.php" method="post">
Date of Effectivity: &nbsp;

<input type="date" id="StartDate" name="StartDate">

&nbsp; Cut Off Date: &nbsp;

<input type="date" id="EndDate" name="EndDate">



	  <br /><br />
	  <?php
	     $dayArray = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
		 echo "<table width='40%'>";
		 echo "<tr><th>/</th><th>Day</th><th>Time In</th><th>Time Out</th><tr>";
		 for($day=0; $day<=5; $day++) {
		   echo "<tr><td><input type='checkbox' id = 'work$day' name='work$day' value='$dayArray[$day]'></td><td align = 'center'>".$dayArray[$day]. "</td>".
		        "<td align='center'><select id = 'in$day' name='in$day' required disabled><option></option>";
				      for($timein=0; $timein<=24; $timein++) {
					     echo "<option value=$timein>$timein</option>";
					  }
           echo "</select></td>";
		   echo "<td align='center'><select id = 'out$day' name='out$day' required disabled><option></option>";
		              for($timeout=0; $timeout<=24; $timeout++){
					    echo "<option value=$timeout>$timeout</option>";
					  }
           echo "</select></td></tr>";					  
         }
		 echo "</table>";
	  ?>
	<br />  
	<input type="submit" name="enter" value="Save">
	<input formaction = 'dtrview.php' type="submit" name="click" value = "View"> 
	<input type="reset">
  </form>
  </center>
  
  <script>
	<?php
	for($day=0; $day<=5; $day++) {
		echo  "document.getElementById('work$day').onchange = function() {";
		echo  "document.getElementById('in$day').disabled = !this.checked;";
		echo  "document.getElementById('out$day').disabled = !this.checked;";
		echo  "};";
	}
	?>
</script>

</body>
</html>

<?php } ?>