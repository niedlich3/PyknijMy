<?php

    if(isset($_POST['idWydarzenia'])) {
    $idWydarzenia = $_POST['idWydarzenia'];

   
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'pyknijmy';

    
    $conn = mysqli_connect($host, $username, $password, $database);

    
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    
    $zapis = "UPDATE `wydarzenia` SET `osoby_zapisane`= `osoby_zapisane` + 1 WHERE id = $idWydarzenia";

    if (mysqli_query($conn, $zapis)) {
         echo "Pomyślnie się zapisałeś";
    } else {
        echo "Błąd: " . $zapis . "<br>" . mysqli_error($conn);
    }

	$del = "DELETE FROM wydarzenia WHERE osoby_zapisane = max_osoby";

    $del_time = "DELETE FROM wydarzenia WHERE data < CURRENT_DATE()";


    if(mysqli_query($conn, $del)){
        echo "Wydarzenie osiągneło maksymalną liczbę osób";
    }


    
	$conn->close();
}
?>
