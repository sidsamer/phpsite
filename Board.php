<?php
include_once 'includes/connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
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
<div class="tasks"; id="boards"; style="display:block;">
<table>
<?php
if(isset($_POST['dayButton']))
{
	$date =new DateTime($_POST['dayButton']);
	date_add($date, date_interval_create_from_date_string('1 days'));
	$result = $date->format('Y-m-d H:i:s');
      $sql="select body,deadline from task where id=".$_SESSION['Id']." and deadline between '".$_POST['dayButton']."' and '".$result."'  order by deadline asc;";
 $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	     while($row=mysqli_fetch_assoc($result))
	   {
		   echo "<tr>";
		   echo "<td>".$row['body']."</td><td style='color:green;'>".$row['deadline'].'</td>';
		   echo "</tr>";
	   }
	   }
}
?>

</table>
</div>
</body>
</html>