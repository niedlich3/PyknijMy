<?php
  
  session_start();

  include("connection.php");
  include("functions.php");
  $user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie wydarzenia</title>
    <link rel="stylesheet" href="styl_pyknijmy.css">
</head>
<body>
<?php
   
    
    if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Miasto = $_POST['Miasto'];
        $Ulica = $_POST['Ulica'];
        $Data = $_POST['Data'];
        $Godzina = $_POST['Godzina'];
        $Zapisani = $_POST['Zapisani'];
        $Max = $_POST['Max'];
		$Opis = $_POST['Opis'];
		$Kategoria = $_POST['Kategoria'];
		$Zdjecia = $_POST['Zdjecia'];
        
        $Miasto = mysqli_real_escape_string($conn, $Miasto);
        $Ulica = mysqli_real_escape_string($conn, $Ulica);
        $Data = mysqli_real_escape_string($conn, $Data);
        $Godzina = mysqli_real_escape_string($conn, $Godzina);
        $Zapisani = mysqli_real_escape_string($conn, $Zapisani);
        $Max = mysqli_real_escape_string($conn, $Max);
        $Opis = mysqli_real_escape_string($conn, $Opis);
        $Kategoria = mysqli_real_escape_string($conn, $Kategoria);
        
        
        $dodawanie = "INSERT INTO wydarzenia (miasto, ulica, data, godzina, osoby_zapisane, max_osoby, opis, kategoria) VALUES ('$Miasto', '$Ulica', '$Data', '$Godzina', '$Zapisani', '$Max', '$Opis','$Kategoria')";
        
        if (mysqli_query($conn, $dodawanie)) {
            echo "Wydarzenie zostało pomyślnie dodane";
        } else {
            echo "Błąd: " . $dodawanie . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>
    <div class = "header"> 
  <nav>
   <a href = "index.php"><img src="logopyknijmy.png" class="logo" style="margin-left: 10%;"></a>
   

   
    <ul class="nav-links">
		<li><a href="profil.php?id=<?php echo $user_data['id']?>" class="text" style="color: white;">Hello, <?php echo $user_data['user_name']; ?></a></li>
		<li><a href="tworzenie.php">Stwórz wydarzenie</a></li>
		<li><a href="wyszukiwanie.php">Wyszukaj wydarzenia</a></li>
		<li class="btn" style="color: black;">
            <a href="signup.php" style="color: black;">Stwórz konto</a>
			
        </li>
		<li class="btn" style="color: black;">
			<a href="logout.php" style="color: black;">Logout</a>
		</li>

	</ul>
  </nav>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>
            <tr>
                <td>Miasto:</td>
                <td><input type="text" name="Miasto" required></td>
            </tr>
            <tr>
                <td>Ulica:</td>
                <td><input type="text" name="Ulica" required></td>
            </tr>
            <tr>
                <td>Data:</td>
                <td><input type="date" name="Data" required></td>
            </tr>
            <tr>
                <td>Godzina:</td>
                <td><input type="time" name="Godzina" required></td>
            </tr>
            <tr>
                <td>Liczba osób zapisanych:</td>
                <td><input type="number" name="Zapisani" required></td>
            </tr>
            <tr>
                <td>Maksymalna Liczba osób:</td>
                <td><input type="number" name="Max" required></td>
            </tr>
			<tr>
                <td>Opis wydarzenia:</td>
                <td><input type="text" name="Opis" required></td>
            </tr>
			<tr>
			<td><label for="Kategoria">Kategoria sportowa: </label>
				<select name="Kategoria" required>
					<option value="Piłka nożna">Piłka nożna</option>
					<option value="Siatkówka">Siatkówka</option>
					<option value="Koszykówka">Koszykówka</option>
					<option value="Inne">Inne</option>
				</select></td>
			</tr>
			<tr>
				<td>Dodaj zdjecia do wydarzenia: </td>
				<td><input type ="file" name="Zdjecia" accept="image/*" multiple="multiple"></td>
			</tr>
            <tr>
                <td colspan="2"><input type="submit" value="Dodaj Wydarzenie" required></td>
            </tr>
        </table>
    </form>
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
