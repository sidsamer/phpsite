<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
background-color: black;
 font-family:verdana;
 color:white
 }
h1   {
 color:orange;
 padding 30px;
 }
 button{
 background-color:Indigo;
 color:orange;
 }
 .container {
 height:100%;
 width:100%;
 }
</style>

<body>
<CENTER>
<header><h1>Welcome</h1></header>
<div class="navbar">
<form action="menu.php" method='post' >
<button type="submit" value="Notes" name="page">Notes</button>
<button type="submit" value="Schedule" name="page">Schedule</button>
</form>
</div>
<br><br>
<div class="container">
<?php $tmp=$_POST['page'].".php";
?>
<iframe id="myFrame" src=<?php echo $tmp;?> name="myFrame" height="600px" width="100%" style="border:none;"></iframe>
</div>
</CENTER>
</body>
</html>