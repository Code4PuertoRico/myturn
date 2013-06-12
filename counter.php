<?php
$host= getenv('OPENSHIFT_MYSQL_DB_HOST'); // Host name
        $usernamedb= getenv('OPENSHIFT_MYSQL_DB_USERNAME'); // Mysql username
        $password_db= getenv('OPENSHIFT_MYSQL_DB_PASSWORD'); // Mysql password
        $db_name= getenv('OPENSHIFT_APP_NAME'); // Database name
        $tbl_name="Agencies"; // Table name
$con=mysqli_connect($host,$usernamedb,$password_db,$db_name);
$agency = $_POST['username'];
//$agency = 2;
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
function incrementCounter(){
        window.agency = <?php echo $agency; ?>;
        $.ajax({
                url: 'increment.php',
                method: 'POST',
                data : {
                        agency : agency,
        }, success: function(response){
                $('#counter').html(response);
    }
});}
</script>
</head>
<body>
<div id="banner"><img src="http://i42.tinypic.com/33wusug.png" height= "100" align="middle" border="0"></div>
<div id="container">
<div id="body">
<div id="counter">
<?      $sql = "SELECT turn FROM Agencies WHERE id=".$agency;
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        while($row = mysqli_fetch_array($result))
                $turn = $row["turn"];
        echo "<p class='number'>".$turn;?></p></div>
<button id="boton" onclick="incrementCounter()">Turn</button>
</div>
</body>
<div id="footer">
This application is in its alpha version, please notify if bugs | myturn.pr@gmail.com | &copy; myturn
</div>
</html>

