<?php
session_start();

include("login/connection.php");
include("login/functions.php");
$user_data = check_login($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about_me = $_POST["about_me"];
    $id = $_GET['id'];
    $update_query = "UPDATE users SET about_me = '$about_me' WHERE id = $id";
    mysqli_query($conn, $update_query);
    header("Refresh:0");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PyknijMy</title>
    <link rel="stylesheet" href="css/styl_pyknijmy.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class = "header"> 
    <nav>
        <a href = "index.php"><img src="grafika/logopyknijmy.png" class="logo" style="margin-left: 10%;"></a>

        <ul class="nav-links">
            <li><a href="profil.php?id=<?php echo $user_data['id']?>" class="text" style="color: white;">Hello, <?php echo $user_data['user_name']; ?></a></li>
            <li><a href="tworzenie.php">Stwórz wydarzenie</a></li>
            <li><a href="wyszukiwanie.php">Wyszukaj wydarzenia</a></li>

            <li class="btn" style="color: black;">
                <a href="login/logout.php" style="color: black;">Logout</a>
            </li>

        </ul>
    </nav>
    <?php
    if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
    }
    $id = $_GET['id'];
    $profil = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $profil);


    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo '<div class = "konto_uzytkownika">';
        echo '<div class ="profil_nick">' . ' ', $row['user_name'];        
        echo '</div>';
        echo '<div class = "linia">';
        echo '</div>';
        echo '<div class="about_me_container">';
        echo '<h1>O mnie</h1>';
        echo '<div class="about_me_content">';
        echo nl2br($row['about_me']); // Wyswietlamy opis, nl2br używamy aby zachować formatowanie tekstu
        echo '</div>';
        echo '<button class="edit_button">Edytuj</button>';
        echo '</div>';
        echo '<form class="edit_about_me_form" style="display: none;" method="post">';
        echo '<textarea name="about_me" placeholder="O mnie (maks. 600 znaków)" maxlength="600">' . $row['about_me'] . '</textarea>';
        echo '<button type="submit" name="submit">Dodaj</button>';
        echo '<button type="button" class="cancel_button">Anuluj</button>';
        echo '</form>';
        echo '</div>';


    }else{
        echo 'Brak danych.';
    }
    ?>
</div>

<footer>
    <div class = "footerContainer">
        <div class = "footerNav">
            <ul>
                <li><a href = "index.php">Home</a></li>    
                <li><a href= "https://linktr.ee/beatbuddy">About Us</a></li>

            </ul>
        </div>

    </div>
    <div class = "footerBottom">
        <p>Copyright &copy;2024; Designed by <span class = "designer">SCI</span></p>
     </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var editButton = document.querySelector('.edit_button');
    var editForm = document.querySelector('.edit_about_me_form');
    var cancelButton = document.querySelector('.cancel_button');

    editButton.addEventListener('click', function() {
        editForm.style.display = 'block';
        document.querySelector('.about_me_container').style.display = 'none';
    });

    cancelButton.addEventListener('click', function() {
        editForm.style.display = 'none';
        document.querySelector('.about_me_container').style.display = 'block';
    });
});
</script>