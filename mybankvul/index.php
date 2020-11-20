<?php

header('X-XSS-Protection: 0');
session_save_path("C:/Users/XAMMP/tomcat/webapps/examples/WEB-INF/classes/sessions");
session_start();



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

<form action="/mybankvul/registersite.php" id="register">
  <input type="submit" value="Zarejestruj się">
</form>

<form action="/mybankvul/loginsite.php" id="log">
  <input type="submit" value="Zaloguj się">
</form>

</div>


</body>




</html>