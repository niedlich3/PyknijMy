<?php 
session_start();
error_reporting(0);
	include("logowanie/connection.php");
	include("logowanie/functions.php");


	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// Pobieranie danych z formularza
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_repeat = $_POST['password_repeat'];
		$hash = password_hash($password, PASSWORD_DEFAULT);
	
		if (!empty($user_name) && !empty($email) && !empty($password) && !empty($password_repeat)) {
			// Sprawdzenie, czy hasła są identyczne
			if ($password !== $password_repeat) {
				$_SESSION['error'] = "Hasła nie są takie same!";
				header("Location: register.php"); // Zmienić na odpowiednią stronę formularza rejestracji
				exit;
			}
	
			$user_id = random_num(20);
			$query = "SELECT * FROM users WHERE user_name = '$user_name'";
			$result = mysqli_query($conn, $query);
	
			if (mysqli_num_rows($result) > 0) {
				$_SESSION['error'] = "Nazwa użytkownika już istnieje!";
				header("Location: register.php");
				exit;
			} else {
				$query1 = "INSERT INTO users (user_id, email, user_name, password) VALUES ('$user_id', '$email', '$user_name', '$hash')";
				mysqli_query($conn, $query1);
				
				$_SESSION['success'] = "Rejestracja zakończona sukcesem! Możesz się teraz zalogować.";
				header("Location: login.php");
				exit;
			}
		} else {
			$_SESSION['error'] = "Wypełnij wszystkie pola!";
			header("Location: register.php");
			exit;
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
       <a href="indexnowy.php"><img src="grafika/logopyknijmy.png" alt="Logo" class="logo"></a>
        <nav class="nav-links">
            <a href="#">Przeglądaj</a>
            <a href="#">Dodaj</a>
            <a href="#">O nas</a>
        </nav>
        <a href="login.php"><img src="grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
    </header>

	

    <section class="hero">
        <section class="rej">
            <form method="post">
                <label>Login</br><input type="text" placeholder="Podaj login" name="user_name"></label></br></br>
                <label>E-mail</br><input type="email" placeholder="Podaj email" name="email"></label></br></br>
                <label>Hasło</br><input type="password" placeholder="Podaj hasło" name="password"></label></br></br>
                <label>Powtórz hasło</br><input type="password" placeholder="Powtórz hasło" name="password_repeat"></label></br></br>
                <button type="submit" class="guzik1">Stwórz konto</button></br></br>
            </form>
			<?php
    if (isset($_SESSION['error'])) {
        echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']); // Usunięcie błędu po wyświetleniu
    }

    if (isset($_SESSION['success'])) {
        echo '<p style="color: green;">' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']); // Usunięcie sukcesu po wyświetleniu
    }
    ?>
        </section>
    </section>
</body>
</html>
