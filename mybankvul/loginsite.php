<?php
// if (isset($_POST['submit'])) {
// 	$fullname = $_POST['login'];
// 	$fullpassword = $_POST['password'];
// 	echo $fullname;
// 	echo $fullpassword;
// }

?>

<!DOCTYPE HTML>
<html lang="pl">

<head>

<title>Bank of MartinTutorials | Home</title>

<meta charset="UTF-8">

<style type="text/css">
	body {
		background-color: #aaaaaa;
		font: white;
	}
</style>
</head>

<body>

<div id="container" align="center"><img src="bank.jfif"/>


<form action="login.php" method="post">
<table width="300px" border="1">

	<tr>
		<td><b>Username: </b></td>
		<td><input type="text" name="lusername" placeholder="Write here username..."/></td>
	</tr>
	<tr>
		<td><b>Password:</b></td>
		<td><input type="password" name="lpassword" placeholder="Write here password..."/></td>
	</tr>
		<!-- <td><b></b></td> -->
</table>

<input type="submit" value="Submit"/>
</form>


</div>

</body>
</html>




