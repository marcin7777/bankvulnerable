<?php

require_once "connect.php";
session_start();

if ($_FILES['document1']['error'] > 0) {
	echo 'Problem: ';
	switch ($_FILES['document1']['error']) 
	{
		case 1:
			echo "Rozmiar pliku przekroczył wartość upload_max_file_size";
			break;
		case 2:
			echo "Rozmiar pliku przekroczy wartość max_file_size";
			break;
		case 3: 
			echo "Plik przesłany tylko częściowo";
			break;
		case 4: 
			echo "Nie wysłano żadnego pliku";
			break;
		case 5:
			echo "Rozszerzenie PHP zablokowało odebranie pliku na serwerze";
			break;

	}
	exit;

} else {

$connect = @new mysqli($host, $db_user, $db_password, $db_name);


  $radder = $_POST['adder']; 

 //$new_user = $_SESSION['id2'];


if (isset($radder)) {

	$new_user = $_SESSION['id2'];
	//var_dump($new_user);

	$file_name = $_FILES['document1']['name'];
	$file_type = $_FILES['document1']['type'];
	$file_data = file_get_contents($_FILES['document1']['tmp_name']);


	$sql4 = "INSERT INTO dokument (id, klienci_id, pliki, mime, dane_plik) VALUES ('', '$new_user', '$file_name', 
	'$file_type', '$file_data')";

	$ad_rezultat = $connect->query($sql4);

	if ($ad_rezultat == true) {
		// echo "Udało się dodać plik do bazy danych banku Alior Bank";
	} else {
		echo "Nie udało się dodać pliku";
	}
	
  }

//session_unset();
}

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

	#register {
		align: center;
		padding-top: 20px;
		}

	#log {
		align: center;
		padding-top: 20px;
		
	}
</style>

</head>

<body>


<div align="center"><img src="bank.jfif"/><br/>
<p> Plik został pomyślnie dodany! </p><br/>
<p> Jesteś interaktywnym klientem Banku ALIOR BANK!</p>

<form action="/mybankvul/loginsite.php" id="log">
  <input type="submit" value="Zaloguj się">
</form>

</div>


</body>




</html>