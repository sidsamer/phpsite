<?php
include_once 'includes/connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
background-color: black;
 font-family:verdana;
 color:white
 }
h1   {
 color:orange;
 padding 30px;
 }
 button{
 background-color:Indigo;
 color:orange;
 }
</style>

<body>
<?php

?>
<CENTER>
<header><h1>Notes<h1></header>
<div>
<form action='Notes.php' method='post' >
<input type="text" name="NoteName" placeholder="enter new/exist Notes name" required><br>
<input type="text" name="Note" placeholder="Edit/Create Note" required><br>
<button type="submit" value="SignUp" name="submit">Create/Update</button>
</form>
</div>

<ul>
<?php
if(isset($_POST['submit']))
{
	$NoteName=$_POST['NoteName'];
	$Note=$_POST['Note'];
	$sql="INSERT INTO note(id,title,body) ".
			"values (".$_SESSION['Id'].",'$NoteName','$Note');";
			$res=mysqli_query($conn,$sql);
			if(!$res)
				echo("query faild".mysqli_connect_error());
			echo "<br>".$sql;
}
 $sql="select title,body from note where id=".$_SESSION['Id'].";";
 $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	     while($row=mysqli_fetch_assoc($result))
	   {
		
		   echo "<li>".$row['title'].": ".$row['body']."</li>";
	   }
	   }
?>
</ul>

</CENTER>
</body>
</html>