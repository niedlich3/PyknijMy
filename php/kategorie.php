<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" href="../css/styl_pyknijmy.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<?php
// Dane do połączenia z bazą danych
    include("../login/connection.php");
    include("../wyszukiwanie.php");
// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}


// Połączenie z bazą danych (zakładam, że masz tu połączenie)

$category = $_POST['category'];
// Pobranie wybranej kategorii z POST

// Zapytanie SQL do pobrania wydarzeń w wybranej kategorii
$sql = "SELECT * FROM wydarzenia WHERE `kategoria` = '$category' ORDER BY data, godzina";
$result = mysqli_query($conn, $sql);

// Wyświetlanie wydarzeń
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="klasa">';
        echo '<div class="mmmm">Miasto: ' . $row['miasto'] . ' ';
        echo '<div class="nnnn">Ulica: ' . $row['ulica'] . ' ';
        echo '</div>';
        echo '<a class="ogloszenie" href="ogloszenie.php?id=' . $row['id'] . '">Opis wydarzenia</a>';
        echo '<div class ="hhhh">Kategoria sportowa wydarzenia: ' . $row['kategoria'] . '</div>';
        echo '<div class="wwww">Data wydarzenia: ' . $row['data'] . '</div>';
        echo '<button class="zapisz" data-wydarzenie="' . $row['id'] . '">Zapisz się</button>';
        echo '<div class="tttt">Godzina wydarzenia: ' . $row['godzina'] . '</div>';
        echo '<div class="rrrr">Wymagana ilość osób: ' . $row['max_osoby'] . '</div>';
        echo '<div class="eeee">Osoby zapisane: ' . $row['osoby_zapisane'] . '</div>';
        echo '</div>';
    }
} 

$conn->close();
?>
</html>