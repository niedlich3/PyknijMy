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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PyknijMy</title>
	<link rel="icon" type="image/png" href="grafika/ikonka_pyknijmy.png">
	<link rel="stylesheet" href="css/styl_pyknijmy.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="script.js"></script>
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
	include("php/wyswietlanie.php"); 
	
	mysqli_close($conn);
	?>
	<div class="conteiner">
    <div class="kategoria"><b>Aktywne wydarzenia </b></div>
    
    <select class="kategoria" id="kategorie" style="background-color: black;">
        <option value="pilka_nozna">Piłka nożna</option>
        <option value="koszykowka">Koszykówka</option>
        <option value="siatkowka">Siatkówka</option>
        <option value="inne">Inne</option>
    </select>
    <div class="wydarzenia pilka_nozna">
        <?php funkcja($wynik_noga); ?>
    </div>
    <div class="wydarzenia koszykowka">
        <?php funkcja($wynik_kosz); ?>
    </div>
    <div class="wydarzenia siatkowka">
        <?php funkcja($wynik_siatka); ?>
    </div>
    <div class="wydarzenia inne">
        <?php funkcja($wynik_inne); ?>
    </div>     
	</div>
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
</body>
</html>
