<?php
  
  session_start();

  include("connection.php");
  include("functions.php");
  $user_data = check_login($con);
?>
<!DOCT
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wyszukaj wydarzenie</title>
	<link rel="stylesheet" href="styl_pyknijmy.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
	
<div class = "header"> 
	
  <nav>
   <a href = "index.php"><img src="logopyknijmy.png" class="logo" style="margin-left: 10%;"></a>
   

   
    <ul class="nav-links">
		<li><a class="text" style="color: white;">Hello, <?php echo $user_data['user_name']; ?></a></li>
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
