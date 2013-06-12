<?php
$host= getenv('OPENSHIFT_MYSQL_DB_HOST'); // Host name
        $usernamedb= getenv('OPENSHIFT_MYSQL_DB_USERNAME'); // Mysql username
        $password_db= getenv('OPENSHIFT_MYSQL_DB_PASSWORD'); // Mysql password
        $db_name= getenv('OPENSHIFT_APP_NAME'); // Database name
        $tbl_name="Agencies"; // Table name
$con=mysqli_connect($host,$usernamedb,$password_db,$db_name);
$agency = $_POST['agency'];
//echo $_POST['username'];

//$agency = 2;
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql = "Select turn FROM Agencies Where id=".$agency;
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        while($row = mysqli_fetch_array($result))
               $turn =  $row["turn"];
        if($turn == 99) $turn = 1;
        else $turn++;
        $sql = "Update Agencies set turn=".$turn." where id=".$agency ;
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        $sql = "SELECT turn FROM Agencies WHERE id=".$agency;
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        while($row = mysqli_fetch_array($result))
               echo "<p class='number'>".$row["turn"]."</p>";
        mysqli_close($con);

?>

