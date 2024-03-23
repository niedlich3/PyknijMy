<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wyszukaj wydarzenie</title>
	<link rel="stylesheet" href="kurwastyl.css">
</head>
<body>
	
<div class = "header"> 
  <nav>
   <img src="logo.png" class="logo">
    <ul class="nav-links">
		<li><a href="tworzenie.php">Stwórz wydarzenie</a></li>
		<li><a href="">Wyszukaj wydarzenia</a></li>
		<li class="btn">Stwórz konto</li>
	</ul>
  </nav>
  <?php
	 $host = 'localhost'; 
	 $username = 'root';
	 $password = ''; 
	 $database = 'pyknijmy'; 
	 
	 $conn = mysqli_connect($host, $username, $password, $database);
	 
	 if (!$conn) {
		 die("Błąd połączenia: " . mysqli_connect_error());
	 }

	 $wynik = mysqli_query($conn, "SELECT * from wydarzenia");
	 echo '<table class="EventTable"><tr><th>Miasto</th><th>Ulica</th><th>Data</th><th>Godzina</th><th>Osoby zapisane</th><th>Max liczba osób</th></tr>';
	 while($row = mysqli_fetch_array($wynik)) {
		echo "<tr><td>{$row['miasto']}</td><td>{$row['ulica']}</td><td>{$row['data']}</td><td>{$row['godzina']}<td>{$row['osoby_zapisane']}<td>{$row['max_osoby']}</tr>";
	 }
	 echo '</table>';

	mysqli_close($conn);
	?>
</div>

<footer>
		<div class = "footerContainer">
		 <div class = "footerNav">
		  <ul>
		    <li><a href = "index.html">Home</a></li>	
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