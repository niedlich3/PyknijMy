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