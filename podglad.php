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
            <a href="profil.php?id=<?php echo $user_data['id']?>" class="text" style="color: black;text-decoration: underline;">Hello, <?php echo "<b>" . $user_data['user_name'] . "</b>"; ?></a>
            <a href="login.php"><img src="grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
        </nav>
        <!-- TO NIZEJ JEST DO TESTOWANIA SESJI -->
      
    </header>
    <section class="heroprzy">
    
    <div id="wydarzenie-info"></div>
    <div class="uczestnicy-box">
    <h2>Uczestnicy wydarzenia:</h2>
    <ul id="uczestnicy-lista"></ul>
    
<script>
const params = new URLSearchParams(window.location.search);
const eventId = params.get('id');

async function ladujUczestnikow() {
    const params = new URLSearchParams(window.location.search);
    const eventId = params.get('id');

    if (!eventId) {
        document.getElementById('uczestnicy-lista').innerHTML = '<li>Nie podano ID wydarzenia</li>';
        return;
    }

    try {
        const res = await fetch(`http://localhost:3000/uczestnicy/${eventId}`);
        const uczestnicy = await res.json();

        const lista = document.getElementById('uczestnicy-lista');
        lista.innerHTML = '';  // Czyszczenie listy przed dodaniem nowych danych

        if (uczestnicy.length === 0) {
            lista.innerHTML = '<li>Brak uczestników</li>';
        } else {
            uczestnicy.forEach(u => {
    if (u) {
        const li = document.createElement('li');
        li.textContent = `${u}`;
        lista.appendChild(li);
    } else {
        const li = document.createElement('li');
        li.textContent = 'Nieznany użytkownik';
        lista.appendChild(li);
    }
});

        }

    } catch (err) {
        console.error("Błąd przy pobieraniu uczestników:", err);
        document.getElementById('uczestnicy-lista').innerHTML = '<li>Błąd ładowania danych</li>';
    }
}

async function ladujWydarzenie() {
    if (!eventId) {
        document.getElementById('wydarzenie-info').innerHTML = '<p>Nie podano ID wydarzenia</p>';
        return;
    }

    try {
        const res = await fetch(`http://localhost:3000/wydarzenie/${eventId}`);
        const wydarzenie = await res.json();

        const infoDiv = document.getElementById('wydarzenie-info');
        infoDiv.innerHTML = `
            <h3>${wydarzenie.nazwa}</h3>
            <p><strong>Typ:</strong> ${wydarzenie.typ}</p>
            <p><strong>Opis:</strong> ${wydarzenie.opis}</p>
            <p><strong>Ilość miejsc:</strong> ${wydarzenie.ilosc}</p>
        `;
    } catch (err) {
        console.error("Błąd przy pobieraniu wydarzenia:", err);
        document.getElementById('wydarzenie-info').innerHTML = '<p>Błąd ładowania wydarzenia</p>';
    }
}

ladujUczestnikow();
ladujWydarzenie();
</script>
</div>
</section>
</body>
</html>