<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<?php
include_once 'includes/connection.php';
?>
<h1><CENTER>Sign-Up</CENTER></h1><br><br>
<center><form action='SignUp.php' method='post'>
<input type="text" placeholder="User Name" name="User" required pattern="[^()/><\][\\\x22,'=;|]+"><br>
<input type="text" placeholder="password" name="Password" required><br>
<input type="text" placeholder="password Check" name="Repassword" required><br>
<input type="email" placeholder="E-mail" name="Email" required><br><br>
<button type="submit" value="submit" name="page">Submit</button><br><br>
</form>
<?php
if(isset($_POST['page']))
{
	if($_POST['Password']==$_POST['Repassword'])
	{
		$User=$_POST['User'];
		$flag=0;
		$sql="select firstname from user;";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	   while($row=mysqli_fetch_assoc($result))
	   {
		if($row['firstname']==$User)
		{
			$flag++;
		}
	   }
       }
		if($flag==0)
		{
			$date=date("Y-m-d h:i:sa");
			$pass=$_POST['Password'];
			$email=$_POST['Email'];
			$sql="INSERT INTO user(firstname,pass,email) ".
			"values ('$User','$pass','$email')";
			$res=mysqli_query($conn,$sql);
			if(!$res)
				die("query faild");
			else
			{
				echo "welcome new member <br>";
				header('Location: index.php'); 
			}
		}
	     else
		    echo "User name already exist!";
	}
	else
		echo "Passwords didnt match!";
}
?>
</center>
</body>
</html>