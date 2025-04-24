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
            <a href="../profil.php?id=<?php echo $user_data['id']?>" class="text" style="color: black;text-decoration: underline;">Hello, <?php echo "<b>" . $user_data['user_name'] . "</b>"; ?></a>
            <a href="../login.php"><img src="../grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
        </nav>
         <!-- TO NIZEJ JEST DO TESTOWANIA SESJI -->
    
    </header>
    <section class="hero">
    <section class = "logw">
    <form id="NaukaData">
        <label for="nazwa">Nazwa wydarzenia:</label><br>
        <input type="text" id="nazwa" name="nazwa" required placeholder="Wpisz nazwę"><br>
       
        <label for="ilosc">Ilość osób:</label><br>
        <input type="number" id="ilosc" name="ilosc"  required ><br>

        <label for="data">Ilość osób:</label><br>
        <input type="date" id="data" name="data" required><br>
        
        <label for="opis">Opis wydarzenia:</label><br>
        <textarea id="opis" name="opis" maxlength="255" placeholder="Napisz opis"></textarea><br>
        <p id="opisCount">Pozostało: 255 znaków</p>


        <label for="sports">Przedmioty:</label><br>
        <select name="przedmioty" id="przedmioty">

<!-- Przedmioty ogólnokształcące -->
<optgroup label="Przedmioty ogólnokształcące">
    <option value="polski">Język polski</option>
    <option value="matematyka">Matematyka</option>
    <option value="obcy">Język obcy nowożytny</option>
    <option value="historia">Historia</option>
    <option value="wos">Wiedza o społeczeństwie</option>
    <option value="biologia">Biologia</option>
    <option value="fizyka">Fizyka</option>
    <option value="geografia">Geografia</option>
    <option value="chemia">Chemia</option>
    <option value="informatyka">Informatyka</option>
    <option value="wychowanie">Wychowanie fizyczne</option>
    <option value="plastyka">Plastyka</option>
    <option value="muzyka">Muzyka</option>
    <option value="edukacja_bezpieczenstwa">Edukacja dla bezpieczeństwa</option>
    <option value="religia">Religia</option>
    <option value="etyka">Etyka</option>
    <option value="przedsiebiorczosc">Podstawy przedsiębiorczości</option>
    <option value="technika">Technika</option>
    <option value="zdrowotna">Edukacja zdrowotna</option>
    <option value="lacina">Język łaciński i kultura antyczna</option>
</optgroup>

<!-- Przedmioty zawodowe -->
<optgroup label="Przedmioty zawodowe - Technik Informatyk">
    <option value="programowanie">Programowanie</option>
    <option value="sieci">Sieci komputerowe</option>
    <option value="admin">Administracja systemów komputerowych</option>
    <option value="bazy">Bazy danych</option>
    <option value="technologie">Technologie internetowe</option>
    <option value="grafika">Podstawy grafiki komputerowej</option>
    <option value="projektowanie">Projektowanie systemów informatycznych</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Elektronik">
    <option value="elektronika">Podstawy elektroniki</option>
    <option value="uklady">Układy elektroniczne</option>
    <option value="montaz">Montaż i serwis urządzeń elektronicznych</option>
    <option value="automatyka">Automatyka i robotyka</option>
    <option value="diagnostyka">Diagnostyka i naprawa urządzeń elektronicznych</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Mechatronik">
    <option value="mechatronika">Podstawy mechatroniki</option>
    <option value="robotyka">Automatyka i robotyka</option>
    <option value="systemy">Systemy sterowania</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Budownictwa">
    <option value="budownictwo">Podstawy budownictwa</option>
    <option value="materialy">Technologia materiałów budowlanych</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Logistyk">
    <option value="transport">Organizacja transportu</option>
    <option value="logistyka">Logistyka</option>
    <option value="magazynowanie">Magazynowanie</option>
    <option value="produkcja">Planowanie produkcji</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Mechanik">
    <option value="technologie">Technologie mechaniczne</option>
    <option value="obrobka">Obróbka skrawaniem</option>
    <option value="maszyny">Maszyny i urządzenia</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Kucharz">
    <option value="gastronomia">Podstawy gastronomii</option>
    <option value="technologia">Technologia gastronomiczna</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Elektryk">
    <option value="elektrotechnika">Podstawy elektrotechniki</option>
    <option value="instalacje">Instalacje elektryczne</option>
</optgroup>

<optgroup label="Przedmioty zawodowe - Technik Artysta Fotograf">
    <option value="fotografia">Techniki fotograficzne</option>
    <option value="sprzet">Obsługa sprzętu fotograficznego</option>
</optgroup>

</select><br><br>
        <button type ="submit" value = "submit" class = "guzik1"> Stwórz Wydarzenie</button><br>
    </form>

    <script src="znaki.js"></script>
</section>
    </section>
</body>
</html>
<script>
            // Funkcja do obsługi formularza
            $(document).ready(function() {
            $("#NaukaData").on("submit", function(event) {
                event.preventDefault(); // Zapobiega domyślnej akcji wysłania formularza

                // Pobieramy dane z formularza
                const NaukaeventData = {
                    nazwa: $("#nazwa").val(),
                    ilosc: $("#ilosc").val(),
                    data: $("#data").val(),
                    opis: $("#opis").val(),
                    przedmioty: $("#przedmioty").val() || [], // Upewnia się, że jest to tablica
                };

                // Wysłanie danych do serwera
                $.ajax({
                    url: "http://localhost:3000/dodajWydarzenieEdukacyjne", // Zmienna, jeśli adres serwera się zmienia
                    type: "POST",
                    contentType: "application/json",
                    data: JSON.stringify(NaukaeventData),
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