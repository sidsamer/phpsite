
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<?php
include_once 'includes/connection.php';
session_start();
?>
<?php
if(isset($_COOKIE['Id']))
{
	header('Location: menu.php'); 
		 $_SESSION['User']=$_COOKIE['User'];
		 $_SESSION['Id']=$_COOKIE['Id'];
}
?>
<h1><CENTER>Your</CENTER></h1>
<h1><CENTER>Little Manager</CENTER></h1><br><br>
<center>
<form action="index.php" method='post'>
<input type="text" name="User" placeholder="Enter User Name" pattern="[^()/><\][\\\x22,'=;|]+"><br>
<input type="password" name="Password" placeholder="Password"><br>
<button type="submit" value="Login" name="page">Login</button>
</form><br><br>
<a href="SignUp.php" style="color:white;">press to sign up</a><br>

<?php
if(isset($_POST['page']))
{
 $User=$_POST['User'];
 $pass=$_POST['Password'];
 $flag=0;
		$sql="select id,firstname,pass from user;";
        $result=mysqli_query($conn,$sql);
		$Id=0;
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
       {
	   while($row=mysqli_fetch_assoc($result))
	   {
		if($row['firstname']==$User)
		{
			if($row['pass']==$pass)
			{
			$flag++;
			$Id=$row['id'];
			}
		}
	   }
       }
		if($flag==0)
		{
			echo "password or user not ok";
		}
		else
		{
			setcookie('Id',$Id,time()+(60*60*24*7));
			setcookie('User',$User,time()+(60*60*24*7));
         header('Location: menu.php'); 
		 $_SESSION['User']=$User;
		 $_SESSION['Id']=$Id;
		}
}
?>
</center>
</body>
</html>