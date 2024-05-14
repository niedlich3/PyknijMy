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

    $max_osoby = "SELECT max_osoby, osoby_zapisane FROM wydarzenia WHERE id = $idWydarzenia";
    $result = mysqli_query($conn, $max_osoby);
    $row = mysqli_fetch_assoc($result);
    $max_osoby = $row['max_osoby'];
    $osoby_zapisane = $row['osoby_zapisane'];
    
    if ($osoby_zapisane < $max_osoby) {
        if (mysqli_query($conn, $zapis)) {
            echo $osoby_zapisane + 1; // Zwróć aktualną liczbę osób zapisanych
        } else {
            echo "Błąd: " . $zapis . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "max"; // Oznacz, że osiągnięto maksymalną liczbę osób
    }
    

	$del = "DELETE FROM wydarzenia WHERE osoby_zapisane = max_osoby";

    $del_time = "DELETE FROM wydarzenia WHERE data < CURRENT_DATE()";


    if(mysqli_query($conn, $del)){
        echo "Wydarzenie osiągneło maksymalną liczbę osób";
    }

	
	$conn->close();
}
?>