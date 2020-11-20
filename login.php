<?php

require_once "connect.php";

//session_save_path("C:/Users/XAMMP/tomcat/webapps/examples/WEB-INF/classes/sessions");
session_start();
header('X-XSS-Protection: 0');


$lusername = $_POST['lusername']; 
     
$lpassword = $_POST['lpassword'];

$connect = @new mysqli($host, $db_user, $db_password, $db_name);

if ($connect->connect_error!=0) {
    echo "Connection failed: " . $connect->connect_error; 
    // echo "Connection failed: " . $connect->connect_error. ". Opis: " . $connect->connect_error; - wyciek danych nt. //usera
} else {


    $lusername = $_POST['lusername'];       
    $lpassword = $_POST['lpassword'];

    $sql_sel = "SELECT * FROM klienci WHERE username = '$lusername' AND password ='$lpassword'";
    
    $rezultatl = $connect->query($sql_sel);

    $ile_user = $rezultatl->num_rows;
    
    $wiersz;
    $ile_user = $rezultatl->num_rows; 
   
     if ($ile_user  > 0 ) {

         $_SESSION['zalogowany'] = true;
         $wiersz = $rezultatl->fetch_assoc();

         $_SESSION['userid'] = $wiersz['id'];
         $_SESSION['user'] = $wiersz['username'];
         $_SESSION['pass'] = $wiersz['password'];
         $_SESSION['bal'] = $wiersz['balance'];

        

         //$rezultatl->close();

         header('Location: transferform.php');

         $rezultatl->close();


     } else {


        echo <<<'HTML'
            <span style="color:red"> Wpisano nieprawidłowy login lub hasło!</br>
            Jeśli nie posiadasz jesze konta kliknij poniżej, aby się zarejestrować!!!</span>
            <form action="/mybankvul/registersite.php" id="log">
            <input type="submit" value="Zarejestruj się">
            </form> 
            <form action="/mybankvul/loginsite.php" id="log">
            <input type="submit" value="Wróć do logowania">
            </form> 
            HTML;
                      
         
            die (mysqli_error($connect));
        }

    

   $connect->close();    //otwieramy i  zamykamy połączenie.

}

?>