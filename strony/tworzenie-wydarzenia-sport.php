<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#000000"/>
	<title>PyknijMy</title>
	<link rel="icon" type="image/png" href="../grafika/ikonka_pyknijmy.png">
	<link rel="stylesheet" href="../css/styl_pyknijmy3.css">
	<link rel="manifest" href="../manifest.json">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
       <a href="../index.php"><img src="../grafika/logopyknijmy.png" alt="Logo" class="logo"></a>
        <nav class="nav-links">
            <a href="../przegladaj.php">Przeglądaj</a>
            <a href="#">Dodaj</a>
            <a href="#">O nas</a>
        </nav>
        <a href="../login.php"><img src="../grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
    </header>
    <section class="hero">
    <section class="tworzenie-tabelka">
            <form id="eventForm">
                <label for="nazwa">Nazwa wydarzenia:</label><br>
                <input type="text" id="nazwa" name="nazwa" required placeholder="Wpisz nazwę"><br>
               
                <label for="ilosc">Ilość osób:</label><br>
                <input type="number" id="ilosc" name="ilosc" required><br>
                
                <label for="opis">Opis wydarzenia:</label><br>
                <textarea id="opis" name="opis" maxlength="255" placeholder="Napisz opis"></textarea><br>
                <p id="opisCount">Pozostało: 255 znaków</p>

                <label for="sports">Sporty:</label><br>
                <select id="sports" name="sports" required>
                    <option value="snorkeling">Snorkeling</option>
                    <option value="taekwondo">Taekwondo</option>
                    <option value="badminton">Badminton</option>
                    <option value="rugby">Rugby</option>
                    <option value="nurkowanie">Nurkowanie</option>
                    <option value="morsowanie">Morsowanie</option>
                    <option value="padel">Padel</option>
                    <option value="futbol_american">Futbol Amerykański</option>
                    <option value="muay_thai">Muay Thai</option>
                    <option value="pilka_nozna">Piłka nożna</option>
                    <option value="hokej">Hokej</option>
                    <option value="unihokej">Unihokej</option>
                    <option value="crossfit">CrossFit</option>
                    <option value="kalistenika">Kalistenika</option>
                    <option value="outdoor_survival">Outdoor / Survival</option>
                    <option value="myslistwo">Myślistwo</option>
                    <option value="sport_z_psem">Sport z Psem</option>
                    <option value="bilard">Bilard</option>
                    <option value="trail">Trail</option>
                    <option value="boks">Boks</option>
                    <option value="rowery">Rowery</option>
                    <option value="wedkarstwo">Wędkarstwo</option>
                    <option value="siatkowka_plazowa">Siatkówka plażowa</option>
                    <option value="plywanie">Pływanie</option>
                    <option value="szermierka">Szermierka</option>
                    <option value="balet">Balet, taniec klasyczny</option>
                    <option value="hokej_na_trawie">Hokej na trawie</option>
                    <option value="narciarstwo_biegowe">Narciarstwo biegowe</option>
                    <option value="karate">Karate</option>
                    <option value="biegi_ocr">Biegi OCR</option>
                    <option value="pilka_reczna">Piłka ręczna</option>
                </select><br><br>
                <button type="submit">Stwórz Wydarzenie</button><br>
            </form>
        </section>
    </section>
</body>
</html>
<script>
        // Funkcja do obsługi formularza
        $(document).ready(function() {
            $("#eventForm").on("submit", function(event) {
                event.preventDefault(); // Zapobiega domyślnej akcji wysłania formularza

                // Pobieramy dane z formularza
                const eventData = {
                    nazwa: $("#nazwa").val(),
                    ilosc: $("#ilosc").val(),
                    opis: $("#opis").val(),
                    sports: $("#sports").val()
                };

                // Wysłanie danych do serwera
                $.ajax({
                    url: "http://localhost:3000/dodajWydarzenieSportowe", // Zmienna, jeśli adres serwera się zmienia
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify(eventData),
                    success: function(response) {
                        alert("Wydarzenie zostało dodane!");
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        alert("Błąd przy dodawaniu wydarzenia!");
                        console.log(error);
                    }
                });
            });
        });
    </script>
