<?php



?> 

<DOCTYPE html> 
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
<div align="center"><img src="bank.jfif"/>

<p>Etap pierwszy!</p>
<p>Uwaga! Przygotuj elektroniczny plik umowy z bankiem Alior Bank, tak aby go załączyć!</p>
<p>Otrzymałeś go na podany przez siebie adres e-mail w trakcie zawierania umowy z bankiem</p>
<p>W poniższym formularzu koniecznie wpisz kwotę taką, jaka zawarta jest w elektronicznym pliku umowy</p>
<p>w rubryce A77 (strona 7 umowy)</p>

<form action="register.php" method="post">
<table width="300px" border="1">

	<tr>
		<td><b>Nazwa użytkownika: </b></td>
		<td><input type="text" name="rusername" placeholder="Write here username..."/></td>
	</tr>
	<tr>
		<td><b>Hasło:</b></td>
		<td><input type="password" name="rpassword" placeholder="Write here password..."/></td>
	</tr>
	<tr>
		<td><b>Stan konta w PLN - rubryka A77 (strona 7 umowy): </b></td>
		<td><input type="text" name="rbalance" placeholder="Write here an amount..."/></td>
	</tr>
	
</table>

<input type="submit" value="Dodaj"/>
</form>


</div>

</body>

</html>
