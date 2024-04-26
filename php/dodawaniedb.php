<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Miasto = $_POST['Miasto'];
        $Ulica = $_POST['Ulica'];
        $Data = $_POST['Data'];
        $Godzina = $_POST['Godzina'];
        $Zapisani = $_POST['Zapisani'];
        $Max = $_POST['Max'];
		$Opis = $_POST['Opis'];
		$Kategoria = $_POST['Kategoria'];
		$Zdjecia = $_POST['Zdjecia'];
        
        $Miasto = mysqli_real_escape_string($conn, $Miasto);
        $Ulica = mysqli_real_escape_string($conn, $Ulica);
        $Data = mysqli_real_escape_string($conn, $Data);
        $Godzina = mysqli_real_escape_string($conn, $Godzina);
        $Zapisani = mysqli_real_escape_string($conn, $Zapisani);
        $Max = mysqli_real_escape_string($conn, $Max);
        $Opis = mysqli_real_escape_string($conn, $Opis);
        $Kategoria = mysqli_real_escape_string($conn, $Kategoria);
        
        
        $dodawanie = "INSERT INTO wydarzenia (miasto, ulica, data, godzina, osoby_zapisane, max_osoby, opis, kategoria) VALUES ('$Miasto', '$Ulica', '$Data', '$Godzina', '$Zapisani', '$Max', '$Opis','$Kategoria')";
        
        if (mysqli_query($conn, $dodawanie)) {
            echo "Wydarzenie zostało pomyślnie dodane";
        } else {
            echo "Błąd: " . $dodawanie . "<br>" . mysqli_error($conn);
        }
    }

    ?>