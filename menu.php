<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
 .container {
 height:100%;
 width:100%;
 }
</style>

<body>
<?php
include_once 'includes/connection.php';
$GLOBALS['tmp']="Notes.php";
session_start();
?>
<CENTER>
<div class="navbar">
<form action="menu.php" method='post' >
<button type="submit" value="Notes" name="page">Notes</button>
<button type="submit" value="Lists" name="page">Lists</button>
</form>
</div>
<br><br>
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