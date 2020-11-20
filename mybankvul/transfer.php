<?php

require_once "connect.php";

session_start();

$recipient = $_POST['recipient']; 


 if ($recipient == NULL ) {
     $_SESSION['bodb'] = "Odbiorca o podanej nazwie użykownika nie istnieje!";
     //session_destroy();
	header('Location: transferform.php');

 }

$amount = $_POST['amount'];

//$_SESSION['recip'] = $recipient;

$conn = @new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error!=0) {
 	echo "Connection failed: " . $conn->connect_error; 
 	// echo "Connection failed: " . $connect->connect_error. ". Opis: " . $connect->connect_error; - wyciek danych nt. //usera
} else {

	echo "\nConnection successful</br>";

	$curr_user = $_SESSION['user'];
	
	$curr_balance = $_SESSION['bal'];


	//$diff_bal = $curr_balance - $amount; 

	if (isset($curr_user)) {
		
		$diff_bal = $curr_balance - $amount;
		if($curr_balance  < $amount ) {
		
        session_unset();
		$conn->close();

		}

        $sql_to_get_amount = "UPDATE klienci SET balance='$diff_bal' WHERE username='$curr_user'"; // to zmniejsza kwotę //na koncie bieżącego użytkownika;

        $result_curr_user = $conn->query($sql_to_get_amount);
      
        $_SESSION["new_bal"] = $diff_bal;

        $get_diff_bal1=  $_SESSION["new_bal"];

        $updated_sql_to_get = "SELECT balance FROM klienci WHERE balance = $get_diff_bal1";
        $result_curr_bal_new = $conn->query($updated_sql_to_get);
        $donor_given_amount = $result_curr_bal_new->num_rows; 

        if ($donor_given_amount  > 0 ) {
        	//$updated_donor_line = $result_curr_bal_new->fetch_assoc();

        	//$_SESSION['bal'] = $updated_donor_line['balance']; cena=cena-10

        	$sql_to_give_amount = "UPDATE klienci SET balance=balance+$amount WHERE username = '$recipient'";

            // to zwiększa kwotę na koncie odbiorcy;
        	$result_for_recipient = $conn->query($sql_to_give_amount);



            $updated_sql_for_recipient = "SELECT username FROM klienci WHERE username = '$recipient'";
            $result_curr_bal_recip_new = $conn->query($updated_sql_for_recipient);
            $recipient_given_amount_new = $result_curr_bal_recip_new->num_rows;

        	 	 if($recipient_given_amount_new > 0) {
        			 	$updated_recipient_line = $result_curr_bal_recip_new->fetch_assoc();
        			 	$_SESSION['user_new'] = $updated_recipient_line['username'];
        			 	echo $_SESSION['user_new'];

        	 	 }
        		//$result_for_recipient->close();
        }

    //header('Location: transferform.php');
	}
	

 header('Location: transferform.php');
 //session_unset();
 $conn->close();
	
}

?>