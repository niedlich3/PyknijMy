<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000"/>
    <title>PyknijMy</title>
    <link rel="icon" type="image/png" href="../grafika/ikonka_pyknijmy.png">
    <link rel="stylesheet" href="../css/styl_pyknijmy2.css">
    <link rel="manifest" href="../manifest.json">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../grafika/logopyknijmy.png" width="75" height="75" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link active" aria-current="page">Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#uslugi">Usługi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="#">Dołącz teraz</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main> 
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
    </main>
    <footer>
        <div class="footerContainer">
            <div class="footerNav">
                <ul>
                    <li><a href="index.php">Home</a></li>    
                    <li><a href="https://linktr.ee/beatbuddy" id="aboutus">About Us</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024; Designed by <span class="designer">BIG$WAGGBOY$BAND</span></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
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
                    url: "http://localhost:3000/dodajWydarzenie", // Zmienna, jeśli adres serwera się zmienia
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
</body>
</html>
