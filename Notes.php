<?php
include_once 'includes/connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<script src="javascript.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
textarea{
	background-color:transparent ;
	border:none;
	color:LightGray;
}
.NoteWidth button{
font-size:20px;
width:100%;
}
.NewButton{
	background-color:#0080ff ;
	position: absolute; 
right:0;
}
.RemoveButton{
	background-color:#0080ff ;
	position: absolute; 
left:0;
}
</style>

<body>
<CENTER>
<header></header>
<button class="NewButton" onclick="NoteBody('NoteForm');">+</button>
<button class="RemoveButton" onclick="NoteBody('RemoveForm');">X</button>
<br><br><br>
<div class="NoteForm"; id="NoteForm"; style="display:none;">
<form action='Notes.php' method='post' >
<input type="text" name="NoteName" placeholder="enter new/exist Notes name" required><br>
<input type="text" name="Note" placeholder="Edit/Create Note" required><br>
<button type="submit" value="Submit" name="submit">Create</button>
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
			header('Location: Notes.php'); 
}
if(isset($_POST['editNote']))
{
	echo "byeeee";
	$NoteName=$_POST['editNote'];
	$Note=$_POST['body'];
		$sql='update note set body="'.$Note.'" where title="'.$NoteName.'";';
			$res=mysqli_query($conn,$sql);
			if(!$res)
				echo("query faild".mysqli_connect_error());
			header('Location: Notes.php'); 
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
		   echo "<li>".'<button onclick="NoteBody('.$tmp.');"><strong>'.$row["title"].'</strong></button><br>'.
		   '<div id='.$tmp.' style="display:none;"><form action="Notes.php" method="POST">
		   <textarea rows="4" cols="50" name="body">'.$row['body'].'</textarea>
		   <button type="submit" value="'.$row["title"].'" name="editNote">Edit</button>
		   </form></div></li>';
	   }
	   }
?>
</ul>
</div>
</CENTER>

</body>
</html>