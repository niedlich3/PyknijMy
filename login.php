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
       <a href="indexnowy.php"><img src="grafika/logopyknijmy.png" alt="Logo" class="logo"></a>
        <nav class="nav-links">
            <a href="#">Przeglądaj</a>
            <a href="#">Dodaj</a>
            <a href="#">O nas</a>
        </nav>
        <a href="login.php"><img src="grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
    </header>
    <section class="hero">
        <section class="log">
            <form>
                <label>E-mail</br><input type="email" placeholder="Podaj email"></label></br></br>
                <label>Hasło</br><input type="password" placeholder="Podaj hasło"></label></br></br>
                <button type="submit" class="guzik1">Zaloguj</button></br></br>
                <a href="#">Zapomniałeś hasła?</a></br>
                <a href="register.php">Nie masz konta? Zarejestruj się</a>
            </form>
        `</section>
    </section>
</body>
</html>
