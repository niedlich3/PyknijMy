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
    <meta name="theme-color" content="#000000" />
    <title>PyknijMy</title>
    <link rel="icon" type="image/png" href="grafika/ikonka_pyknijmy.png">
    <link rel="stylesheet" href="css/styl_pyknijmy3.css">
    <link rel="manifest" href="manifest.json">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <a href="index.php"><img src="grafika/logopyknijmy.png" alt="Logo" class="logo"></a>
        <nav class="nav-links">
            <a href="przegladaj.php">Przeglądaj</a>
            <a href="eventchoice.php">Dodaj</a>
            <a href="#">O nas</a>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                <a href="admin_panel.php">Panel administratora</a>
            <?php endif; ?>
            <a href="profil.php?id=<?php echo $user_data['id'] ?>"><img src="grafika/logicon.png" alt="Ikona użytkownika"
                    class="icon"></a>
        </nav>
        <!-- TO NIZEJ JEST DO TESTOWANIA SESJI -->

    </header>
    <section class="hero">
        <section class="blok">
            <img src="grafika/remo.png" alt="Remek">
            <h3>Remigiusz Szabłowski</h3>
            <p>Remek to młody perspektywistyczny programista w wolnym czasie zajmujący się działalnością charytatywną w
                Palestynie oraz dźwiganiem ciężarów</p><br>
            <blockquote><i>"No pain no gain"</i></blockquote>
        </section>
        <section class="blok">
            <img src="grafika/szymek.png" alt="Szymon">
            <h3>Szymon Niedlich</h3>
            <p>Szymon poza niesamowitymi zdolnościami informatycznymi specjalizuje się również w produkcji materiałów filmowych dla Pogoni Szczecin jako dumny kibol i huligan</p><br>
            <blockquote><i>"Lech zdechł kolejorz"</i></blockquote>
        </section>
        <section class="blok">
            <img src="grafika/oli.png" alt="Oliver">
            <h3>Oliver Kołacki</h3>
            <p>Oliver nie zliczając stworzonych projektów informatycznych zwiedził podobną ilość krajów na świecie a ma ochotę na jeszcze więcej, jego celem jest zbadanie najciemniejszych jaskiń świata</p>
            <blockquote><i>"Podróże małe i duże"</i></blockquote>
        </section>
        <section class="blok">
            <img src="grafika/frano.png" alt="Franek" class="foto">
            <h3>Franciszek Płatek</h3>
            <p>Pan Prezydent - tak na niego mówią. Elokwentny i uczony, czy pracowity? Trzeba by go spytać. Odpowiedź przyjdzie w podobnym czasie jak nasza paczka z AliExpress</p>
            <blockquote><i>"Zdolny ale leniwy"</i></blockquote>
        </section>
    </section>
</body>

</html>