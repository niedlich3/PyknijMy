<?php
  
  session_start();

  include("login/connection.php");
  include("login/functions.php");
  $user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodawanie wydarzenia</title>
    <link rel="stylesheet" href="css/styl_pyknijmy.css">
	<link rel="icon" type="image/png" href="grafika/ikonka_pyknijmy.png">
</head>
<body>
<?php
   
    
    if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
    }
    include("php/dodawaniedb.php");
    mysqli_close($conn);
?>
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
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table class="tabelka">
            <tr>
                <td>Miasto:</td>
                <td><input type="text" name="Miasto" pattern="[A-Za-z ]+" required></td>
            </tr>
            <tr>
                <td>Ulica:</td>
                <td><input type="text" name="Ulica" pattern="[A-Za-z]+ ?(\d{1,})?" required></td>
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
                <td><input type="number" name="Zapisani"  min="0" required></td>
            </tr>
            <tr>
                <td>Maksymalna Liczba osób:</td>
                <td><input type="number" name="Max" min="1" required></td>
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
