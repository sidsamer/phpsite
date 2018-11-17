
<html>  
<body>

<form action="lab4.php" method="post">
<input type="text" name="Name" placeholder="Name"><br>
  <input type="email" name="Email" placeholder="Email"><br><br>
  Comments:<br>
  <textarea name="message" rows="5" cols="30"></textarea><br>
Age:<br>
<input type="checkbox" name="age" value="0-18">0-18<br>
  <input type="checkbox" name="age" value="19-25">19-25<br> 
  <input type="checkbox" name="age" value="26+">26+<br>
  Gender:<br>
  <input type="radio" name="gender" value="Male" checked> Male<br>
  <input type="radio" name="gender" value="Female"> Female<br>
  <input type=submit name="submit">
   <input type="reset">
</form>
<p>the answer is:<p><br>

<?php
if(isset($_POST["submit"]))
{
$tmp=$_POST["Name"];
echo ("name:".$tmp."<br>");
$tmp=$_POST["Email"];
echo ("Email:".$tmp."<br>");
$tmp=$_POST["message"];
echo ("comments:".$tmp."<br>");
$tmp=$_POST["age"];
echo ("age:".$tmp."<br>");
$tmp=$_POST["gender"];
echo ("gender:".$tmp."<br>");
}
?>

</body>
</html>
