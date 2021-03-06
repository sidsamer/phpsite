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
	background-color:#0080ff;
	position: absolute; 
right:0;
}
.RemoveButton{
	background-color:#0080ff;
	position: absolute; 
left:0;
}
.container {
 height:100%;
 width:100%;
 max-width: 500px;
 }

.board button{
	background-color:#262626  	;
	 border-radius: 0px;
 border: 1px solid DarkSlateGray;
 padding: 10px 1px;
 font-size:11px;
float: left;
}
table{
background-color:black;
}
td{
    border-bottom: 2px solid white;
	padding-up: 5px;
	padding-right: 10px;
}

</style>
<body>
<CENTER>
<button class="NewButton" onclick="NoteBody('ScheduleForm');">+</button>
<button class="RemoveButton" onclick="NoteBody('RemoveForm');">X</button>
<button class="Toggle" onclick="NoteBody('board'); NoteBody('boards');">List/Board</button>
<br><br><br>
<div class="ScheduleForm"; id="ScheduleForm"; style="display:none;">
<form action='Schedule.php' method='post' >
<input type="text" name="Task" placeholder="Enter New Task" required pattern="[^()/><\][\\\x22,'=;|]+"><br>
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
  
        $sql="select body,Taskid,deadline from task where id=".$_SESSION['Id'].";";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	     while($row=mysqli_fetch_assoc($result))
	   {
		   $deadlineDate=new DateTime($row['deadline']);
		  echo '<option value='.$row["Taskid"].'>'.$row["body"].' , '.date_format($deadlineDate,'H:i d-m-y').'</option>';
	   }
	   }
     
  ?>
  </select>
  <br><br>
<button type="submit" value="Submit" name="RemoveSubmit">Remove</button>
</form>
</div>
<div class="tasks"; id="boards"; style="display:block;">
<table>
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
		   $date2 =new DateTime($row['deadline']);
		   $date3 = new DateTime(date('H:i d-m-y'));
		   echo "<tr>";
		   if($row['deadline']>date("Y-m-d h:i:sa"))
		   echo "<td>".$row['body']."</td><td style='color:Chartreuse;'>".date_format($date2,'H:i d-m-y')."</td>";
	   else
		   echo "<td>".$row['body']."</td><td style='color:red;'>".date_format($date2,'H:i d-m-y')."</td>";
		   echo "</tr>";
	   }
	   }
?>
</table>
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