<?php
session_start();

include("logowanie/connection.php");
include("logowanie/functions.php");
$user_data = check_login($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about_me = $_POST["about_me"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $id = $_GET['id'];
    $update_query = "UPDATE users SET about_me = '$about_me' WHERE id = $id";
    mysqli_query($conn, $update_query);
    $update_query1 = "UPDATE users SET birthdate = '$birthdate' WHERE id = $id";
    mysqli_query($conn, $update_query1);
    $update_query2 = "UPDATE users SET gender = '$gender' WHERE id = $id";
    mysqli_query($conn, $update_query2);
    header("Refresh:0");
    exit();
}
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
            <a href="#">Dodaj</a>
            <a href="#">O nas</a>
        </nav>
        <!-- TO NIZEJ JEST DO TESTOWANIA SESJI -->
      <!--<li><a href="profil.php?id=<?php echo $user_data['id']?>" class="text" style="color: black;">Hello, <?php echo $user_data['user_name']; ?></a></li>-->  
        <a href="login.php"><img src="grafika/logicon.png" alt="Ikona użytkownika" class="icon"></a>
    </header>
    <section class="heroprzy" >
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
        echo '<textarea name="about_me" placeholder="O mnie (maks. 600 znaków)" maxlength="600" class="about_me">' . $row['about_me'] . '</textarea>';
        echo '<div class="dob_gender_container">';
echo '<label for="birthdate"class="data_urodzenia">Data urodzenia:</label>';
echo '<input type="date" name="birthdate" id="birthdate" value="' . $row['birthdate'] . '" required>';
echo '<label for="gender"class="wybor_plci">Płeć:</label><br>';
echo '<select name="gender" id="gender" required><br>';
echo '<option value="male"' . ($row['gender'] == 'male' ? ' selected' : '') . '>Mężczyzna</option>';
echo '<option value="female"' . ($row['gender'] == 'female' ? ' selected' : '') . '>Kobieta</option>';
echo '<option value="other"' . ($row['gender'] == 'other' ? ' selected' : '') . '>Inna</option>';
echo '</select>';
echo '</div>';
        echo '<button type="submit" name="submit"class="submit_button">Dodaj</button>';
        echo '<button type="button" class="cancel_button">Anuluj</button>';
        echo '</form>';
        echo '</div>';
     

    }else{
        echo 'Brak danych.';
    }
    ?>
    
    </section>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var editButton = document.querySelector('.edit_button');
    var editForm = document.querySelector('.edit_about_me_form');
    var cancelButton = document.querySelector('.cancel_button');

    editButton.addEventListener('click', function() {
        editForm.style.display = 'block';
         document.querySelector('.edit_about_me_form').style.display = 'block';
        document.querySelector('.about_me_container').style.display = 'none';
    });

    cancelButton.addEventListener('click', function() {
        editForm.style.display = 'none';
        document.querySelector('.edit_about_me_form').style.display = 'none';
        document.querySelector('.about_me_container').style.display = 'block';
    });
});


</script>

</body>
</html>