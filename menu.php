<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
 .container {
 height:100%;
 width:100%;
 max-width: 500px;
 }
  header{
	 background-color:#262626;
	 padding: 20px;
 }
 header button{
 width:40%;
 font-size:30px;
 }
</style>

<body>
<?php
include_once 'includes/connection.php';
$GLOBALS['tmp']="Notes.php";
session_start();
?>
<CENTER>
<header>
<form action="menu.php" method='post' style=" width:100%;" >
<button type="submit" value="Notes" name="page">Notes</button>
<button type="submit" value="Schedule" name="page">Schedule</button>
</form>
</header>
<div class="container">
<?php 
if(isset($_POST['page']))
 $GLOBALS['tmp']=$_POST['page'].".php";
?>
<iframe id="myFrame" src=<?php echo $GLOBALS['tmp'];?> name="myFrame" height="600px" width="100%" style="border:none;"></iframe>
</div>
</CENTER>
</body>
</html>