<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("logowanie/connection.php");
include("logowanie/functions.php");

if (!$conn) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                exit;
            } else {
                $error = "Nieprawidłowe hasło!";
            }
        } else {
            $error = "Użytkownik nie istnieje!";
        }
    } else {
        $error = "Proszę wypełnić wszystkie pola!";
    }
}

mysqli_close($conn);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
       <a href="index.php"><img src="grafika/logopyknijmy.png" alt="Logo" class="logo"></a>
        <nav class="nav-links">
            <a href="#">Przeglądaj</a>
            <a href="#">Dodaj</a>
            <a href="#">O nas</a>
        </nav>
        <a href="login.php"><img src="grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
    </header>
    <section class="hero">
        <section class="log">
        <form action="login.php" method="post">
    <label>E-mail</br><input type="email" name="email" placeholder="Podaj email"></label></br></br>
    <label>Hasło</br><input type="password" name="password" placeholder="Podaj hasło"></label></br></br>
    <button type="submit" class="guzik1">Zaloguj</button></br></br>
    <?php if (isset($error)) { echo "<div class='error'style='color:red;'>$error</div>"; } ?>
    <a href="#">Zapomniałeś hasła?</a></br>
    <a href="register.php">Nie masz konta? Zarejestruj się</a>
</form>
        </section>
    </section>
</body>
</html>
