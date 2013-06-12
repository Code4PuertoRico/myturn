<?php
        $host= getenv('OPENSHIFT_MYSQL_DB_HOST'); // Host name
        $usernamedb= getenv('OPENSHIFT_MYSQL_DB_USERNAME'); // Mysql username
        $password_db= getenv('OPENSHIFT_MYSQL_DB_PASSWORD'); // Mysql password
        $db_name= getenv('OPENSHIFT_APP_NAME'); // Database name
        $tbl_name="Agencies"; // Table name


// Create connection
$con=mysqli_connect($host,$usernamedb,$password_db,$db_name);

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$id = $_POST['id'];

$sql = "SELECT turn FROM Agencies WHERE id=".$id;
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        while($row = mysqli_fetch_array($result))
                $turn = $row["turn"];


?>



<link rel= "stylesheet" type= "text/css" href= "style.css">
<div id="banner"><img src="http://i42.tinypic.com/33wusug.png" height= "100" align="middle" border="0"></div>
<div id="container"> 
 <?php echo "<p class='number'>". $turn."</p>";?>
<table>
	<tr>
		<!--<td><?php echo "<p class='number'>". $turn."</p>";?></td>--!>
		<form action="currentturn.php" method="POST"> <?php echo "<input type=\"hidden\" name=\"id\" value=$id>"; ?>
<input id = "boton" type="submit" value="Refresh">
</form></tr>
	<tr><td>
</td></tr>
</table>
<br>
<form  action="add_text.php" method="POST">
	Phone : <input type="text" name="phone">
	<select name="carrier">
		<option value="vtexto.com">Claro</option>
		<option value="txt.att.net">At&t</option>
		<option value="tmomail.net">T-Mobile</option>
	</select>
	Turn : <input type="number" name="turn">
	<input type="submit" value="Submit">
</form>

</div></div>
<div id="footer">
This application is in its alpha version, please notify if bugs | myturn.pr@gmail.com | 2013 &copy; myturn
</div>
