
<html>  
<body>

<form action="Calculator.php" method="post">
<input type="text" name="num" placeholder="number 1">
<select name="symbol">
<option>none</option>
<option>add</option>
<option>sub</option>
<option>mul</option>
<option>div</option>
</select>
<input type="text" name="num2" placeholder="number 2"><br>
<button type="submit" name="submit" value="submit">Calculate</button><br>
</form>
<p>the answer is:<p><br>

<?php
if(isset($_POST["submit"]))
{
$num=$_POST["num"];
$num2=$_POST["num2"];
switch($_POST["symbol"])
{
	case "add":
	echo($num+$num2);
	break;
	case "sub":
	echo($num-$num2);
	break;
	case "mul":
	echo($num*$num2);
	break;
	case "div":
	echo($num/$num2);
	break;
	default: echo("you need to choose");
}
}
?>

</body>
</html>
