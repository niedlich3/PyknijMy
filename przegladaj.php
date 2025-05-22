<?php
  
  session_start();

  include("logowanie/connection.php");
  include("logowanie/functions.php");
  $user_data = check_login($conn);
  // W PHP, po zalogowaniu użytkownika
  $user_id = $id; // Twoje user_id z bazy danych
  setcookie('userId', $user_id, time() + 3600, "/");  // Ustawiamy ciasteczko userId
   
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#000000"/>
	<title>PyknijMy</title>
	<link rel="icon" type="image/png" href="grafika/ikonka_pyknijmy.png">
	<link rel="stylesheet" href="css/styl_pyknijmy3.css">
	<link rel="manifest" href="manifest.json">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
       <a href="index.php"><img src="grafika/logopyknijmy.png" alt="Logo" class="logo"></a>
        <nav class="nav-links">
            <a href="przegladaj.php">Przeglądaj</a>
            <a href="eventchoice.php">Dodaj</a>
            <a href="#">O nas</a>
            <a href="profil.php?id=<?php echo $user_data['id']?>"><img src="grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
        </nav>
        <!-- TO NIZEJ JEST DO TESTOWANIA SESJI -->
      
    </header>
    <section class="heroprz">
    <div class="container" id="scrollbar4">
        <div class="header">
            <i class="fas fa-bars"></i>
            <span>Przeglądaj wydarzenia</span>
            <i class="fas fa-search"></i>
        </div>
</br>
        <div class="filters">
            <span>Dodaj Filtry:</span>
            <i class="fas fa-plus"></i>
        </div>

        <div class="category">
    <span>Sport</span>
    <input type="checkbox" id="sport-checkbox" value="Sport" onclick="event.stopPropagation(); toggleSubcategories(event, 'sport');">
</div>
<!--
<div class="subcategory sport"><span>Snorkeling</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Taekwondo</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Badminton</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Rugby</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Nurkowanie</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Morsowanie</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Padel</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Futbol Amerykański</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Muay Thai</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Piłka nożna</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Hokej</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Unihokej</span><input type="checkbox"></div>
<div class="subcategory sport"><span>CrossFit</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Kalistenika</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Outdoor / Survival</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Myślistwo</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Sport z Psem</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Bilard</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Trail</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Boks</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Rowery</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Wędkarstwo</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Siatkówka plażowa</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Pływanie</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Szermierka</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Balet, taniec klasyczny</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Hokej na trawie</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Narciarstwo biegowe</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Karate</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Biegi OCR</span><input type="checkbox"></div>
<div class="subcategory sport"><span>Piłka ręczna</span><input type="checkbox"></div>
-->
        <div class="category">
    <span>Nauka</span>
    <input type="checkbox" id="nauka-checkbox" value="Nauka" onclick="event.stopPropagation(); toggleSubcategories(event, 'nauka');">
</div>
<!--
<div class="subcategory nauka"><span>Język polski</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Matematyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Język obcy nowożytny</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Historia</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Wiedza o społeczeństwie</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Biologia</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Fizyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Geografia</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Chemia</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Informatyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Wychowanie fizyczne</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Plastyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Muzyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Edukacja dla bezpieczeństwa</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Religia</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Etyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Podstawy przedsiębiorczości</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Technika</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Edukacja zdrowotna</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Język łaciński i kultura antyczna</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Programowanie</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Sieci komputerowe</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Administracja systemów komputerowych</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Bazy danych</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Technologie internetowe</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Podstawy grafiki komputerowej</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Projektowanie systemów informatycznych</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Podstawy elektroniki</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Układy elektroniczne</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Montaż i serwis urządzeń elektronicznych</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Automatyka i robotyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Diagnostyka i naprawa urządzeń elektronicznych</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Podstawy mechatroniki</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Systemy sterowania</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Podstawy budownictwa</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Technologia materiałów budowlanych</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Organizacja transportu</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Logistyka</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Magazynowanie</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Planowanie produkcji</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Technologie mechaniczne</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Obróbka skrawaniem</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Maszyny i urządzenia</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Podstawy gastronomii</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Technologia gastronomiczna</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Podstawy elektrotechniki</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Instalacje elektryczne</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Techniki fotograficzne</span><input type="checkbox"></div>
<div class="subcategory nauka"><span>Obsługa sprzętu fotograficznego</span><input type="checkbox"></div>
-->
        <div class="category">
    <span>Rozrywka</span>
    <input type="checkbox" id="rozrywka-checkbox" onclick="event.stopPropagation(); toggleSubcategories(event, 'rozrywka');">
</div>
<!--
<div class="subcategory rozrywka"><span>Wyjście do kina</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Spotkanie przy planszówkach</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Wspólne gotowanie</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Spacer po mieście</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Zajęcia taneczne</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Wieczór gier komputerowych</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Karaoke z przyjaciółmi</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Wyjście na drinka</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Piknik w parku</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Wspólne oglądanie meczu</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Escape room</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Wspólna wycieczka rowerowa</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Spotkanie w kawiarni</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Wyprawa na koncert</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Wizyta w muzeum lub galerii</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Warsztaty artystyczne</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Zajęcia jogi lub medytacji</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Spontaniczne wyjście na imprezę</span><input type="checkbox"></div>
<div class="subcategory rozrywka"><span>Zajęcia z fotografii</span><input type="checkbox"></div>
-->
    </div>
    <div id="wydarzenia-container">
        <h2>Wydarzenia</h2>
        <ul id="lista"></ul>
    </div>
    <div>
    </div>
    <div >  
    </div>
 
    <script>
    function toggleSubcategories(event, category) {
        let checkbox = document.getElementById(category + '-checkbox');
        let subcategories = document.querySelectorAll('.' + category);

        // Odwracamy stan checkboxa TYLKO gdy kliknięto w div, nie w sam checkbox
        if (event.target !== checkbox) {
            checkbox.checked = !checkbox.checked;
        }

        // Przełączanie widoczności podkategorii
        subcategories.forEach(sub => {
            sub.style.display = checkbox.checked ? 'flex' : 'none';
        });
    }
</script>
    </section>
</body>
<script src="wyswietlanie.js"></script>
<script>
async function dolaczDoWydarzenia(eventId) {
    const response = await fetch('http://localhost:3000/dolaczDoWydarzenia', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        credentials: 'include',  // MUSI być ustawione!
        body: JSON.stringify({ event_id: eventId })
    });

    const data = await response.json();
    alert(data.message);
}

</script>
</html>
