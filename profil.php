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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PyknijMy</title>
	<link rel="stylesheet" href="styl_pyknijmy.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class = "header"> 
 <nav>
   <a href = "index.php"><img src="logopyknijmy.png" class="logo" style="margin-left: 10%;"></a>
   

   
    <ul class="nav-links">
		<li><a href="profil.php?id=<?php echo $user_data['id']?>" class="text" style="color: white;">Hello, <?php echo $user_data['user_name']; ?></a></li>
		<li><a href="tworzenie.php">Stwórz wydarzenie</a></li>
		<li><a href="wyszukiwanie.php">Wyszukaj wydarzenia</a></li>
		
		<li class="btn" style="color: black;">
			<a href="logout.php" style="color: black;">Logout</a>
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