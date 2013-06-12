<?php
session_start();
$host= getenv('OPENSHIFT_MYSQL_DB_HOST'); // Host name
        $usernamedb= getenv('OPENSHIFT_MYSQL_DB_USERNAME'); // Mysql username
        $password_db= getenv('OPENSHIFT_MYSQL_DB_PASSWORD'); // Mysql password
        $db_name= getenv('OPENSHIFT_APP_NAME'); // Database name
$username = $_POST["username"]; //Storing username in $username variable.
$password = $_POST["password"]; //Storing password in $password variable.

$table = "Agencies";

$link = mysql_connect($host, $usernamedb, $password_db);
mysql_select_db($db_name,$link);

$match = "select id from $table where id = '".$_POST['username']."'
and password = '".$_POST['password']."';";

$qry = mysql_query($match);

$num_rows = mysql_num_rows($qry);


if ($num_rows <= 0) {

echo "Sorry, there is no username $username with the specified password.";

echo "Try again";

exit;

} else {



$_SESSION['user']= $_POST["username"];
include "counter.php";
// It is the page where you want to redirect user after login.
}
?>
