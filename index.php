<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
background-color: black;
 font-family:verdana;
 color:white;
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
<h1><CENTER>Your</CENTER></h1>
<h1><CENTER>Little Manager</CENTER></h1><br><br>
<center>
<form action="menu.php" method='post'>
<input type="text" name="User" placeholder="Enter User Name"><br><br>
<input type="text" name="Password" placeholder="Password"><br><br>
<button type="submit" value="Login" name="page">Login</button>
</form><br><br>
<a href="SignUp.php" style="color:orange;">press to sign up</a>
</center>
</body>
</html>