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

                <label for="rozrywkas">Wybierz wydarzenie rozrywkowe:</label><br>
                <select id="rozrywkas" name="rozrywkas" required>
                    <option value="kino">Wyjście do kina</option>
                    <option value="planszowki">Spotkanie przy planszówkach</option>
                    <option value="gotowanie">Wspólne gotowanie</option>
                    <option value="spacer">Spacer po mieście</option>
                    <option value="taniec">Zajęcia taneczne</option>
                    <option value="gry">Wieczór gier komputerowych</option>
                    <option value="karaoke">Karaoke z przyjaciółmi</option>
                    <option value="drinki">Wyjście na drinka</option>
                    <option value="piknik">Piknik w parku</option>
                    <option value="mecz">Wspólne oglądanie meczu</option>
                    <option value="escaperoom">Escape room</option>
                    <option value="rowery">Wspólna wycieczka rowerowa</option>
                    <option value="kawiarnia">Spotkanie w kawiarni</option>
                    <option value="koncert">Wyprawa na koncert</option>
                    <option value="muzeum">Wizyta w muzeum lub galerii</option>
                    <option value="warsztaty">Warsztaty artystyczne</option>
                    <option value="joga">Zajęcia jogi lub medytacji</option>
                    <option value="impreza">Spontaniczne wyjście na imprezę</option>
                    <option value="fotografia">Zajęcia z fotografii</option>
                </select><br><br>
                
                <button type="submit">Stwórz Wydarzenie</button><br>
            </form>
            <script src="znaki.js"></script>
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
