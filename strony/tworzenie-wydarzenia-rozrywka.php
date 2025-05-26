<?php
  
  session_start();

  include("../logowanie/connection.php");
  include("../logowanie/functions.php");
  $user_data = check_login($conn);
 setcookie('userId', $userId, time() + 3600, "/"); // 1 godzina

?>
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
            <a href="../eventchoice.php">Dodaj</a>
            <a href="#">O nas</a>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
            <a href="../admin_panel.php">Panel administratora</a>
            <?php endif; ?>
            <a href="../profil.php?id=<?php echo $user_data['id']?>"><img src="../grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
        </nav>
       
    </header>
    <section class="hero">
    <section class="logw">
            <form id="EnteventForm">
                <label for="nazwa">Nazwa wydarzenia:</label><br>
                <input type="text" id="nazwa" name="nazwa" required placeholder="Wpisz nazwę"><br>
               
                <label for="ilosc">Ilość osób:</label><br>
                <input type="number" id="ilosc" name="ilosc" required><br>

                <label for="data">Ilość osób:</label><br>
                <input type="date" id="data" name="data" required><br>
                
                <label for="opis">Opis wydarzenia:</label><br>
                <textarea id="opis" name="opis" maxlength="255" placeholder="Napisz opis"></textarea><br>
                <p id="opisCount">Pozostało: 255 znaków</p>

                <label for="rozrywkas">Rozrywki:</label><br>
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


    </section>
</body>
</html>
<script>
        // Funkcja do obsługi formularza
        $(document).ready(function() {
            $("#EnteventForm").on("submit", function(event) {
                event.preventDefault(); // Zapobiega domyślnej akcji wysłania formularza

                // Pobieramy dane z formularza
                const EnteventData = {
                    nazwa: $("#nazwa").val(),
                    ilosc: $("#ilosc").val(),
                    data: $("#data").val(),
                    opis: $("#opis").val(),
                    rozrywka: $("#rozrywkas").val()
                };

                // Wysłanie danych do serwera
                $.ajax({
                    url: "http://localhost:3000/dodajWydarzenieRozrywka", // Zmienna, jeśli adres serwera się zmienia
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify(EnteventData),
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