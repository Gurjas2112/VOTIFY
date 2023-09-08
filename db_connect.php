


<?php
$servername="localhost";
$database="votify";
$dbuser="root";
$dbpwd="";

$conn=mysqli_connect($servername, $dbuser, $dbpwd, $database);
if(!$conn){
	die('failed to connect to the database!');
} else {
	mysqli_select_db($conn,$database);
}
?>