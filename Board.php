<?php
include_once 'includes/connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<div class="tasks"; id="boards"; style="display:block;">
<ul>
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
		   echo "<li>".$row['body'].'    '.$row['deadline'].'</li>';
	   }
	   }
}
?>

</ul>
</div>
</body>
</html>