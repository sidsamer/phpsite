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
.container {
 height:100%;
 width:100%;
 max-width: 500px;
 }

.board button{
	background-color:RoyalBlue   	;
	 border-radius: 0px;
 border: 1px solid DarkSlateGray;
 padding: 10px 1px;
 font-size:11px;
float: left;
}
</style>
<body>
<CENTER>
<header><h1>Schedule<h1></header>
<button class="NewButton" onclick="NoteBody('ScheduleForm');">New</button>
<button class="RemoveButton" onclick="NoteBody('RemoveForm');">Remove</button>
<button class="Toggle" onclick="NoteBody('board'); NoteBody('boards');">List/Board</button>
<br><br><br>
<div class="ScheduleForm"; id="ScheduleForm"; style="display:none;">
<form action='Schedule.php' method='post' >
<input type="text" name="Task" placeholder="Enter New Task" required><br>
<input type="datetime-local" name="Deadline" required><br>
<button type="submit" value="SignUp" name="submit">Create/Update</button>
</form>
</div>
<?php
if(isset($_POST['RemoveSubmit']))
{
	$val=$_POST['RemoveTaskList'];
	$sql="DELETE FROM task where Taskid=$val";
	$res=mysqli_query($conn,$sql);
			if(!$res)
				echo("query faild".mysqli_connect_error());
}
?>
<div class="RemoveForm"; id="RemoveForm"; style="display:none;">
<form action="Schedule.php" method='post'>
  <select name="RemoveTaskList">
  <?php
  
        $sql="select body,Taskid from task where id=".$_SESSION['Id'].";";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	     while($row=mysqli_fetch_assoc($result))
	   {
		  echo '<option value='.$row["Taskid"].'>'.$row["body"].'</option>';
	   }
	   }
     
  ?>
  </select>
  <br><br>
<button type="submit" value="Submit" name="RemoveSubmit">Remove</button>
</form>
</div>
<div class="tasks"; id="boards"; style="display:block;">
<ul>
<?php
if(isset($_POST['submit']))
{
	
	$Deadline=$_POST['Deadline'];
	$Task=$_POST['Task'];
	$sql="INSERT INTO task(id,body,deadline) ".
			"values (".$_SESSION['Id'].",'$Task','$Deadline');";
			$res=mysqli_query($conn,$sql);
			if(!$res)
				echo("query faild".mysqli_connect_error());
			header('Location: Schedule.php'); 

}
      $sql="select body,deadline from task where id=".$_SESSION['Id']." order by deadline asc;";
 $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	     while($row=mysqli_fetch_assoc($result))
	   {
		   echo "<li>".$row['body'].'    '.$row['deadline'].'</li>';
	   }
	   }
?>
</ul>
</div>
<div class="board"; id="board"; style="display:none;">
<form action="Board.php"  method='post' target="myFrame2">
<?php

for($i=0;$i<7;$i++)
{
	?>
<button type="submit" value= "<?php echo date("Y-m-d", strtotime("+$i days")); ?>" name="dayButton"><?php echo date("l", strtotime("+$i days")); ?></button>
<?php
}
?>
</form>
<div class="container">
<iframe id="myFrame2" src="Board.php" name="myFrame2" height="600px" width="100%" style="border:none;"></iframe>
</div>
</div>

</CENTER>
</body>
</html>