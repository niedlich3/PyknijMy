<?php
  
  session_start();

  include("logowanie/connection.php");
  include("logowanie/functions.php");
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
	<link rel="icon" type="image/png" href="grafika/ikonka_pyknijmy.png">
	<link rel="stylesheet" href="css/styl_pyknijmy3.css">
	<link rel="manifest" href="manifest.json">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <section class="hero" >
    <div class="uslugi">
        <div class="image-container">
           <a href ="strony/tworzenie-wydarzenia-sport.php"> <img src="grafika/sport.png" alt="1" class="img-fluid"></a>
        </div>
        <div class="image-container">
           <a href="strony/tworzenie-wydarzenia-nauka.php"> <img src="grafika/nauka.png" alt="2" class="img-fluid"></a>
        </div>
        <div class="image-container">
            <a href="strony/tworzenie-wydarzenia-rozrywka.php"> <img src="grafika/rozrywka.png" alt="3" class="img-fluid"></a>
        </div>
    </section>
</body>
</html>
