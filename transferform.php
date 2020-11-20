<?php

//header('X-XSS-Protection: 0');
//session_save_path("C:/Users/XAMMP/tmp");  // to odkomentuj
//session_save_path("C:/Users/XAMMP/tomcat/webapps/examples/WEB-INF/classes/sessions");

session_start();   //Uwaga!!! Aby nie wypluwało błędu access denied 13 - wejdź w C:\Users\XAMMP\tmp...
//... potem nadaj uprawnienia w zabezpieczenia dla użytkowników wszystkich, zmień atrybut tylko do odczytu 
// odznacz w tylko do odczytu!!!!
header('X-XSS-Protection: 0');
require_once "connect.php";

if(!isset($_SESSION['zalogowany'])) {
	header('Location: index.php');
	exit();
}


?>
<DOCTYPE html> 
	<html lang="pl">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
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
<div align="center"><img src="bank.jfif"/>
<p>
 <a href="http://127.0.0.1:8000/mybankvul/logout.php" 
target="_blank">Logout</a> 
</p>

<?php 


if (isset($_SESSION['zalogowany'])) {
	echo "</br></br>";

	echo "<b> Witaj " .$_SESSION['user']. " ! :-) </b></br>";
	echo "<b>Stan Twojego konta wynosi obecnie: ";
		if(!isset($_SESSION['new_bal'])) {
	     echo "<b>" . $_SESSION['bal'] . " PLN </b></br>";
		} else {
			echo $_SESSION["new_bal"]. " PLN. </br>";
			echo "<b>Udany transfer dla użytkownika o nazwie: " .$_SESSION['user_new']. "</br>";
			
		}

	//var_dump($_SESSION['bal']);
} else {
	echo "Nie jesteś zalogowany!";
}


?>

<form action="transfer.php" method="post">
<table width="300px" border="1">

	<tr>
		<td><b>Recipient:</b></td>
		<td><input type="text" name="recipient" placeholder="Write here recipient"/></td>
	</tr>
	<tr>
		<td><b>Amount: </b></td>
		<td><input type="text" name="amount" placeholder="Write here an amount..."/></td>
	</tr>
		
</table>

<input type="submit" value="OK"/>
</form>

</div>

<?php 


// if (isset($_SESSION['zalogowany'])) {
// 	echo "</br></br>";
// 	//var_dump($_SESSION['user']);
// 	echo "<b> Witaj " .$_SESSION['user']. " ! :-) </b></br>";
// 	echo "<b>Stan Twojego konta wynosi obecnie: </br>";
// 	echo "<b>" . $_SESSION['bal'] . " PLN </b></br>";
// 	//var_dump($_SESSION['bal']);
// } else {
// 	echo "Nie jesteś zalogowany!";
// }


?>

</body>

</html>
