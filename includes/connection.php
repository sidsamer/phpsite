<?php

$host="eu-cdbr-west-02.cleardb.net";
$dbuser="be08752f62fdb5";
$pass="4754a542";
$dbname="heroku_3ee2ee81582971e";
$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
if(mysqli_connect_errno())
{
	die("Connection Faild!".mysqli_connect_error());
}
else
{
	echo "connected to database {$dbname}";
}
?>
