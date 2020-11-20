<?php

require_once "connect.php";

//session_save_path("C:/Users/XAMMP/tomcat/webapps/examples/WEB-INF/classes/sessions");
session_start();

header('X-XSS-Protection: 0');

$rusername = $_POST['rusername']; 		
$rpassword = $_POST['rpassword'];
$rbalance = $_POST['rbalance'];

$connect = @new mysqli($host, $db_user, $db_password, $db_name);

if ($connect->connect_error!=0) {
 	echo "Connection failed: " . $connect->connect_error; 
 	// echo "Connection failed: " . $connect->connect_error. ". Opis: " . $connect->connect_error; - wyciek danych nt. //usera
} else {

	$rusername = $_POST['rusername'];     
    $rpassword = $_POST['rpassword'];
    $rbalance = $_POST['rbalance'];

    
    $sql1 = "INSERT INTO klienci (id, username, password, balance) VALUES ('', '$rusername', '$rpassword', '$rbalance')";
    //$sql_to_get = "SELECT id, username, password, balance from klienci";
    //$sql3 = "SELECT id, klienci_id, pliki from dokument";
    $rezultat3 = $connect->query($sql1);
   // $rezultat2 = $connect->query($sql_to_get);  Kierowca K on K.Id
   

    if ($rezultat3) {
    	 	 echo "Udało się dodać dane do bazy danych banku Alior Bank";

             $sql_to_get = "SELECT id from klienci ORDER BY id DESC LIMIT 1";
             $rezultat4 = $connect->query($sql_to_get);
             $ile_user2 = $rezultat4->num_rows; 
             $wiersz2;
             if ($ile_user2  > 0 ) {

                $_SESSION['registered'] = true;

                $wiersz2 = $rezultat4->fetch_assoc();

                $_SESSION['id2'] = $wiersz2['id'];
            

                echo  $_SESSION['id2'];
                var_dump($_SESSION['id2']);

                 $rezultat4->close();
             }

    	 	echo <<<'HTML'
             <form action="/mybankvul/loginsite.php" id="log">
             <input type="submit" value="Wróć do strony logowania">
             </form> 

             
             <b>Uwaga!!! </b></br>
             <b>Dodaj plik potwierdzający umowę z bankiem Alior Bank, jeżeli wpisujesz kwotę! </b></br>
             <b>Wpisana przez Ciebie kwota w rubryce "Balance account" musi być taka sama jak kwota w dokumencie!!!  </b>
             <form action="addoc.php" method="post" enctype="multipart/form-data">
             <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000000" /> -->
             <input name="document1" type="file" id="userfile" placeholder="Tu dodaj plik..."/>
             <input type="submit" name = "adder"value="Wyślij plik"/>
             </form>

            HTML;
    	   	
    } else {
    	echo "Nie udało się uzupełnić danych w bazie Alior Bank";
    	die (mysqli_error($connect));
    }

     $connect->close();
}  
    

 // session_unset();


?>