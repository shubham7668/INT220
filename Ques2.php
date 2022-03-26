<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Validate Age</title>
</head>
<body>
<!-- design a form for take inputs -->
<form method="post" action="#">
<table>
<tr>
<td>Enter your age: </td>
<td><input type="text" name="age"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit"></td>
</tr>

</table>
</form>

<!-- end of form -->

<!-- write php script to validate age input using form-->
<?php
// process into this script only after submit button is clicked
if(isset($_POST['submit']))
{
// read data from form
$age = $_POST['age'];

// validate age using FILTER_VALIDATE_INT
// if age is between 26 and 56, then valid
if(filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range"=>26, "max_range"=>56))) == false){
echo "<h2>Age is not valid.</h2>";
} else{
echo "<h2>Age is valid.</h2>";
}
}
?>

</body>
</html>