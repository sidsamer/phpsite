<?php
include_once 'includes/connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>
<style>
.NoteWidth button{
background-color:green;
position: absolute; 
right:0;
padding: 5px 10px;
border: 0px solid green;
}

 .noteWidth  button:active{
	  border: 2px solid green;
	  padding: 5px 20px;
 }

</style>
</head>

<body>
<CENTER>
<header><h1>Notes<h1></header>
<div class="NoteForm">
<form action='Notes.php' method='post' >
<input type="text" name="NoteName" placeholder="enter new/exist Notes name" required><br>
<input type="text" name="Note" placeholder="Edit/Create Note" required><br>
<button type="submit" value="Submit" name="submit">Create</button>
</form>
</div>
<div class="NoteWidth">
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
}
 $sql="select title,body,Noteid from note where id=".$_SESSION['Id'].";";
 $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	     while($row=mysqli_fetch_assoc($result))
	   {
		   $tmp="'".$row['title']."'";
		   echo "<li>".$row['title'].':<br><button onclick="myFunction('.$tmp.');">+</button><br>'.
		   '<div id='.$tmp.' style="display:none;">'.$row['body'].'</div></li>';
	   }
	   }
?>
</ul>
</div>

</CENTER>

</body>
</html>