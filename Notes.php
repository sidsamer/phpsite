<?php
include_once 'includes/connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<script src="javascript.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<head>
<style>
.NoteWidth button{
background-color:gold;
position: absolute; 
right:0;
padding: 5px 10px;
border: 0px solid gold;
}

 .noteWidth  button:active{
	  border: 2px solid gold;
	  padding: 5px 20px;
 }
.NewButton{
	background-color:green;
	position: absolute; 
right:0;
}
.RemoveButton{
	background-color:red;
	position: absolute; 
left:0;
}
</style>
</head>

<body>
<CENTER>
<header><h1>Notes<h1></header>
<button class="NewButton" onclick="NoteBody('NoteForm');">New</button>
<button class="RemoveButton" onclick="NoteBody('RemoveForm');">Remove</button>
<br>
<div class="NoteForm"; id="NoteForm"; style="display:none;">
<form action='Notes.php' method='post' >
<input type="text" name="NoteName" placeholder="enter new/exist Notes name" required><br>
<input type="text" name="Note" placeholder="Edit/Create Note" required><br>
<button type="submit" value="Submit" name="submit">Create</button>
</form>
</div>
<div class="RemoveForm"; id="RemoveForm"; style="display:none;">
<form action="Notes.php" method='post'>
  <select name="RemoveNoteList">
  <?php
  
        $sql="select title,Noteid from note where id=".$_SESSION['Id'].";";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	     while($row=mysqli_fetch_assoc($result))
	   {
		  echo '<option value='.$row["Noteid"].'>'.$row["title"].'</option>';
	   }
	   }
     
  ?>
  </select>
  <br><br>
<button type="submit" value="Submit" name="RemoveSubmit">Remove</button>
</form>
</div>
<?php
if(isset($_POST['RemoveSubmit']))
{
	$val=$_POST['RemoveNoteList'];
	$sql="DELETE FROM note where Noteid=$val";
	$res=mysqli_query($conn,$sql);
			if(!$res)
				echo("query faild".mysqli_connect_error());
}
?>
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
		   $delbutton=$row['Noteid'];
		   echo "<li><strong>".$row['title'].':</strong><br><button onclick="NoteBody('.$tmp.');">+</button><br>'.
		   '<div id='.$tmp.' style="display:none;">'.$row['body'].'</div></li>';
	   }
	   }
?>
</ul>
</div>
</CENTER>

</body>
</html>