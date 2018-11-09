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
</style>

<body>
<CENTER>
<header><h1>Schedule<h1></header>
<div>
<form action='Schedule.php' method='post' >
<input type="text" name="NoteName" placeholder="enter new/exist Notes name" required><br>
<input type="text" name="Note" placeholder="Edit/Create Note" required><br>
<button type="submit" value="SignUp" name="submit">Create/Update</button>
</form>
</div>
</CENTER>
</body>
</html>