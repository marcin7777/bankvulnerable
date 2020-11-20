<?php

$host = "127.0.0.1";   //definiujemy nazwę kolumny HOST i adres localhosta
$db_user = "root";		   //definiujemy nazwę użytkownika
$db_password = '';	          //definiujemy hasło użytkownika
$db_name = "bank";    //nawiązujemy połączenie z bazą danych o nazwie php_security


//$connect = @new mysqli($host, $db_user, $db_password, $db_name);


// if ($connect->connect_error!=0) {
//  	echo "Connection failed: " . $connect->connect_error; 
//  	// echo "Connection failed: " . $connect->connect_error. ". Opis: " . $connect->connect_error; - wyciek danych nt. usera
// } else {

// 	echo "Connected";
// 	printf("\nServer version:  %s\n", $connect->server_info);

// 	$login = $_POST['login']; 
//     $password = $_POST['password'];
//     //$login = isset($_POST['login']) ? $_POST['login'] : '';
//     //$password = isset($_POST['password']) ? $_POST['password'] : '';

  

//     $sql = "SELECT * FROM klienci WHERE username ='$login' AND password ='$password'";
//     $result = mysqli_query($connect, $sql);
//     $rezultat;
//     if ( $rezultat = $connect->query($sql)) {
//     	//$ilu_userow = var_dump($rezultat);
//     	$ilu_userow = $rezultat->num_rows;
//     	if ($ilu_userow>0) {
//     		$wiersz = $rezultat->fetch_assoc(); 
//     		$user = $wiersz['username'];
//     		$pass = $wiersz['password'];
    		
//     		$rezultat->free_result();
//     		//echo $user;
//     		//echo $pass;
//     		header("Location: index.php");

//     	} else {
//     		echo "fucked up";
//     		die (mysqli_error($connect));
    		 
//     	}
//     }; 

//     $connect->close();    //otwieramy i  zamykamy połączenie.
// }

?>